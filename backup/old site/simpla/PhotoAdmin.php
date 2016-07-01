<?php

require_once('api/Simpla.php');

class PhotoAdmin extends Simpla
{
  private $allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');

  function fetch()
  {
        $photo = new stdClass;
		if($this->request->method('post'))
        {
            $photo->id = $this->request->post('id', 'integer');
            $photo->name = $this->request->post('name');
            $photo->description = $this->request->post('description');
			$photo->visible = $this->request->post('visible','integer');
			$photo->category_id = $this->request->post('category_id');

            if(empty($photo->id))
            {
                  $photo->id = $this->photos->add_photo($photo);
                $this->design->assign('message_success', 'added');
              }
              else
              {
                  $this->photos->update_photo($photo->id, $photo);
                $this->design->assign('message_success', 'updated');
              }    
              // Удаление изображения
              if($this->request->post('delete_image'))
              {
                  $this->photos->delete_image($photo->id);
              }
              // Загрузка изображения
                $image = preg_replace("/\s+/", '_', $this->request->files('image'));

              if(!empty($image['name']) && in_array(strtolower(pathinfo($image['name'], PATHINFO_EXTENSION)), $this->allowed_image_extentions))
              {
                  $this->photos->delete_image($photo->id);
                  $image_name = uniqid().'.'.pathinfo($image['name'], PATHINFO_EXTENSION);
                  //move_uploaded_file($image['tmp_name'], $this->root_dir.$this->config->photos_images_dir.$image['name']);
                  //$this->photos->update_photo($photo->id, array('filename'=>$image['name']));
                  move_uploaded_file($image['tmp_name'], $this->root_dir.$this->config->photos_images_dir.$image_name);
                  $this->photos->update_photo($photo->id, array('filename'=>$image_name,'visible'=>1));
              }
              $photo = $this->photos->get_photo($photo->id);
            
        }
        else
        {
            $photo->id = $this->request->get('id', 'integer');
            $photo = $this->photos->get_photo($photo->id);
            if(empty($photo))
                $photo->visible = 1; 
        }
        
         $this->design->assign('photo', $photo);
		 $this->design->assign('categories', $this->photos->get_categories_tree());
        return  $this->design->fetch('photo.tpl');
    }
}