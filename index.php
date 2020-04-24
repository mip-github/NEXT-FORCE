<?php
include('require/config.php');
$sql = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql);
?>

<!doctype html>
<html class="no-js" lang="zxx">
    <?php require_once __DIR__ . '/require/head.php';?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
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
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <!-- <div class="d-none d-lg-block">
                                        <a class="linkhover" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        <font style="font-size: 26px; font-family: 'Roboto', sans-serif; font-weight: 350;">Sign in</font>
                                        </a>
                                    </div> -->
                                    <div class="d-none d-lg-block">
                                        <a class="linkhover" href="#" data-toggle="modal" data-target="#exampleModal">
                                        <font style="font-size: 26px; font-family: 'Roboto', sans-serif; font-weight: 350;">Sign in</font>
                                        </a>
                                    </div>
                                    &emsp;
                                    <font style="font-size: 26px; font-family: 'Roboto', sans-serif; font-weight: 350;">/</font>
                                    &emsp;
                                    <div class="d-none d-lg-block">
                                        <a class="linkhover" href="#" data-toggle="modal" data-target="#exampleModal">
                                        <font style="font-size: 26px; font-family: 'Roboto', sans-serif; font-weight: 350;">Sign up</font>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <!-- <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".1s">Get Loan for your Business growth or startup</h3>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                                <a href="#" class="boxed-btn3">How it Works</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-5 col-md-6">
                        <div class="payment_form white-bg wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".2s">
                            <div class="info text-center">
                                <h4>How much do you want?</h4>
                                <p>We provide online instant cash loans with quick</p>
                            </div>
                            <div class="form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_input">
                                            <select class="wide">
                                                <option data-display="Amount">Amount</option>
                                                <option value="1">$10</option>
                                                <option value="2">$40</option>
                                                <option value="3">$50</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_input">
                                            <select class="wide">
                                                <option data-display="Month">Month</option>
                                                <option value="1">3 Month</option>
                                                <option value="2">6 Month</option>
                                                <option value="3">9 Month</option>
                                                <option value="4">12 Month</option>
                                            </select>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <p>You have to pay: <span>$0</span></p>
                            <div class="submit_btn">
                                <button class="boxed-btn3" type="submit">Continue</button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <form action="register_query.php" method="POST" enctype="multipart/form-data" id="register_form">
                <div class="modal-body">
                    <img src="pic/bg_2.png" class="rounded float-left" alt="..." style="width: 500px; height: 700px;">
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-12">
                                <Br>
                                    <div class="single_input">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 36px; font-family: 'DB Heavent', DB Heavent;">สมัครสมาชิก</font></b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <label for="inputEmail4"><b><font style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">ข้อมูลส่วนตัว</font></b></label>
                                        <hr class="my-4" style="border-color: #006665;"> 
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group-md">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">ชื่อ</font></b></label>
                                        <input type="text" class="form-control" name="MEMBER_NAME" id="MEMBER_NAME" placeholder="กรอกชื่อของคุณ" data-validation="required"> 
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="input-group-md">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">นามสกุล</font></b></label>
                                        <input type="text" class="form-control" name="MEMBER_SURNAME" id="MEMBER_SURNAME" placeholder="กรอกนามสกุลของคุณ" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">เพศ</font></b></label>
                                        <select class="form-control form-control-md" name="MEMBER_GENDER" id="MEMBER_GENDER" data-validation="required">
                                            <option value="">เลือกเพศ</option>
                                            <option value="ชาย">ชาย</option>
                                            <option value="หญิง">หญิง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group-md">
                                    <br>
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">วัน/เดือน/ปีเกิด</font></b></label>
                                        <input type="date" class="form-control" name="MEMBER_BIRTH" id="MEMBER_BIRTH" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="input-group-md">
                                    <br>
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">เบอร์โทรศัพท์</font></b></label>
                                        <input type="number" class="form-control" name="MEMBER_TEL" id="MEMBER_TEL" placeholder="กรอกเบอร์โทรศัพท์ของคุณ" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <br>
                                    <div class="single_input">
                                        <label for="inputEmail4"><b><font style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">ข้อมูลที่อยู่</font></b></label>
                                        <hr style="border-color: #006665;">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group-md">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">บ้านเลขที่</font></b></label>
                                        <input type="text" class="form-control" name="MEMBER_HOUSE" id="MEMBER_HOUSE" placeholder="กรอกบ้านเลขที่ของคุณ" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group-md">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">หมู่บ้าน/หมู่ที่</font></b></label>
                                        <input type="text" class="form-control" name="MEMBER_VILLAGE" id="MEMBER_VILLAGE" placeholder="กรอกหมู่บ้านของคุณ" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group-md">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">ซอย</font></b></label>
                                        <input type="text" class="form-control" name="MEMBER_ALLEY" id="MEMBER_ALLEY" placeholder="กรอกซอยของคุณ" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-lg-3"><br>
                                    <label for="province"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">จังหวัด</font></b></label>
                                    <select name="province_id" id="province" class="form-control form-control-md" data-validation="required">
                                        <option value="">เลือกจังหวัด</option>
                                        <?php while($result = mysqli_fetch_assoc($query)): ?>
                                            <option value="<?=$result['id']?>"><?=$result['name_th']?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="col-lg-3"><br>
                                    <label for="amphure"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">อำเภอ/เขต</font></b></label>
                                    <select name="amphure_id" id="amphure" class="form-control form-control-md" data-validation="required">
                                        <option value="">เลือกอำเภอ/เขต</option>
                                    </select>
                                </div>
                                <div class="col-lg-3"><br>
                                    <label for="district"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">ตำบล/แขวง</font></b></label>
                                    <select name="district_id" id="district" class="form-control form-control-md" data-validation="required">
                                        <option value="">เลือกตำบล/แขวง</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                    <br>
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b><font style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">รหัสไปรษณีย์</font></b></label>
                                            <input type="text" class="form-control" name="MEMBER_POSTCODE" id="MEMBER_POSTCODE" placeholder="กรอกรหัสไปรษณีย์" data-validation="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <br><br> <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="submit" id="submit" value="ถัดไป" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">
                        <input type="hidden" name="do" value="registion">
                    </div>
                    </form>    
                </div>   
            </div>
    
    <div class="modal fade exampleModal1" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <form name="frm">
                <div class="modal-body">
                    <img src="pic/bg_2.png" class="rounded float-left" alt="..." style="width: 500px; height: 700px;">
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-12">
                                <Br>
                                    <div class="single_input">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 36px; font-family: 'DB Heavent', DB Heavent;">ข้อกำหนดและเงื่อนไข</font></b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-group-md">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="21" style="min-width: 100%; height: 100%;" readonly></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-group-md">
                                    <input type="checkbox" id="accept" name="accept" value="checkbox" onClick="if(frm.accept.checked==false){frm.submit.disabled=true;}else{frm.submit.disabled=false;}">
                                        <label for="accept"> กรุณายืนยันว่า คุณได้ศึกษาและยอมรับข้อกำหนดและเงื่อนไขของทางบริษัท T10 เรียบร้อยแล้ว เพื่อดำเนินการต่อ</label>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <br><br> <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" name="submit" id="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2" disabled>ถัดไป</button>
                        <input type="hidden" name="do" value="registion">
                    </div>
                    </form>    
                </div>   
            </div>
        </div>
    </div>  
    <div class="modal fade exampleModal2" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <form action="register_query.php" method="POST" enctype="multipart/form-data" id="register_form">
                <div class="modal-body">
                    <img src="pic/bg_2.png" class="rounded float-left" alt="..." style="width: 500px; height: 700px;">
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-12">
                                <Br>
                                    <div class="single_input">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 36px; font-family: 'DB Heavent', DB Heavent;">อัพโหลดเอกสาร ยืนยันตัวตน</font></b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <label for="inputEmail4"><b><font style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">กรอกข้อมูลบัตรประชาชน / หนังสือเดินทาง</font></b></label>
                                        <hr class="my-4" style="border-color: #006665;"> 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group-md">
                                        <label for="inputEmail4"><b><font style="color: #000000; font-size: 22px; font-family: 'DB Heavent', DB Heavent;">เลขที่บัตรประชาชน/ หนังสือเดินทาง</font></b></label>
                                        <input type="text" class="form-control" name="MEMBER_ID" id="MEMBER_ID" placeholder="กรอกเลขที่บัตรประชาชน/หนังสือเดินทาง" data-validation="required"> 
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    <img src="pic/card_number.png" style="width: 250px; height: 210px;">
                                </div> 
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <BR><br>
                                        <label for="inputEmail4"><b><font style="color: #006665; font-size: 20px; font-family: 'DB Heavent', DB Heavent;">อัพโหลดรูปหลักฐานยืนยันตัวตน ( อัพโหลดได้ไม่เกิน 2 MB )</font></b></label>
                                        <hr class="my-4" style="border-color: #006665;"> 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group-md">
                                        <input type="file" class="form-control" name="MEMBER_PHOTO" id="MEMBER_PHOTO" data-validation-max-size="2mb" data-validation="mime size" data-validation-allowing="jpg, png"> 
                                    </div>
                                </div>                
                            </div>
                        </div>    
                    </div>
                    <br><br> <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="submit" id="submit" value="ถัดไป" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1" disabled>
                        <input type="hidden" name="do" value="registion">
                    </div>
                    </form>    
                </div>   
            </div>
        </div>  
</body>

<script src="require/jquery.min.js"></script>
<script src="require/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="validator/jquery.form.validator.min.js"></script>
<script src="validator/security.js"></script>
<script src="validator/file.js"></script>
<script>
        // $( document ).ready(function() {
        //     console.log( "1234" );
        // });
        $( "#register_form" ).submit(function( event ) {
            var _this = $(this)
            $.ajax({
            type: "POST",    
            url: "register_query.php",
            data: _this.serialize(),
            //dataType: "json",
            success: function (response) {
                console.log(response)
            // alert('Complete Update Profile')
            // location.reload();
            }
        })
        event.preventDefault();
    });
</script>
<script>
    $.validate({
        modules: 'security, file',
        onModulesLoaded: function () {
            $('input[name="pass_confirmation"]').displayPasswordStrength();
        }
    });
</script>
<script type="text/javascript">
        $(function(){
            $("#accept").click(function(){ 
                if($(this).prop("checked")==true){ 
                    $("#submit").removeAttr("disabled");
                }else{ 
                    $("#submit").attr("disabled","disabled"); 
                }
            });
        });
</script>
</html>