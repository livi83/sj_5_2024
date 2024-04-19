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

    public function select_single(){
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $id = $_GET['id'];
            try{
                $db_query = "SELECT * FROM portfolio WHERE id = ?";
                $query = $this->db->prepare($db_query);
                $query->execute([$id]);
                $portfolio = $query->fetch();
                if($portfolio) {
                    return $portfolio;
                }else{
                    header("HTTP/1.0 400 Bad Request");
                    header("Location: 404.php");
                    die();
                }
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }   
        }else{
            header("HTTP/1.0 400 Bad Request");
            header("Location: 404.php");
            die();
        }
    }
}

?>