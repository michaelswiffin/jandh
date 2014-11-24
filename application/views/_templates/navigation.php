<?php

	function getList($parent, $extra=null) {
		
		$db = new Controller;
		$ed = $db->returnDb();
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
 		$query = $ed->prepare($sql);
        $query->execute();
        
        //pdo_print($sql, array(''=>''));
        
		$i=1;
		while($rows = $query->fetch()) { // while 1
			if($rows->page_path == '/') {
				$items[] = '<li class="'. $rows->page_name.'"><a href="'. URL .''. $rows->page_path .'">' .strtolower($rows->page_name).'</a>'. getList($rows->id).'</li>'."\r\n";
			} else {
		 		$items[] = '<li class="'. $rows->page_name.'"><a href="'. URL .'page/v/'. $rows->page_path .'?">' .strtolower($rows->page_name).'</a>'. getList($rows->id).'</li>'."\r\n";
		 	}
			$i++;
		}
				
				
				
	    if(count($items)) {	        
	    	
	    	return 
	    	"<ul class=\"xx\">\r\n"
	    		.implode("\r\n", $items)."
	    	</ul>";
	    } else {
	        return '';
	    }
	}
/*
 | Display the nav...
 */	
	function displayNav() {
		
		$menu = getList(0);
		$count = 1;
		$nav = preg_replace('/xx/', 'nav', $menu, $count);
		return $nav;
		
		
	}	
	
	echo displayNav();
?>