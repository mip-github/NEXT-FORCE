<?php

require_once __DIR__.'/require/config.php';

if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){

        case 'successverify':

        $MEMBER_ID = $_POST['MEMBER_ID'];   
        $sql_update = "UPDATE member SET MEMBER_KYC = '1'
                                   WHERE MEMBER_CARD_NUMBER = '".$MEMBER_ID."'"; 
        $result_update = mysqli_query($conn, $sql_update) or die(mysqli_error());                                   
    
            echo "Success";
    
        break;

        case 'notverified':

        $MEMBER_ID = $_POST['MEMBER_ID'];   
        $REMARK = $_POST['REMARK'];

        $sql_update = "UPDATE member SET MEMBER_KYC = '2'
                                   WHERE MEMBER_CARD_NUMBER = '".$MEMBER_ID."'";
        $result_update = mysqli_query($conn, $sql_update) or die(mysqli_error());  
        
        $sql_insert = "INSERT INTO remark_kyc(REMARK, MEMBER_ID, CREATE_BY, CREATE_AT)
                       VALUES('".$REMARK."', '".$MEMBER_ID."', NULL, current_timestamp())";
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());  
        
            echo "Success";

        break;
    }
}

?>