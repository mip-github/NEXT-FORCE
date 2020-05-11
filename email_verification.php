<?php

require_once __DIR__.'/require/config_pdo.php';

$message = '';

if(isset($_GET['member_activation_code'])){
	$sql = "SELECT * FROM member WHERE MEMBER_ACTIVATE_CODE = :MEMBER_ACTIVATE_CODE";
	$stmt=$db->prepare($sql);
	$stmt->execute(
		array(
			':MEMBER_ACTIVATE_CODE'			=>	$_GET['member_activation_code']
		)
    );
    
	$no_of_row = $stmt->rowCount();
	
	if($no_of_row > 0){
		$result=$stmt->fetchAll();
		foreach($result as $row){
			if($row['MEMBER_STATUS'] == 'not verified'){
				$update_query = "UPDATE member 
                                 SET MEMBER_STATUS = 'verified' 
				                 WHERE MEMBER_ID = '".$row['MEMBER_ID']."'";
				$stmt=$db->prepare($update_query);
				$stmt->execute();
				$sub_result=$stmt->fetchAll();
				if(isset($sub_result)){
					echo "<script>";
					echo "window.location.href='index.php';";
					echo "</script>";
                }
                
			}else{
                $message = '<label class="text-info">Your Email Address Already Verified</label>';
                echo "<script>";
                echo "window.location.href='index.php';";
                echo "</script>";
			}
        }
        
	}else{
		$message = '<label class="text-danger">Invalid Link</label>';
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Register Login Script with Email Verification</title>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<div class="container">
			<h1 align="center">PHP Register Login Script with Email Verification</h1>
		
			<h3><?php echo $message; ?></h3>
			
		</div>
	
	</body>
	
</html>