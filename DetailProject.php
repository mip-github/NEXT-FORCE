<?php
session_start();
include('require/config.php');
include('require/config_pdo.php');

$token = "40b993475cc3a8223b20a7cb602cccc9";

$MEMBER_ID = $_SESSION['MEMBER_ID'];
$PROJECT_REWARD = $_GET['id'];
$sql = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql);

$sql1 = "SELECT * FROM member WHERE MEMBER_ID = :MEMBER_ID";
$stmt=$db->prepare($sql1);
$stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$MEMBER_PHOTO = $row['MEMBER_PHOTO'];

$sql2 = "SELECT * FROM project WHERE PROJECT_ID = :PROJECT_REWARD";
$stmt2=$db->prepare($sql2);
$stmt2->bindparam(':PROJECT_REWARD', $PROJECT_REWARD);
$stmt2->execute();
$row1=$stmt2->fetch(PDO::FETCH_ASSOC);
$PROJECT_COUNTDOWN = $row1['PROJECT_END'];

$sql3 = "SELECT * FROM project WHERE PROJECT_ID = :PROJECT_REWARD";
$stmt=$db->prepare($sql3);
$stmt->bindparam(':PROJECT_REWARD', $PROJECT_REWARD);
$stmt->execute();
$row3=$stmt->fetch(PDO::FETCH_ASSOC);

$PROJECT_PRICE = $row3['PROJECT_PRICE'];
$PROJECT_ID = $row3['PROJECT_ID'];
$PROJECT_SOFT_CAP = $row3['PROJECT_SOFT_CAP'];
$PROJECT_HARD_CAP = $row3['PROJECT_HARD_CAP'];
$PROJECT_NUM_UNIT = $row3['PROJECT_NUM_UNIT'];

$PROJECT_MAX = $PROJECT_PRICE * 100 / $PROJECT_PRICE;
$PROJECT_SOFTCAP = $PROJECT_SOFT_CAP * 100 / $PROJECT_PRICE ;
$PROJECT_HARDCAP = $PROJECT_HARD_CAP * 100 / $PROJECT_PRICE ;
$PROJECT_REAL = $PROJECT_NUM_UNIT * 100 / $PROJECT_PRICE;

$sql5 = "SELECT * FROM project_reward WHERE PROJECT_ID = :PROJECT_REWARD";
$stmt5=$db->prepare($sql5);
$stmt5->bindparam(':PROJECT_REWARD', $PROJECT_REWARD);
$stmt5->execute();
$row5=$stmt5->fetch(PDO::FETCH_ASSOC);
    $REWARD_ID = $row4['REWARD_ID'];
?>


<!doctype html>
<html class="no-js" lang="zxx">
<?php require_once __DIR__ . '/require/head.php';?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="src/jquery.stepProgressBar.css" rel="stylesheet" type="text/css">
<link href="css/validator.css" rel="stylesheet">
<style>
a.linkhover:hover {
    text-decoration: none;
    font-size: 26px;
    border-radius: 100px;
    padding: 12px 30px;
    background-color: #f68400;
    color: #ffffff;
}
</style>
<style>
.modal-lg {
    max-width: 65% !important;
}
</style>
<style>
.br {
    line-height: 1px;
    margin: 10px 0;
}

.hr {
    border-color: #006665;
}
</style>
<style>
.profile-userpic img {
    float: none;
    margin: 0 auto;
    width: 100%;
    height: 100%;
    -webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    border-radius: 50% !important;
}
</style>
<style>
#second,
#third,
#fourth,
#result {
    display: none;
}
</style>
<style>
h1.a {
    color: #000000;
    font-size: 56px;
    font-family: 'DB Heavent', DB Heavent;
    font-weight: bold;
}

div.a {
    line-height: normal;
    color: #696969;
}

div.single-input {
    width: 60px;
    margin: 0 auto;
    display: block;
}
</style>
<style>
<style>
.card {
  position: relative;
  width: 50%;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #000;
}

.card:hover .overlay {
  opacity: 0.7;
}

.btn7 {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>
</style>

<body>
    <header> <?php include_once 'require/header.php'; ?> </header>
    <!-- header-end -->

    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h1 class="font02">T10 Cryptocurrency is</h1>
                            <h2 class="font03">cryptocurrency community for business</h2></br>
                            <h4 class="font01">ระบบการเงินโดยเทคโนโลยี Blockchain
                                ที่จะทำให้ทุกการใช้จ่ายในชีวิตประจำวันเป็นเรื่องง่ายผ่านแอปพลิเคชั่น T10
                                พร้อมทั้งสิทธิ์การสะสม Point ที่สามารถใช้งานควบคู่กับเงินสด และรองรับเฉพาะกลุ่มสมาชิก
                                T10 เท่านั้น</h4><br><br>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                                <a href="#" class="boxed-btn5"><img src='pic/icon02.png'> White papers</a>&nbsp;&nbsp;
                                <a href="#" class="boxed-btn3"><img src='pic/icon01.png'> Presentation</img></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="boxed-box01">
                            <div class="font04">Kalungka CIO Finishes in:</div>
                            <div data-date="<?=$PROJECT_COUNTDOWN?>" id="DateCountdown"></div>

                            <div>
                                <button class="btn6" type="submit">Buy coin 15% off</button></br>
                                <div id="myGoal" style="max-height: 80px;"></div><br>
                            </div>

                            <div class="p2">Fixed token edition :</div>
                            <div class="p1">We Accepted </div>

                            <div>
                                <img width='60' height='30' src='pic/Icon_ICO-05.png'>
                                <img width='60' height='30' src='pic/Icon_ICO-06.png'>
                                <img width='60' height='30' src='pic/Icon_ICO-07.png'>
                                <img width='60' height='30' src='pic/Icon_ICO-08.png'>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="font15"><i class="fa fa-award" align='left'></i></img> REWARD</div><br><br>
    <div class="container-fluid">
        <div class="row">
        <?php

        $sql4 = "SELECT * FROM project_reward WHERE PROJECT_ID = :PROJECT_REWARD";
        $stmt4=$db->prepare($sql4);
        $stmt4->bindparam(':PROJECT_REWARD', $PROJECT_REWARD);
        $stmt4->execute();
        while($row4=$stmt4->fetch(PDO::FETCH_ASSOC)){
            $REWARD_ID = $row4['REWARD_ID'];
            $PROJECT_ID = $row4['PROJECT_ID'];
            $amount = $row4['amount'];
            $NAME = $row4['NAME'];
            $REWARD_SUM = $row4['REWARD_SUM'];
            $REWARD_MAX = $row4['REWARD_MAX'];
            $ESTIMATED = $row4['ESTIMATED'];

        ?>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"><h4><b><i class="fa fa-award"></i> REWARD FROM CAMPAIGN</b></h4>
                        <p class="card-text"><h5>MINIMUM <b><font style="color: #000;"><?=$amount?> ฿</font></b></h5></p>
                        <p class="card-text"><h5><b><font style="color: #696969;">FUND FOR ME</font></b></h5></p>
                        <p class="card-text"><h5><?=$NAME?></h5></p>
                        <p class="card-text"><h5><i class="fa fa-user"></i> <?=$REWARD_SUM?> Claim of <?=$REWARD_MAX?></h5></p>
                        <p class="card-text"><h5><i class="fa fa-clock"></i> Estimated Delivery</h5></p>
                        <p class="card-text"><h5><b><font style="color: #000;"><?=$ESTIMATED?> </font></b></h5></p>

                        <?php 
                        
                        if($REWARD_SUM == $REWARD_MAX) {
                            echo "";
                        }else{
                            echo "<div class='overlay'>
                                     <button class='btn7' type='button' style='width: 100px; height: 50px;' data-toggle='modal' data-target='#PaymentReward' data-id='$REWARD_ID'>Pick</button>    
                                  </div>";
                        }                             
                        ?>
                    </div>
        <?php

        $sql6 = "SELECT * FROM reward_buy WHERE REWARD_ID = :REWARD_ID AND MEMBER_ID = :MEMBER_ID";
        $stmt6=$db->prepare($sql6);
        $stmt6->bindparam(':REWARD_ID', $REWARD_ID);
        $stmt6->bindparam(':MEMBER_ID', $MEMBER_ID);
        $stmt6->execute();
        while($row6=$stmt6->fetch(PDO::FETCH_ASSOC)){ 
            $ID = $row6['ID'];
            $REWARD = $row6['REWARD_ID'];
            $QRCODE = $row6['QRCODE'];
            $MEMBER_REWARD = $row6['MEMBER_ID'];


        ?>
                    <div class="card-footer text-muted">
                        <a href='paymentqrcode.php?id=<?=$REWARD_ID?>'><button type='button' style='background: #000; border-radius: 100px; padding: 5px 30px; width: 345px; height: 50px;'><font style='font-size: 18px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;'>คลิกเพื่อดู QR Code</font></button></a>
                    </div>
        <?php } ?>
                </div>       
            </div>  
        <?php } ?>
        </div>
    </div>  <br><br>  
    <aside id="sticky">
        <ul>
            <?php
                
                $sql_select_project = "SELECT * FROM project";
                $stmt=$db->prepare($sql_select_project);
                $stmt->execute();
                while($row_select_project=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $PROJECT_ID = $row_select_project['PROJECT_ID'];
                    $PROJECT_NAME = $row_select_project['PROJECT_NAME'];
    
                ?>
            <li><a href="DetailProject.php?id=<?=$PROJECT_ID?>" class="entypo1-slide"><img height='30'
                        src='pic/AW_Icon_V1-08.png'></img><span>&nbsp;<?=$PROJECT_NAME?></span></a></li>
            <?php } ?>
        </ul>
    </aside>

    <?php require_once __DIR__.'/require/footer.php'; ?>
    </div>
    </div>
    <!-- End Login Modal -->

    <div class="modal fade" id="PaymentReward" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterLabel">Buy for reward</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="SavePaymentReward.php" method="POST" encypte="multipart/form-data" id="payment_reward">
                    <div class="modal-body">
                        <label for="col-form-label">Enter you donation :</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">฿</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="amount" name="amount" aria-describedby="basic-addon3" readonly>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Note :</label>
                            <textarea class="form-control" id="NOTE" name="NOTE"></textarea>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit" name="submit" style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px;
                        padding: 5px 30px; width: 600px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ยืนยันการจ่ายเงิน</font></button>
                        <input type="hidden" name="REWARD_ID" id="REWARD_ID">
                        <input type="hidden" name="do" value="payment_reward">
                        <input type="hidden" name="PROJECT_ID" id="PROJECT_ID">
                        <input type="hidden" name="reward" value="reward">
                        <input type="hidden" name="SUM_REWARD" value="1">
                        <input type="hidden" name="token" value="<?=$token?>">
                        <input type="hidden" name="amount" id="amount">
                    </div>
                </form>       
            </div>
        </div>
    </div>

  <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="function_login.php" method="POST" id="login_form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <img src="pic/bg_2.png" class="rounded float-left img-fluid" alt="..." style="width: 500px; height: 685px;">
                            <div class="container"><br>
                                <h1 class="a">&emsp;เข้าสู่ระบบ</h1>
                                <div class="a">&emsp;&emsp;&emsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh <br>
                                    &emsp;&emsp;&emsp;&nbsp;&nbsp;euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="form-row">
                                        <div class="form-group col-lg-12">
                                            <div class="single_input"><br><br>
                                                <label for="inputEmail4">
                                                <font style="color: #000000; font-size: 28px; font-family: 'DB Heavent', DB Heavent;">
                                                                    อีเมล</font>
                                                </label>
                                                <input type="email" class="form-control form-control-lg" name="MEMBER_EMAIL"
                                                            id="MEMBER_EMAIL" placeholder="กรอกอีเมล" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="form-row">
                                        <div class="form-group col-lg-12">
                                            <div class="single_input">
                                                <label for="inputEmail4">
                                                <font style="color: #000000; font-size: 28px; font-family: 'DB Heavent', DB Heavent;">
                                                                    รหัสผ่าน</font>
                                                </label>
                                                <input type="password" class="form-control form-control-lg" name="MEMBER_PASSWORD"
                                                            id="MEMBER_PASSWORD" placeholder="กรอกรหัสผ่าน" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="form-row">
                                        <div class="form-group col-lg-12">
                                            <div class="single_input">
                                                <label for="inputEmail4"><u>
                                                <font style="color: #006665; font-size: 22px; font-family: 'DB Heavent', DB Heavent;">
                                                                    ลืมรหัสผ่าน?</font></u>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="form-row">
                                        <div class="form-group col-lg-12">
                                            <div class="single_input">
                                                <button type="submit" name="submit" style="background-color: #f68400; border-radius: 100px;
                                                padding: 5px 90px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">เข้าสู่ระบบ</font></button>
                                                <input type="hidden" name="do" value="login">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="form-row">
                                        <div class="form-group col-lg-12">
                                            <div class="single_input">
                                                <button type="button" data-toggle="modal" data-target="#exampleModal" style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px;
                                                padding: 5px 80px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">สมัครสมาชิก</font></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>        
                    </div><br>
                    <div class="modal-footer">
                    <button type="button" style="background: #C0C0C0; border-radius: 100px; padding: 5px 30px;" data-dismiss="modal"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ปิดหน้าต่าง</font></button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <!-- End Login Modal -->

    <!-- Sign up Modal -->
    <div class="modal fade exampleModal" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="pic/bg_2.png" class="rounded float-left img-fluid" alt="..." style="width: 500px; height: 685px;">
                    <form action="register_query.php" method="POST" id="register_form" enctype="multipart/form-data">
                        <div id="first">
                            <div class="form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <Br>
                                        <div class="single_input">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 36px; font-family: 'DB Heavent', DB Heavent;">
                                                        สมัครสมาชิก</font>
                                                </b></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_input">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">
                                                        ข้อมูลส่วนตัว</font>
                                                </b></label>
                                            <hr class="my-4" style="border-color: #006665;">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        ชื่อ</font>
                                                </b></label>
                                            <input type="text" class="form-control" name="MEMBER_NAME" id="MEMBER_NAME"
                                                placeholder="กรอกชื่อของคุณ" data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        นามสกุล</font>
                                                </b></label>
                                            <input type="text" class="form-control" name="MEMBER_SURNAME"
                                                id="MEMBER_SURNAME" placeholder="กรอกนามสกุลของคุณ"
                                                data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        เพศ</font>
                                                </b></label>
                                            <select class="form-control form-control-md" name="MEMBER_GENDER"
                                                id="MEMBER_GENDER" data-validation="required">
                                                <option value="">เลือกเพศ</option>
                                                <option value="ชาย">ชาย</option>
                                                <option value="หญิง">หญิง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <br>
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        วัน/เดือน/ปีเกิด</font>
                                                </b></label>
                                            <input type="date" class="form-control" name="MEMBER_BIRTH"
                                                id="MEMBER_BIRTH" data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="input-group-md">
                                            <br>
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        เบอร์โทรศัพท์</font>
                                                </b></label>
                                            <input type="number" class="form-control" name="MEMBER_TEL" id="MEMBER_TEL"
                                                placeholder="กรอกเบอร์โทรศัพท์ของคุณ" data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <br>
                                        <div class="single_input">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">
                                                        ข้อมูลที่อยู่</font>
                                                </b></label>
                                            <hr style="border-color: #006665;">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        บ้านเลขที่</font>
                                                </b></label>
                                            <input type="text" class="form-control" name="MEMBER_HOUSE"
                                                id="MEMBER_HOUSE" placeholder="กรอกบ้านเลขที่ของคุณ"
                                                data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        หมู่บ้าน/หมู่ที่</font>
                                                </b></label>
                                            <input type="text" class="form-control" name="MEMBER_VILLAGE"
                                                id="MEMBER_VILLAGE" placeholder="กรอกหมู่บ้านของคุณ"
                                                data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        ซอย</font>
                                                </b></label>
                                            <input type="text" class="form-control" name="MEMBER_ALLEY"
                                                id="MEMBER_ALLEY" placeholder="กรอกซอยของคุณ"
                                                data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-3"><br>
                                        <label for="province"><b>
                                                <font
                                                    style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                    จังหวัด</font>
                                            </b></label>
                                        <select name="province_id" id="province" class="form-control form-control-md"
                                            data-validation="required">
                                            <option value="">เลือกจังหวัด</option>
                                            <?php while($result = mysqli_fetch_assoc($query)): ?>
                                            <option value="<?=$result['id']?>"><?=$result['name_th']?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3"><br>
                                        <label for="amphure"><b>
                                                <font
                                                    style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                    อำเภอ/เขต</font>
                                            </b></label>
                                        <select name="amphure_id" id="amphure" class="form-control form-control-md"
                                            data-validation="required">
                                            <option value="">เลือกอำเภอ/เขต</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3"><br>
                                        <label for="district"><b>
                                                <font
                                                    style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                    ตำบล/แขวง</font>
                                            </b></label>
                                        <select name="district_id" id="district" class="form-control form-control-md"
                                            data-validation="required">
                                            <option value="">เลือกตำบล/แขวง</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="">
                                            <br>
                                            <div class="input-group-md">
                                                <label for="inputEmail4"><b>
                                                        <font
                                                            style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                            รหัสไปรษณีย์</font>
                                                    </b></label>
                                                <input type="text" class="form-control" name="MEMBER_POSTCODE"
                                                    id="MEMBER_POSTCODE" placeholder="กรอกรหัสไปรษณีย์"
                                                    data-validation="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br><br> <br><br>
                            <div class="modal-footer">
                                <button type="button" style="background: #C0C0C0; border-radius: 100px; padding: 5px 30px;" data-dismiss="modal"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ปิดหน้าต่าง</font></button>
                                <button type="button" name="submit" id="next-1" style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px;
                                padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ถัดไป</font></button>
                            </div>
                        </div>
                        <div id="second">
                            <div class="modal-body">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="single_input">
                                                <label for="inputEmail4"><b>
                                                        <font
                                                            style="color: #000000; font-size: 36px; font-family: 'DB Heavent', DB Heavent;">
                                                            ข้อกำหนดและเงื่อนไข</font>
                                                    </b></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group-md">
                                            <br>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="21"
                                                    style="min-width: 100%; height: 100%;" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group-md">
                                            <br>
                                                <input type="checkbox" id="accept" name="accept" value="checkbox"
                                                    onClick="if(register_form.accept.checked==false){register_form.submit.disabled=true;}else{register_form.submit.disabled=false;}">
                                                <label for="accept"> กรุณายืนยันว่า
                                                    คุณได้ศึกษาและยอมรับข้อกำหนดและเงื่อนไขของทางบริษัท T10 เรียบร้อยแล้ว
                                                    เพื่อดำเนินการต่อ</label>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="prev-2" style="background: #C0C0C0; border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ย้อนกลับ</font></button>
                                <button type="button" id="next-2" style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px;
                                padding: 5px 30px;" disabled><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ถัดไป</font></button>
                            </div>
                        </div>
                        <div id="third">
                            <div class="form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <Br>
                                        <div class="single_input">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 36px; font-family: 'DB Heavent', DB Heavent;">
                                                        ข้อมูลสมาชิก</font>
                                                </b></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_input">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">
                                                        บัญชีธนาคาร</font>
                                                </b></label>
                                            <hr class="my-4" style="border-color: #006665;">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        ชื่อธนาคาร</font>
                                                </b></label>
                                                <select class="form-control" id="BANK_ID" name="BANK_ID">
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
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        สาขาที่ใช้เปิดบริการ</font>
                                                </b></label>
                                            <input type="text" class="form-control" name="BANK_BRANCH"
                                                id="BANK_BRANCH" placeholder="สาขา">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        เลือกประเภทบัญชี</font>
                                                </b></label>
                                                <select class="form-control" id="ACCOUNT_TYPE_ID" name="ACCOUNT_TYPE_ID">
                                    <option>-- เลือกประเภทบัญชี --</option>
                                    <?php

                                        $sql_type = "SELECT * FROM account_bank_type";
                                        $res_type = mysqli_query($conn, $sql_type);
                                        while ($row_type = mysqli_fetch_assoc($res_type)) {
                                            echo '<option value="'.$row_type['ACCOUNT_TYPE_ID'].'">'.$row_type['ACCOUNT_TYPE_NAME'].'</option>';                
                                        }

                                    ?>  
                                </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <br>
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        หมายเลขบัญชี</font>
                                                </b></label>
                                            <input type="text" class="form-control" name="ACCOUNT_BANK_NUMBER"
                                                id="ACCOUNT_BANK_NUMBER" data-validation="required" placeholder="กรอกเลขที่บัญชีธนาคาร">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                        <br>
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        ชื่อบัญชี</font>
                                                </b></label>
                                            <input type="text" class="form-control" name="ACCOUNT_BANK_NAME"
                                                id="ACCOUNT_BANK_NAME" placeholder="กรอกชื่อบัญชี"
                                                data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_input">
                                        <br>
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">
                                                        ข้อมูลสมาชิก</font>
                                                </b></label>
                                            <hr class="my-4" style="border-color: #006665;">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        อีเมล</font>
                                                </b></label>
                                            <input type="text" class="form-control" name="MEMBER_EMAIL"
                                                id="MEMBER_EMAIL" placeholder="กรอกอีเมลของคุณ"
                                                data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        รหัสผ่าน</font>
                                                </b></label>
                                            <input type="password" class="form-control" name="MEMBER_PASSWORD"
                                                id="MEMBER_PASSWORD" placeholder="รหัสผ่าน 6 ตัวขึ้นไป"
                                                data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        ยืนยันรหัสผ่าน</font>
                                                </b></label>
                                            <input type="password" class="form-control" name="MEMBER_PASSWORD"
                                                id="MEMBER_PASSWORD" placeholder="รหัสผ่าน 6 ตัวขึ้นไป"
                                                data-validation="required">
                                        </div>
                                    </div>
                                </div>
                                <br><br><br><br><br><br><br><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="prev-3" style="background: #C0C0C0; border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ย้อนกลับ</font></button>
                                <button type="button" id="next-3" style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px;
                                padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ถัดไป</font></button>
                            </div>
                        </div>
                        <div id="fourth">
                            <div class="modal-body">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="single_input">
                                                <label for="inputEmail4"><b>
                                                        <font
                                                            style="color: #000000; font-size: 36px; font-family: 'DB Heavent', DB Heavent;">
                                                            อัพโหลดเอกสาร ยืนยันตัวตน</font>
                                                    </b></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single_input">
                                                <label for="inputEmail4"><b>
                                                        <font
                                                            style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">
                                                            กรอกข้อมูลบัตรประชาชน / หนังสือเดินทาง</font>
                                                    </b></label>
                                                <hr class="my-4" style="border-color: #006665;">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group-md">
                                                <label for="inputEmail4"><b>
                                                        <font
                                                            style="color: #000000; font-size: 22px; font-family: 'DB Heavent', DB Heavent;">
                                                            เลขที่บัตรประชาชน/ หนังสือเดินทาง</font>
                                                    </b></label>
                                                <input type="text" class="form-control" name="MEMBER_ID" id="MEMBER_ID"
                                                    placeholder="กรอกเลขที่บัตรประชาชน/หนังสือเดินทาง"
                                                    data-validation="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <br>
                                            <img src="pic/card_number.png" style="width: 230px; height: 140px;">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single_input">
                                                <BR><br>
                                                <label for="inputEmail4"><b>
                                                        <font
                                                            style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">
                                                            อัพโหลดรูปหลักฐานยืนยันตัวตน ( อัพโหลดได้ไม่เกิน 25 MB )</font>
                                                    </b></label>
                                                <hr class="my-4" style="border-color: #006665;">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group-md">
                                                <input type="file" class="form-control" name="MEMBER_PHOTO" id="MEMBER_PHOTO"
                                                    data-validation-max-size="25mb" data-validation="mime size"
                                                    data-validation-allowing="jpg, png" onchange="readURL(this);">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group-md">
                                                <img id="picture" src="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br> <br><br>
                            <div class="modal-footer">
                                <button type="button" id="prev-4" style="background: #C0C0C0; border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ย้อนกลับ</font></button>
                                <button type="submit" name="submit" id="submit"  style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">สมัครสมาชิก</font></button>
                                <input type="hidden" name="do" value="registion">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>        
            <!-- End Sign up -->

                
</body>
<?php require_once __DIR__.'/require/admin/script.php'; ?>
<script>
$("#DateCountdown").TimeCircles({
    "animation": "smooth",
    "bg_width": 1.1,
    "fg_width": 0.1,
    "circle_bg_color": "#385c5e",
    "time": {
        "Days": {
            "text": "Days",
            "color": "#daf3f4",
            "show": true
        },
        "Hours": {
            "text": "Hours",
            "color": "#daf3f4",
            "show": true
        },
        "Minutes": {
            "text": "Minutes",
            "color": "#daf3f4",
            "show": true
        },
        "Seconds": {
            "text": "Seconds",
            "color": "#daf3f4",
            "show": true
        }
    }
});
</script>
<script>
    $(document).ready(function() {
        $('#PaymentReward').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var REWARD_ID = button.data('id')
            var modal = $(this)

            $.ajax({
                type: "POST",
                url: "SavePaymentReward.php",
                data: {
                    REWARD_ID: REWARD_ID,
                    do: 'get_reward'
                },
                dataType: "json",
                success: function(response) {
                    console.log(response)
                    var arr_input_key = ['amount', 'PROJECT_ID']
                    $.each(response, function(indexInArray, valueOfElement) {
                        if (jQuery.inArray(indexInArray, arr_input_key) !== -1) {
                            if (valueOfElement != '') {
                                modal.find('input[name="' + indexInArray + '"]')
                                    .val(valueOfElement)
                            }
                        }
                    });
                    modal.find('#REWARD_ID').val(REWARD_ID)
                }
            });
        })
    });
</script>
<script>
$('#myGoal').stepProgressBar({
  currentValue: <?=$PROJECT_REAL?>,
  steps: [
    {
      value: <?=$PROJECT_SOFTCAP?>,
      bottomLabel: '<h6>Soft Cap</h6>'
    },
    {
      value: <?=$PROJECT_HARDCAP?>,
      bottomLabel: '<h6>Hard Cap</h6>'
    },
    {  
      value: 100, 
      bottomLabel: '<h6>Max</h6>',
      mouseOver: function() { alert('mouseOver'); },
      click: function() { alert('click'); }
    }
  ],
  unit: '$'
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#next-1").click(function() {
        $("#second").show();
        $("#first").hide();
    });

    $("#prev-2").click(function() {
        $("#second").hide();
        $("#first").show();
    });

    $("#next-2").click(function() {
        $("#second").hide();
        $("#third").show();
    });

    $("#next-3").click(function() {
        $("#third").hide();
        $("#fourth").show();
    });

    $("#prev-3").click(function() {
        $("#third").hide();
        $("#second").show();
    });

    $("#prev-4").click(function() {
        $("#fourth").hide();
        $("#third").show();
    });
});
</script>
<script>
// $( document ).ready(function() {
//     console.log( "1234" );
// // });
// $("#payment_reward").submit(function(event) {
//     var _this = $(this)
//     $.ajax({
//         type: "POST",
//         url: "register_query.php",
//         data: _this.serialize(),
//         //dataType: "json",
//         success: function(response) {
//             console.log(response)
//             alert('Complete Update Profile')
//             // location.reload();
//         }
//     })
//     event.preventDefault();
// });
</script>
<script>
$.validate({
    modules: 'security, file',
    onModulesLoaded: function() {
        $('input[name="pass_confirmation"]').displayPasswordStrength();
    }
});
</script>
<script type="text/javascript">
$(function() {
    $("#accept").click(function() {
        if ($(this).prop("checked") == true) {
            $("#next-2").removeAttr("disabled");
        } else {
            $("#next-2").attr("disabled", "disabled");
        }
    });
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
<script type="text/javascript">
    $(document).ready(function (e){
        $("#payment_reward").on('submit',(function(e){
            e.preventDefault();
            $.ajax({
                url: "SavePaymentReward.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(response) {
                console.log(response)
                if(response=="Error"){
                    swal("", {
                    icon: "warning",
                });
            }
                if(response=="Success"){
                    swal("Trading was successful.", {
                    icon: "success",
                    });
                    setTimeout(function(){
                    window.location.href = "UserPayment.php";
                    },3000);
                }
            },
                error: function(){} 	        
            });
        }));
    });
</script>
<!-- <script type="text/javascript">
    $(document).ready(function (e){
        $("#payment_reward").on('submit',(function(e){
            e.preventDefault();
            $.ajax({
                url: "https://www.t10assets.com/api/v1/ecommerce/payment/qrcode",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(response) {
                console.log(response)
                if(response=="Error"){
                    swal("", {
                    icon: "warning",
                });
            }
                if(response=="Success"){
                    swal("Trading was successful.", {
                    icon: "success",
                });
                localtion.reload();  
                }
            },
                error: function(){} 	        
            });
        }));
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function (e){
        $("#register_form").on('submit',(function(e){
            e.preventDefault();
            $.ajax({
                url: "register_query.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(response) {
                console.log(response)
                if(response=="Error"){
                    swal("หมายเลขบัตรประชาขนนี้ได้ถูกใช้งานไปแล้ว !!", {
                    icon: "warning",
                });
            }
                if(response=="Success"){
                    swal("Membership is complete. Please verify your identity via email.", {
                    icon: "success",
                    });
                }
            },
                error: function(){} 	        
            });
        }));
    });
</script>
<script>
 $(document).ready(function (e){
        $("#login_form").on('submit',(function(e){
            e.preventDefault();
            $.ajax({
                url: "function_login.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(response) {
                console.log(response)
                if(response=="Error"){
                    swal("Email or Password was wrong!!", {
                    icon: "warning",
                });
            }
            location.reload();
            },
                error: function(){} 	        
            });
        }));
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#count-down").TimeCircles();
    });
</script>
</html>