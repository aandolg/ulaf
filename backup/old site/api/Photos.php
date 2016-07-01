<?php

/**
 * Simpla CMS
 *
 * @copyright	2013 Redline Studio
 * @link		http://simplashop.com
 * @author		Artiom Mitrofanov
 *
 */

require_once('Simpla.php');

class Photos extends Simpla
{
	/* Обработка альбомов */
	
	// Список указателей на категории в дереве категорий (ключ = id категории)
	private $all_categories;
	// Дерево категорий
	private $categories_tree;

	// Функция возвращает массив категорий
	public function get_categories($filter = array())
	{
		if(!isset($this->categories_tree))
			$this->init_categories();
		
		if(!empty($filter['photo_id']))
		{
			$query = $this->db->placehold("SELECT category_id FROM __photos WHERE id in(?@) ORDER BY position", (array)$filter['photo_id']);
			$this->db->query($query);
			$categories_ids = $this->db->results('category_id');
			$result = array();
			foreach($categories_ids as $id)
				if(isset($this->all_categories[$id]))
					$result[$id] = $this->all_categories[$id];
			return $result;
		}
		
		return $this->all_categories;
	}		

	// Функция возвращает дерево категорий
	public function get_categories_tree()
	{
		if(!isset($this->categories_tree))
			$this->init_categories();
			
		return $this->categories_tree;
	}

	// Функция возвращает заданную категорию
	public function get_category($id)
	{
		if(!isset($this->all_categories))
			$this->init_categories();
		if(is_int($id) && array_key_exists(intval($id), $this->all_categories))
			return $category = $this->all_categories[intval($id)];
		elseif(is_string($id))
			foreach ($this->all_categories as $category)
				if ($category->url == $id)
					return $this->get_category((int)$category->id);	
		
		return false;
	}
	
	// Добавление категории
	public function add_category($category)
	{
		$category = (array)$category;
		if(empty($category['url']))
		{
			$category['url'] = preg_replace("/[\s]+/ui", '_', $category['name']);
			$category['url'] = strtolower(preg_replace("/[^0-9a-zа-я_]+/ui", '', $category['url']));
		}	

		// Если есть категория с таким URL, добавляем к нему число
		while($this->get_category((string)$category['url']))
		{
			if(preg_match('/(.+)_([0-9]+)$/', $category['url'], $parts))
				$category['url'] = $parts[1].'_'.($parts[2]+1);
			else
				$category['url'] = $category['url'].'_2';
		}

		$this->db->query("INSERT INTO __photos_categories SET ?%", $category);
		$id = $this->db->insert_id();
		$this->db->query("UPDATE __photos_categories SET position=id WHERE id=?", $id);		
		unset($this->categories_tree);	
		unset($this->all_categories);	
		return $id;
	}
	
	// Изменение категории
	public function update_category($id, $category)
	{
		$query = $this->db->placehold("UPDATE __photos_categories SET ?% WHERE id=? LIMIT 1", $category, intval($id));
		$this->db->query($query);
		unset($this->categories_tree);			
		unset($this->all_categories);	
		return intval($id);
	}
	
	// Удаление категории
	public function delete_category($ids)
	{
		$ids = (array) $ids;
		foreach($ids as $id)
		{
			if($category = $this->get_category(intval($id)))
			$this->delete_category_image($category->children);
			if(!empty($category->children))
			{
				if($photos = $this->get_photos(array('category_id'=>$category->children)))
					foreach($photos as $photo)
						$this->delete_photo(intval($photo->id));
				$query = $this->db->placehold("DELETE FROM __photos_categories WHERE id in(?@)", $category->children);
				$this->db->query($query);
			}
		}
		unset($this->categories_tree);			
		unset($this->all_categories);	
		return $id;
	}
	
	// Удалить изображение категории
	public function delete_category_image($categories_ids)
	{
		$categories_ids = (array) $categories_ids;
		$query = $this->db->placehold("SELECT image FROM __photos_categories WHERE id in(?@)", $categories_ids);
		$this->db->query($query);
		$filenames = $this->db->results('image');
		if(!empty($filenames))
		{
			$query = $this->db->placehold("UPDATE __photos_categories SET image=NULL WHERE id in(?@)", $categories_ids);
			$this->db->query($query);
			foreach($filenames as $filename)
			{
				$query = $this->db->placehold("SELECT count(*) as count FROM __photos_categories WHERE image=?", $filename);
				$this->db->query($query);
				$count = $this->db->result('count');
				if($count == 0)
				{			
					@unlink($this->config->root_dir.$this->config->photos_categories_images_dir.$filename);		
				}
			}
			unset($this->categories_tree);
			unset($this->all_categories);	
		}
	}


	// Инициализация категорий, после которой категории будем выбирать из локальной переменной
	private function init_categories()
	{
		// Дерево категорий
		$tree = new stdClass();
		$tree->subcategories = array();
		
		// Указатели на узлы дерева
		$pointers = array();
		$pointers[0] = &$tree;
		$pointers[0]->path = array();
		$pointers[0]->level = 0;
		
		// Выбираем все категории
		$query = $this->db->placehold("SELECT c.id, c.parent_id, c.name, c.description, c.url, c.meta_title, c.meta_keywords, c.meta_description, c.image, c.visible, c.position
										FROM __photos_categories c ORDER BY c.parent_id, c.position");
											
		// Выбор категорий с подсчетом количества фотографий для каждой. Может тормозить при большом количестве фотографий.
		// $query = $this->db->placehold("SELECT c.id, c.parent_id, c.name, c.description, c.url, c.meta_title, c.meta_keywords, c.meta_description, c.image, c.visible, c.position, COUNT(p.id) as photos_count
		//                               FROM __photos_categories c LEFT JOIN __photos p ON p.category_id=c.id AND p.visible GROUP BY c.id ORDER BY c.parent_id, c.position");
		
		
		$this->db->query($query);
		$categories = $this->db->results();
				
		$finish = false;
		// Не кончаем, пока не кончатся категории, или пока ниодну из оставшихся некуда приткнуть
		while(!empty($categories)  && !$finish)
		{
			$flag = false;
			// Проходим все выбранные категории
			foreach($categories as $k=>$category)
			{
				if(isset($pointers[$category->parent_id]))
				{
					// В дерево категорий (через указатель) добавляем текущую категорию
					$pointers[$category->id] = $pointers[$category->parent_id]->subcategories[] = $category;
					
					// Путь к текущей категории
					$curr = $pointers[$category->id];
					$pointers[$category->id]->path = array_merge((array)$pointers[$category->parent_id]->path, array($curr));
					
					// Уровень вложенности категории
					$pointers[$category->id]->level = 1+$pointers[$category->parent_id]->level;

					// Убираем использованную категорию из массива категорий
					unset($categories[$k]);
					$flag = true;
				}
			}
			if(!$flag) $finish = true;
		}
		
		// Для каждой категории id всех ее деток узнаем
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
					
				// Добавляем количество товаров к родительской категории, если текущая видима
				// if(isset($pointers[$pointers[$id]->parent_id]) && $pointers[$id]->visible)
				//		$pointers[$pointers[$id]->parent_id]->products_count += $pointers[$id]->products_count;
			}
		}
		unset($pointers[0]);
		unset($ids);

		$this->categories_tree = $tree->subcategories;
		$this->all_categories = $pointers;	
	}
	
	/* Обработка альбомов /*/
  
  public function get_photos($filter = array())
  {
    // По умолчанию
    $limit = 100;
    $page = 1;      
    $visible_filter = '';
	$category_id_filter = '';

    if(isset($filter['limit']))
      $limit = max(1, intval($filter['limit']));

    if(isset($filter['page']))
      $page = max(1, intval($filter['page']));

    $sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

    if(isset($filter['visible']))
      $visible_filter = $this->db->placehold('AND visible=?', intval($filter['visible']));
	
	if(!empty($filter['category_id']))
	{
		$category_id_filter = $this->db->placehold(' AND category_id in(?@)', (array)$filter['category_id']);
	}

    // Выбираем все фото
    $query = $this->db->placehold("SELECT * FROM __photos WHERE 1 $visible_filter $category_id_filter ORDER BY position $sql_limit");
    $this->db->query($query);

    return $this->db->results();
  }
  
  public function count_photos($filter = array())
  {
    // По умолчанию
    $visible_filter = '';
	$category_id_filter = '';

    if(isset($filter['visible']))
      $visible_filter = $this->db->placehold('AND visible=?', intval($filter['visible']));

    if(!empty($filter['category_id']))
	{
		$category_id_filter = $this->db->placehold(' AND category_id in(?@)', (array)$filter['category_id']);
	}
	
	// Выбираем все фото
    $query = $this->db->placehold("SELECT COUNT(distinct id) as count FROM __photos WHERE 1 $visible_filter $category_id_filter");
    $this->db->query($query);

    if($this->db->query($query))
			return $this->db->result('count');
		else
			return false;
  }

	/*
	*
	* Функция возвращает бренд по его id или url
	* (в зависимости от типа аргумента, int - id, string - url)
	* @param $id id или url поста
	*
	*/
	public function get_photo($id)
	{	
	  $filter = $this->db->placehold('id = ?', $id);

		$query = "SELECT * FROM __photos WHERE $filter LIMIT 1";
		$this->db->query($query);
		return $this->db->result();
	}

	/*
	*
	* Добавление бренда
	* @param $brand
	*
	*/
	public function add_photo($photo)
	{
		$photo = (array)$photo;

		$this->db->query("INSERT INTO __photos SET ?%", $photo);
		return $this->db->insert_id();
	}

	/*
	*
	* Обновление бренда(ов)
	* @param $brand
	*
	*/		
	public function update_photo($id, $photo)
	{
		$query = $this->db->placehold("UPDATE __photos SET ?% WHERE id=? LIMIT 1", $photo, intval($id));
		$this->db->query($query);
		return $id;
	}
	
	/*
	*
	* Удаление бренда
	* @param $id
	*
	*/	
	public function delete_photo($id)
	{
		if(!empty($id))
		{
			$this->delete_image($id);	
			$query = $this->db->placehold("DELETE FROM __photos WHERE id=? LIMIT 1", $id);
			$this->db->query($query);		
		}
	}
	
	/*
	*
	* Удаление изображения бренда
	* @param $id
	*
	*/
	public function delete_image($photo_id)
	{
		$query = $this->db->placehold("SELECT filename FROM __photos WHERE id=?", intval($photo_id));
		$this->db->query($query);
		$filename = $this->db->result('filename');
		if(!empty($filename))
		{
			$query = $this->db->placehold("UPDATE __photos SET filename=NULL WHERE id=?", $photo_id);
			$this->db->query($query);
			$query = $this->db->placehold("SELECT count(*) as count FROM __photos WHERE filename=? LIMIT 1", $filename);
			$this->db->query($query);
			$count = $this->db->result('count');
			if($count == 0)
			{			
				@unlink($this->config->root_dir.$this->config->photos_images_dir.$filename);		
			}
		}
	}

}