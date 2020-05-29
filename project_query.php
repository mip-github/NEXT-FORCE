<?php

require_once __DIR__.'/require/config.php';

date_default_timezone_set("Asia/Bangkok");

$PROJECT_NUMBER = $_POST['PROJECT_NUMBER'];   
$PROJECT_NAME = $_POST['PROJECT_NAME'];   
$PROJECT_PRICE = $_POST['PROJECT_PRICE'];   
$PROJECT_NUM_UNIT = $_POST['PROJECT_NUM_UNIT'];   
$PROJECT_DATE = $_POST['PROJECT_DATE'];   
$PROJECT_START = $_POST['PROJECT_START'];   
$PROJECT_END = $_POST['PROJECT_END'];   
$PROJECT_DETAIL = $_POST['PROJECT_DETAIL'];  


$path="file_ico/project/";  
$type = strrchr($_FILES['PROJECT_FILES']['name'],".");
$newname = $date.$rr.$MEMBER_NAME.$rr.$MEMBER_SURNAME.$type;
$path_copy=$path.$newname;
$path_link="file_ico/project/".$newname;
move_uploaded_file($_FILES['PROJECT_FILES']['tmp_name'],$path_copy);  

if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){
        case 'project':

        $sql_check = "SELECT PROJECT_NUMBER FROM project WHERE PROJECT_NUMBER = '".$PROJECT_NUMBER."'";
        $result_check = mysqli_query($conn, $sql_check) or die(mysqli_error());
        $num=mysqli_num_rows($result_check);
        if($num > 0){
            echo "Error";
        }else{

        $sql_insert = "INSERT INTO `project`(`PROJECT_NUMBER`, `PROJECT_NAME`, `PROJECT_DETAIL`, `PROJECT_STATUS`, `PROJECT_DATE`, `PROJECT_PRICE`, `PROJECT_NUM_UNIT`, `PROJECT_START`, `PROJECT_END`, `PROJECT_TIMELINE`)
        VALUES ('$PROJECT_NUMBER', '$PROJECT_NAME', '$PROJECT_DETAIL', 'เริ่มโครงการ', current_timestamp(), '$PROJECT_PRICE', '$PROJECT_NUM_UNIT', '$PROJECT_START', '$PROJECT_END', NULL)";
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());

        
            echo "Success";

        }
        break;    
    }
}

?>