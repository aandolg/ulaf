<?PHP

require_once('api/Simpla.php');

class PhotosAdmin extends Simpla
{
    function fetch()
    {
		
		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer'));
			
		$filter['limit'] = $this->settings->photos_num_admin;
	
		// Категории
		$categories = $this->photos->get_categories_tree();
		$this->design->assign('categories', $categories);
		
		// Текущая категория
		$category_id = $this->request->get('category_id', 'integer'); 
		if($category_id && $category = $this->photos->get_category($category_id))
	  		$filter['category_id'] = $category->children;
		
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
                    foreach($ids as $id)
                        $this->photos->update_photo($id, array('visible'=>0));	      
					break;
			    }
			    case 'enable':
			    {
                    foreach($ids as $id)
                        $this->photos->update_photo($id, array('visible'=>1));	      
			        break;
			    }
                case 'delete':
                {
                    foreach($ids as $id)
                        $this->photos->delete_photo($id);    
                break;
                }
            }
            
            // Сортировка
			$positions = $this->request->post('positions');
	 		$ids = array_keys($positions);
			sort($positions);
			foreach($positions as $i=>$position)
				$this->photos->update_photo($ids[$i], array('position'=>$position)); 
            
        }    
		
		if(isset($category))
			$this->design->assign('category', $category);
		
	  	$photos_count = $this->photos->count_photos($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$filter['limit'] = $photos_count;
		
		if($filter['limit']>0)	  	
		  	$pages_count = ceil($photos_count/$filter['limit']);
		else
		  	$pages_count = 0;
	  	$filter['page'] = min($filter['page'], $pages_count);
		
        $photos = $this->photos->get_photos($filter);
		
        $this->design->assign('photos', $photos);
        $this->design->assign('photos_count', $photos_count);
		$this->design->assign('pages_count', $pages_count);
	 	$this->design->assign('current_page', $filter['page']);
		$this->design->assign('categories', $this->photos->get_categories_tree());
        return $this->body = $this->design->fetch('photos.tpl');
    }
}

