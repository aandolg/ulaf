<?php

/**
 * Simpla CMS
 *
 * @copyright     2012-2014 Redline Studio
 * @link         http://simplashop.com
 * @author         Artiom Mitrofanov
 *
 */

require_once('Simpla.php');

class Articles extends Simpla
{
    // Список указателей на категории в дереве категорий (ключ = id категории)
    private $all_categories;
    // Дерево категорий
    private $categories_tree;    

    /*
    *
    * Функция возвращает пост по его id или url
    * (в зависимости от типа аргумента, int - id, string - url)
    * @param $id id или url поста
    *
    */
    public function get_article($id)
    {
        if(is_int($id))
            $where = $this->db->placehold(' WHERE a.id=? ', intval($id));
        else
            $where = $this->db->placehold(' WHERE a.url=? ', $id);
        
        $query = $this->db->placehold("SELECT a.*, c.url category_url, c.name category 
                                       FROM __articles a 
                                       LEFT JOIN __article_categories c ON c.id = a.category_id 
                                       $where LIMIT 1");
        if($this->db->query($query))
            return $this->db->result();
        else
            return false; 
    }
    
    /*
    *
    * Функция возвращает массив постов, удовлетворяющих фильтру
    * @param $filter
    *
    */
    public function get_articles($filter = array())
    {    
        // По умолчанию
        $limit = 1000;
        $page = 1;
        $article_id_filter = '';
        $visible_filter = '';
        $keyword_filter = '';
        $category_filter = '';
        
        if(isset($filter['limit']))
            $limit = max(1, intval($filter['limit']));

        if(isset($filter['page']))
            $page = max(1, intval($filter['page']));

        if(!empty($filter['id']))
            $article_id_filter = $this->db->placehold('AND a.id in(?@)', (array)$filter['id']);
            
        if(isset($filter['visible']))
            $visible_filter = $this->db->placehold('AND a.visible = ?', intval($filter['visible']));    
            
        if(isset($filter['category_id']))
            $category_filter = $this->db->placehold('AND a.category_id in(?@)', (array)$filter['category_id']);        
        
        if(isset($filter['keyword']))
        {
            $keywords = explode(' ', $filter['keyword']);
            foreach($keywords as $keyword)
                $keyword_filter .= $this->db->placehold('AND (a.name LIKE "%'.mysql_real_escape_string(trim($keyword)).'%" OR a.meta_keywords LIKE "%'.mysql_real_escape_string(trim($keyword)).'%") ');
        }

        $sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

        $query = $this->db->placehold("SELECT a.*, c.url category_url, c.name category  
                                        FROM __articles a 
                                        LEFT JOIN __article_categories c ON c.id = a.category_id 
                                        WHERE 1 $article_id_filter $visible_filter $category_filter $keyword_filter
                                        ORDER BY date DESC, id ASC $sql_limit");
        
        $this->db->query($query);
        return $this->db->results();
    }
    
    /*
    *
    * Функция вычисляет количество постов, удовлетворяющих фильтру
    * @param $filter
    *
    */
    public function count_articles($filter = array())
    {    
        $post_id_filter = '';
        $visible_filter = '';
        $keyword_filter = '';
        $category_filter = '';
        
        if(!empty($filter['id']))
            $post_id_filter = $this->db->placehold('AND a.id in(?@)', (array)$filter['id']);
            
        if(isset($filter['visible']))
            $visible_filter = $this->db->placehold('AND a.visible = ?', intval($filter['visible']));    
            
        if(isset($filter['category_id']))
            $category_filter = $this->db->placehold('AND a.category_id in(?@)', (array)$filter['category_id']);        

        if(isset($filter['keyword']))
        {
            $keywords = explode(' ', $filter['keyword']);
            foreach($keywords as $keyword)
                $keyword_filter .= $this->db->placehold('AND (a.name LIKE "%'.mysql_real_escape_string(trim($keyword)).'%" OR a.meta_keywords LIKE "%'.mysql_real_escape_string(trim($keyword)).'%") ');
        }
        
        $query = "SELECT COUNT(distinct a.id) as count
                  FROM __articles a WHERE 1 $post_id_filter $visible_filter $category_filter $keyword_filter";

        if($this->db->query($query))
            return $this->db->result('count');
        else
            return false;
    }
    
    /*
    *
    * Создание поста
    * @param $post
    *
    */    
    public function add_article($post)
    {    
        if(isset($post->date))
        {
            $date = $post->date;
            unset($post->date);
            $date_query = $this->db->placehold(', date=STR_TO_DATE(?, ?)', $date, $this->settings->date_format);
        }
        $query = $this->db->placehold("INSERT INTO __articles SET ?% $date_query", $post);
        
        if(!$this->db->query($query))
            return false;
        else
            return $this->db->insert_id();
    }
    
    /*
    *
    * Обновить пост(ы)
    * @param $post
    *
    */    
    public function update_article($id, $post)
    {
        $query = $this->db->placehold("UPDATE __articles SET ?% WHERE id in(?@) LIMIT ?", $post, (array)$id, count((array)$id));
        $this->db->query($query);
        return $id;
    }

    /*
    *
    * Удалить пост
    * @param $id
    *
    */    
    public function delete_article($id)
    {
        if(!empty($id))
        {
            // Удаляем связанные
            $related = $this->get_related_objects($id);
            foreach($related as $r)
                $this->delete_related_object($id, $r->related_id);            
            
            $query = $this->db->placehold("DELETE FROM __articles WHERE id=? LIMIT 1", intval($id));
            if($this->db->query($query))
            {
                $query = $this->db->placehold("DELETE FROM __comments WHERE type='article' AND object_id=? LIMIT 1", intval($id));
                if($this->db->query($query))
                    return true;
            }
                            
        }
        return false;
    }    

    /*
    *
    * Следующий пост
    * @param $post
    *
    */    
    public function get_next_article($id, $category)
    {
        $this->db->query("SELECT date FROM __articles WHERE id=? LIMIT 1", $id);
        $date = $this->db->result('date');

        $this->db->query("(SELECT id FROM __articles WHERE date=? AND id>? AND visible ORDER BY id limit 1)
                           UNION
                          (SELECT id FROM __articles WHERE date>? AND visible ORDER BY date, id limit 1)",
                          $date, $id, $date);
        $next_id = $this->db->result('id');
        if($next_id)
            return $this->get_article(intval($next_id));
        else
            return false; 
    }
    
    /*
    *
    * Предыдущий пост
    * @param $post
    *
    */    
    public function get_prev_article($id, $category)
    {
        $this->db->query("SELECT date FROM __articles WHERE id=? LIMIT 1", $id);
        $date = $this->db->result('date');

        $this->db->query("(SELECT id FROM __articles WHERE date=? AND id<? AND visible ORDER BY id DESC limit 1)
                           UNION
                          (SELECT id FROM __articles WHERE date<? AND visible ORDER BY date DESC, id DESC limit 1)",
                          $date, $id, $date);
        $prev_id = $this->db->result('id');
        if($prev_id)
            return $this->get_article(intval($prev_id));
        else
            return false; 
    }
    
    
    function get_related_objects($article_id = array())
    {
        if(empty($article_id))
            return array();
                
        $query = $this->db->placehold("SELECT article_id, object_id, type
                    FROM __article_objects
                    WHERE article_id in(?@)", (array)$article_id);        
        $this->db->query($query);
        return $this->db->results();
    }
    
    function get_related_articles($filter = array())
    {    
        // По умолчанию
        $limit = 1000;
        $type_filter = '';
        $object_id_filter = '';
        
        if(isset($filter['limit']))
            $limit = max(1, intval($filter['limit']));

        if(!empty($filter['type']))
            $type_filter = $this->db->placehold('AND type=?', $filter['type']);  

        if(!empty($filter['id']))
            $object_id_filter = $this->db->placehold('AND object_id=?', (int)$filter['id']);  
            
        $sql_limit = $this->db->placehold(' LIMIT ?', $limit);
                
        $query = $this->db->placehold("SELECT article_id, object_id, type
                    FROM __article_objects
                    WHERE 1 $object_id_filter $type_filter $sql_limit");        
        $this->db->query($query);
        return $this->db->results();
    }
    
    // Функция возвращает связанные товары
    public function add_related_object($article_id, $related_id, $type)
    {
        $query = $this->db->placehold("INSERT IGNORE INTO __article_objects SET article_id=?, object_id=?, type=?", $article_id, $related_id, $type);
        $this->db->query($query);
        return $related_id;
    }
    
    // Удаление связанного товара
    public function delete_related_object($article_id, $related_id)
    {
        $query = $this->db->placehold("DELETE FROM __article_objects WHERE article_id=? AND object_id=? LIMIT 1", intval($article_id), intval($related_id));
        $this->db->query($query);
    }
    
    
    
    // Функция возвращает массив категорий
    public function get_categories($id)
    {
        if(!isset($this->categories_tree))
            $this->init_categories();
 
        if(!empty($id))
        {
            if(isset($this->all_categories[$id]))
                return $result = $this->all_categories[$id];
        }
        
        return $this->all_categories;
    }     

    // Функция возвращает id категорий для всех товаров
    public function get_article_category()
    {
        $query = $this->db->placehold("SELECT article_id, category_id, position FROM __article_categories ORDER BY position");
        $this->db->query($query);
        return $this->db->results();
    }    

    // Функция возвращает дерево категорий
    public function get_categories_tree()
    {
        if(!isset($this->categories_tree))
            $this->init_categories();
            
        return $this->categories_tree;
    }

    // Функция возвращает заданную категорию
    public function get_category($id)
    {
        if(!isset($this->all_categories))
            $this->init_categories();
        if(is_int($id) && array_key_exists(intval($id), $this->all_categories))
            return $category = $this->all_categories[intval($id)];
        elseif(is_string($id))
            foreach ($this->all_categories as $category)
                if ($category->url == $id)
                    return $this->get_category((int)$category->id);    
        
        return false;
    }
    
    // Добавление категории
    public function add_category($category)
    {
        $category = (array)$category;
        if(empty($category['url']))
        {
            $category['url'] = preg_replace("/[\s]+/ui", '_', $category['name']);
            $category['url'] = strtolower(preg_replace("/[^0-9a-zа-я_]+/ui", '', $category['url']));
        }    

        $this->db->query("INSERT INTO __article_categories SET ?%", $category);
        $id = $this->db->insert_id();
        $this->db->query("UPDATE __article_categories SET position=id WHERE id=?", $id);        
        $this->init_categories();        
        return $id;
    }
    
    // Изменение категории
    public function update_category($id, $category)
    {
        $query = $this->db->placehold("UPDATE __article_categories SET ?% WHERE id=? LIMIT 1", $category, intval($id));
        $this->db->query($query);
        $this->init_categories();
        return $id;
    }
    
    // Удаление категории
    public function delete_category($id)
    {
        if(!$category = $this->get_category(intval($id)))
            return false;
        foreach($category->children as $id)
        {
            if(!empty($id))
            {
                $query = $this->db->placehold("DELETE FROM __article_categories WHERE id=? LIMIT 1", $id);
                $this->db->query($query);
                $this->init_categories();            
            }
        }
        return true;
    }

    // Инициализация категорий, после которой категории будем выбирать из локальной переменной
    private function init_categories()
    {
        // Дерево категорий
        $tree = new stdClass();
        $tree->subcategories = array();
        
        // Указатели на узлы дерева
        $pointers = array();
        $pointers[0] = &$tree;
        $pointers[0]->path = array();
        
        // Выбираем все категории
        $query = $this->db->placehold("SELECT * FROM __article_categories ORDER BY parent_id, position");
        $this->db->query($query);
        $categories = $this->db->results();
        
        $finish = false;
        // Не кончаем, пока не кончатся категории, или пока ниодну из оставшихся некуда приткнуть
        while(!empty($categories)  && !$finish)
        {
            $flag = false;
            // Проходим все выбранные категории
            foreach($categories as $k=>$category)
            {
                if(isset($pointers[$category->parent_id]))
                {
                    // В дерево категорий (через указатель) добавляем текущую категорию
                    $pointers[$category->id] = $pointers[$category->parent_id]->subcategories[] = $category;
                    
                    // Путь к текущей категории
                    $curr = clone($pointers[$category->id]);
                    $pointers[$category->id]->path = array_merge((array)$pointers[$category->parent_id]->path, array($curr));
                    
                    // Убираем использованную категорию из массива категорий
                    unset($categories[$k]);
                    $flag = true;
                }
            }
            if(!$flag) $finish = true;
        }
        
        // Для каждой категории id всех ее деток узнаем
        $ids = array_reverse(array_keys($pointers));
        foreach($ids as $id)
        {
            if($id>0)
            {
                $pointers[$id]->children[] = $id;

                if(isset($pointers[$pointers[$id]->parent_id]->children))
                    $pointers[$pointers[$id]->parent_id]->children = array_merge($pointers[$id]->children, $pointers[$pointers[$id]->parent_id]->children);
                else
                    $pointers[$pointers[$id]->parent_id]->children = $pointers[$id]->children;
            }
        }
        unset($pointers[0]);

        $this->categories_tree = $tree->subcategories;
        $this->all_categories = $pointers;    
    }    
}
