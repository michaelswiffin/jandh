<?php

/*
 | SEARCH CLASS 
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
 
 class SearchModel {
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
     |
     * type = basic or advanced search
     */
     Public function SearchDatabase($q, $type) {
	    
	    $sql = '';
	    /*
	     | Analyse the incoming search term
	     */
	    
	    if($type == 'advanced') {
		    $sql = "
	    	select
	    		  id
	    		, manufacturer
	    		, appliance
	    		, part_number
	    		, product_description
	    		, price
	    	from
	    		stock
	    	where
		    	1=1
		    ";

		    if(strlen($q['manu']) > 0) {
			    $sql .= " and manufacturer = '".$q['manu']."'";
		    }
		    if(strlen($q['appliance']) > 0) {
			    $sql .= " and appliance = '".$q['appliance']."'";
		    }
		    if(strlen($q['product_description']) > 0) {
			    $sql .= " and product_description like '%%".$q['product_description']."%%'";
		    }
		    
		    $sql .= ' limit 1000';
		    
		/*
		 | END ADVANCED SEARCH
		 */    
	    } else {
	    	$w = explode(" ", $q);
			$wordcount = count($w);
			$sql = "
	    	select
	    		  id
	    		,  manufacturer
	    		, appliance
	    		, part_number
	    		, product_description
	    		, price
	    	from
	    		stock
	    	where
	    		   manufacturer like '%$q%'
	    		or appliance like '%$q%'
	    		or part_number like '%$q%'
	    		or product_description like '%$q%'
	    	limit 1000
	    		";
				
	    }

	    
	   	    
	    //debugger($sql);
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
     }
    
} // end