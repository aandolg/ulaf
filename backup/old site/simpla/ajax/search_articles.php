<?php
    chdir('../..');
    require_once('api/Simpla.php');
    $simpla = new Simpla();
    $limit = 100;
    
    $keyword = $simpla->request->get('query', 'string');
    
    $simpla->db->query('SELECT id, name FROM __articles
                        WHERE name LIKE "%'.$simpla->db->escape($keyword).'%" ORDER BY name LIMIT ?', $limit);
    $articles = $simpla->db->results();

    $suggestions = array();
    foreach($articles as $article)
    {        
        $suggestion = new stdClass();
        $suggestion->value = $article->name;
        $suggestion->data = $article;
        $suggestions[] = $suggestion;
    }
    
    $res = new stdClass;
    $res->query = $keyword;
    $res->suggestions = $suggestions;
    header("Content-type: application/json; charset=UTF-8");
    header("Cache-Control: must-revalidate");
    header("Pragma: no-cache");
    header("Expires: -1");        
    print json_encode($res);