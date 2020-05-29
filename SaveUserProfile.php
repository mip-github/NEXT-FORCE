<?php

session_start();
require_once __DIR__.'/require/config.php';
require_once __DIR__.'/require/config_pdo.php';

date_default_timezone_set("Asia/Bangkok");
$date = date("Ymd");	
$numrand = (mt_rand());

$COM_TOPIC = $_POST['COM_TOPIC'];   
$COM_DETAIL = $_POST['COM_DETAIL'];   
$COM_DATE = $_POST['COM_DATE'];    
$MEMBER_ID = $_SESSION['MEMBER_ID'];

$sql = "SELECT * FROM member WHERE MEMBER_ID = :MEMBER_ID";
$stmt=$db->prepare($sql);
$stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$MEMBER_ID = $row['MEMBER_ID'];
$MEMBER_CARD_NUMBER = $row['MEMBER_CARD_NUMBER'];
$NAME = $row['MEMBER_NAME'];
$SERNAME = $row['MEMBER_SERNAME'];


 
$path="file_ico/compaint/";  
$type = strrchr($_FILES['COM_FILES']['name'],".");
$newname = $date.$rr.$type;
$path_copy=$path.$newname;
$path_link="file_ico/compaint/".$newname;
move_uploaded_file($_FILES['COM_FILES']['tmp_name'],$path_copy);

if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){
        case 'compaint':

        $sql_insert = "INSERT INTO `complaint`(COM_TOPIC, COM_DETAIL, COM_DATE, MEMBER_ID, CREATE_DATE, COM_FILES)
                       VALUES('$COM_TOPIC', '$COM_DETAIL', '$COM_DATE', '$MEMBER_CARD_NUMBER', current_timestamp(), '$newname')";
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());

            echo "Success";

        break; 
        
        case 'verify':

        $MEMBER_ID = $_POST['MEMBER_ID'];   
        $MEMBER_CARD_NUMBER = $_POST['MEMBER_CARD_NUMBER'];   

        $path="file_ico/profile_kyc/";  
        $type = strrchr($_FILES['MEMBER_PHOTO']['name'],".");
        $newname1 = $date.$rr.$NAME.$rr.$SERNAME.$type;
        $path_copy=$path.$newname1;
        $path_link="file_ico/profile_kyc/".$newname1;
        move_uploaded_file($_FILES['MEMBER_PHOTO']['tmp_name'],$path_copy);
        
        $sql_check = "SELECT MEMBER_CARD_NUMBER FROM member WHERE MEMBER_CARD_NUMBER = '".$MEMBER_CARD_NUMBER."'";
        $result_check = mysqli_query($conn, $sql_check) or die(mysqli_error());
        $num=mysqli_num_rows($result_check);
        if($num > 0){
            echo "Error";
        }else{    

        $sql_update = "UPDATE member SET MEMBER_CARD_NUMBER = '".$MEMBER_CARD_NUMBER."',
                                         MEMBER_PHOTO = '".$newname1."'
                                   WHERE MEMBER_ID = '".$MEMBER_ID."'";              
        $result_update = mysqli_query($conn, $sql_update) or die(mysqli_error());
    
            echo "Success";
        }
        
        break;
        
        case 'profile':

        $MEMBER_ID = $_POST['MEMBER_ID'];   
        $MEMBER_NAME = $_POST['MEMBER_NAME'];   
        $MEMBER_SERNAME = $_POST['MEMBER_SERNAME'];    
        $MEMBER_GENDER = $_POST['MEMBER_GENDER']; 
        $MEMBER_BIRTH = $_POST['MEMBER_BIRTH'];
        $MEMBER_TEL = $_POST['MEMBER_TEL'];   
        $MEMBER_HOUSE = $_POST['MEMBER_HOUSE'];    
        $MEMBER_VILLAGE = $_POST['MEMBER_VILLAGE']; 
        $MEMBER_ALLEY = $_POST['MEMBER_ALLEY'];
        $PROVINCE_ID = $_POST['province_id'];
        $AMPHURE_ID = $_POST['amphure_id'];   
        $DISTRINCT_ID = $_POST['district_id'];    
        $POSTCODE_ID = $_POST['POSTCODE_ID']; 

        $sql_update = "UPDATE member SET MEMBER_NAME = '".$MEMBER_NAME."',
                                         MEMBER_SERNAME = '".$MEMBER_SERNAME."',
                                         MEMBER_GENDER = '".$MEMBER_GENDER."',
                                         MEMBER_BIRTH = '".$MEMBER_BIRTH."',
                                         MEMBER_TEL = '".$MEMBER_TEL."',
                                         MEMBER_HOUSE = '".$MEMBER_HOUSE."',
                                         MEMBER_VILLAGE = '".$MEMBER_VILLAGE."',
                                         MEMBER_ALLEY = '".$MEMBER_ALLEY."',
                                         PROVINCE_ID = '".$PROVINCE_ID."',
                                         AMPHURE_ID = '".$AMPHURE_ID."',
                                         DISTRINCT_ID = '".$DISTRINCT_ID."',
                                         POSTCODE_ID = '".$POSTCODE_ID."'
                                   WHERE MEMBER_ID = '".$MEMBER_ID."'"; 
        $result_update = mysqli_query($conn, $sql_update) or die(mysqli_error());                                   
    
            echo "Success";
    
        break;
        
        case 'banking':

        $BANK_ID = $_POST['BANK_ID'];   
        $BANK_BRANCH = $_POST['BANK_BRANCH'];   
        $ACCOUNT_TYPE_ID = $_POST['ACCOUNT_TYPE_ID'];    
        $ACCOUNT_BANK_NUMBER = $_POST['ACCOUNT_BANK_NUMBER']; 
        $ACCOUNT_BANK_NAME = $_POST['ACCOUNT_BANK_NAME'];
        
        $sql_check = "SELECT ACCOUNT_BANK_NUMBER FROM account_bank WHERE ACCOUNT_BANK_NUMBER = '".$ACCOUNT_BANK_NUMBER."'";
        $result_check = mysqli_query($conn, $sql_check) or die(mysqli_error());
        $num=mysqli_num_rows($result_check);
        if($num > 0){
            echo "Error";
        }else{    

        $sql_insert = "INSERT INTO `account_bank`(BANK_BRANCH, ACCOUNT_BANK_NAME, ACCOUNT_BANK_NUMBER, ACCOUNT_BANK_STATUS, ACCOUNT_BANK_DATE, MEMBER_ID, ACCOUNT_TYPE_ID, BANK_ID)
                           VALUES('$BANK_BRANCH', '$ACCOUNT_BANK_NAME', '$ACCOUNT_BANK_NUMBER', NULL, current_timestamp(), '$MEMBER_CARD_NUMBER', '$ACCOUNT_TYPE_ID', '$BANK_ID')";               
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());
    
            echo "Success";
            
        }
    
        break;  
        
        case 'BuyProject':

        $PROJECT_ID = $_POST['PROJECT_ID'];   

        $sql = "SELECT PROJECT_NUM_UNIT FROM project WHERE PROJECT_ID = PROJECT_ID";
        $stmt=$db->prepare($sql);
        $stmt->bindparam(':PROJECT_ID', $PROJECT_ID);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $PROJECT_NUM_UNIT = $row['PROJECT_NUM_UNIT'];
    
        $sql_insert = "INSERT INTO project_buy(PROJECT_ID, MEMBER_ID, STATUS, PRICE, CREATE_AT) VALUES ('$PROJECT_ID', '$MEMBER_ID', '0', '$PROJECT_NUM_UNIT', current_timestamp())";
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());

        $sql_insert1 = "INSERT INTO `files_buy`(`FILES`, `STATUS`, `DATE`, `TRANSFER_TYPE`, `BANK_NUMBER_CARD`, `BANK_TRANSFER`, `TOTAL`, `CREATE_BY`, `CREATE_AT`) VALUES (NULL, '0', NULL, NULL, NULL, NULL, NULL, '$MEMBER_ID', current_timestamp())";
        $result_insert = mysqli_query($conn, $sql_insert1) or die(mysqli_error());
        
            echo "Success";

        break;   

        case 'payment':
        
        $TOTAL = $_POST['TOTAL']; 
        $DATE = $_POST['DATE']; 
        $BANK_TRANSFER = $_POST['BANK_TRANSFER']; 
        

        $path="file_ico/payment/";  
        $type = strrchr($_FILES['FILES']['name'],".");
        $newname1 = $date.$rr.$NAME.$rr.$SERNAME.$type;
        $path_copy=$path.$newname1;
        $path_link="file_ico/payment/".$newname1;
        move_uploaded_file($_FILES['FILES']['tmp_name'],$path_copy);
    
        $sql_update = "UPDATE files_buy SET TOTAL = '".$TOTAL."',
                                            DATE = '".$DATE."',
                                            BANK_TRANSFER = '".$BANK_TRANSFER."',
                                            FILES = '".$newname1."'
                                      WHERE CREATE_BY = '".$MEMBER_ID."' AND STATUS = '0'"; 
        $result_update = mysqli_query($conn, $sql_update) or die(mysqli_error());                           
            
            echo "Success";
    
        break;   
    }
}

?>