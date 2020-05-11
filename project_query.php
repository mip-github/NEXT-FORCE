  
<?php

require_once __DIR__.'/require/config.php';

date_default_timezone_set("Asia/Bangkok");
$date = date("Ymd");	
$numrand = (mt_rand());

$PROJECT_NAME = $_POST['PROJECT_NAME'];   
$PROJECT_DETAIL = $_POST['PROJECT_DETAIL'];   
$PROJECT_NUM_UNIT = $_POST['PROJECT_NUM_UNIT'];   
$PROJECT_PRICE = $_POST['PROJECT_PRICE'];   
$PROJECT_START = $_POST['PROJECT_START'];   
$PROJECT_END = $_POST['PROJECT_END'];   

$path="project/";  
$type = strrchr($_FILES['PROJECT_TIMELINE']['name'],".");
$newname = $date.$numrand.$type;
$path_copy=$path.$newname;
$path_link="project/".$newname;
move_uploaded_file($_FILES['PROJECT_TIMELINE']['tmp_name'],$path_copy);  

if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){
        case 'project':

        $sql_check = "SELECT PROJECT_NAME FROM project WHERE PROJECT_NAME = '".$PROJECT_NAME."'";
        $result_check = mysqli_query($conn, $sql_check) or die(mysqli_error());
        $num=mysqli_num_rows($result_check);
        if($num > 0){
            echo "Error";
        }else{

        $sql_insert = "INSERT INTO project(PROJECT_NAME, PROJECT_DETAIL, PROJECT_STATUS, PROJECT_DATE, PROJECT_PRICE, PROJECT_NUM_UNIT, PROJECT_START, PROJECT_END, PROJECT_TIMELINE) 
        VALUES ('$PROJECT_NAME', '$PROJECT_DETAIL', 'เริ่มโครงการ', current_timestamp();, '$PROJECT_PRICE', '$PROJECT_NUM_UNIT', '$PROJECT_START', '$PROJECT_END', '$newname')";
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());

        // $sql_wallet = "INSERT INTO MIE_WALLET(WALLET_COIN, WALLET_POINT) VALUES ('0', '0')";
        // $result_wallet = mysqli_query($conn, $sql_wallet) or die(mysqli_error());
        
            echo "Success";

        }
        break;    
    }
}

?>