<?php

header("Access-Control-Allow-Origin: http://localhost/investment_ico/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'objects/user.php';
 
$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$user->MEMBER_CARD_NUMBER = $data->MEMBER_CARD_NUMBER;
$user->MEMBER_NAME = $data->MEMBER_NAME;
$user->MEMBER_SERNAME = $data->MEMBER_SERNAME;
$user->MEMBER_GENDER = $data->MEMBER_GENDER;
$user->MEMBER_BIRTH = $data->MEMBER_BIRTH;
$user->MEMBER_TEL = $data->MEMBER_TEL;
$user->MEMBER_HOUSE = $data->MEMBER_HOUSE;
$user->MEMBER_VILLAGE = $data->MEMBER_VILLAGE;
$user->MEMBER_ALLEY = $data->MEMBER_ALLEY;
$user->MEMBER_PHOTO = $data->MEMBER_PHOTO;
$user->MEMBER_MAIL = $data->MEMBER_MAIL;
$user->MEMBER_PASSWORD = $data->MEMBER_PASSWORD;
$user->MEMBER_STATUS = $data->MEMBER_STATUS;
$user->MEMBER_SUBSCRIPTION = $data->MEMBER_SUBSCRIPTION;
$user->PROVINCE_ID = $data->PROVINCE_ID;
$user->AMPHURE_ID = $data->AMPHURE_ID;
$user->DISTRINCT_ID = $data->DISTRINCT_ID;
$user->POSTCODE_ID = $data->POSTCODE_ID;
$user->MEMBER_ACTIVATE_CODE = $data->MEMBER_ACTIVATE_CODE;

if(
    !empty($user->MEMBER_CARD_NUMBER) &&
    !empty($user->MEMBER_NAME) &&
    !empty($user->MEMBER_SERNAME) &&
    !empty($user->MEMBER_GENDER) &&
    !empty($user->MEMBER_BIRTH) &&
    !empty($user->MEMBER_TEL) &&
    !empty($user->MEMBER_HOUSE) &&
    !empty($user->MEMBER_VILLAGE) &&
    !empty($user->MEMBER_ALLEY) &&
    !empty($user->MEMBER_PHOTO) &&
    !empty($user->MEMBER_MAIL) &&
    !empty($user->MEMBER_PASSWORD) &&
    !empty($user->MEMBER_STATUS) &&
    !empty($user->MEMBER_SUBSCRIPTION) &&
    !empty($user->PROVINCE_ID) &&
    !empty($user->AMPHURE_ID) &&
    !empty($user->DISTRINCT_ID) &&
    !empty($user->POSTCODE_ID) &&
    !empty($user->MEMBER_ACTIVATE_CODE) &&
    $user->create()
){
    http_response_code(200);
    echo json_encode(array("message" => "User was created."));
}else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create user."));
}
?>

