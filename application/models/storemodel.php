<?php

/*
 |
 */
 
class StoreModel {
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
  	/**
     * Get all pages from database
     */
    public function getAllProducts()
    {
        $sql = "SELECT * FROM stock";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    
    /*
     | Get single product
     */

	public function viewItem($item_id) {
	    
	    $sql = "SELECT * FROM stock WHERE id=:id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $item_id));


        //pdo_print($sql, array(':id' => $item_id));
        return $query->fetch();
    
	}
	
	/*
	 | Get related images
	 *
	 */
	public function getRelatedImages($item_id) {
		
		$sql = "SELECT * FROM stock_images WHERE uxid=:id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $item_id));


        //pdo_print($sql, array(':id' => $item_id));
        return $query->fetchAll();
	} 
	
	
	/*
	 | Get related products
	 *
	 */
	 public function getRelatedProducts($app){
		
		$sql = "
			SELECT 
				   id
				,  manufacturer
				,  part_number
				,  product_title
				, appliance
			FROM 
				stock 
			WHERE 
				appliance=:appliance
			AND 
				visible = 1	
			GROUP BY
				appliance
			";
        $query = $this->db->prepare($sql);
        $query->execute(array(':appliance' => $app));


        pdo_print($sql, array(':appliance' => $app));
        return $query->fetchAll();
    
 
	 }
	

}