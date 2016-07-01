<?php

/**
 * Simpla CMS
 *
 * @copyright	2011 Denis Pikusov
 * @link		http://simplacms.ru
 * @author		Denis Pikusov
 *
 */

require_once('Simpla.php');

class Blog extends Simpla
{

	/*
	*
	* Функция возвращает пост по его id или url
	* (в зависимости от типа аргумента, int - id, string - url)
	* @param $id id или url поста
	*
	*/
	public function get_post($id)
	{
		if(is_int($id))
			$where = $this->db->placehold(' WHERE b.id=? ', intval($id));
		else
			$where = $this->db->placehold(' WHERE b.url=? ', $id);
		
		$query = $this->db->placehold("SELECT b.id, b.url, b.name, b.annotation, b.text, b.meta_title,
		                               b.meta_keywords, b.meta_description, b.visible, b.date, b.image
		                               FROM __blog b $where LIMIT 1");
		if($this->db->query($query))
			return $this->db->result();
		else
			return false; 
	}
	
	/*
	*
	* Функция возвращает массив постов, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function get_posts($filter = array())
	{	
		// По умолчанию
		$limit = 1000;
		$page = 1;
		$post_id_filter = '';
		$visible_filter = '';
		$keyword_filter = '';
		$posts = array();
		
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		if(!empty($filter['id']))
			$post_id_filter = $this->db->placehold('AND b.id in(?@)', (array)$filter['id']);
			
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND b.visible = ?', intval($filter['visible']));		
		
		if(isset($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
				$keyword_filter .= $this->db->placehold('AND (b.name LIKE "%'.$this->db->escape(trim($keyword)).'%" OR b.meta_keywords LIKE "%'.$this->db->escape(trim($keyword)).'%") ');
		}

		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

		$query = $this->db->placehold("SELECT b.id, b.url, b.name, b.annotation, b.text,
		                                      b.meta_title, b.meta_keywords, b.meta_description, b.visible,
		                                      b.date, b.image
		                                      FROM __blog b WHERE 1 $post_id_filter $visible_filter $keyword_filter
		                                      ORDER BY date DESC, id DESC $sql_limit");
		
		$this->db->query($query);
		return $this->db->results();
	}
	
	
	/*
	*
	* Функция вычисляет количество постов, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function count_posts($filter = array())
	{	
		$post_id_filter = '';
		$visible_filter = '';
		$keyword_filter = '';
		
		if(!empty($filter['id']))
			$post_id_filter = $this->db->placehold('AND b.id in(?@)', (array)$filter['id']);
			
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND b.visible = ?', intval($filter['visible']));		

		if(isset($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
				$keyword_filter .= $this->db->placehold('AND (b.name LIKE "%'.$this->db->escape(trim($keyword)).'%" OR b.meta_keywords LIKE "%'.$this->db->escape(trim($keyword)).'%") ');
		}
		
		$query = "SELECT COUNT(distinct b.id) as count
		          FROM __blog b WHERE 1 $post_id_filter $visible_filter $keyword_filter";

		if($this->db->query($query))
			return $this->db->result('count');
		else
			return false;
	}
	
	/*
	*
	* Создание поста
	* @param $post
	*
	*/	
	public function add_post($post)
	{	
		if(!isset($post->date))
			$date_query = ', date=NOW()';
		else
			$date_query = '';
		$query = $this->db->placehold("INSERT INTO __blog SET ?% $date_query", $post);
		
		if(!$this->db->query($query))
			return false;
		else
			return $this->db->insert_id();
	}
	
	
	/*
	*
	* Обновить пост(ы)
	* @param $post
	*
	*/	
	public function update_post($id, $post)
	{
		$query = $this->db->placehold("UPDATE __blog SET ?% WHERE id in(?@) LIMIT ?", $post, (array)$id, count((array)$id));
		$this->db->query($query);
		return $id;
	}


	/*
	*
	* Удалить пост
	* @param $id
	*
	*/	
	public function delete_post($id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __blog WHERE id=? LIMIT 1", intval($id));
			if($this->db->query($query))
			{
				$query = $this->db->placehold("DELETE FROM __comments WHERE type='blog' AND object_id=?", intval($id));
				if($this->db->query($query))
					return true;
			}							
		}
		return false;
	}	
	

	/*
	*
	* Следующий пост
	* @param $post
	*
	*/	
	public function get_next_post($id)
	{
		$this->db->query("SELECT date FROM __blog WHERE id=? LIMIT 1", $id);
		$date = $this->db->result('date');

		$this->db->query("(SELECT id FROM __blog WHERE date=? AND id>? AND visible  ORDER BY id limit 1)
		                   UNION
		                  (SELECT id FROM __blog WHERE date>? AND visible ORDER BY date, id limit 1)",
		                  $date, $id, $date);
		$next_id = $this->db->result('id');
		if($next_id)
			return $this->get_post(intval($next_id));
		else
			return false; 
	}
	
	/*
	*
	* Предыдущий пост
	* @param $post
	*
	*/	
	public function get_prev_post($id)
	{
		$this->db->query("SELECT date FROM __blog WHERE id=? LIMIT 1", $id);
		$date = $this->db->result('date');

		$this->db->query("(SELECT id FROM __blog WHERE date=? AND id<? AND visible ORDER BY id DESC limit 1)
		                   UNION
		                  (SELECT id FROM __blog WHERE date<? AND visible ORDER BY date DESC, id DESC limit 1)",
		                  $date, $id, $date);
		$prev_id = $this->db->result('id');
		if($prev_id)
			return $this->get_post(intval($prev_id));
		else
			return false; 
	}

    public function upload_image($image, $name)
    {

        // Имя оригинального файла

        $name = $this->correct_image($name);

        $uploaded_file = $new_name = pathinfo($name, PATHINFO_BASENAME);
        $base = pathinfo($uploaded_file, PATHINFO_image);
        $ext = pathinfo($uploaded_file, PATHINFO_EXTENSION);

        if(in_array(strtolower($ext), $this->allowed_extentions))
        {
            while(file_exists($this->config->root_dir.$this->config->posts_images_dir.$new_name))
            {
                $new_base = pathinfo($new_name, PATHINFO_image);
                if(preg_match('/_([0-9]+)$/', $new_base, $parts))
                    $new_name = $base.'_'.($parts[1]+1).'.'.$ext;
                else
                    $new_name = $base.'_1.'.$ext;
            }

            if(move_uploaded_file($image, $this->config->root_dir.$this->config->posts_images_dir.$new_name))
                return $new_name;
        }

        return false;
    }

    private function correct_image($image)
    {
        $ru = explode('-', "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я");
        $en = explode('-', "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch---Y-y---E-e-YU-yu-YA-ya");

        $res = str_replace($ru, $en, $image);
        $res = preg_replace("/[\s]+/ui", '-', $res);
        $res = preg_replace("/[^a-zA-Z0-9\.\-\_]+/ui", '', $res);
        $res = strtolower($res);
        return $res;
    }

    private	$allowed_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');

    // Удалить изображение категории
    public function delete_image($coments_ids)
    {

        $coments_ids = (array) $coments_ids;
        $query = $this->db->placehold("SELECT image FROM __comments WHERE id in(?@)", $coments_ids);
        $this->db->query($query);
        $images = $this->db->results('image');

        if(!empty($images))
        {
            $query = $this->db->placehold("UPDATE __comments SET image=NULL WHERE id in(?@)", $coments_ids);
            $this->db->query($query);
            foreach($images as $image)
            {
                $query = $this->db->placehold("SELECT count(*) as count FROM __comments WHERE image=?", $image);
                $this->db->query($query);
                $count = $this->db->result('count');

                if($count == 0)
                {
                    @unlink($this->config->root_dir.$this->config->posts_images_dir.$image);
                }
            }
        }
    }
}
