<?php
session_start();
include('require/config.php');
include('require/config_pdo.php');

$token = "40b993475cc3a8223b20a7cb602cccc9";

$MEMBER_ID = $_SESSION['MEMBER_ID'];
$REWARD_ID = $_GET['id'];

$sql = "SELECT * FROM reward_buy WHERE REWARD_ID = :REWARD_ID AND MEMBER_ID = :MEMBER_ID";
$stmt=$db->prepare($sql);
$stmt->bindparam(':REWARD_ID', $REWARD_ID);
$stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$QRCODE = $row['QRCODE'];

?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php require_once __DIR__ . '/require/head.php';?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="css/main.css">
<body>

    <header> <?php include_once 'require/header.php'; ?> </header>
    <!-- header-end -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="boxed-box01">
                            <div class="font04">QR Code - Payment</div>
                            <img src="https://chart.googleapis.com/chart?chs=400x400&cht=qr&chl=<?=$QRCODE?>" style="height: 330px;"/>
                            <br><br>
                            <button type='button' style='background: #3399ff; border-radius: 100px; border-color: #3399ff; padding: 5px 30px; width: 345px; height: 50px;' onclick="history.back()"><font style='font-size: 18px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;'>ย้อนกลับ</font></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
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


                
</body>
<?php require_once __DIR__.'/require/admin/script.php'; ?>
<script type="text/javascript">
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
                    setTimeout(function(){
                    window.location.href = "paymentqrcode.php";
                    },5000);    
                }
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