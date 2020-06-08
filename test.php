<?php
// See the password_hash() example to see where this came from.
// $hash = '$2y$10$SRPLENrpSa1jB8bbOwz4U.JeRt95ThzRabKueWQL2DjwQqtvuKv0O';

// if (password_verify('123456', $hash)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
include_once 'require/config_pdo.php';
require "jwt/vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$email = '';
$password = '';



$data = json_decode(file_get_contents("php://input"));

$email = $data->email;
$password = $data->password;

$table_name = 'member';

$query = "SELECT MEMBER_ID, MEMBER_NAME, MEMBER_SERNAME, MEMBER_PASSWORD FROM " . $table_name . " WHERE MEMBER_MAIL = ? LIMIT 0,1";

$stmt = $db->prepare( $query );
$stmt->bindParam(1, $email);
$stmt->execute();
$num = $stmt->rowCount();

if($num > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $MEMBER_ID = $row['MEMBER_ID'];
    $MEMBER_NAME = $row['MEMBER_NAME'];
    $MEMBER_SERNAME = $row['MEMBER_SERNAME'];
    $password2 = $row['MEMBER_PASSWORD'];

    if(password_verify($password, $password2))
    {
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
                "id" => $MEMBER_ID,
                "firstname" => $MEMBER_NAME,
                "lastname" => $MEMBER_SERNAME,
                "email" => $email
        ));

        http_response_code(200);

        $jwt = JWT::encode($token, $secret_key);
        echo json_encode(
            array(
                "message" => "Successful login.",
                "jwt" => $jwt,
                "email" => $email,
                "expireAt" => $expire_claim
            ));
    }
    else{

        http_response_code(401);
        echo json_encode(array("message" => "Login failed.", "password" => $password));
    }
}

// }
?>