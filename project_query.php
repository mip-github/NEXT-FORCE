<?php

require_once __DIR__.'/require/config.php';
require_once __DIR__.'/require/config_pdo.php';

date_default_timezone_set("Asia/Bangkok");
$date = date("Ymd");	
$numrand = (mt_rand());

$PROJECT_NUMBER = $_POST['PROJECT_NUMBER'];   
$PROJECT_NAME = $_POST['PROJECT_NAME'];   
$PROJECT_PRICE = $_POST['PROJECT_PRICE'];   
$PROJECT_NUM_UNIT = $_POST['PROJECT_NUM_UNIT'];   
$PROJECT_DATE = $_POST['PROJECT_DATE'];   
$PROJECT_START = $_POST['PROJECT_START'];   
$PROJECT_END = $_POST['PROJECT_END'];   
$PROJECT_DETAIL = $_POST['PROJECT_DETAIL'];  
$PROJECT_SOFT_CAP = $_POST['PROJECT_SOFT_CAP'];   
$PROJECT_HARD_CAP = $_POST['PROJECT_HARD_CAP'];  

$path="file_ico/project/";  
$type = strrchr($_FILES['PROJECT_FILES']['name'],".");
$newname = $date.$numrand.$type;
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

        $sql_insert = "INSERT INTO `project`(`PROJECT_NUMBER`, `PROJECT_NAME`, `PROJECT_DETAIL`, `PROJECT_STATUS`, `PROJECT_DATE`, `PROJECT_PRICE`, `PROJECT_NUM_UNIT`, `PROJECT_SOFT_CAP`, `PROJECT_HARD_CAP`, `PROJECT_START`, `PROJECT_END`, `PROJECT_TIMELINE`) 
                       VALUES ('$PROJECT_NUMBER', '$PROJECT_NAME', '$PROJECT_DETAIL', 'เริ่มโครงการ', '$PROJECT_DATE', '$PROJECT_PRICE', '$PROJECT_NUM_UNIT', '$PROJECT_SOFT_CAP', '$PROJECT_HARD_CAP', '$PROJECT_START', '$PROJECT_END', '$newname')";

        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());

        
            echo "Success";

        }
        break;   
        
        case 'get_project':
            $sql = "SELECT PROJECT_NAME FROM project WHERE PROJECT_ID = :ID";
            $ID = $_POST["PROJECT_ID"];
            $stmt=$db->prepare($sql);
            $stmt->bindparam(':ID',$ID);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($row);
        break;

        case 'reward':

        $PROJECT_ID = $_POST['PROJECT_ID'];   
        $MINIMUM = $_POST['MINIMUM'];   
        $NAME = $_POST['NAME'];   
        $REWARD_MAX = $_POST['REWARD_MAX'];   
        $ESTIMATED = $_POST['ESTIMATED'];
          

        $sql_insert = "INSERT INTO `project_reward`(`PROJECT_ID`, `amount`, `NAME`, `REWARD_SUM`, `REWARD_MAX`, `ESTIMATED`, `CREATE_BY`, `CREATE_AT`) 
                       VALUES ('$PROJECT_ID', '$MINIMUM', '$NAME', '0', '$REWARD_MAX', '$ESTIMATED', NULL, current_timestamp())";
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());
    
            echo "Success";
            
        break;  
    }
}

?>