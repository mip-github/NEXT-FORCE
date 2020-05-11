<?php

include_once 'require/config.php';

date_default_timezone_set("Asia/Bangkok");
$date = date("Ymd");	
$numrand = (mt_rand());

$data = json_decode(file_get_contents("php://input"));

$MEMBER_NAME = $data->MEMBER_NAME;
$MEMBER_SURNAME = $data->MEMBER_SURNAME;
$MEMBER_GENDER = $data->MEMBER_GENDER;
$MEMBER_BIRTH = $data->MEMBER_BIRTH;
$MEMBER_TEL = $data->MEMBER_TEL;
$MEMBER_HOUSE = $data->MEMBER_HOUSE;
$MEMBER_VILLAGE = $data->MEMBER_VILLAGE;
$MEMBER_ALLEY = $data->MEMBER_ALLEY;
$province_id = $data->province_id;
$amphure_id = $data->amphure_id;
$district_id = $data->district_id;
$MEMBER_POSTCODE = $data->MEMBER_POSTCODE;
$MEMBER_EMAIL = $data->MEMBER_EMAIL;
$MEMBER_PASSWORD = $data->MEMBER_PASSWORD;
$MEMBER_ID = $data->MEMBER_ID;
$MEMBER_PHOTO = $data->MEMBER_PHOTO;
$BANK_BRANCH = $data->BANK_BRANCH;
$ACCOUNT_BANK_NAME = $data->ACCOUNT_BANK_NAME;
$ACCOUNT_BANK_NUMBER = $data->ACCOUNT_BANK_NUMBER;

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
$password_hash = password_hash($MEMBER_PASSWORD, PASSWORD_BCRYPT);
$user_activation_code = md5(rand());

$rr = " ";

$path="profile_kyc/";  
$type = strrchr($_FILES['MEMBER_PHOTO']['name'],".");
$newname = $date.$rr.$MEMBER_NAME.$rr.$MEMBER_SURNAME.$type;
$path_copy=$path.$newname;
$path_link="profile_kyc/".$newname;
move_uploaded_file($_FILES['MEMBER_PHOTO']['tmp_name'],$path_copy);  

if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){
        case 'registion':

        $sql_check = "SELECT MEMBER_CARD_NUMBER FROM member WHERE MEMBER_CARD_NUMBER = '".$MEMBER_ID."'";
        $result_check = mysqli_query($conn, $sql_check) or die(mysqli_error());
        $num=mysqli_num_rows($result_check);
        if($num > 0){
            echo "Error";
        }else{    

        $sql_insert = "INSERT INTO member(MEMBER_CARD_NUMBER, MEMBER_NAME, MEMBER_SERNAME, MEMBER_GENDER, MEMBER_BIRTH, MEMBER_TEL, MEMBER_HOUSE, MEMBER_VILLAGE, MEMBER_ALLEY, PROVINCE_ID, AMPHURE_ID, DISTRINCT_ID, POSTCODE_ID, MEMBER_PHOTO, MEMBER_MAIL, MEMBER_PASSWORD, MEMBER_STATUS, MEMBER_SUBSCRIPTION, MEMBER_ACTIVATE_CODE)
                       VALUES ('".$_POST['MEMBER_ID']."','".$_POST['MEMBER_NAME']."', '".$_POST['MEMBER_SURNAME']."', '".$_POST['MEMBER_GENDER']."', '".$_POST['MEMBER_BIRTH']."', '".$_POST['MEMBER_TEL']."', 
                                   '".$_POST['MEMBER_HOUSE']."', '".$_POST['MEMBER_VILLAGE']."', '".$_POST['MEMBER_ALLEY']."', '".$_POST['province_id']."', '".$_POST['amphure_id']."', 
                                   '".$_POST['district_id']."' , '".$_POST['MEMBER_POSTCODE']."', '$newname', '".$_POST['MEMBER_EMAIL']."', '".$password_hash."', 'not verified', current_timestamp(), '".$user_activation_code."')"; 
        // echo($sql_insert);
        // die();
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());
        

        $sql_bank = "INSERT INTO account_bank(BANK_BRANCH, ACCOUNT_BANK_NAME, ACCOUNT_BANK_NUMBER, ACCOUNT_BANK_STATUS, ACCOUNT_BANK_DATE, MEMBER_ID, ACCOUNT_TYPE_ID, BANK_ID) 
                     VALUES ('".$_POST['BANK_BRANCH']."', '".$_POST['ACCOUNT_BANK_NAME']."', '".$_POST['ACCOUNT_BANK_NUMBER']."', NULL, current_timestamp(), '".$_POST['MEMBER_ID']."', NULL, NULL)";
        $result_bank = mysqli_query($conn, $sql_bank) or die(mysqli_error());

        if(isset($result_insert)){
			$base_url = "http://localhost/investment_ico/";  //change this baseurl value as per your file path
			$mail_body = "
			<p>Hi ".$_POST['MEMBER_NAME']." ".$_POST['MEMBER_SURNAME'].",</p>
            <p>Please Open this link to verified your email address - ".$base_url."email_verification.php?member_activation_code=".$user_activation_code."
            ";
			require 'class/class.phpmailer.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();								
			$mail->Host = 'smtp.gmail.com';		
			$mail->Port = 587;								
			$mail->SMTPAuth = true;							
			$mail->Username = 'junghwn18@gmail.com';				
			$mail->Password = 'chinjung1234';			
			$mail->SMTPSecure = 'tls';				
			$mail->From = 'junghwn18@gmail.com';			
			$mail->FromName = 'CHINJUNGLIVE';			
			$mail->AddAddress($_POST['MEMBER_EMAIL'], $_POST['MEMBER_NAME']);				
			$mail->WordWrap = 50;							
			$mail->IsHTML(true);										
			$mail->Subject = 'Email Verification';			
			$mail->Body = $mail_body;						
			if($mail->Send())								
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}
        }

        echo "Success";

    }
        
        break;    
    }
}

?>