<?PHP

require_once('api/Simpla.php');


class PhotosCategoriesAdmin extends Simpla
{
	function fetch()
	{
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
						$this->photos->update_category($id, array('visible'=>0));    
					break;
			    }
			    case 'enable':
			    {
			    	foreach($ids as $id)
						$this->photos->update_category($id, array('visible'=>1));    
			        break;
			    }
			    case 'delete':
			    {
					$this->photos->delete_category($ids);    
			        break;
			    }
			}		
	  	
			// Сортировка
			$positions = $this->request->post('positions');
	 		$ids = array_keys($positions);
			sort($positions);
			foreach($positions as $i=>$position)
				$this->photos->update_category($ids[$i], array('position'=>$position)); 

		}  
  
		$categories = $this->photos->get_categories_tree();

		$this->design->assign('categories', $categories);
		return $this->design->fetch('photos_categories.tpl');
	}
}
