<?php

/*
 |
 */
 
class AdminStoreModel {
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
     | Get all pages from database
     */
    public function getAllProducts()
    {
        $sql = "SELECT * FROM store_products";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    
    /*
     |
     */
     
     public function addProduct($data) {
     	
     	$sql = "
     		insert into
     			store_products
     		(
     			  uxid
     			, product_name
     			, product_description
     			, product_full_description
     		) values (
     			  :uxid
     			, :product_name
     			, :product_description
     			, :product_full_description
     		)     		
     	";
     
     	$query = $this->db->prepare($sql);
        $query->execute(array(
        	':uxid' => $data->uxid, 
        	':product_name' => $data->product_name, 
        	':product_description' => $data->product_description, 
        	':product_full_description' => $data->product_full_description
        		)
        	);
	
     
     }
     
     
} // end