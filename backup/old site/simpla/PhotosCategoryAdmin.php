<?php

require_once('api/Simpla.php');


############################################
# Class Category - Edit the good gategory
############################################
class PhotosCategoryAdmin extends Simpla
{
  private	$allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');
  
  function fetch()
  {
		$category = new stdClass;
		if($this->request->method('post'))
		{
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
			if(($c = $this->photos->get_category($category->url)) && $c->id!=$category->id)
			{			
				$this->design->assign('message_error', 'url_exists');
			}
			else
			{
				if(empty($category->id))
				{
	  				$category->id = $this->photos->add_category($category);
					$this->design->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->photos->update_category($category->id, $category);
					$this->design->assign('message_success', 'updated');
  	    		}
  	    		// Удаление изображения
  	    		if($this->request->post('delete_image'))
  	    		{
  	    			$this->photos->delete_category_image($category->id);
  	    		}
  	    		// Загрузка изображения
  	    		$image = $this->request->files('image');
  	    		if(!empty($image['name']) && in_array(strtolower(pathinfo($image['name'], PATHINFO_EXTENSION)), $this->allowed_image_extentions))
  	    		{
  	    			$this->photos->delete_category_image($category->id);
  	    			move_uploaded_file($image['tmp_name'], $this->root_dir.$this->config->photos_categories_images_dir.$image['name']);
  	    			$this->photos->update_category($category->id, array('image'=>$image['name']));
  	    		}
  	    		$category = $this->photos->get_category(intval($category->id));
                
                /* download_images */
                //Удаление изображений
                $gallery_images = $this->request->post('gallery_images');
                $current_gallery_images = array();
                foreach($this->photos->get_photos(array('category_id'=>$category->id)) as $p)
                    $current_gallery_images[] = $p->id;
                $delete_images = array_diff($current_gallery_images,$gallery_images);
                foreach($delete_images as $id){
                    $this->photos->delete_photo($id);
                }
                
                // Загрузка изображений
	  		    if($images = $this->request->files('images'))
	  		    {
                    for($i=0; $i<count($images['name']); $i++)
					{
			 			if(in_array(strtolower(pathinfo($images['name'][$i], PATHINFO_EXTENSION)), $this->allowed_image_extentions)){
                            $image_name = uniqid().'.'.pathinfo($images['name'][$i], PATHINFO_EXTENSION);
                            if(move_uploaded_file($images['tmp_name'][$i], $this->root_dir.$this->config->photos_images_dir.$image_name))
                                $pid[] = $this->photos->add_photo(array('filename'=>$image_name,'category_id'=>$category->id));
			 			}
					}
				}
                
   	    		// Загрузка изображений drag-n-drop
	  		    if($images = $this->request->post('images_urls'))
	  		    {
					foreach($images as $url)
					{
						if($dropped_images = $this->request->files('dropped_images'))
				  		{
				 			$key = array_search($url, $dropped_images['name']);
                            if($key!==false && in_array(strtolower(pathinfo($dropped_images['name'][$key], PATHINFO_EXTENSION)), $this->allowed_image_extentions)){
                                $image_name = uniqid().'.'.pathinfo($dropped_images['name'][$key], PATHINFO_EXTENSION);
                                if(move_uploaded_file($dropped_images['tmp_name'][$key], $this->root_dir.$this->config->photos_images_dir.$image_name))
                                    $pid[] = $this->photos->add_photo(array('filename'=>$image_name,'category_id'=>$category->id));
    			 			}
						 	//if ($key!==false && $image_name = $this->image->upload_image($dropped_images['tmp_name'][$key], $dropped_images['name'][$key]))
					  	   				//$this->products->add_image($product->id, $image_name);
						}
					}
				}
				/*$images = $this->products->get_images(array('product_id'=>$product->id));*/
                /* download_images */
			}
		}
		else
		{
			$category->id = $this->request->get('id', 'integer');
			$category = $this->photos->get_category($category->id);
		}
		
        
		$categories = $this->photos->get_categories_tree();
        if($category->id){
            $photos = $this->photos->get_photos(array('category_id'=>$category->id));
            $this->design->assign('photos', $photos);
        }

		$this->design->assign('category', $category);
		$this->design->assign('categories', $categories);
		return  $this->design->fetch('photos_category.tpl');
	}
}