<?PHP

/**
 * Simpla CMS
 *
 * @copyright     2012-2014 Redline Studio
 * @link         http://simplashop.com
 * @author         Artiom Mitrofanov
 *
 */

require_once('api/Simpla.php');


class ArticleCategoriesAdmin extends Simpla
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
                        $this->articles->update_category($id, array('visible'=>0));    
                    break;
                }
                case 'enable':
                {
                    foreach($ids as $id)
                        $this->articles->update_category($id, array('visible'=>1));    
                    break;
                }
                case 'delete':
                {
                    foreach($ids as $id)
                        $this->articles->delete_category($id);    
                    break;
                }
            }        
          
            // Сортировка
            $positions = $this->request->post('positions');
             $ids = array_keys($positions);
            sort($positions);
            foreach($positions as $i=>$position)
                $this->articles->update_category($ids[$i], array('position'=>$position)); 

        }  
  
        $categories = $this->articles->get_categories_tree();

        $this->design->assign('categories', $categories);
        return $this->design->fetch('article_categories.tpl');
    }
}
