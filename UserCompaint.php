<?php session_start();  ?>


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
                            </br></br><div class="font08">แจ้งเรื่องร้องเรียน</div>
                            <hr class="my-4" style="border-color: #006665;">
                        </div>
                    </div> 
                    <form action="SaveUserProfile.php" method="POST" encypte="multipart/form-data" id="compaint_form">   
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="font09">หัวข้อที่ร้องเรียน<font style="color: red;">*</font></div><br>
                                    <div class="input-group input-group-lg">
                                        <select class="form-control form-control-lg" name="COM_TOPIC" id="COM_TOPIC">
                                            <option value="">เลือกประเภท</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div><br>
                                <div class="font09">ข้อความส่งถึงเจ้าหน้าที่<font style="color: red;">*</font></div><br>
                                    <div class="input-group input-group-lg">
                                        <textarea class="form-control" id="COM_DETAIL" name="COM_DETAIL" rows="10"></textarea>
                                    </div><br> 
                                <div class="font09">วัน/เดือน/ปี ที่เกิดปัญหา<font style="color: red;">*</font></div><br>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="COM_DATE" id="COM_DATE">
                                    </div>        
                            </div>
                            <div class="col-lg-6">
                                <div class="font09">แนบหลักฐาน (กรุณาอัพโหลดไฟล์รูปภาพที่มีสกุลดังนี้ (.jpg , .pdf))<font style="color: red;">*</font></div><br>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="COM_FILES" id="COM_FILES" data-validation-max-size="25mb" data-validation="mime size" data-validation-allowing="jpg, pdf" onchange="readURL(this);">
                                </div><br>
                            <img id="picture" src="#"><br><BR>
                            <button type="submit" name="submit" id="submit"  style="background: linear-gradient(-90deg, #003333,#009999); border-radius: 100px; padding: 5px 30px;"><font style="font-size: 24px; color: #ffffff; font-family: 'DB Heavent', DB Heavent;">ส่งเรื่องร้องเรียน</font></button>
                            <input type="hidden" name="do" value="compaint">
                        </div>
                    </form>    
                    </div>    
					</hr>
				</div>
			</div>
        


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
        $("#compaint_form").on('submit',(function(e){
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