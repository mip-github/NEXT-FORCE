<?php 

session_start();
include('require/config.php'); 
include('require/config_pdo.php'); 
$sql = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql);

$MEMBER_ID = $_SESSION['MEMBER_ID'];

$sql1 = "SELECT * FROM member WHERE MEMBER_ID = :MEMBER_ID";
$stmt=$db->prepare($sql1);
$stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$MEMBER_CARD_NUMBER = $row['MEMBER_CARD_NUMBER'];
$MEMBER_NAME = $row['MEMBER_NAME'];
$MEMBER_SERNAME = $row['MEMBER_SERNAME'];
$MEMBER_GENDER = $row['MEMBER_GENDER'];
$MEMBER_TEL = $row['MEMBER_TEL'];
$MEMBER_HOUSE = $row['MEMBER_HOUSE'];
$MEMBER_VILLAGE = $row['MEMBER_VILLAGE'];
$MEMBER_ALLEY = $row['MEMBER_ALLEY'];
$PROVINCE_ID = $row['PROVINCE_ID'];
$POSTCODE_ID = $row['POSTCODE_ID'];
$MEMBER_ID_1 = $row['MEMBER_ID'];
$DISTRINCT_ID =$row['DISTRINCT_ID'];
$AMPHURE_ID = $row['AMPHURE_ID'];
$MEMBER_KYC = $row['MEMBER_KYC'];

?>


<!doctype html>
<html class="no-js" lang="zxx">
<?php require_once __DIR__ . '/require/head_profile.php';?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<body bgcolor=''>
    <header>
        <div class="header-area ">
            <?php require_once __DIR__.'/require/header_profile.php'; ?>
            <!-- header-end -->
            <!--เนื้อหา-->
            <div class="team" align='center'>
                <div class="boxed-box02">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <?php if($MEMBER_KYC == 0){
                                    echo "<img src='pic/waiting.png' style='max-height: 30px;'>&nbsp;
                                        <font style='color: #FF9900; font-size: 20px; font-weight: bold; font-family: 'DB Heavent', DB Heavent; text-align: left;'>รอตรวจสอบ</font>";
                                }else if($MEMBER_KYC == 1){
                                    echo "<img src='pic/success.png' style='max-height: 30px;'>&nbsp;
                                    <font style='color: #339999; font-size: 20px; font-weight: bold; font-family: 'DB Heavent', DB Heavent; text-align: left;'>ยืนยันตัวตนสมบูรณ์</font>";
                                }else{
                                    echo "<img src='pic/disbled.png' style='max-height: 30px;'>&nbsp;
                                    <font style='color: #FF0000; font-size: 20px; font-weight: bold; font-family: 'DB Heavent', DB Heavent; text-align: left;'>เอกสารไม่ถูกต้อง เนื่องจากใบหน้าไม่ชัดเจน กรุณาอัพโหลดรูปภาพใหม่</font>";
                                } 
                                ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <div class="font08">การยืนยันตัวตน</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <hr class="my-4" style="border-color: #006665;">
                        </div>
                    </div>
                    <form action="SaveUserProfile.php" method="POST" encypte="multipart/form-data" id="verify_form">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="font12">หมายเลขบัตรประชาชน/เลขที่หนังสือเดินทาง</div><br>
                                <input type="text" class="form-control form-control-lg" id="MEMBER_CARD_NUMBER"
                                    name="MEMBER_CARD_NUMBER" value="<?=$MEMBER_CARD_NUMBER?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <img src="pic/card_number.png" class="rounded float-left" alt="..."
                                    style="max-height: 210px;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                </br></br>
                                <div class="font08">อัพโหลดรูปหลักฐานยืนยันตัวตน ( อัพโหลดได้ไม่เกิน 25 MB )</div>
                                <hr class="my-4" style="border-color: #006665;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="file" class="form-control" name="MEMBER_PHOTO" id="MEMBER_PHOTO"
                                    data-validation-max-size="25mb" data-validation="mime size"
                                    data-validation-allowing="jpg, png" onchange="readURL(this);">
                            </div>
                            <div class="form-group col-md-2">
                                <img id="picture" src="#">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-1"><br><br>
                                <button type="submit" name="submit" id="submit"
                                    style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px; padding: 5px 30px;">
                                    <font
                                        style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">
                                        บันทึก</font>
                                </button>
                                <input type="hidden" name="do" value="verify">
                                <input type="hidden" name="MEMBER_ID" value="<?=$MEMBER_ID_1?>">
                            </div>
                            <div class="form-group col-md-1"><br><br>
                                <button type="button"
                                    style="background: #696969; border-radius: 100px; padding: 5px 30px;">
                                    <font
                                        style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">
                                        ยกเลิก</font>
                                </button>
                            </div>
                        </div>
                    </form>
                    </hr>
                </div>
            </div>



            <!--slide-->
            <!------ Include the above in your HEAD tag ---------->

            <aside id="sticky-social">
                <ul>
                    <li><a href="#" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-08.png'></img><span>&nbsp;การซื้อของฉัน</span></a></li>
                    <li><a href="UserProfile.php" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-02.png'><span>&nbsp;ข้อมูลส่วนตัว</span></a></li>
                    <li><a href="UserVerify.php" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-03.png'><span>&nbsp;การยืนยันตัวตน</span></a></li>
                    <li><a href="UserBanking.php" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-04.png'><span>&nbsp;บัญชีธนาคาร</span></a></li>
                    <li><a href="UserCompaint.php" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-05.png'><span> &nbsp;แจ้งเรื่องร้องเรียน</span></a></li>
                    <li><a href="#" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-06.png'><span>&nbsp;ประวัติรายงาน</span></a></li>
                    <li><a href="#" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-07.png'><span>&nbsp;ตั้งค่าภาษา</span></a></li>
                </ul>
            </aside>





</body>

<?php require_once __DIR__ . '/require/script.php'; ?>
<script src="require/jquery.min.js"></script>
<script src="require/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $("#verify_form").on('submit', (function(e) {
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
                    swal("หมายเลขบัตรประชาชนนี่ได้ถูกใช้ไปแล้ว", {
                        icon: "warning",
                    });
                }
                if (response == "Success") {
                    swal("ระบบได้ทำการแก้ไขข้อมูลเรียบร้อย", {
                        icon: "success",
                    });
                    setTimeout(function(){
                    location.reload();
                    },5000);
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