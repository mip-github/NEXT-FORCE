<?php 

session_start();  
require_once __DIR__.'/require/config_pdo.php';
require_once __DIR__.'/require/config.php';

$MEMBER_ID = $_SESSION['MEMBER_ID'];
$token = "40b993475cc3a8223b20a7cb602cccc9";

$sql = "SELECT * FROM member WHERE MEMBER_ID = :MEMBER_ID";
$stmt=$db->prepare($sql);
$stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$MEMBER_ID = $row['MEMBER_ID'];
$MEMBER_CARD_NUMBER = $row['MEMBER_CARD_NUMBER'];
$NAME = $row['MEMBER_NAME'];
$SERNAME = $row['MEMBER_SERNAME'];

$sql3 = "SELECT * FROM project_buy WHERE MEMBER_ID = :MEMBER_ID AND STATUS = 0";
$stmt=$db->prepare($sql3);
$stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
$stmt->execute();
$row3=$stmt->fetch(PDO::FETCH_ASSOC);
$PROJECT_PAYMENT = $row3['PROJECT_BUY_ID'];
$PROJECT_JOIN = $row3['PROJECT_ID'];

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
  CURLOPT_POSTFIELDS =>"{\n \"token\" : \"40b993475cc3a8223b20a7cb602cccc9\",\n \"amount\" : \"2\",\n \"note\" : \"\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$rpe = json_decode($response);
$qrcode = $rpe->rawQrCode; 


?>


<!doctype html>
<html class="no-js" lang="zxx">
<?php require_once __DIR__ . '/require/head_profile.php';?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
a.linkhover:hover {
    text-decoration: none;
    font-size: 26px;
    border-radius: 100px;
    padding: 12px 30px;
    background-color: #f68400;
    color: #000;
}
</style>
<style>
* {
    box-sizing: border-box
}

.tab {
    float: left;
    border: 1px solid #d9edf7;
    background-color: #d9edf7;
    width: 30%;
    height: 168px;
}

.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 22px;
    color: black;
    font-family: 'DB Heavent', DB Heavent;
}

.tab button:hover {
    background-color: #eee;
    color: black;
}

.tab button.active {
    background-color: #ddd;
    color: black;
    font-size: 24px;
    font-family: 'DB Heavent', DB Heavent;
}

.tabcontent {
    display: none;
    float: left;
    padding: 0px 12px;
    /* border: 1px solid #ddd; */
    width: 70%;
    border-left: none;
    height: 150px;

}
</style>
<style>
.br {
    display: block;
    margin-bottom: 0em;
}
</style>

<body bgcolor=''>
    <header>
        <div class="header-area ">
            <?php require_once __DIR__.'/require/header_profile.php'; ?>
            <!-- header-end -->
            <!--เนื้อหา-->
            <div class="team" align='center'>
                <div class="boxed-box02">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            </br></br>
                            <div class="font08">การซื้อของฉัน</div>
                        </div>
                        <div class="form-group col-md-6">
                            </br>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home">ชำระเงิน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                        href="#menu1">----แจ้งหลักฐานการโอนเงิน----</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu2">สั่งซื้อสำเร็จ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group col-md-12">
                            <hr class="my-4" style="border-color: #006665;">
                        </div>
                    </div>
                    <!-- <form action="SaveUserProfile.php" method="POST" enctype="multipart/form-data" id="compaint_form"> -->
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'Lucknow')">โอนเงินผ่านธนาคาร<br>(Mobile-banking)</button>
                                <button class="tablinks" onclick="openCity(event, 'Mumbai')">วอลเลท (Wallet)</button>
                                <button class="tablinks" onclick="openCity(event, 'Mumbai1')">QR-Code</button>
                            </div>
                            <div id="Lucknow" class="tabcontent">
                                <h3 align='left'>เลือกวิธีชำระเงิน</h3>
                                <div class="widget">
                                    <div class="widget-body"></br>
                                        <img src="pic/Icon_ICO-42.png" alt="" style="height: 18px;" align="right">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state" style="width: 450px;">
                                                <img src="pic/th/bbl.png" alt="" style="width: 90px; height: 90px;"
                                                    align='left'>
                                                <table>
                                                    <th>&emsp;<label class="font13">ธนาคารกรุงเทพ (Bangkok Bank)</label>
                                                    </th>
                                                </table>
                                                <table>
                                                    <th>&emsp;เลขที่บัญชี :</th>
                                                    <td>&emsp;&emsp; 123-4-56789-0</td>
                                                </table>
                                                <table>
                                                    <th>&emsp;ชื่อที่บัญชี :</th>
                                                    <td>&emsp;&emsp;&nbsp; บริษัท มัลติ อินโนเวชั่น เอนยิเนียริ่ง จำกัด
                                                    </td>
                                                </table>
                                                <table>
                                                    <th>&emsp;สาขา :</th>
                                                    <td>&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp; แคราย</td>
                                                </table>
                                                <table>
                                                    <th>&emsp;ประเภทบัญชี :</th>
                                                    <td>&emsp; ออมทรัพย์</td>
                                                </table>
                                            </div>
                                        </div><Br>
                                        <img src="pic/Icon_ICO-42.png" alt="" style="height: 18px;" align="right">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state" style="width: 450px;">
                                                <img src="pic/th/scb.png" alt="" style="width: 90px; height: 90px;"
                                                    align='left'>
                                                <table>
                                                    <th>&emsp;<label class="font13">ธนาคารไทยพาณิชย์ (Siam Commercial
                                                            Bank)</label></th>
                                                </table>
                                                <table>
                                                    <th>&emsp;เลขที่บัญชี :</th>
                                                    <td>&emsp;&emsp; 123-4-56789-0</td>
                                                </table>
                                                <table>
                                                    <th>&emsp;ชื่อที่บัญชี :</th>
                                                    <td>&emsp;&emsp;&nbsp; บริษัท มัลติ อินโนเวชั่น เอนยิเนียริ่ง จำกัด
                                                    </td>
                                                </table>
                                                <table>
                                                    <th>&emsp;สาขา :</th>
                                                    <td>&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp; แคราย</td>
                                                </table>
                                                <table>
                                                    <th>&emsp;ประเภทบัญชี :</th>
                                                    <td>&emsp; ออมทรัพย์</td>
                                                </table>
                                            </div>
                                        </div><Br>
                                        <img src="pic/Icon_ICO-42.png" alt="" style="height: 18px;" align="right">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state" style="width: 450px;">
                                                <img src="pic/th/kbank.png" alt="" style="width: 90px; height: 90px;"
                                                    align='left'>
                                                <table>
                                                    <th>&emsp;<label class="font13">ธนาคารกลิกร (Kasikorn
                                                            Banking)</label></th>
                                                </table>
                                                <table>
                                                    <th>&emsp;เลขที่บัญชี :</th>
                                                    <td>&emsp;&emsp; 123-4-56789-0</td>
                                                </table>
                                                <table>
                                                    <th>&emsp;ชื่อที่บัญชี :</th>
                                                    <td>&emsp;&emsp;&nbsp; บริษัท มัลติ อินโนเวชั่น เอนยิเนียริ่ง จำกัด
                                                    </td>
                                                </table>
                                                <table>
                                                    <th>&emsp;สาขา :</th>
                                                    <td>&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp; แคราย</td>
                                                </table>
                                                <table>
                                                    <th>&emsp;ประเภทบัญชี :</th>
                                                    <td>&emsp; ออมทรัพย์</td>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="Mumbai" class="tabcontent">
                                <h3>Mumbai</h3>
                            </div>
                            <div id="Mumbai1" class="tabcontent">
                                <h3>Payment QR-Code</h3>
                                <img src="https://chart.googleapis.com/chart?chs=400x400&cht=qr&chl=<?php echo($qrcode);?>" />
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3 align='left'>
                                        <font style="color: #000; font-weight: 950;">สรุปการสั่งซื้อ</font>
                                    </h3>

                                    <?php


                                $sql1 = "SELECT SUM(PRICE) as SUM FROM project_buy WHERE MEMBER_ID = :MEMBER_ID AND STATUS = 0";
                                $stmt=$db->prepare($sql1);
                                $stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
                                $stmt->execute();
                                $row1=$stmt->fetch(PDO::FETCH_ASSOC);
                                    $SUM = $row1['SUM'];
                                    $SUM_VAT = $SUM * 7 / 100;
                                    $PROJECT_SUM = number_format($SUM_VAT); 

                                $sql2 = "SELECT * FROM project WHERE PROJECT_ID = :PROJECT_JOIN";
                                $stmt=$db->prepare($sql2);
                                $stmt->bindparam(':PROJECT_JOIN', $PROJECT_JOIN);
                                $stmt->execute();
                                $row2=$stmt->fetch(PDO::FETCH_ASSOC);
                                    $PROJECT_DLT = $row2['PROJECT_ID'];
                                    $PROJECT_NAME = $row2['PROJECT_NAME'];
                                    $PROJECT_NUM_UNIT = $row2['PROJECT_NUM_UNIT'];
                                    $PROJECT_THB = number_format($PROJECT_NUM_UNIT);     
                                
                                $sql_project = "SELECT * FROM project_buy WHERE MEMBER_ID = :MEMBER_ID AND STATUS = 0";
                                $stmt=$db->prepare($sql_project);
                                $stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
                                $stmt->execute();
                                while($row_project=$stmt->fetch(PDO::FETCH_ASSOC)){
                                    $PROJECT_BUY_ID = $row_project['PROJECT_BUY_ID'];
                                    $PROJECT_ID = $row_project['PROJECT_ID'];
                                    $SUM_VAT = $SUM * 7 / 100;
                                    $PROJECT_SUM = number_format($SUM_VAT); 
                                    $SUM_1 = $SUM + $SUM_VAT;
                                    $SUM_TOTAL = number_format($SUM_1);
                                    
                                    $SUM_2 = '1';

        
                                    

                                ?>

                                    <div class="alert alert-info" role="alert">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <h4 align='left'>
                                                    <font style="color: #000; font-weight: 950;"><?=$PROJECT_NAME?>
                                                    </font>
                                                </h4>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <a href="DeleteProject.php?id=<?=$PROJECT_BUY_ID?>" onclick="return confirm('คุณต้องการลบรายการนี้ ใช่หรือไม่ ?')"><img src="pic/Icon_ICO-45.png" alt="" style="height: 18px;" align="right"></a>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <h4 align='left'>
                                                    <font style="color: #000;"><?=$PROJECT_THB?> TCoin</font>
                                                </h4>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h4 align='right'>
                                                    <font style="color: #000;"><?=$PROJECT_THB?> THB</font>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <h3 align='left'>
                                                <font style="color: #000; font-weight: 950;">VAT 7%</font>
                                            </h3>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h3 align='right'>
                                                <font style="color: #000; font-weight: 950;"><?=$PROJECT_SUM?> THB
                                                </font>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <hr class="my-4" style="border-color: #ddd;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <h3 align='left'>
                                                <font style="color: #000; font-weight: 950;">รวมทั้งหมด</font>
                                            </h3>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h3 align='right'>
                                                <font style="color: #000; font-weight: 950;"><b><?=$SUM_TOTAL?> THB</b>
                                                </font>
                                            </h3>
                                            <h4 align='right'>
                                                <font style="color: #000; font-weight: 950;"><?=$SUM_TOTAL?> TCoin
                                                </font>
                                            </h4>
                                        </div>
                                    </div>
                                    <form action="https://www.t10assets.com/api/v1/ecommerce/payment/qrcode" method="POST" id="payment_form1"> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6" align='center'>
                                                <input type="hidden" name="token" value="<?=$token?>">
                                                <input type="hidden" name="amount" value="<?=$SUM_2?>">
                                                <input type="hidden" name="note" value="ICO">
                                                <button type="submit" name="submit" id="submit"
                                                    style="background: #696969; border-radius: 100px; padding: 5px 30px;">
                                                    <font
                                                        style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">
                                                        ยืนยันการชำระเงิน</font>
                                                </button>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <h3 align='left'>
                                        <font style="color: #000; font-weight: 950;">สรุปการสั่งซื้อ</font>
                                    </h3>

                                    <?php


                                $sql1 = "SELECT SUM(PRICE) as SUM FROM project_buy WHERE MEMBER_ID = :MEMBER_ID AND STATUS = 0";
                                $stmt=$db->prepare($sql1);
                                $stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
                                $stmt->execute();
                                $row1=$stmt->fetch(PDO::FETCH_ASSOC);
                                    $SUM = $row1['SUM'];
                                    $SUM_VAT = $SUM * 7 / 100;
                                    $PROJECT_SUM = number_format($SUM_VAT); 

                                $sql2 = "SELECT * FROM project WHERE PROJECT_ID = :PROJECT_JOIN";
                                $stmt=$db->prepare($sql2);
                                $stmt->bindparam(':PROJECT_JOIN', $PROJECT_JOIN);
                                $stmt->execute();
                                $row2=$stmt->fetch(PDO::FETCH_ASSOC);
                                    $PROJECT_NAME = $row2['PROJECT_NAME'];
                                    $PROJECT_NUM_UNIT = $row2['PROJECT_NUM_UNIT'];
                                    $PROJECT_THB = number_format($PROJECT_NUM_UNIT);     
                                
                                $sql_project = "SELECT * FROM project_buy WHERE MEMBER_ID = :MEMBER_ID AND STATUS = 0";
                                $stmt=$db->prepare($sql_project);
                                $stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
                                $stmt->execute();
                                while($row_project=$stmt->fetch(PDO::FETCH_ASSOC)){
                                    $PROJECT_BUY_ID = $row['PROJECT_BUY_ID'];
                                    $PROJECT_ID = $row_project['PROJECT_ID'];
                                    $SUM_VAT = $SUM * 7 / 100;
                                    $PROJECT_SUM = number_format($SUM_VAT); 
                                    $SUM_1 = $SUM + $SUM_VAT;
                                    $SUM_TOTAL = number_format($SUM_1); 

        
                                    

                                ?>

                                    <div class="alert alert-info" role="alert">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <h4 align='left'>
                                                    <font style="color: #000; font-weight: 950;"><?=$PROJECT_NAME?>
                                                    </font>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <h4 align='left'>
                                                    <font style="color: #000;"><?=$PROJECT_THB?> TCoin</font>
                                                </h4>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h4 align='right'>
                                                    <font style="color: #000;"><?=$PROJECT_THB?> THB</font>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <h3 align='left'>
                                                <font style="color: #000; font-weight: 950;">VAT 7%</font>
                                            </h3>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h3 align='right'>
                                                <font style="color: #000; font-weight: 950;"><?=$PROJECT_SUM?> THB
                                                </font>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <hr class="my-4" style="border-color: #ddd;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <h3 align='left'>
                                                <font style="color: #000; font-weight: 950;">รวมทั้งหมด</font>
                                            </h3>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h3 align='right'>
                                                <font style="color: #000; font-weight: 950;"><b><?=$SUM_TOTAL?> THB</b>
                                                </font>
                                            </h3>
                                            <h4 align='right'>
                                                <font style="color: #000; font-weight: 950;"><?=$SUM_TOTAL?> TCoin
                                                </font>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h4 align='left'>
                                                <font style="color: #000; font-weight: 950;">สถานะการจ่ายเงิน
                                                    (กรุณาอัพโหลดเอกสารการจ่ายเงินของคุณ (jpg. , pdf.))</font>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h4 align='left'><a data-toggle="modal" data-target="#myModal"><img
                                                        src="pic/download.png"
                                                        style="width: 60px; height: 60px;">&emsp;อัพโหลดรูปภาพ/ไฟล์</a></a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                    </hr>
                </div>
            </div>
            <aside id="sticky-social">
                <ul>
                    <li><a href="UserBuy.php" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-08.png'></img><span>&nbsp;การซื้อของฉัน</span></a></li>
                    <li><a href="UserProfile.php" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-02.png'><span>&nbsp;ข้อมูลส่วนตัว</span></a></li>
                    <li><a href="UserVerify.php" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-03.png'><span>&nbsp;การยืนยันตัวตน</span></a></li>
                    <li><a href="UserBanking.php" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-04.png'><span>&nbsp;บัญชีธนาคาร</span></a></li>
                    <li><a href="UserCompaint.php" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-05.png'><span>
                                &nbsp;แจ้งเรื่องร้องเรียน</span></a></li>
                    <li><a href="#" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-06.png'><span>&nbsp;ประวัติรายงาน</span></a></li>
                    <li><a href="#" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-07.png'><span>&nbsp;ตั้งค่าภาษา</span></a></li>
                </ul>
            </aside>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" style="max-height: 500px;">
                <form action="SaveUserProfile.php" method="POST" enctype="multipart/form-data" id="payment_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="font09">ยอดชำระทั้งหมด<font style="color: red;">*</font>
                                    </div><br>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg" name="TOTAL" id="TOTAL">
                                    </div><br>
                                    <div class="font09">วัน/เดือน/ปี เวลาที่โอน<font style="color: red;">*</font>
                                    </div><br>
                                    <div class="input-group input-group-lg">
                                        <input type="datetime-local" class="form-control input-lg" name="DATE" id="DATE">
                                    </div><br>
                                    <div class="font09">โอนไปยังธนาคาร<font style="color: red;">*</font>
                                    </div><br>
                                    <div class="input-group">
                                        <select class="form-control form-control-lg" id="BANK_TRANSFER" name="BANK_TRANSFER">
                                            <option>-- เลือกธนาคาร --</option>
                                            <?php

                                                $sql_bank = "SELECT * FROM bank_thailand";
                                                $res_bank = mysqli_query($conn, $sql_bank);
                                                while ($row_bank = mysqli_fetch_assoc($res_bank)) {
                                                    echo '<option value="'.$row_bank['BANK_ID'].'">'.$row_bank['BANK_NAME'].'</option>';                
                                                }

                                             ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="font09">แนบหลักฐาน (pdf , png)<font style="color: red;">*</font>
                                    </div><br>
                                    <div class="input-group">
                                        <input type="file" class="form-control input-lg" name="FILES" id="FILES"
                                            data-validation-max-size="25mb" data-validation="mime size"
                                            data-validation-allowing="jpg, pdf" onchange="readURL(this);">
                                    </div><br>
                                    <img id="picture" src="#"><br><BR>
                                    <input type="hidden" name="do" value="payment">
                                    <input type="hidden" name="MEMBER_ID" value="<?=$MEMBER_ID?>">
                                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" id="submit"
                    style="background-color: #f68400; border-radius: 100px; padding: 5px 40px;">
                    <font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">
                        ยืนยันการชำระเงิน</font>
                </button>
            </div>
        </div>
        </form>
        </div>
        </div>
</body>

<?php require_once __DIR__ . '/require/script.php'; ?>
<script src="require/jquery.min.js"></script>
<script src="require/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<!-- <script>
// $("#payment_form").ready(function() {
//     console.log( "1234" );
// });
$("#payment_form").submit(function(event) {
    var _this = $(this)
    $.ajax({
        type: "POST",
        url: "register_query.php",
        data: _this.serialize(),
        //dataType: "json",
        success: function(response) {
            console.log(response)
            alert('Complete Update Profile')
            // location.reload();
        }
    })
    event.preventDefault();
});
</script> -->
<script type="text/javascript">
$(document).ready(function(e) {
    $("#payment_form1").on('submit', (function(e) {
        e.preventDefault();
        $.ajax({
            url: "https://www.t10assets.com/api/v1/ecommerce/payment/qrcode.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                console.log(response)
                if (response == "Error") {
                    swal("", {
                        icon: "warning",
                    });
                }
                if (response == "Success") {
                    swal("บันทึกข้อมูลเสร็จสิ้น", {
                        icon: "success",
                    });
                setTimeout(function(){
                window.location.href = "UserPayment.php";
                    },5000);    
                }
            },
            error: function() {}
        });
    }));
});
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $("#payment_form").on('submit', (function(e) {
        e.preventDefault();
        $.ajax({
            url: "SaveUserProfile.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                console.log(response)
                if (response == "Error") {
                    swal("", {
                        icon: "warning",
                    });
                }
                if (response == "Success") {
                    swal("บันทึกข้อมูลเสร็จสิ้น", {
                        icon: "success",
                    });
                }
            },
            error: function() {}
        });
    }));
});
</script>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#picture')
                .attr('src', e.target.result)
                .width(150)
                .height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

</html>