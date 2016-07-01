<?PHP

require_once('api/Simpla.php');

class DmenusGroupAdmin extends Simpla
{
	function fetch()
	{
        // Меню
        $menus = $this->pages->get_menus();
     	$this->design->assign('menus', $menus);
		
        // Обработка действий 	
		if($this->request->method('post')){
			
			if($this->request->post('group_name'))
				$this->dmenus->update_menu_group($this->request->get('menu_group_id', 'integer'), array('name'=>$this->request->post('group_name')));
			// Действия с выбранными
			$ids = $this->request->post('check');
			
			//print_r($ids);
			if(is_array($ids))
			switch($this->request->post('action')){
				case 'disable':
				{
					foreach($ids as $id)
						$this->dmenus->update_menu($id, array('visible'=>0));    
					break;
				}
				case 'enable':
				{
					foreach($ids as $id)
						$this->dmenus->update_menu($id, array('visible'=>1));    
					break;
				}
				case 'delete':
				{
					foreach($ids as $id)
						$this->dmenus->delete_menu($id);    
					break;
				}
			}
			// Сортировка
			$positions = $this->request->post('positions');
			$ids = array_keys($positions);
			sort($positions);
			foreach($positions as $i=>$position)
				$this->dmenus->update_menu($ids[$i], array('position'=>$position));
		}

		$menu_group = $this->dmenus->get_menu_group($this->request->get('menu_group_id', 'integer'));
		$this->design->assign('menu_group', $menu_group);
		
		$dmenus = $this->dmenus->get_menus_tree(array('group_id'=>$this->request->get('menu_group_id', 'integer')));
		$this->design->assign('categories', $dmenus);
		
		return $this->body = $this->design->fetch('menu_group.tpl');
	}
}