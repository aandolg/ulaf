<?PHP

/**
 * Simpla CMS
 *
 * @copyright 	2011 Denis Pikusov
 * @link 		http://simplacms.ru
 * @author 		Denis Pikusov
 *
 * Этот класс использует шаблоны blog.tpl и post.tpl
 *
 */

require_once('View.php');

class PhotosView extends View
{
   private $thumb = array(
    'width' => 200,
    'height' => 200
   );
    
	function fetch()
	{
		// GET-Параметры
		$category_url = $this->request->get('category', 'string');
		
		$filter = array();
		$filter['visible'] = 1;	

		// Выберем текущую категорию
		if (!empty($category_url))
		{
			$category = $this->photos->get_category((string)$category_url);
			if (empty($category) || (!$category->visible && empty($_SESSION['admin'])))
				return false;
			$this->design->assign('album', $category);
			$filter['category_id'] = $category->children;
		}

		// Постраничная навигация
		$items_per_page = $this->settings->photos_num;		
		// Текущая страница в постраничном выводе
		$current_page = $this->request->get('page', 'int');	
		// Если не задана, то равна 1
		$current_page = max(1, $current_page);
		$this->design->assign('current_page_num', $current_page);
		// Вычисляем количество страниц
		$photos_count = $this->photos->count_photos($filter);
		
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$items_per_page = $photos_count;	
		
		$pages_num = ceil($photos_count/$items_per_page);
		$this->design->assign('total_pages_num', $pages_num);
		$this->design->assign('total_photos_num', $photos_count);

		$filter['page'] = $current_page;
		$filter['limit'] = $items_per_page;
		
		///////////////////////////////////////////////
		// Постраничная навигация END
		///////////////////////////////////////////////
		
			
		// Фотографии 
		$photos = $this->photos->get_photos($filter);
		$this->design->assign('photos', $photos);
		// Устанавливаем мета-теги в зависимости от запроса
		if($this->page)
		{
			$this->design->assign('meta_title', $this->page->meta_title);
			$this->design->assign('meta_keywords', $this->page->meta_keywords);
			$this->design->assign('meta_description', $this->page->meta_description);
		}
		elseif(isset($category))
		{
			$this->design->assign('meta_title', $category->meta_title);
			$this->design->assign('meta_keywords', $category->meta_keywords);
			$this->design->assign('meta_description', $category->meta_description);
		}
		
			
		$this->body = $this->design->fetch('photos.tpl');
		return $this->body;
	}	
}