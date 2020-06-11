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
<style>
.table{
    border-spacing: 10px;
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
                    <div class="col-lg-12">
                        </br></br>
                        <div class="font08">การซื้อของฉัน</div>
                        <hr class="my-4" style="border-color: #006665;">
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel"
                            aria-labelledby="pills-timeline-tab">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dt-responsive">
                                            <table class="table table-borderless">
                                                <thead align='left'>
                                                    <tr>
                                                        <th scope="col">ชื่อโปรเจค</th>
                                                        <th scope="col">ราคา</th>
                                                        <th scope="col">จำนวน TCoin</th>
                                                        <th scope="col">การสั่งซื้อ</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="background-color: #E0FFFF;" align='left'>
                                                <?php
                                                $sql_project = "SELECT * FROM project";
                                                $stmt=$db->prepare($sql_project);
                                                $stmt->execute();
                                                while($row_project=$stmt->fetch(PDO::FETCH_ASSOC)){
                                                    $PROJECT_ID = $row_project['PROJECT_ID'];
                                                    $PROJECT_NAME = $row_project['PROJECT_NAME'];
                                                    $PROJECT_PRICE = $row_project['PROJECT_PRICE'];
                                                    $PROJECT_NUM_UNIT = $row_project['PROJECT_NUM_UNIT'];

                                                ?>
                                                    <tr valign='middle'>
                                                        <td><?=$PROJECT_NAME?></td>
                                                        <td><?=$PROJECT_PRICE?></td>
                                                        <td><?=$PROJECT_NUM_UNIT?></td>
                                                        <td>
                                                            <form action="SaveUserProfile.php" method="POST" encypte="multipart/form-data" id="buy_form">
                                                                <button type="submit" style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px; padding: 0px 30px;" name="submit"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">เลือก</font></button>
                                                                <input type="hidden" name="PROJECT_ID" value="<?=$PROJECT_ID?>">
                                                                <input type="hidden" name="do" value="BuyProject">
                                                            </form>
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
                    </div>

                    <hr class="my-4" style="border-color: #D3D3D3;">
                    <table class="col-lg-12 col-md-4">
                        <tr>
                            <!-- <td>
                                <div>
                                    <label class="font09">รวม</label>&nbsp; <label class="font09">2</label>&nbsp; <label
                                        class="font09">โปรเจค</label></br>
                                    <label class="font10">Order :</label><label class="font10">23456</label>
                                </div>
                            </td>
                            <td>
                                <div align="right">
                                    <label class="font05">11,000,000</label>&nbsp;<label class="font05">THB</label></br>
                                    <label class="font10">366,666</label>&nbsp; <label class="font10">TCoin</label>
                                </div>
                            </td> -->
                            <td class="text-right">
                                <a href="UserPayment.php"><button type="button" class="btn btn-success">ดูรายการสั่งซื้อ</button></a>
                            </td>
                        </tr>
                    </table>
                    </hr>
                </div>
            </div>




            <!--slide-->
            <!------ Include the above in your HEAD tag ---------->

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
                                src='pic/AW_Icon_V1-05.png'><span> &nbsp;แจ้งเรื่องร้องเรียน</span></a></li>
                    <li><a href="#" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-06.png'><span>&nbsp;ประวัติรายงาน</span></a></li>
                    <li><a href="#" class="entypo-slide"><img height='30'
                                src='pic/AW_Icon_V1-07.png'><span>&nbsp;ตั้งค่าภาษา</span></a></li>
                </ul>
            </aside>





</body>

<?php require_once __DIR__ .'/require/script.php'; ?>
<?php require_once __DIR__.'/require/admin/jquery.php'; ?>
<script src="require/jquery.min.js"></script>
<script src="require/script.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $("#buy_form").on('submit', (function(e) {
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
                    swal("Function is Error!", {
                        icon: "warning",
                    });
                }
                if (response == "Success") {
                    swal("Buying Success", {
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