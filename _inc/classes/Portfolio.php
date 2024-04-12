<?php

class Portfolio extends Database{

    private $db;

    public function __construct(){
        $this->db = $this->db_connection();
    }
    
    public function select(){
        try{
            $sql = "SELECT * FROM portfolio";
            $query = $this->db->query($sql);
            $portfolio = $query->fetchAll();
            return $portfolio;

        }catch(PDOException $e){
            echo($e->getMessage());
        }   
    }
}

?>