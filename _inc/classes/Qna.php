<?php

    class Qna extends Database{

        private $db;

        public function __construct()
        {
            $this->db = $this->db_connection();
        }

        public function select(){

            try{

                $sql = "SELECT * FROM qna";
                $query = $this->db->query($sql);
                $qna = $query->fetchAll();
                return $qna;

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

    }

?>