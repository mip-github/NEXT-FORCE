<?php
session_start();
include_once 'require/config_pdo.php';

if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){
        case 'login':
            
                    $email = trim($_POST['email']);
                    $password = trim($_POST['password']);

                    $query = "SELECT * FROM users WHERE `email` = ? LIMIT 0,1";
                    $stmt = $db->prepare($query);
                    $stmt->bindParam(1, $email);
                    $stmt->execute();
                    $num=$stmt->rowCount();

                    if($num > 0) {
                        $row=$stmt->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['id']   = $row['id'];
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['lastname'] = $row['firstname'];
                        $_SESSION['email'] = $row['email'];
                        $password2 = $row['password'];

                       

                        if(password_verify($password,$password2)){
                            echo "Success";
                        }else{
                            echo "Error";
                        }
                    }
                         
        break;   
    }
}

?>