<?php

require_once('api/Simpla.php');


############################################
# Class Category - Edit the good gategory
############################################
class DmenusAdmin extends Simpla
{
  
  function fetch()
  {
		// Меню
        $menus = $this->pages->get_menus();
     	$this->design->assign('menus', $menus);
		
		$menu = new stdClass;
		if($this->request->method('post'))
		{
			$menu->id = $this->request->post('id', 'integer');
			$menu->parent_id = $this->request->post('parent_id', 'integer');
			$menu->group_id = $this->request->post('group_id', 'integer');
			$menu->name = $this->request->post('name');
			$menu->visible = $this->request->post('visible', 'boolean');
			$menu->url = $this->request->post('url');	
			
			if(empty($menu->id)){
				$menu->id = $this->dmenus->add_menu($menu);
				$this->design->assign('message_success', 'added');
			}else{
				$this->dmenus->update_menu($menu->id, $menu);
				$this->design->assign('message_success', 'updated');
			}
			$menu = $this->dmenus->get_menu(intval($menu->id));
		}
		else
		{
			$menu->id = $this->request->get('id', 'integer');
			$menu = $this->dmenus->get_menu($menu->id);
		}
		
		$menu_group = $this->dmenus->get_menu_group($this->request->get('menu_group_id', 'integer'));
		$this->design->assign('menu_group', $menu_group);
		
		$dmenus = $this->dmenus->get_menus_tree();
		$this->design->assign('dmenu', $menu);
		$this->design->assign('dmenus', $dmenus);
		
		return  $this->design->fetch('dmenu.tpl');
	}
}