<?PHP

/**
 * Simpla CMS
 *
 * @copyright     2012-2014 Redline Studio
 * @link         http://simplashop.com
 * @author         Artiom Mitrofanov
 *
 */

require_once('api/Simpla.php');

class ArticleAdmin extends Simpla
{
    public function fetch()
    {
        if($this->request->method('post'))
        {
            $article = new stdClass;
            $article->id = $this->request->post('id', 'integer');
            $article->name = $this->request->post('name');
            $article->date = date('Y-m-d', strtotime($this->request->post('date')));
            
            $article->visible = $this->request->post('visible', 'boolean');
            
            $article->category_id = $this->request->post('category_id', 'integer');

            $article->url = $this->request->post('url', 'string');
            $article->meta_title = $this->request->post('meta_title');
            $article->meta_keywords = $this->request->post('meta_keywords');
            $article->meta_description = $this->request->post('meta_description');
            
            $article->annotation = $this->request->post('annotation');
            $article->text = $this->request->post('body');  
            
                     
            // Связанные товары
            if(is_array($this->request->post('related_products')))
            {
                foreach($this->request->post('related_products') as $p)
                {
                    $rp[$p] = new stdClass;
                    $rp[$p]->related_id = $p;
                    $rp[$p]->type = 'product';
                }
                $related_objects = $rp;
            }   

            // Связанные статьи
            if(is_array($this->request->post('related_articles')))
            {
                foreach($this->request->post('related_articles') as $p)
                {
                    $rp[$p] = new stdClass;
                    $rp[$p]->related_id = $p;
                    $rp[$p]->type = 'article';
                }
                $related_objects = $rp;
            } 

             // Не допустить одинаковые URL разделов.
            if(($a = $this->articles->get_article($article->url)) && $a->id!=$article->id)
            {            
                $this->design->assign('message_error', 'url_exists');
            }
            else
            {
                if(empty($article->id))
                {
                      $article->id = $this->articles->add_article($article);
                      $article = $this->articles->get_article($article->id);
                    $this->design->assign('message_success', 'added');
                  }
                  else
                  {
                      $this->articles->update_article($article->id, $article);
                      $article = $this->articles->get_article($article->id);
                    $this->design->assign('message_success', 'updated');
                  }    

                   
            }

            // Связанные объекты
            $query = $this->db->placehold('DELETE FROM __article_objects WHERE article_id=?', $article->id);
            $this->db->query($query);
            if(is_array($related_objects))
            {
              $pos = 0;
              foreach($related_objects  as $i=>$related_object)
                   $this->articles->add_related_object($article->id, $related_object->related_id, $related_object->type);
            }   
                     
        }
        else
        {
            $article = new stdClass;
            $article->id = $this->request->get('id', 'integer');
            $article = $this->articles->get_article(intval($article->id));
        }

        if(empty($article->date))
            $article->date = date($this->settings->date_format, time());

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
                $temp_products = $this->products->get_products(array('id'=>array_keys($r_products)));
                foreach($temp_products as $temp_product)
                    $r_products[$temp_product->id] = $temp_product;
                    
                $related_products_images = $this->products->get_images(array('product_id'=>array_keys($r_products)));
                foreach($related_products_images as $image)
                {
                    $r_products[$image->product_id]->images[] = $image;
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
         
        $categories = $this->articles->get_categories_tree();
        $this->design->assign('categories', $categories);
        $this->design->assign('article', $article);
        
           return $this->design->fetch('article.tpl');
    }
}