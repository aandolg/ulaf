<?PHP

/**
 * Simpla CMS
 * Storefront class: Каталог товаров
 *
 * Этот класс использует шаблоны hits.tpl
 *
 * @copyright 	2010 Denis Pikusov
 * @link 		http://simplacms.ru
 * @author 		Denis Pikusov
 *
 * 
 *
 */
 
require_once('View.php');


class MainView extends View
{

	function fetch()
    {
        $filter['limit'] = 10;

		// Выбираем статьи из базы
		$posts = $this->blog->get_posts($filter);
        if(!empty($posts))
        {
            $this->design->assign('posts', $posts);
        }

		if($this->page)
		{
			$this->design->assign('meta_title', $this->page->meta_title);
			$this->design->assign('meta_keywords', $this->page->meta_keywords);
			$this->design->assign('meta_description', $this->page->meta_description);
		}

		return $this->design->fetch('main.tpl');
	}
}
