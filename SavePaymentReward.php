<?php

session_start();

require_once __DIR__.'/require/config.php';
require_once __DIR__.'/require/config_pdo.php';

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


if(isset($_POST["do"]) && $_POST["do"] != "" ){
	$do = $_POST["do"];
	switch($do){
              
        case 'get_reward':

            $sql = "SELECT amount FROM project_reward WHERE REWARD_ID = :ID";
            $ID = $_POST["REWARD_ID"];
            $stmt=$db->prepare($sql);
            $stmt->bindparam(':ID',$ID);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($row);

        break;

        case 'payment_reward':

        $REWARD_ID = $_POST['REWARD_ID'];   
        $amount = $_POST['amount'];   
        $NOTE = $_POST['NOTE'];   
        $SUM_REWARD = $_POST['SUM_REWARD'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.t10assets.com/api/v1/ecommerce/payment/qrcode",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\n \"token\" : \"40b993475cc3a8223b20a7cb602cccc9\",\n \"amount\" : \"$amount\",\n \"note\" : \"$NOTE\"\n}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $rpe = json_decode($response);
        $qrcode = $rpe->rawQrCode;
          
        $sql_insert = "INSERT INTO `reward_buy`(`REWARD_ID`, `amount`, `NOTE`, `QRCODE`, `MEMBER_ID`, `CREATE_AT`) VALUES ('$REWARD_ID', '$amount', '$NOTE', '$qrcode', '$MEMBER_ID', current_timestamp())";
        $result_insert = mysqli_query($conn, $sql_insert) or die(mysqli_error());  
        
        $sql_select = "SELECT REWARD_SUM FROM project_reward WHERE REWARD_ID = :REWARD_ID";
        $stmt1=$db->prepare($sql_select);
        $stmt1->bindparam(':REWARD_ID', $REWARD_ID);
        $stmt1->execute();
        $row1=$stmt1->fetch(PDO::FETCH_ASSOC);
        $REWARD_SUM = $row1['REWARD_SUM'];
        
        $TOTAL = $REWARD_SUM + $SUM_REWARD;

        $sql_update = "UPDATE project_reward SET REWARD_SUM = '".$TOTAL."'
                                           WHERE REWARD_ID = '".$REWARD_ID."'"; 
        $result_update = mysqli_query($conn, $sql_update) or die(mysqli_error());                                   
    
            echo "Success";
            
        break;  
    }
}

?>