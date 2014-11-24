<?php
/*
 | ADMIN MEDIA MODEL
 *
 *
 *
 *
 *
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

class AdminOrdersModel { 

    /*
     |
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
     * Get all pages from database
     */
    public function getAllOrders()  {
        $sql = "SELECT * FROM jh_orders_list";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    

} // end
