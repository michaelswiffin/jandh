<?php

class NavModel {

    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	/*
	 | Get pages
	 *
	 */    
     public function getList($parent) {
	
		// setup the query
		$sql = '
		SELECT 
			  id
			, page_name
			, page_path 
		FROM 
			pagedata 
		WHERE 
			affiliate_to = '. $parent .' 
		AND
			display_nav = 1
		
		ORDER BY
			page_order asc	
		';
		
		$items = array();
		// run the query
 		$query = $this->db->prepare($sql);
        $query->execute();
        
        //pdo_print($sql, array(''=>''));
        
		$i=1;
		while($rows = $query->fetch()) { // while 1
			if($rows->page_path == '/') {
				$items[] = '<li class="'. $rows->page_name.'"><a href="'. URL .''. $rows->page_path .'">' .strtolower($rows->page_name).'</a>'. $this->getList($rows->id).'</li>'."\r\n";
			} else {
		 		$items[] = '<li class="'. $rows->page_name.'"><a href="'. URL .'page/v/'. $rows->page_path .'?">' .strtolower($rows->page_name).'</a>'. $this->getList($rows->id).'</li>'."\r\n";
		 	}
			$i++;
		}	
				
				
	    if(count($items)) {	        
	    	
	    	return '<ul class="nav">'.implode('', $items).'
	       
	        </ul>';
	    } else {
	        return '';
	    }
	}
	
	function displayNav() {
		$menu = $this->getList(0);
		$count = 1;
		$nav = preg_replace('/xx/', 'nav', $menu, $count);
		return $nav;
		
		
		//return $this->getList(0);
	}	
	/*
	 | Get manufacturers for navigation
	 *
	 */
	public function getManufacturers() {
		
		$sql = "SELECT distinct(manufacturer) FROM stock WHERE visible = 1";
        $query = $this->db->prepare($sql);
		$query->execute();
		
        return $query->fetchAll();
	} 
	
	
	
}// end 