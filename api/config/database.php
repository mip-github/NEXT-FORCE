<?php

class DatabaseService{

    private $db_host = "multiinnovation_db_1";
    private $db_name = "investment";
    private $db_user = "root";
    private $db_password = "root";
    private $connection;

    public function getConnection(){

        $this->connection = null;

        try{
            $this->connection = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
        }catch(PDOException $exception){
            echo "Connection failed: " . $exception->getMessage();
        }

        return $this->connection;
    }
}


// class Database{
 
//     private $host = "multiinnovation_db_1";
//     private $db_name = "investment";
//     private $username = "root";
//     private $password = "root";
//     public $conn;
 
//     public function getConnection(){
 
//         $this->conn = null;
 
//         try{
//             $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
//         }catch(PDOException $exception){
//             echo "Connection error: " . $exception->getMessage();
//         }
 
//         return $this->conn;
//     }
// }

?>