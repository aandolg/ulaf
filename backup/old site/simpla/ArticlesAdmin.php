<?php

/**
 * Simpla CMS
 *
 * @copyright     2012-2014 Redline Studio
 * @link         http://simplashop.com
 * @author         Artiom Mitrofanov
 *
 */
 
require_once('api/Simpla.php');

class ArticlesAdmin extends Simpla
{
    public function fetch()
    {
        $filter = array();
        
        // Категории
        $categories = $this->articles->get_categories_tree();
        $this->design->assign('categories', $categories);
        
        // Текущая категория
        $category_id = $this->request->get('category_id', 'integer'); 
        if($category_id && $category = $this->articles->get_category($category_id)) {
            $filter['category_id'] = $category->children;
            $this->design->assign('category', $category);
        }
        
        // Обработка действий
        if($this->request->method('post'))
        {
            // Действия с выбранными
            $ids = $this->request->post('check');
            if(is_array($ids))
                switch($this->request->post('action'))
                {
                    case 'disable':
                    {
                        $this->articles->update_article($ids, array('visible'=>0));          
                        break;
                    }
                    case 'enable':
                    {
                        $this->articles->update_article($ids, array('visible'=>1));          
                        break;
                    }
                    case 'delete':
                    {
                        foreach($ids as $id)
                            $this->articles->delete_article($id);    
                        break;
                    }
                }                
        }
        $filter['page'] = max(1, $this->request->get('page', 'integer'));         
        $filter['limit'] = 20;
      
        // Поиск
        $keyword = $this->request->get('keyword', 'string');
        if(!empty($keyword))
        {
            $filter['keyword'] = $keyword;
            $this->design->assign('keyword', $keyword);
        }        
        
        $articles = $this->articles->get_articles($filter);
        $articles_count = $this->articles->count_articles($filter);
        
        $this->design->assign('articles_count', $articles_count);
        
        $this->design->assign('pages_count', ceil($articles_count/$filter['limit']));
        $this->design->assign('current_page', $filter['page']);

        $this->design->assign('articles', $articles);
        return $this->design->fetch('articles.tpl');
    }
}
