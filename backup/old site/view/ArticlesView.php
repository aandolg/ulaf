<?PHP

/**
 * Simpla CMS
 *
 * @copyright     2011 Denis Pikusov
 * @link         http://simplacms.ru
 * @author         Denis Pikusov
 *
 * Этот класс использует шаблон products.tpl
 *
 */
 
require_once('View.php');

class ArticlesView extends View
{
     /**
     *
     * Отображение списка товаров
     *
     */    
    function fetch()
    {
        $url = $this->request->get('article_url', 'string');

        // Если указан адрес поста,
        if(!empty($url))
        {
            // Выводим статью
            return $this->fetch_article($url);
        }
        else
        {
            // Иначе выводим ленту статей
            return $this->fetch_articles();
        }   
    }
    
    function fetch_article($url) 
    {
        // Выбираем пост из базы
        $article = $this->articles->get_article($url);
 
        // Если не найден - ошибка
        if(!$article || (!$article->visible && empty($_SESSION['admin'])))
            return false;
        
        // Автозаполнение имени для формы комментария
        if(!empty($this->user))
            $this->design->assign('comment_name', $this->user->name);

        // Принимаем комментарий
        if ($this->request->method('post') && $this->request->post('comment'))
        {
            $comment->name = $this->request->post('name');
            $comment->text = $this->request->post('text');
            $captcha_code =  $this->request->post('captcha_code', 'string');
            
            // Передадим комментарий обратно в шаблон - при ошибке нужно будет заполнить форму
            $this->design->assign('comment_text', $comment->text);
            $this->design->assign('comment_name', $comment->name);
            
            // Проверяем капчу и заполнение формы
            if ($_SESSION['captcha_code'] != $captcha_code || empty($captcha_code))
            {
                $this->design->assign('error', 'captcha');
            }
            elseif (empty($comment->name))
            {
                $this->design->assign('error', 'empty_name');
            }
            elseif (empty($comment->text))
            {
                $this->design->assign('error', 'empty_comment');
            }
            else
            {
                // Создаем комментарий
                $comment->object_id = $article->id;
                $comment->type      = 'article';
                $comment->ip        = $_SERVER['REMOTE_ADDR'];
                
                // Если были одобренные комментарии от текущего ip, одобряем сразу
                $this->db->query("SELECT 1 FROM __comments WHERE approved=1 AND ip=? LIMIT 1", $comment->ip);
                if($this->db->num_rows()>0)
                    $comment->approved = 1;
                
                // Добавляем комментарий в базу
                $comment_id = $this->comments->add_comment($comment);
                
                // Отправляем email
                $this->notify->email_comment_admin($comment_id);                
                
                // Приберем сохраненную капчу, иначе можно отключить загрузку рисунков и постить старую
                unset($_SESSION['captcha_code']);
                header('location: '.$_SERVER['REQUEST_URI'].'#comment_'.$comment_id);
            }            
        }
        
        // Комментарии к посту
        $comments = $this->comments->get_comments(array('type'=>'article', 'object_id'=>$article->id, 'approved'=>1, 'ip'=>$_SERVER['REMOTE_ADDR']));
        $this->design->assign('comments', $comments);

        $article->category = $this->articles->get_categories($article->category_id);
        $this->design->assign('article', $article);
        
        // Соседние записи
        $this->design->assign('next_article', $this->articles->get_next_article($article->id, $article->category_id));
        $this->design->assign('prev_article', $this->articles->get_prev_article($article->id, $article->category_id));
        
        // Связанные объекты
        $related_objects = $this->articles->get_related_objects(array('id'=>$article->id));
        if(!empty($related_objects))
        {
            $r_products = array();
            $r_articles = array();
            
            foreach($related_objects as &$r_p)
                if($r_p->type == 'product') $r_products[$r_p->object_id] = &$r_p;
                elseif($r_p->type == 'article') $r_articles[$r_p->object_id] = &$r_p;
             
            if(!empty($r_products)) {

                foreach($this->products->get_products(array('id'=>array_keys($r_products), 'in_stock'=>1, 'visible'=>1)) as $p)
                    $r_products[$p->id] = $p;

                $r_products_images = $this->products->get_images(array('product_id'=>array_keys($r_products)));
                foreach($r_products_images as $related_product_image)
                    if(isset($r_products[$related_product_image->product_id]))
                        $r_products[$related_product_image->product_id]->images[] = $related_product_image;
                        
                $r_products_variants = $this->variants->get_variants(array('product_id'=>array_keys($r_products), 'instock'=>true));
                foreach($r_products_variants as $related_product_variant)
                {
                    if(isset($r_products[$related_product_variant->product_id]))
                    {
                        $r_products[$related_product_variant->product_id]->variants[] = $related_product_variant;
                    }
                }
                
                foreach($r_products as $id=>$r)
                {
                    if(is_object($r))
                    {
                        $r->image = &$r->images[0];
                        $r->variant = &$r->variants[0];
                    }
                    else
                    {
                        unset($r_products[$id]);
                    }
                }
                    
            }
            
            if(!empty($r_articles)) {
                $temp_articles = $this->articles->get_articles(array('id'=>array_keys($r_articles)));
                foreach($temp_articles as $temp_article)
                    $r_articles[$temp_article->id] = $temp_article;
            }

            $this->design->assign('related_products', $r_products);
            $this->design->assign('related_articles', $r_articles);
        }
        
        // Мета-теги
        $this->design->assign('meta_title', $article->meta_title);
        $this->design->assign('meta_keywords', $article->meta_keywords);
        $this->design->assign('meta_description', $article->meta_description);
        
        return $this->design->fetch('article.tpl');
    }    
             
    function fetch_articles()
    {    
        // GET-Параметры
        $category_url = $this->request->get('category', 'string');
        
        $filter = array();
        $filter['visible'] = 1;    
        
        // Выберем текущую категорию
        if (!empty($category_url))
        {
            $category = $this->articles->get_category((string)$category_url);
            if (empty($category) || (!$category->visible && empty($_SESSION['admin'])))
                return false;
            $this->design->assign('article_category', $category);
            $filter['category_id'] = $category->children;
        }       
        
        // Если задано ключевое слово
        $keyword = $this->request->get('keyword', 'string');
        if (!empty($keyword))
        {
            $this->design->assign('keyword', $keyword);
            $filter['keyword'] = $keyword;
        }

        // Постраничная навигация
        $items_per_page = $this->settings->products_num;        
        // Текущая страница в постраничном выводе
        $current_page = $this->request->get('page', 'int');    
        // Если не задана, то равна 1
        $current_page = max(1, $current_page);
        $this->design->assign('current_page_num', $current_page);
        // Вычисляем количество страниц
        $articles_count = $this->articles->count_articles($filter);
        $pages_num = ceil($articles_count/$items_per_page);
        $this->design->assign('total_pages_num', $pages_num);

        $filter['page'] = $current_page;
        $filter['limit'] = $items_per_page;
        ///////////////////////////////////////////////
        // Постраничная навигация END
        ///////////////////////////////////////////////
            
        // Статьи 
        $articles = array();
        foreach($this->articles->get_articles($filter) as $a)
            $articles[$a->id] = $a;
            
        // Если искали товар и найден ровно один - перенаправляем на него
        if(!empty($keyword) && $products_count == 1)
            header('Location: '.$this->config->root_url.'/article/'.$a->url);

        // Устанавливаем мета-теги в зависимости от запроса
        if($this->page)
        {
            $this->design->assign('meta_title', $this->page->meta_title);
            $this->design->assign('meta_keywords', $this->page->meta_keywords);
            $this->design->assign('meta_description', $this->page->meta_description);
        }
        elseif(isset($category))
        {
            $this->design->assign('meta_title', $category->meta_title);
            $this->design->assign('meta_keywords', $category->meta_keywords);
            $this->design->assign('meta_description', $category->meta_description);
        }
        elseif(!empty($keyword))
        {
            $this->design->assign('meta_title', $keyword);
        }
        else
            $this->design->assign('meta_title', 'Полезные статьи');
            
        $this->design->assign('articles', $articles);
        
        $categories = $this->articles->get_categories_tree();    
        $this->design->assign('article_categories', $categories);    
            
        $this->body = $this->design->fetch('articles.tpl');
        return $this->body;
    }
    
    

}
