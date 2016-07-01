<?php

require_once('api/Simpla.php');
ini_set('display_errors',1);

############################################
# Class Category - Edit the good gategory
############################################
class CategoryAdmin extends Simpla
{
  private	$allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');
  
  function fetch()
  {
		$category = new stdClass;
        $images = array();
		if($this->request->method('post'))
		{
			$category->id = $this->request->post('id', 'integer');
			$category->parent_id = $this->request->post('parent_id', 'integer');
			$category->name = $this->request->post('name');
            $category->visible = $this->request->post('visible', 'boolean');
            $category->visible_logo = $this->request->post('visible_logo', 'boolean');

            $category->city = $this->request->post('city');
            $category->head = $this->request->post('head');
            $category->coach = $this->request->post('coach');
            $category->create_club =$this->request->post('create_club');
            $category->site = $this->request->post('site');

			$category->url = trim($this->request->post('url', 'string'));
			$category->meta_title = $this->request->post('meta_title');
			$category->meta_keywords = $this->request->post('meta_keywords');
			$category->meta_description = $this->request->post('meta_description');
			
			$category->description = $this->request->post('description');
	
			// Не допустить одинаковые URL разделов.
			if(($c = $this->categories->get_category($category->url)) && $c->id!=$category->id)
			{			
				$this->design->assign('message_error', 'url_exists');
                if(!empty($category->id))
                    $images = $this->categories->get_images(array('product_id'=>$category->id));
			}
			else
			{
				if(empty($category->id))
				{
	  				$category->id = $this->categories->add_category($category);
					$this->design->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->categories->update_category($category->id, $category);
					$this->design->assign('message_success', 'updated');
  	    		}

  	    		// Удаление изображения
  	    		if($this->request->post('delete_image'))
  	    		{
  	    			$this->categories->delete_image($category->id);
  	    		}

  	    		$image = $this->request->files('image');
  	    		if(!empty($image['name']) && in_array(strtolower(pathinfo($image['name'], PATHINFO_EXTENSION)), $this->allowed_image_extentions))
  	    		{
  	    			$this->categories->delete_image($category->id);
  	    			move_uploaded_file($image['tmp_name'], $this->root_dir.$this->config->categories_images_dir.$image['name']);
  	    			$this->categories->update_category($category->id, array('image'=>$image['name']));
  	    		}
  	    		$category = $this->categories->get_category(intval($category->id));


                // Удаление изображений
                $images = (array)$this->request->post('images');
                $current_images = $this->categories->get_images_c(array('category_id'=>$category->id));
                foreach($current_images as $image)
                {
                    if(!in_array($image->id, $images))
                        $this->categories->delete_image_c($image->id);
                }

                // Порядок изображений
                $count_images = 0;
                $fios = $this->request->post('fios');
                $pos_in_foto = $this->request->post('pos_in_foto');

                if($images = $this->request->post('images'))
                {
                    $i=0;
                    foreach($images as $id)
                    {

                        $this->categories->update_image_c($id, array('position'=>$i,'fio'=>(isset($fios[$count_images]))?$fios[$count_images]:'','pos_in_foto'=>(isset($pos_in_foto[$count_images]))?$pos_in_foto[$count_images]:''));
                        $i++;
                        $count_images++;
                    }

                }

                // Загрузка изображений
                if($images = $this->request->files('images'))
                {
                    for($i=0; $i<count($images['name']); $i++)
                    {
                        if ($image_name = $this->image->upload_image($images['tmp_name'][$i], $images['name'][$i]))
                        {
                            $this->categories->add_image_c($category->id, $image_name,'');
                        }
                        else
                        {
                            $this->design->assign('error', 'error uploading image');
                        }

                        $count_images++;
                    }

                }
                // Загрузка изображений из интернета и drag-n-drop файлов
                if($images = $this->request->post('images_urls'))
                {
                    foreach($images as $url)
                    {
                        // Если не пустой адрес и файл не локальный
                        if(!empty($url) && $url != 'http://' && strstr($url,'/')!==false)
                            $this->categories->add_image_c($category->id, $url,'');
                        elseif($dropped_images = $this->request->files('dropped_images'))
                        {
                            $key = array_search($url, $dropped_images['name']);
                            if ($key!==false && $image_name = $this->image->upload_image($dropped_images['tmp_name'][$key], $dropped_images['name'][$key]))
                                $this->categories->add_image_c($category->id, $image_name,'');
                        }
                        $count_images++;
                    }
                }
                $images = $this->categories->get_images_c(array('category_id'=>$category->id));
            }
		}
		else
		{
			$category->id = $this->request->get('id', 'integer');
			$category = $this->categories->get_category($category->id);
            if(isset($category->id))
                $images = $this->categories->get_images_c(array('category_id'=>$category->id));


		}



		$categories = $this->categories->get_categories_tree();
      $this->design->assign('product_images', $images);
		$this->design->assign('category', $category);
		$this->design->assign('categories', $categories);
		return  $this->design->fetch('category.tpl');
	}
}