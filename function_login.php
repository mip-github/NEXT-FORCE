<?php
session_start();
include_once 'require/config_pdo.php';
require "jwt/vendor/autoload.php";
use \Firebase\JWT\JWT;

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

$MEMBER_EMAIL = $data->MEMBER_EMAIL;
$MEMBER_PASSWORD = $data->MEMBER_PASSWORD;

$MEMBER_MAIL_1 = $_POST['MEMBER_MAIL'];


if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){
        case 'login':

                if(isset($_POST['MEMBER_EMAIL']) && $_POST['MEMBER_EMAIL'] != '' && isset($_POST['MEMBER_PASSWORD']) && $_POST['MEMBER_PASSWORD'] != '') {
                    $MEMBER_EMAIL = trim($_POST['MEMBER_EMAIL']);
                    $MEMBER_PASSWORD = trim($_POST['MEMBER_PASSWORD']);

                    $query = "SELECT * FROM member WHERE `MEMBER_MAIL` = ? LIMIT 0,1";
                    $stmt = $db->prepare($query);
                    $stmt->bindParam(1, $MEMBER_EMAIL);
                    $stmt->execute();
                    $num=$stmt->rowCount();

                    if($num > 0) {
                        $row=$stmt->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['MEMBER_ID']   = $row['MEMBER_ID'];
                        $_SESSION['MEMBER_NAME'] = $row['MEMBER_NAME'];
                        $_SESSION['MEMBER_SERNAME'] = $row['MEMBER_SERNAME'];
                        $MEMBER_PASSWORD_HASH = $row['MEMBER_PASSWORD'];
                        $MEMBER_ID = $row['MEMBER_ID'];
                        $MEMBER_NAME = $row['MEMBER_NAME'];
                        $MEMBER_SERNAME = $row['MEMBER_SERNAME'];
                        $MEMBER_MAIL = $row['MEMBER_MAIL'];
                        $_SESSION['MEMBER_PHOTO'] = $row['MEMBER_PHOTO'];

               
                        if(password_verify($MEMBER_PASSWORD,$MEMBER_PASSWORD_HASH)){
                            $secret_key = "YOUR_SECRET_KEY";
                            $issuer_claim = "THE_ISSUER"; // this can be the servername
                            $audience_claim = "THE_AUDIENCE";
                            $issuedat_claim = time(); // issued at
                            $notbefore_claim = $issuedat_claim + 10; //not before in seconds
                            $expire_claim = $issuedat_claim + 60; // expire time in seconds
                            $token = array(
                                "iss" => $issuer_claim,
                                "aud" => $audience_claim,
                                "iat" => $issuedat_claim,
                                "nbf" => $notbefore_claim,
                                "exp" => $expire_claim,
                                "data" => array(
                                    "MEMBER_ID" => $MEMBER_ID,
                                    "MEMBER_NAME" => $MEMBER_NAME,
                                    "MEMBER_SERNAME" => $MEMBER_SERNAME,
                                    "MEMBER_MAIL" => $MEMBER_MAIL
                            ));
    
                            $jwt = JWT::encode($token, $secret_key);
                                echo "Success"; 

                        }else{
                            echo "Error";
                        }
                    }
                }          
        break;   
    }
}

?>