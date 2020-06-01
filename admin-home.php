<!doctype html>
<html class="no-js" lang="en">

<head>
<?php 

require_once __DIR__ . '/require/admin/head.php'; 
require_once __DIR__.'/require/config.php';
require_once __DIR__.'/require/config_pdo.php';

$MEMBER_CARD = $_POST['MEMBER_CARD_NUMBER'];
$sql_photo = "SELECT MEMBER_PHOTO FROM member WHERE MEMBER_CARD_NUMBER = :MEMBER_CARD";
$stmt=$db->prepare($sql_photo);
$stmt->bindparam(':MEMBER_CARD_NUMBER', $MEMBER_CARD);
$stmt->execute();
$row_photo=$stmt->fetch(PDO::FETCH_ASSOC);
$MEMBER_PHOTO = $row_photo['MEMBER_PHOTO'];


$sql1 = "SELECT COUNT(MEMBER_ID) as COUNT FROM member";
$stmt=$db->prepare($sql1);
$stmt->execute();
$row1=$stmt->fetch(PDO::FETCH_ASSOC);
    $COUNT = $row1['COUNT'];

$sql = "SELECT COUNT(MEMBER_ID) as COUNT1 FROM member WHERE MEMBER_KYC = 0";
$stmt=$db->prepare($sql);
$stmt->execute();
$row4=$stmt->fetch(PDO::FETCH_ASSOC);
    $COUNT1 = $row4['COUNT1'];

$sql2 = "SELECT COUNT(MEMBER_ID) as COUNT FROM member WHERE MEMBER_KYC = 1";
$stmt=$db->prepare($sql2);
$stmt->execute();
$row2=$stmt->fetch(PDO::FETCH_ASSOC);
    $COUNT2 = $row2['COUNT'];  

$sql3 = "SELECT COUNT(MEMBER_ID) as COUNT FROM member WHERE MEMBER_KYC = 2";
$stmt=$db->prepare($sql3);
$stmt->execute();
$row3=$stmt->fetch(PDO::FETCH_ASSOC);
    $COUNT3 = $row3['COUNT'];    
    
$rpe = json_decode($response);
$MEMBER_PHOTO_1 = $rpe->MEMBER_PHOTO;    
    
?>
</head>
<style>
.modal-lg {
    max-width: 65% !important;
}
</style>

<body>
    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">

            <?php require_once __DIR__ . '/require/admin/sidebar.php';?>

            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <div class="card">
                                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill"
                                            href="#current-month" role="tab" aria-controls="pills-timeline"
                                            aria-selected="true">ทั้งหมด(<?=$COUNT?>)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month"
                                            role="tab" aria-controls="pills-profile"
                                            aria-selected="false">รอตรวจสอบ(<?=$COUNT1?>)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill"
                                            href="#previous-month" role="tab" aria-controls="pills-setting"
                                            aria-selected="false">เอกสารไม่ครบ/ไม่สมบูรณ์(<?=$COUNT2?>)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-setting1-tab" data-toggle="pill"
                                            href="#previous1-month" role="tab" aria-controls="pills-setting1"
                                            aria-selected="false">ตรวจสอบเรียบร้อย(<?=$COUNT3?>)</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="current-month" role="tabpanel"
                                        aria-labelledby="pills-timeline-tab">
                                        <div class="card-body">
                                            <h5>ข้อมูลสมาชิกทั้งหมด</h5>
                                            <hr>
                                            <table id="data_table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>หมายเลขบัตรประชาชน/หนังสือเดินทางข</th>
                                                        <th class="nosort">ชื่อสมาชิก</th>
                                                        <th>สถานะ(ยืนยันตัวตน)</th>
                                                        <th>จำนวนเงินลงทุน(MCOIN)</th>
                                                        <th><i class="ik ik-setting"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                            $sql = "SELECT * FROM member";
                                            $stmt=$db->prepare($sql);
                                            $stmt->execute();
                                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                               $MEMBER_ID = $row['MEMBER_ID'];
                                               $MEMBER_CARD_NUMBER = $row['MEMBER_CARD_NUMBER'];
                                               $MEMBER_NAME = $row['MEMBER_NAME'];
                                               $MEMBER_SERNAME = $row['MEMBER_SERNAME'];
                                               $MEMBER_KYC = $row['MEMBER_KYC'];
                                               $DONATE = $row['DONATE'];
                                               $MEMBER_PHOTO = $row['MEMBER_PHOTO'];
                                            ?>
                                                    <tr>
                                                        <td><?=$MEMBER_CARD_NUMBER?></td>
                                                        <td><?=$MEMBER_NAME?> <?=$MEMBER_SERNAME?></td>
                                                        <td>
                                                            <?php 
                                                                if($MEMBER_KYC == 0){
                                                                    echo'<button type="button" class="btn btn-warning">รอตรวจสอบ</button>';
                                                                }else if($MEMBER_KYC == 1){
                                                                    echo'<button type="button" class="btn btn-danger">เอกสารไม่สมบุรณ์</button>';
                                                                }else{
                                                                    echo'<button type="button" class="btn btn-success">ตรวจสอบเรียบร้อบ</button>';
                                                                }
                                                            
                                                            ?>
                                                        </td>
                                                        <td><?=$DONATE?></td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="#" id="link_modal" data-toggle="modal" data-target="#EditModal" data-id="<?=$MEMBER_CARD_NUMBER;?>"><i class="ik ik-eye"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="last-month" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="card-body">
                                            <h5>ข้อมูลสมาชิกที่รอตรวจสอบ</h5>
                                            <hr>
                                            <table id="data_table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>หมายเลขบัตรประชาชน/หนังสือเดินทางข</th>
                                                        <th class="nosort">ชื่อสมาชิก</th>
                                                        <th>สถานะ(ยืนยันตัวตน)</th>
                                                        <th>จำนวนเงินลงทุน(MCOIN)</th>
                                                        <th><i class="ik ik-setting"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                            $sql = "SELECT * FROM member WHERE MEMBER_KYC = 0";
                                            $stmt=$db->prepare($sql);
                                            $stmt->execute();
                                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                               $MEMBER_ID = $row['MEMBER_ID'];
                                               $MEMBER_CARD_NUMBER = $row['MEMBER_CARD_NUMBER'];
                                               $MEMBER_NAME = $row['MEMBER_NAME'];
                                               $MEMBER_SERNAME = $row['MEMBER_SERNAME'];
                                               $MEMBER_KYC = $row['MEMBER_KYC'];
                                               $DONATE = $row['DONATE'];
                                            ?>
                                                    <tr>
                                                        <td><?=$MEMBER_CARD_NUMBER?></td>
                                                        <td><?=$MEMBER_NAME?> <?=$MEMBER_SERNAME?></td>
                                                        <td>
                                                            <?php 
                                                                if($MEMBER_KYC == 0){
                                                                    echo'<button type="button" class="btn btn-warning">รอตรวจสอบ</button>';
                                                                }else if($MEMBER_KYC == 1){
                                                                    echo'<button type="button" class="btn btn-danger">เอกสารไม่สมบุรณ์</button>';
                                                                }else{
                                                                    echo'<button type="button" class="btn btn-success">ตรวจสอบเรียบร้อบ</button>';
                                                                }
                                                            
                                                            ?>
                                                        </td>
                                                        <td><?=$DONATE?></td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="previous-month" role="tabpanel"
                                        aria-labelledby="pills-setting-tab">
                                        <div class="card-body">
                                            <h5>ข้อมูลสมาชิกที่เอกสารไม่สมบูรณ์</h5>
                                            <hr>
                                            <table id="data_table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>หมายเลขบัตรประชาชน/หนังสือเดินทางข</th>
                                                        <th class="nosort">ชื่อสมาชิก</th>
                                                        <th>สถานะ(ยืนยันตัวตน)</th>
                                                        <th>จำนวนเงินลงทุน(MCOIN)</th>
                                                        <th><i class="ik ik-setting"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                            $sql = "SELECT * FROM member WHERE MEMBER_KYC = 1";
                                            $stmt=$db->prepare($sql);
                                            $stmt->execute();
                                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                               $MEMBER_ID = $row['MEMBER_ID'];
                                               $MEMBER_CARD_NUMBER = $row['MEMBER_CARD_NUMBER'];
                                               $MEMBER_NAME = $row['MEMBER_NAME'];
                                               $MEMBER_SERNAME = $row['MEMBER_SERNAME'];
                                               $MEMBER_KYC = $row['MEMBER_KYC'];
                                               $DONATE = $row['DONATE'];
                                            ?>
                                                    <tr>
                                                        <td><?=$MEMBER_CARD_NUMBER?></td>
                                                        <td><?=$MEMBER_NAME?> <?=$MEMBER_SERNAME?></td>
                                                        <td>
                                                            <?php 
                                                                if($MEMBER_KYC == 0){
                                                                    echo'<button type="button" class="btn btn-warning">รอตรวจสอบ</button>';
                                                                }else if($MEMBER_KYC == 1){
                                                                    echo'<button type="button" class="btn btn-danger">เอกสารไม่สมบุรณ์</button>';
                                                                }else{
                                                                    echo'<button type="button" class="btn btn-success">ตรวจสอบเรียบร้อบ</button>';
                                                                }
                                                            
                                                            ?>
                                                        </td>
                                                        <td><?=$DONATE?></td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="previous1-month" role="tabpanel"
                                        aria-labelledby="pills-setting1-tab">
                                        <div class="card-body">
                                            <h5>ข้อมูลสมาชิกที่เอกสารไม่สมบูรณ์</h5>
                                            <hr>
                                            <table id="data_table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>หมายเลขบัตรประชาชน/หนังสือเดินทางข</th>
                                                        <th class="nosort">ชื่อสมาชิก</th>
                                                        <th>สถานะ(ยืนยันตัวตน)</th>
                                                        <th>จำนวนเงินลงทุน(MCOIN)</th>
                                                        <th><i class="ik ik-setting"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                            $sql = "SELECT * FROM member WHERE MEMBER_KYC = 2";
                                            $stmt=$db->prepare($sql);
                                            $stmt->execute();
                                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                               $MEMBER_ID = $row['MEMBER_ID'];
                                               $MEMBER_CARD_NUMBER = $row['MEMBER_CARD_NUMBER'];
                                               $MEMBER_NAME = $row['MEMBER_NAME'];
                                               $MEMBER_SERNAME = $row['MEMBER_SERNAME'];
                                               $MEMBER_KYC = $row['MEMBER_KYC'];
                                               $DONATE = $row['DONATE'];
                                            ?>
                                                    <tr>
                                                        <td><?=$MEMBER_CARD_NUMBER?></td>
                                                        <td><?=$MEMBER_NAME?> <?=$MEMBER_SERNAME?></td>
                                                        <td>
                                                            <?php 
                                                                if($MEMBER_KYC == 0){
                                                                    echo'<button type="button" class="btn btn-warning">รอตรวจสอบ</button>';
                                                                }else if($MEMBER_KYC == 1){
                                                                    echo'<button type="button" class="btn btn-danger">เอกสารไม่สมบุรณ์</button>';
                                                                }else{
                                                                    echo'<button type="button" class="btn btn-success">ตรวจสอบเรียบร้อบ</button>';
                                                                }
                                                            
                                                            ?>
                                                        </td>
                                                        <td><?=$DONATE?></td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <button type="button" id="link_modal"
                                                                    data-toggle="modal" data-target="#exampleModal"
                                                                    data-id="<?=$TRANSACTION_ID;?>"
                                                                    class="btn btn-success btn-sm editbtn"><i
                                                                        class="fas fa-pencil-alt"></i></button>
                                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="pic/AW_Icon_V1-15.png" width="20" /> &nbsp;
                                        <h3>แจ้งเตือนเงินเข้าระบบ</h3>
                                    </div>
                                    <table class="table table-hover mb-0 without-header">
                                        <tbody>
                                            <div>
                                                <tr>
                                                    <td class="text-left">
                                                        <h6 class="fw-700">Colleen Hurst</h6></br>
                                                        <div class="d-inline-block">
                                                            <p class="text-muted mb-0">หมายเลขสมาชิก</p>
                                                            <p class="text-muted mb-0">ประเภทการโอนเงิน</p>
                                                            <p class="text-muted mb-0">ธนาคาร</p>
                                                            <p class="text-muted mb-0">เลขที่บัญชี</p>
                                                            <p class="text-muted mb-0">ประเภทบัญชี</p>
                                                            <p class="text-muted mb-0">วันที่โอน</p>
                                                            <p class="text-muted mb-0">เวลาที่โอน</p>
                                                            <p class="text-muted mb-0">จำนวนที่โอน</p></br>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <span
                                                            class="badge badge-pill badge-warning mb-1">รอตรวจสอบ</span>
                                                        <div class="d-inline-block"><br><br>
                                                            <p class="text-muted mb-0">34567891021235A</p>
                                                            <p class="text-muted mb-0">โอนเงินผ่านะนาคาร</p>
                                                            <p class="text-muted mb-0">ธนาคารกรุงเทพ</p>
                                                            <p class="text-muted mb-0">123-4-56789-0</p>
                                                            <p class="text-muted mb-0">ออมทรัพย์</p>
                                                            <p class="text-muted mb-0">18/03/2020</p>
                                                            <p class="text-muted mb-0">15:41</p>
                                                            <p class="text-muted mb-0">500 THB</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="mb-0">ดูรูปหลักฐาน</p><br>
                                                        <img src="pic/slip.jpeg" width="120" />
                                                    </td>
                                                    <td class="text-right">
                                                        <button type="button"
                                                            class="btn btn-success">ยืนยันการโอน</button></br></br>
                                                        <button type="button"
                                                            class="btn btn-secondary">หลักฐานไม่ถูกต้อง</button>
                                                    </td>
                                                </tr>
                                            </div>

                                        </tbody>
                                    </table></br></br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade exampleModal" id="EditModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="register_query.php" method="POST" id="EditModal" enctype="multipart/form-data">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4"><b>
                                                            <font
                                                                style="color: #006665; font-size: 26px; font-family: 'DB Heavent', DB Heavent;">
                                                                ข้อมูลสมาชิก</font>
                                                        </b></label>
                                                    <hr style="border-color: #006665;">
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">อีเมล</label>
                                                    <input type="text" class="form-control" id="MEMBER_MAIL" name="MEMBER_MAIL">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4"><b>
                                                            <font
                                                                style="color: #006665; font-size: 26px; font-family: 'DB Heavent', DB Heavent;">
                                                                ข้อมูลส่วนตัว</font>
                                                        </b></label>
                                                    <hr style="border-color: #006665;">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">วัน/เดือน/ปีเกิด</label>
                                                    <input type="text" class="form-control" id="MEMBER_BIRTH" name="MEMBER_BIRTH">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">เบอร์โทรศัพท์</label>
                                                    <input type="text" class="form-control" id="MEMBER_TEL" name="MEMBER_TEL">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">เพศ</label>
                                                    <input type="text" class="form-control" id="MEMBER_GENDER" name="MEMBER_GENDER">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4"><b>
                                                            <font
                                                                style="color: #006665; font-size: 26px; font-family: 'DB Heavent', DB Heavent;">
                                                                ข้อมูลที่อยู่</font>
                                                        </b></label>
                                                    <hr style="border-color: #006665;">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">บ้านเลขที่</label>
                                                    <input type="text" class="form-control" id="MEMBER_HOUSE" name="MEMBER_HOUSE">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">หมู่บ้าน</label>
                                                    <input type="text" class="form-control" id="MEMBER_VILLAGE"
                                                        name="MEMBER_VILLAGE">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">ซอย</label>
                                                    <input type="text" class="form-control" id="MEMBER_ALLEY" name="MEMBER_ALLEY">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">จังหวัด</label>
                                                    <input type="text" class="form-control" id="PROVINCE_ID" name="name_pro">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">เขต/อำเภอ</label>
                                                    <input type="text" class="form-control" id="AMPHURE_ID" name="name_am">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">แขวง/ตำบล</label>
                                                    <input type="text" class="form-control" id="DISTRINCT_ID" name="name_th">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">รหัสไปรษณีย์</label>
                                                    <input type="text" class="form-control" id="POSTCODE_ID" name="POSTCODE_ID">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4"><b>
                                                            <font
                                                                style="color: #006665; font-size: 26px; font-family: 'DB Heavent', DB Heavent;">
                                                                บัญชีธนาคาร</font>
                                                        </b></label>
                                                    <hr style="border-color: #006665;">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">ชื่อธนาคาร</label>
                                                    <input type="text" class="form-control" id="BANK_ID" name="BANK_ID">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">สาขาที่เปิดใช้บัญชี</label>
                                                    <input type="text" class="form-control" id="BANK_BRANCH" name="BANK_BRANCH">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">ประเภทบัญชี</label>
                                                    <input type="text" class="form-control" id="ACCOUNT_TYPE_NAME"
                                                        name="ACCOUNT_TYPE_NAME">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">หมายเลขบัญชี</label>
                                                    <input type="text" class="form-control" id="ACCOUNT_BANK_NUMBER"
                                                        name="ACCOUNT_BANK_NUMBER">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">ชื่อบัญชี</label>
                                                    <input type="text" class="form-control" id="ACCOUNT_BANK_NAME"
                                                        name="ACCOUNT_BANK_NAME">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="text-center">
                                                <img src="pic/pe01.jpg" name="MEMBER_PHOTO" id="MEMBER_PHOTO" class="rounded mx-auto d-block" alt="..." style="width: 300px; height: 400px;" align='center'><br><br>
                                                <button type="submit" name="submit" id="submit"  style="background: #3CB371; border-color: #3CB371; width: 660px; border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ยืนยันตัวตนถูกต้อง</font></button><br>
                                                <hr style="border-color: #BEBEBE;">
                                                <label for="inputEmail4"><b>
                                                            <font
                                                                style="color: #006665; font-size: 26px; font-family: 'DB Heavent', DB Heavent;">
                                                                เหตุผล (ในกรณีเอกสารไม่สมบูรณ์)</font>
                                                        </b></label>
                                                <textarea class="form-control" id="exampleTextarea1" rows="10"></textarea><br><br>
                                                <button type="submit" name="submit" id="submit"  style="background: #363636; border-color: #363636; width: 660px; border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">รอเอกสาร/เอกสารไม่ถูกต้อง</font></button><br>
                                            </div>                      
                                        </div>  
                                    </div>
                                </div>    
                            <input type="hidden" name="MEMBER_ID" id="MEMBER_ID" value="<?=$MEMBER_CARD_NUMBER?>"/>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once __DIR__ . '/require/admin/script.php';?>
    <script>
    $(document).ready(function() {
        $('#EditModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var MEMBER_CARD_NUMBER = button.data('id')
            var modal = $(this)

            $.ajax({
                type: "POST",
                url: "AdminGetMember.php",
                data: {MEMBER_CARD_NUMBER: MEMBER_CARD_NUMBER, do: 'detail_member'},
                dataType: "json",
                success: function(response) {
                    console.log(response)
                    var arr_input_key = ['MEMBER_MAIL', 'MEMBER_BIRTH', 'MEMBER_TEL',
                        'MEMBER_GENDER', 'MEMBER_HOUSE', 'MEMBER_VILLAGE','MEMBER_ALLEY',
                        'name_pro', 'name_am', 'name_th', 'POSTCODE_ID',
                        'BANK_ID','BANK_BRANCH', 'ACCOUNT_TYPE_NAME', 'ACCOUNT_BANK_NUMBER',
                        'ACCOUNT_BANK_NAME', 'MEMBER_PHOTO'
                    ]
                    var arr_old_key = ['ACCOUNT_TYPE_ID']
                    $.each(response, function(indexInArray, valueOfElement) {
                        if (jQuery.inArray(indexInArray, arr_input_key) !== -1) {
                            if (valueOfElement != '') {
                                modal.find('input[name="' + indexInArray + '"]')
                                .val(valueOfElement)
                            }
                        }
                        if (jQuery.inArray(indexInArray, arr_old_key) !== -1){
                            if (valueOfElement != ''){
                                modal.find('input[name="'+indexInArray+'"]').attr('old-'+indexInArray, valueOfElement)
                            }
                        }
                        if (indexInArray === 'MEMBER_PHOTO') {
                            modal.find('img').attr('src', 'file_ico/profile_kyc/'+valueOfElement)
                        }
                    });
                    
                    modal.find('#MEMBER_CARD_NUMBER').val(MEMBER_CARD_NUMBER)
                }
            });
        })
    });
    </script>
</body>
</html>