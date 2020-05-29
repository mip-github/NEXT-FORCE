<?php 

session_start();
include('require/config.php'); 
include('require/config_pdo.php');

$MEMBER_ID = $_SESSION['MEMBER_ID'];

$sql1 = "SELECT * FROM member WHERE MEMBER_ID = :MEMBER_ID";
$stmt=$db->prepare($sql1);
$stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
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
?>


<!doctype html>
<html class="no-js" lang="zxx">
    <?php require_once __DIR__ . '/require/head.php';?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
	
    <body bgcolor = ''>
    <header>
        <div class="header-area ">
            <?php require_once __DIR__.'/require/header_profile.php'; ?>
		    <!-- header-end -->
			<!--เนื้อหา-->
			<div class="team" align = 'center'>
				<div class="boxed-box02">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            </br></br><div class="font08">ข้อมูลส่วนตัว</div>
                            <hr class="my-4" style="border-color: #006665;">
                        </div>
                    </div>
                    <form action="SaveUserProfile.php" method="POST" enctype="multipart/form-data" id="banking_form"> 
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="font12">ชื่อธนาคาร</div><br>
                                <select class="form-control form-control-lg" id="BANK_ID" name="BANK_ID">
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
                            <div class="form-group col-md-3">
                                <div class="font12">สาขาที่เปิดใช้บริการ</div><br>
                                <input type="text" class="form-control form-control-lg" id="BANK_BRANCH" name="BANK_BRANCH" placeholder="กรุณากรอกสาขาที่เปิดใช้บริการ">
                            </div>
                            <div class="form-group col-md-3">
                                <div class="font12">ประเภทบัญชี</div><br>
                                <select class="form-control form-control-lg" id="ACCOUNT_TYPE_ID" name="ACCOUNT_TYPE_ID">
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
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="font12">หมายเลขบัญชีของคุณ</div><br>
                                <input type="text" class="form-control form-control-lg" id="ACCOUNT_BANK_NUMBER" name="ACCOUNT_BANK_NUMBER" placeholder="กรุณากรอกหมายเลขบัญชีของคุณ">
                            </div>
                            <div class="form-group col-md-3">
                                <div class="font12">ชื่อบัญชีของคุณ</div><br>
                                <input type="text" class="form-control form-control-lg" id="ACCOUNT_BANK_NAME" name="ACCOUNT_BANK_NAME" placeholder="กรุณากรอกชื่อบัญชีของคุณ">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-1"><br><br>
                                <button type="submit" name="submit" id="submit"  style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">บันทึก</font></button>
                                <input type="hidden" name="do" value="banking">
                            </div>
                            <div class="form-group col-md-1"><br><br>
                                <button type="button" style="background: #696969; border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ยกเลิก</font></button>
                            </div>
                        </div>
                    </form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            </br></br><div class="font08">วอลเลท (Wallet)</div>
                            <hr class="my-4" style="border-color: #006665;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="widget">
                                <div class="widget-body">
                                    <img src="pic/Icon_ICO-45.png" alt="" style="height: 18px;" align="right"></br></br>
                                    <img src="pic/Icon_ICO-42.png" alt="" style="height: 18px;" align="right">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                                
                                                <img src="pic/logo.png" alt="" style="height: 40px;">&emsp;&emsp;
                                                <label class="font09">083 123 1455</label></br>&emsp;&emsp;
                                                &emsp;&emsp;&emsp;<label class="font11">Sakchai</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <div class="widget-body">
                                    <img src="pic/Icon_ICO-45.png" alt="" style="height: 18px;" align="right"></br></br>
                                    <img src="pic/Icon_ICO-42.png" alt="" style="height: 18px;" align="right">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <img src="pic/AW_Icon_V1-27.png" alt="" style="height: 40px;">&emsp;&emsp;
                                            <label class="font09">1234 43** **** 5678</label></br>&emsp;
                                            <label class="font11">Sakchai</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state" style="height: 105px"></br>
                                            <img src="pic/AW_Icon_V1-31.png" alt="" style="height: 60px;">&emsp;&emsp;
                                            <label class="font03">+ เพิ่มบัญชี</label></br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
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


    
<!--End slide-->
	
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
    $(document).ready(function (e){
        $("#banking_form").on('submit',(function(e){
            e.preventDefault();
            $.ajax({
                url: "SaveUserProfile.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(response) {
                console.log(response)
                if(response=="Error"){
                    swal("บัญชีของท่านมีข้อมูลอยู่ในระบบแล้ว", {
                    icon: "error",
                });
            }
                if(response=="Success"){
                    swal("บันทึกข้อมูลเสร็จสิ้น", {
                    icon: "success",
                    });
                }
            },
                error: function(){} 	        
            });
        }));
    });
</script>
</html>