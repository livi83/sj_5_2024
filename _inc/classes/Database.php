<?php

    class Database{

        private $host = 'localhost';
        private $db_name = 'sj_5_2024';
        private $user_name = 'root';
        private $password = '';

        protected function db_connection(){
            try{
                /*$pdo = new PDO('mysql:host=localhost;dbname=vaša_databáza', 
                                 'vaše_používateľské_meno', 
                                 'vaše_heslo');
                */
                $connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8", 
                                      $this->user_name, 
                                      $this->password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                return $connection;
                
            }catch(PDOException $e){
                die("Chyba pripojenia k databáze: " . $e->getMessage());
            }
        }

    }

?>