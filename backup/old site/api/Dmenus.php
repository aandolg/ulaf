<?php

/**
 * Simpla CMS
 *
 * @copyright	2014 Vadym Bakchinov
 *
 *
 */

require_once('Simpla.php');

class Dmenus extends Simpla
{
	//функйия возвращает массив групп меню
	public function get_menu_groups($filter = array())
	{
        $is_visible = '';
        if(isset($filter['visible']))
            $is_visible = 'WHERE visible =1 ';
		// Выбираем все бренды
		$query = $this->db->placehold("SELECT DISTINCT * FROM __dmenu_groups $is_visible ORDER BY name");
		$this->db->query($query);
		return $this->db->results();
	}

	//функйия возвращает массив группу меню по ее id
	public function get_menu_group($id)
	{
		if(!is_int($id))			
			return false;
		$query = "SELECT * FROM __dmenu_groups WHERE id=$id ORDER BY name LIMIT 1";
		$this->db->query($query);
		return $this->db->result();
	}

	//Добавление группы меню
	public function add_menu_group($menu_group)
	{
		$menu_group = (array)$menu_group;
		$this->db->query("INSERT INTO __dmenu_groups SET ?%", $menu_group);
		return $this->db->insert_id();
	}

	//Обновление группы меню		
	public function update_menu_group($id, $menu_group)
	{
		$query = $this->db->placehold("UPDATE __dmenu_groups SET ?% WHERE id=? LIMIT 1", $menu_group, intval($id));
		$this->db->query($query);
		return $id;
	}
	
	//Удаление группы меню
	public function delete_menu_group($id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __dmenu_groups WHERE id=? LIMIT 1", intval($id));
			$this->db->query($query);
		}
	}
	//@end menu groups
	
	
	// Список указателей на меню в дереве меню (ключ = id меню)
	private $all_menus;
	// Дерево меню
	private $menus_tree;

	// Функция возвращает дерево меню
	public function get_menus_tree($filter=array())
	{
		//if(!isset($this->menus_tree))
        unset($this->init_menus,$this->all_menus);
			$this->init_menus($filter);
			
		return $this->menus_tree;
	}

	// Функция возвращает заданную меню
	public function get_menu($id)
	{
		if(!isset($this->all_menus))
			$this->init_menus();
		if(is_int($id) && array_key_exists(intval($id), $this->all_menus))
			return $menu = $this->all_menus[intval($id)];
		elseif(is_string($id))
			foreach ($this->all_menus as $menu)
				if ($menu->url == $id)
					return $this->get_menu((int)$menu->id);	
		
		return false;
	}
	
	// Добавление меню
	public function add_menu($menu)
	{
		$menu = (array)$menu;	

		$this->db->query("INSERT INTO __dmenu SET ?%", $menu);
		$id = $this->db->insert_id();
		$this->db->query("UPDATE __dmenu SET position=id WHERE id=?", $id);		
		unset($this->menus_tree);	
		unset($this->all_menus);	
		return $id;
	}
	
	// Изменение меню
	public function update_menu($id, $menu)
	{
		$query = $this->db->placehold("UPDATE __dmenu SET ?% WHERE id=? LIMIT 1", $menu, intval($id));
		$this->db->query($query);
		unset($this->menus_tree);			
		unset($this->all_menus);	
		return $id;
	}
	
	// Удаление меню
	public function delete_menu($ids)
	{
		$ids = (array) $ids;
		foreach($ids as $id)
		{
			$menu = $this->get_menu(intval($id));
			if(!empty($menu->children))
			{
				$query = $this->db->placehold("DELETE FROM __dmenu WHERE id in(?@)", $menu->children);
				$this->db->query($query);
			}
		}
		unset($this->menus_tree);			
		unset($this->all_menus);	
		return true;
	}


	// Инициализация меню, после которой меню будем выбирать из локальной переменной
	private function init_menus($filter=array())
	{
		$group_id = '';
		$is_visible = '';
        //print_r($filter);
        if(isset($filter['menu_visible']) && isset($filter['group_id'])){
            $query = $this->db->placehold('SELECT COUNT(*) FROM __dmenu_groups WHERE id=? AND visible=1', intval($filter['group_id']));
            $this->db->query($query);
            if(!$this->db->result('COUNT(*)'))
                return false;
        }
            
		if(isset($filter['group_id']))
			$group_id = $this->db->placehold(" AND group_id=? ", intval($filter['group_id']));
		
		if(isset($filter['visible']))
            $is_visible = ' AND visible =1 ';
			
		// Дерево меню
		$tree = new stdClass();
		$tree->submenus = array();
		
		// Указатели на узлы дерева
		$pointers = array();
		$pointers[0] = &$tree;
		$pointers[0]->path = array();
		$pointers[0]->level = 0;
		
		// Выбираем все меню
		$query = $this->db->placehold("SELECT * FROM __dmenu WHERE 1 $group_id $is_visible ORDER BY parent_id, position");
		$this->db->query($query);
		$menus = $this->db->results();
				
		$finish = false;
		// Не кончаем, пока не кончатся меню, или пока ниодну из оставшихся некуда приткнуть
		while(!empty($menus)  && !$finish)
		{
			$flag = false;
			// Проходим все выбранные меню
			foreach($menus as $k=>$menu)
			{
				if(isset($pointers[$menu->parent_id]))
				{
					// В дерево меню (через указатель) добавляем текущую меню
					$pointers[$menu->id] = $pointers[$menu->parent_id]->submenus[] = $menu;
					
					// Путь к текущей меню
					$curr = $pointers[$menu->id];
					$pointers[$menu->id]->path = array_merge((array)$pointers[$menu->parent_id]->path, array($curr));
					
					// Уровень вложенности меню
					$pointers[$menu->id]->level = 1+$pointers[$menu->parent_id]->level;

					// Убираем использованную меню из массива меню
					unset($menus[$k]);
					$flag = true;
				}
			}
			if(!$flag) $finish = true;
		}
		
		// Для каждой меню id всех ее деток узнаем
		$ids = array_reverse(array_keys($pointers));
		foreach($ids as $id)
		{
			if($id>0)
			{
				$pointers[$id]->children[] = $id;

				if(isset($pointers[$pointers[$id]->parent_id]->children))
					$pointers[$pointers[$id]->parent_id]->children = array_merge($pointers[$id]->children, $pointers[$pointers[$id]->parent_id]->children);
				else
					$pointers[$pointers[$id]->parent_id]->children = $pointers[$id]->children;
			}
		}
		unset($pointers[0]);
		unset($ids);

		$this->menus_tree = $tree->submenus;
		$this->all_menus = $pointers;	
	}

}