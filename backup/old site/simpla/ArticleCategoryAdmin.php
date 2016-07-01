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


############################################
# Class Category - Edit the good gategory
############################################
class ArticleCategoryAdmin extends Simpla
{
  function fetch()
  {
        if($this->request->method('post'))
        {
            $category = new stdClass;
            $category->id = $this->request->post('id', 'integer');
            $category->parent_id = $this->request->post('parent_id', 'integer');
            $category->name = $this->request->post('name');
            $category->visible = $this->request->post('visible', 'boolean');

            $category->url = $this->request->post('url', 'string');
            $category->meta_title = $this->request->post('meta_title');
            $category->meta_keywords = $this->request->post('meta_keywords');
            $category->meta_description = $this->request->post('meta_description');
            
            $category->description = $this->request->post('description');
    
            // Не допустить одинаковые URL разделов.
            if(($c = $this->articles->get_category($category->url)) && $c->id!=$category->id)
            {            
                $this->design->assign('message_error', 'url_exists');
            }
            else
            {
                if(empty($category->id))
                {
                      $category->id = $this->articles->add_category($category);
                    $this->design->assign('message_success', 'added');
                  }
                  else
                  {
                      $this->articles->update_category($category->id, $category);
                    $this->design->assign('message_success', 'updated');
                  }
                  // Удаление изображения
                  if($this->request->post('delete_image'))
                  {
                      $this->articles->delete_image($category->id);
                  }
                  $category = $this->articles->get_category(intval($category->id));
            }
        }
        else
        {
            $category = new stdClass;
            $category->id = $this->request->get('id', 'integer');
            $category = $this->articles->get_category($category->id);
        }
        
        $categories = $this->articles->get_categories_tree();

        $this->design->assign('category', $category);
        $this->design->assign('categories', $categories);
        return  $this->design->fetch('article_category.tpl');
    }
}