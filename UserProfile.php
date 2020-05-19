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

$sql2 = "SELECT * FROM provinces WHERE id = :PROVINCE_ID";
$stmt=$db->prepare($sql2);
$stmt->bindparam(':PROVINCE_ID', $PROVINCE_ID);
$stmt->execute();
$row1=$stmt->fetch(PDO::FETCH_ASSOC);
$PROVINCE_NAME = $row1['name_th'];
$PROVINCE = $row1['id'];

$sql3 = "SELECT * FROM amphures WHERE id = :AMPHURE_ID";
$stmt=$db->prepare($sql3);
$stmt->bindparam(':AMPHURE_ID', $AMPHURE_ID);
$stmt->execute();
$row2=$stmt->fetch(PDO::FETCH_ASSOC);
$AP_NAME = $row2['name_th'];
$AMPHURES_ID = $row2['id'];

$sql4 = "SELECT * FROM districts WHERE id = :DISTRINCT_ID";
$stmt=$db->prepare($sql4);
$stmt->bindparam(':DISTRINCT_ID', $DISTRINCT_ID);
$stmt->execute();
$row3=$stmt->fetch(PDO::FETCH_ASSOC);
$DT_NAME = $row3['name_th'];




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
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="pic/logo.png" alt="" style="width: 150px; height: 70px;">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Project</a></li>
                                            <li><a href="#">Investment</a></li>
                                            <li><a href="#">Team</a></li>
                                            <li><a href="#">Roadmap</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <?php if (isset($_SESSION['MEMBER_ID'])) { ?>
                                   
                                   <label class ="font07">|</label>&emsp;
                                   <img src ="pic/AW_Icon_V1-15.png" style="height: 20px">&emsp;
                                   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><label class ="font06"><?php echo $_SESSION['MEMBER_NAME']; ?> <?php echo $_SESSION['MEMBER_SERNAME']; ?></label> </a>&emsp;
                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                       <a class="dropdown-item" href="index.php">Home</a>
                                       <a class="dropdown-item" href="profile.php">Profile</a>
                                       <a class="dropdown-item" href="logout.php">Log out</a>
                                   </div> 
                                   <img src="pic/user3.jpg" class="rounded-circle" width="50" />
                                      
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
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
                    <form action="SaveUserProfile.php" method="POST" encypte="multipart/form-data" id="profile_form"> 
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="font12">ชื่อ</div><br>
                                <input type="text" class="form-control form-control-lg" id="MEMBER_NAME" name="MEMBER_NAME" value="<?=$MEMBER_NAME?>">
                            </div>
                            <div class="form-group col-md-3">
                                <div class="font12">นามสกุล</div><br>
                                <input type="text" class="form-control form-control-lg" id="MEMBER_SERNAME" name="MEMBER_SERNAME" value="<?=$MEMBER_SERNAME?>">
                            </div>
                            <div class="form-group col-md-2">
                                <div class="font12">เพศ</div><br>
                                <select class="form-control form-control-lg" id="MEMBER_GENDER" name="MEMBER_GENDER" class="form-control form-control-lg">
                                    <option selected><?=$MEMBER_GENDER?></option>
                                    <option>ชาย</option>
                                    <option>หญิง</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="font12">วัน/เดือน/ปีเกิด</div><br>
                                <input type="date" class="form-control form-control-lg" id="MEMBER_BIRTH" name="MEMBER_BIRTH" value="">
                            </div>
                            <div class="form-group col-md-3">
                                <div class="font12">เบอร์โทรศัพท์</div><br>
                                <input type="text" class="form-control form-control-lg" id="MEMBER_TEL" name="MEMBER_TEL" value="<?=$MEMBER_TEL?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                </br></br><div class="font08">ข้อมูลที่อยู่</div>
                                <hr class="my-4" style="border-color: #006665;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="font12">บ้านเลขที่</div><br>
                                <input type="text" class="form-control form-control-lg" id="MEMBER_HOUSE" name="MEMBER_HOUSE" value="<?=$MEMBER_HOUSE?>">
                            </div>
                            <div class="form-group col-md-3">
                                <div class="font12">หมู่บ้าน/หมู่ที่</div><br>
                                <input type="text" class="form-control form-control-lg" id="MEMBER_VILLAGE" name="MEMBER_VILLAGE" value="<?=$MEMBER_VILLAGE?>">
                            </div>
                            <div class="form-group col-md-3">
                                <div class="font12">ซอย</div><br>
                                <input type="text" class="form-control form-control-lg" id="MEMBER_ALLEY" name="MEMBER_ALLEY" value="<?=$MEMBER_ALLEY?>">
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="font12">จังหวัด</div><br>
                                <select id="province" name="province_id" data-where="2" class="ajax_address form-control form-control-lg">
                                    <option value=""><?=$PROVINCE_NAME?></option>
                                    <?php while($result = mysqli_fetch_assoc($query)): ?>
                                    <option value="<?=$result['id']?>"><?=$result['name_th']?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="font12">เขต/อำเภอ</div><br>
                                <select id="amphure" name="amphure_id" data-where="3" class="ajax_address form-control form-control-lg">
                                    <option value=""><?=$AP_NAME?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="font12">แขวง/ตำบล</div><br>
                                <select name="district_id" id="district"data-where="4" class="ajax_address form-control form-control-lg">
                                    <option value=""><?=$DT_NAME?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="font12">ไปรษณีย์</div><br>
                                <input type="text" id="POSTCODE_ID" name="POSTCODE_ID" data-where="5" class="ajax_address form-control form-control-lg" value="<?=$POSTCODE_ID?>">
                                </select>
                            </div>     
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-1"><br><br>
                                <button type="submit" name="submit" id="submit"  style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">บันทึก</font></button>
                                <input type="hidden" name="do" value="compaint">
                                <input type="hidden" name="MEMBER_ID" value="<?=$MEMBER_ID_1?>">
                            </div>
                            <div class="form-group col-md-1"><br><br>
                                <button type="button" style="background: #696969; border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ยกเลิก</font></button>
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
        <li><a href="#" class="entypo-slide"><img height='30' src ='pic/AW_Icon_V1-08.png'></img><span>&nbsp;การซื้อของฉัน</span></a></li>
        <li><a href="UserProfile.php" class="entypo-slide"><img height='30' src ='pic/AW_Icon_V1-02.png'><span>&nbsp;ข้อมูลส่วนตัว</span></a></li>
        <li><a href="#" class="entypo-slide"><img height='30' src ='pic/AW_Icon_V1-03.png'><span>&nbsp;การยืนยันตัวตน</span></a></li>
        <li><a href="#" class="entypo-slide"><img height='30' src ='pic/AW_Icon_V1-04.png'><span>&nbsp;บัญชีธนาคาร</span></a></li>
        <li><a href="UserCompaint.php" class="entypo-slide"><img height='30' src ='pic/AW_Icon_V1-05.png'><span> &nbsp;แจ้งเรื่องร้องเรียน</span></a></li>
        <li><a href="#" class="entypo-slide"><img height='30' src ='pic/AW_Icon_V1-06.png'><span>&nbsp;ประวัติรายงาน</span></a></li>
        <li><a href="#" class="entypo-slide"><img height='30' src ='pic/AW_Icon_V1-07.png'><span>&nbsp;ตั้งค่าภาษา</span></a></li>
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
        $("#profile_form").on('submit',(function(e){
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
                    swal("", {
                    icon: "warning",
                });
            }
                if(response=="Success"){
                    swal("", {
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