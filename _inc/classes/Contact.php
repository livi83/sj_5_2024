<?php

    class Contact extends Database{

        private $db;

        public function __construct()
        {
            $this->db = $this->db_connection();
        }

        public function insert(){
            if($this->db){
                //echo 'Mám spojenie';
                if(isset($_POST['contact_submitted'])){
                   // echo 'Formulár bol odoslaný';
                   $data = array('contact_name'=>$_POST['name'],
                      'contact_email'=>$_POST['email'],
                      'contact_message'=>$_POST['message'],
                      'contact_acceptance'=>$_POST['acceptance'],
                    );

                    try{

                      $query = "INSERT INTO contact (name, email, message, acceptance) 
                      VALUES (:contact_name, :contact_email, :contact_message, :contact_acceptance)";
                      $query_run = $this->db->prepare($query);
                      $query_run->execute($data);    

                    }catch(PDOException $e){
                     
                      echo $e->getMessage();
                    }


                }else{
                    echo 'Formulár nebol odoslaný';
                }
              }else{
                echo 'Nemám spojenie';
              }
        }

        public function select(){
          try{
            $sql = "SELECT * FROM contact";
            $query = $this->db->query($sql);
            $contacts = $query->fetchAll();
            return $contacts;

          }catch(PDOException $e){
            echo $e->getMessage();
          }
        }
        
        public function delete(){
          try{
              $data = array(
                  'contact_id' => $_POST['delete_contact']
              );
              $query = "DELETE FROM contact WHERE id = :contact_id";
              $query_run = $this->db->prepare($query);
              $query_run->execute($data);
          }catch(PDOException $e){
              echo $e->getMessage();
          }
      }

      public function edit($contact_id, $new_data){
        try{
          // Zostavenie dát pre aktualizáciu
          $data = array(
              'contact_id' => $contact_id,
              'contact_name' => $new_data['name'], // Predpokladáme, že máme pole $new_data s novými údajmi
              'contact_email' => $new_data['email'],
              'contact_message' => $new_data['message']
          );
          
           $query = "UPDATE contact SET name = :contact_name, email = :contact_email, message = :contact_message WHERE id = :contact_id";
           $query_run = $this->db->prepare($query);
           $query_run->execute($data);
           
  
        }catch(PDOException $e){
          // Spracovanie chyby, ak nastane
          echo $e->getMessage();
        }
    }
    }

?>