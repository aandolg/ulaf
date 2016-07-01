<?PHP

require_once('api/Simpla.php');

class DmenusGroupsAdmin extends Simpla
{
	function fetch()
	{
        // Меню
        $menus = $this->pages->get_menus();
     	$this->design->assign('menus', $menus);
		
        // Обработка действий 	
		if($this->request->method('post'))
		{

			if($this->request->post('add_group')){
				$this->dmenus->add_menu_group(array('name'=>$this->request->post('add_group')));
			}else{
				// Действия с выбранными
				$ids = $this->request->post('check');
	
				if(is_array($ids))
				switch($this->request->post('action'))
				{
					case 'disable':
					{
						foreach($ids as $id)
							$this->dmenus->update_menu_group($id, array('visible'=>0));    
						break;
					}
					case 'enable':
					{
						foreach($ids as $id)
							$this->dmenus->update_menu_group($id, array('visible'=>1));    
						break;
					}
					case 'delete':
					{
						foreach($ids as $id)
							$this->dmenus->delete_menu_group($id);    
						break;
					}
				}
			}
		}	

		$menu_groups = $this->dmenus->get_menu_groups();
 
		$this->design->assign('menu_groups', $menu_groups);
		return $this->body = $this->design->fetch('menu_groups.tpl');
	}
}

