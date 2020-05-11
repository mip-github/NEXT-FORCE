<?php
include_once 'require/config.php';

// header("Access-Control-Allow-Origin: * ");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

$MEMBER_NAME = $data->MEMBER_NAME;
$MEMBER_SERNAME = $data->MEMBER_SERNAME;
$MEMBER_MAIL = $data->MEMBER_MAIL;
$MEMBER_PASSWORD = $data->MEMBER_PASSWORD;
$MEMBER_TEL = $data->MEMBER_TEL;

$MEMBER_NAME = $_POST['MEMBER_NAME'];
$MEMBER_SURNAME = $_POST['MEMBER_SURNAME'];
$MEMBER_GENDER = $_POST['MEMBER_GENDER'];
$MEMBER_BIRTH = $_POST['MEMBER_BIRTH'];
$MEMBER_TEL = $_POST['MEMBER_TEL'];
$MEMBER_HOUSE = $_POST['MEMBER_HOUSE'];
$MEMBER_VILLAGE = $_POST['MEMBER_VILLAGE'];
$MEMBER_ALLEY = $_POST['MEMBER_ALLEY'];
$province_id = $_POST['province_id'];
$amphure_id = $_POST['amphure_id'];
$district_id = $_POST['district_id'];
$MEMBER_POSTCODE = $_POST['MEMBER_POSTCODE'];
$MEMBER_EMAIL = $_POST['MEMBER_EMAIL'];
$MEMBER_PASSWORD = $_POST["MEMBER_PASSWORD"];  
$MEMBER_ID = $_POST['MEMBER_ID'];
$MEMBER_PHOTO = $_FILES['MEMBER_PHOTO'];
$BANK_BRANCH = $_POST["BANK_BRANCH"];
$ACCOUNT_BANK_NAME = $_POST["ACCOUNT_BANK_NAME"];
$ACCOUNT_BANK_NUMBER = $_POST["ACCOUNT_BANK_NUMBER"];

$user_encrypted_password = password_hash($MEMBER_PASSWORD, PASSWORD_DEFAULT);
$user_activation_code = md5(rand());

// echo json_encode($_POST);
// die();

$table_name = 'users';

$query = "INSERT INTO users(MEMBER_NAME, MEMBER_SERNAME, MEMBER_MAIL, MEMBER_PASSWORD, created_at, modified_at, MEMBER_TEL)
          VALUES('$MEMBER_NAME', '$MEMBER_SURNAME' ,'$MEMBER_EMAIL', '$user_encrypted_password', current_timestamp(), current_timestamp(), '$MEMBER_TEL')";
$result = mysqli_query($conn, $query) or die(mysqli_error());


?>