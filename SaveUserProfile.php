<?php

session_start();
require_once __DIR__.'/require/config.php';

date_default_timezone_set("Asia/Bangkok");

$COM_TOPIC = $_POST['COM_TOPIC'];   
$COM_DETAIL = $_POST['COM_DETAIL'];   
$COM_DATE = $_POST['COM_DATE'];    
$MEMBER_ID = $_SESSION['MEMBER_ID']; 
 
$path="file_ico/compaint/";  
$type = strrchr($_FILES['COM_FILES']['name'],".");
$newname = $date.$rr.$MEMBER_NAME.$rr.$MEMBER_SURNAME.$type;
$path_copy=$path.$newname;
$path_link="file_ico/compaint/".$newname;
move_uploaded_file($_FILES['COM_FILES']['tmp_name'],$path_copy);  

if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){
        case 'compaint':

        $sql_insert = "INSERT INTO `compaint`(COM_TOPIC, COM_DETAIL, COM_DATE, MEMBER_ID, CREATE_DATE, COM_FILES)
                       VALUES('$COM_TOPIC', '$COM_DETAIl', '$COM_DATE', '$MEMBER_ID', current_timestamp(), ''$newname)";
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());

        
            echo "Success";

        break;    
    }
}

?>