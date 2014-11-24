<?php

class PageModel
{
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
    public function getAllPages()
    {
        $sql = "SELECT * FROM pagedata";
        $query = $this->db->prepare($sql);
        $query->executce();

        return $query->fetch();
    }
    /* 
     |
     * Get single page from database
     */
    public function getPage($pagepath) {
    	
    	
    	
        $sql = "SELECT * FROM pagedata WHERE page_path=:pagepath ";
        
        pdo_print($sql, array(':pagepath'=> $pagepath));
        
        $query = $this->db->prepare($sql);
        $query->execute(array(':pagepath' => $pagepath));

        return $query->fetch();
    }
    
    /*
     |
     *
     */
     
     public function getImages($filename) {
	     
	     $sql = "select * from imagealt where image_id = :filename";
	     $query = $this->db->prepare($sql);
		 $query->execute(array(':filename' => $filename));

        return $query->fetch();

     }
     
	 

}
