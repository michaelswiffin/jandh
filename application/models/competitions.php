<?php
/*
 |
 *
 */
class CompetitionsModel {
    
    
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }











} // end class