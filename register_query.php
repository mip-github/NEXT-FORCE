<?php

require_once __DIR__.'/require/config.php';

date_default_timezone_set("Asia/Bangkok");

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

// print_r($_POST);
// die();

if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){
        case 'registion':

        $sql_insert = "INSERT INTO member(MEMBER_NAME, MEMBER_SERNAME, MEMBER_GENDER, MEMBER_BIRTH, MEMBER_TEL, MEMBER_HOUSE, MEMBER_VILLAGE, MEMBER_ALLEY, PROVINCE_ID, AMPHURE_ID, DISTRINCT_ID, POSTCODE_ID, MEMBER_PHOTO, MEMBER_MAIL, MEMBER_PASSWORD, MEMBER_STATUS, MEMBER_SUBSCRIPTION)
                       VALUES ('".$_POST['MEMBER_NAME']."', '".$_POST['MEMBER_SURNAME']."', '".$_POST['MEMBER_GENDER']."', '".$_POST['MEMBER_BIRTH']."', '".$_POST['MEMBER_TEL']."', 
                                   '".$_POST['MEMBER_HOUSE']."', '".$_POST['MEMBER_VILLAGE']."', '".$_POST['MEMBER_ALLEY']."', '".$_POST['province_id']."', '".$_POST['amphure_id']."', 
                                   '".$_POST['district_id']."' , '".$_POST['MEMBER_POSTCODE']."', '0', NULL, NULL, '1', current_timestamp())"; 
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());
        

        break;    
    }
}

?>