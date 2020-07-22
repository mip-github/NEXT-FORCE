<?php
session_start();
include('require/config.php');
include('require/config_pdo.php');

$MEMBER_ID = $_SESSION['MEMBER_ID'];
$sql = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql);

$sql1 = "SELECT * FROM member WHERE MEMBER_ID = :MEMBER_ID";
$stmt=$db->prepare($sql1);
$stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$MEMBER_PHOTO = $row['MEMBER_PHOTO'];

$sql2 = "SELECT * FROM project";
$result2 = mysqli_query($conn, $sql2);
$row1 = mysqli_fetch_object($result2);

$sql3 = "SELECT * FROM project";
$stmt=$db->prepare($sql3);
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
?>


<!doctype html>
<html class="no-js" lang="zxx">
<?php require_once __DIR__ . '/require/head.php';?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.css">
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
h1.a{
    color: #000000; 
    font-size: 56px; 
    font-family: 'DB Heavent', DB Heavent;
    font-weight: bold;
}
div.a {
  line-height: normal;
  color: #696969; 
}
div.single-input  {
  width: 60px;
  margin: 0 auto;
  display: block;
}
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
							<h4 class="font01">ระบบการเงินโดยเทคโนโลยี Blockchain ที่จะทำให้ทุกการใช้จ่ายในชีวิตประจำวันเป็นเรื่องง่ายผ่านแอปพลิเคชั่น T10 พร้อมทั้งสิทธิ์การสะสม Point ที่สามารถใช้งานควบคู่กับเงินสด และรองรับเฉพาะกลุ่มสมาชิก T10 เท่านั้น</h4><br><br>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                                <a href="#" class="boxed-btn5"><img src='pic/icon02.png'> White papers</a>&nbsp;&nbsp;
								<a href="#" class="boxed-btn3"><img src='pic/icon01.png'> Presentation</img></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="boxed-box01">
                            <div class="font04">Kalungka CIO Finishes in:</div>
                            <div data-date="<?php echo $row1->PROJECT_END; ?>" id="DateCountdown"></div>
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
    <div align = 'center'>
		<div class="font05"><img width='10' height='10' src ='pic/icon03.png'></img> About us</div>
		<h1 class="font02">Kalungka Project</h1></br>
		<div class="font06">เป็นโครงการที่เกิดขึ้นจากแรงบันดาลใจของอาจารย์กวง ด้วยความมุ่งมั่นในการรวบรวมชาติพันธ์ต่างๆ ที่อาศัยอยู่ในโลกใบนี้</div>
		<div class="font06">ได้มีโอกาสมาร่วมและสร้างสรรค์สังคมที่ดีงาม โดยใช้ชื่อ KALUNGKA กาลังกา ที่มีความหมายถึงความเป็นชาติพันธ์ </div>
		<div class="font06">มีวัฒนธรรมอย่างใหม่เป็นชนเผ่าที่ เกิดขึ้นในศตวรรษที่ 21 และวัฒธรรมนี้จะถูกสร้างสรรค์เป็น Community</div>
		<div class="font06">หรือวัฒนธรรมชุมชนในแบบที่เป็นของตัวเอง เป็นวิถีของกลุ่มที่ไม่เคยมีมาก่อนโดยรวบรวมวัฒนธรรม ไม่ว่างจะเป็นด้านดนตรี </div>
		<div class="font06">การเต้นรำ ภาพยนตร์ เสื้อผ้าเครื่องแต่งกายและการกิน การทำอาหาร เป็นชุมชนที่มาให้ความสุข ความสนุกสนาน อย่างกาลังกา </div>
		<div class="font06">ในลักษณะธรรมชาตินิยมผสมกลมกลืนกับความเป็นไปของเทคโนโลยี Blockchain</div>
		<div class="font06">มีความทันสมัยแต่ไม่ทิ้งขนบธรรมเนียบประเพณี</div></br></br>
	
	<img width='1250 px' src ='pic/pic01.png'></img></br></br></br>
	<div class="team">
		<div class="font05"><img width='10' height='10' src ='pic/icon03.png'></img> Investment</div>
		<h1 class="font02">Investment & Cost Estimation</h1></br>
		<div class="font06">ความสามารถในการสร้างรายได้ที่หลากหลาายรูปแบบจาก Business Model ที่สามารถสร้าง Customer Segment,</div>
		<div class="font06">Value Proposition, Channels และ Customer Relationship ที่เฉพาะตัว</div>
		<div class="font06">รายได้หลักจะถูกแบ่งการลงทุนออกเป็นสัดส่วนการลงทุนในรูปแบบที่ต่างกัน โดนมีกลุ่มหลักดังนี้</div>
		<div class="font06">ค่าใช้จ่ายในการปรับปรุงสถานที่ ค่าใช้จ่ายในการบริหารจัดการ ค่่าโฆษณาประชาสัมพันธ์ และเงินทุนสำรอง</div>
        <img width='1250 px' src ='pic/pic02.png'></img></br></br></br>
        <img width='1250 px' src ='pic/pic03.png'></img></br>
    </div>
    </br></br>
	    <div class="font05"><img width='10' height='10' src ='pic/icon03.png'></img> Team</div>
		<h1 class="font02">Awesome Team</h1></br>

    <div class="container">
    	<div class="row text-center">
    			
    		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe08.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>John Doe</h4>
    				   	
    				   	<p>Managing Director</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe05.jpg' width="100%">
    				   	
    				   	<div class="team-member"></br>
    				   	<h4>Peter</h4>
    				   	
    				   	<p>Project Manager</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe10.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Klara</h4>
    				   	
    				   	<p>Syatem Analysis</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe06.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Anna</h4>
    				   	
    				   	<p>Syatem Analysis</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
                   
    	</div>  <!-- row text-center -->
    			</br></br>
				<div class="row text-center">
    			
    		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe01.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Danel</h4>
    				   	
    				   	<p>Web Developer</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe02.jpg' width="100%">
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Ethan</h4>
    				   	
    				   	<p>Programmer</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe03.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Camilla</h4>
    				   	
    				   	<p>Programmer</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe09.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Vinci</h4>
    				   	
    				   	<p>Programmer</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
                   
    	</div>  <!-- row text-center -->
		
		    			</br></br>
				<div class="row text-center">
    			
    		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe11.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Eva</h4>
    				   	
    				   	<p>UX/UI</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe12.jpg' width="100%">
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Isabella</h4>
    				   	Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@CHINJUNGGGG 
Learn Git and GitHub without any code!
Using the Hello World guide, you’ll start a branch, write comments, and open a pull request.


CHINJUNGGGG
/
kalungka
Private
1
00
 Code
 Issues 0
 Pull requests 0 Actions
 Projects 0
 Security 0
 Insights
 Settings
kalungka/index.php /
 Panupong Klueakaew update 11/06/63
f15f16c 11 days ago
1260 lines (1123 sloc)  68.4 KB
  
<?php
session_start();
include('require/config.php');
include('require/config_pdo.php');

$MEMBER_ID = $_SESSION['MEMBER_ID'];
$sql = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql);

$sql1 = "SELECT * FROM member WHERE MEMBER_ID = :MEMBER_ID";
$stmt=$db->prepare($sql1);
$stmt->bindparam(':MEMBER_ID', $MEMBER_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$MEMBER_PHOTO = $row['MEMBER_PHOTO'];

$sql2 = "SELECT * FROM project";
$result2 = mysqli_query($conn, $sql2);
$row1 = mysqli_fetch_object($result2);

$sql3 = "SELECT * FROM project";
$stmt=$db->prepare($sql3);
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
?>


<!doctype html>
<html class="no-js" lang="zxx">
<?php require_once __DIR__ . '/require/head.php';?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.css">
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
h1.a{
    color: #000000; 
    font-size: 56px; 
    font-family: 'DB Heavent', DB Heavent;
    font-weight: bold;
}
div.a {
  line-height: normal;
  color: #696969; 
}
div.single-input  {
  width: 60px;
  margin: 0 auto;
  display: block;
}
</style>
<style>

            .demoInputBox {
                padding: 7px;
                border: #F0F0F0 1px solid;
                border-radius: 4px;
            }

            #password-strength-status {
                padding: 5px 10px;
                color: #FFFFFF;
                border-radius: 4px;
                margin-top: 5px;
            }

            .medium-password {
                background-color: #b7d60a;
                border: #BBB418 1px solid;
            }

            .weak-password {
                background-color: #ce1d14;
                border: #AA4502 1px solid;
            }

            .strong-password {
                background-color: #12CC1A;
                border: #0FA015 1px solid;
            }
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
							<h4 class="font01">ระบบการเงินโดยเทคโนโลยี Blockchain ที่จะทำให้ทุกการใช้จ่ายในชีวิตประจำวันเป็นเรื่องง่ายผ่านแอปพลิเคชั่น T10 พร้อมทั้งสิทธิ์การสะสม Point ที่สามารถใช้งานควบคู่กับเงินสด และรองรับเฉพาะกลุ่มสมาชิก T10 เท่านั้น</h4><br><br>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                                <a href="#" class="boxed-btn5"><img src='pic/icon02.png'> White papers</a>&nbsp;&nbsp;
								<a href="#" class="boxed-btn3"><img src='pic/icon01.png'> Presentation</img></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="boxed-box01">
                                <div class="font04">Kalungka CIO Finishes in:</div>
                                    <div data-date="<?php echo $row1->PROJECT_END; ?>" id="count-down"></div>

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
    <div align = 'center'>
		<div class="font05"><img width='10' height='10' src ='pic/icon03.png'></img> About us</div>
		<h1 class="font02">Kalungka Project</h1></br>
		<div class="font06">เป็นโครงการที่เกิดขึ้นจากแรงบันดาลใจของอาจารย์กวง ด้วยความมุ่งมั่นในการรวบรวมชาติพันธ์ต่างๆ ที่อาศัยอยู่ในโลกใบนี้</div>
		<div class="font06">ได้มีโอกาสมาร่วมและสร้างสรรค์สังคมที่ดีงาม โดยใช้ชื่อ KALUNGKA กาลังกา ที่มีความหมายถึงความเป็นชาติพันธ์ </div>
		<div class="font06">มีวัฒนธรรมอย่างใหม่เป็นชนเผ่าที่ เกิดขึ้นในศตวรรษที่ 21 และวัฒธรรมนี้จะถูกสร้างสรรค์เป็น Community</div>
		<div class="font06">หรือวัฒนธรรมชุมชนในแบบที่เป็นของตัวเอง เป็นวิถีของกลุ่มที่ไม่เคยมีมาก่อนโดยรวบรวมวัฒนธรรม ไม่ว่างจะเป็นด้านดนตรี </div>
		<div class="font06">การเต้นรำ ภาพยนตร์ เสื้อผ้าเครื่องแต่งกายและการกิน การทำอาหาร เป็นชุมชนที่มาให้ความสุข ความสนุกสนาน อย่างกาลังกา </div>
		<div class="font06">ในลักษณะธรรมชาตินิยมผสมกลมกลืนกับความเป็นไปของเทคโนโลยี Blockchain</div>
		<div class="font06">มีความทันสมัยแต่ไม่ทิ้งขนบธรรมเนียบประเพณี</div></br></br>
	
	<img width='1250 px' src ='pic/pic01.png'></img></br></br></br>
	<div class="team">
		<div class="font05"><img width='10' height='10' src ='pic/icon03.png'></img> Investment</div>
		<h1 class="font02">Investment & Cost Estimation</h1></br>
		<div class="font06">ความสามารถในการสร้างรายได้ที่หลากหลาายรูปแบบจาก Business Model ที่สามารถสร้าง Customer Segment,</div>
		<div class="font06">Value Proposition, Channels และ Customer Relationship ที่เฉพาะตัว</div>
		<div class="font06">รายได้หลักจะถูกแบ่งการลงทุนออกเป็นสัดส่วนการลงทุนในรูปแบบที่ต่างกัน โดนมีกลุ่มหลักดังนี้</div>
		<div class="font06">ค่าใช้จ่ายในการปรับปรุงสถานที่ ค่าใช้จ่ายในการบริหารจัดการ ค่่าโฆษณาประชาสัมพันธ์ และเงินทุนสำรอง</div>
        <img width='1250 px' src ='pic/pic02.png'></img></br></br></br>
        <img width='1250 px' src ='pic/pic03.png'></img></br>
    </div>
    </br></br>
	    <div class="font05"><img width='10' height='10' src ='pic/icon03.png'></img> Team</div>
		<h1 class="font02">Awesome Team</h1></br>

    <div class="container">
    	<div class="row text-center">
    			
    		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe08.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>John Doe</h4>
    				   	
    				   	<p>Managing Director</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe05.jpg' width="100%">
    				   	
    				   	<div class="team-member"></br>
    				   	<h4>Peter</h4>
    				   	
    				   	<p>Project Manager</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe10.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Klara</h4>
    				   	
    				   	<p>Syatem Analysis</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe06.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Anna</h4>
    				   	
    				   	<p>Syatem Analysis</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
                   
    	</div>  <!-- row text-center -->
    			</br></br>
				<div class="row text-center">
    			
    		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe01.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Danel</h4>
    				   	
    				   	<p>Web Developer</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe02.jpg' width="100%">
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Ethan</h4>
    				   	
    				   	<p>Programmer</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe03.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Camilla</h4>
    				   	
    				   	<p>Programmer</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe09.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Vinci</h4>
    				   	
    				   	<p>Programmer</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
                   
    	</div>  <!-- row text-center -->
		
		    			</br></br>
				<div class="row text-center">
    			
    		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe11.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Eva</h4>
    				   	
    				   	<p>UX/UI</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe12.jpg' width="100%">
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Isabella</h4>
    				   	
    				   	<p>UX/UI</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		 </div> <!--col-lg-4 -->
    				
    		 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe07.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Gracie</h4>
    				   	
    				   	<p>Admin</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    				   
    				   	<img class="img-rounded" alt="team-photo" src='pic/pe04.jpg' width="100%"> 
    				   	
    				   	<div class="team-member"></br>
                        
    				   	<h4>Jennifer</h4>
    				   	
    				   	<p>Admin</p>
                        
    				   	</div>
    				   	
    				   	<p class="social">
    				   		<a href="#"><span class="fa fa-facebook-square"></span></a>
    				   		<a href="#"><span class="fa fa-twitter-square"></span></a>
    				   		<a href="#"><span class="fa fa-linkedin-square"></span></a>
    				   		<a href="#"><span class="fa fa-google-plus-square"></span></a>
    				   	</p>
    						    					    				
    		    </div> <!-- col-lg-4 -->
                   
    	</div>  <!-- row text-center -->
    </div>
</br></br>    

    <div class="team">		
            <div class="font05"><img width='10' height='10' src ='pic/icon03.png'></img> Roadmap</div>
            <h1 class="font02">About Kalungka Roadmap</h1></br></br>
            <img width='1250 px' src ='pic/pic04.png'></img>
    </div>
</div>

<?php if (isset($_SESSION['MEMBER_ID'])) { ?>
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
                    <li><a href="DetailProject.php?id=<?=$PROJECT_ID?>" class="entypo1-slide"><img height='30' src='pic/AW_Icon_V1-08.png'></img><span>&nbsp;<?=$PROJECT_NAME?></span></a></li>
                <?php }} ?>
                </ul>
            </aside>

<?php require_once __DIR__.'/require/footer.php'; ?>	
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="function_login.php" method="POST" id="login_form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <img src="pic/bg_2.png" class="rounded float-left img-fluid" alt="..." style="width: 300px; height: 685px;">
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
                    <img src="pic/bg_2.png" class="rounded float-left img-fluid" alt="..." style="width: 300px; height: 685px;">
                    <form action="register_query.php" method="POST" id="register_form" enctype="multipart/form-data" >
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
                                                placeholder="กรอกชื่อของคุณ" data-validation="required" required>
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
                                                data-validation="required" required>
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
                                                id="MEMBER_GENDER" data-validation="required" required>
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
                                                id="MEMBER_BIRTH">
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
                                                placeholder="กรอกเบอร์โทรศัพท์ของคุณ" data-validation="required" required>
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
                                                data-validation="required" required>
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
                                                data-validation="required" required>
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
                                                data-validation="required" required>
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
                                            data-validation="required" required>
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
                                            data-validation="required" required>
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
                                                    data-validation="required" required>
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
                                                id="BANK_BRANCH" placeholder="สาขา" required>
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
                                                id="ACCOUNT_BANK_NUMBER" data-validation="required" placeholder="กรอกเลขที่บัญชีธนาคาร" required>
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
                                                data-validation="required" required>
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
                                                data-validation="required" required>
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
                                                data-validation="strength" data-validation-strength="2" required>
                                        </div>
                                        <div id="error-nwl"></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        ยืนยันรหัสผ่าน</font>
                                                </b></label>
                                            <input type="password" class="form-control" name="MEMBER_PASSWORD1"
                                                id="MEMBER_PASSWORD1" placeholder="รหัสผ่าน 6 ตัวขึ้นไป"
                                                data-validation="confirmation" required>
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
                                                    data-validation="required" required>
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
            <!-- End Sign up -->

                
</body>

<?php require_once __DIR__.'/require/script.php';?>
<?php require_once __DIR__.'/require/timecircle.php';?>
<script src="validator/jquery.form.validator.min.js"></script>
<script src="validator/security.js"></script>
<script src="validator/file.js"></script>
<script src="require/script.js"></script>
<script src="src/jquery.stepProgressBar.js"></script>
<script>
            $.validate({
                modules: 'security, file',
                onModulesLoaded: function () {
                    $('input[name="MEMBER_PASSWORD"]').displayPasswordStrength();
                }
            });
        </script>
<script type="text/javascript">
$(function() {
    var provinceObject = $('#province');
    var amphureObject = $('#amphure');
    var districtObject = $('#district');
    // on change province
    provinceObject.on('change', function() {
        var provinceId = $(this).val();
        amphureObject.html('<option value="">เลือกเขต/อำเภอ</option>');
        districtObject.html('<option value="">เลือกแขวง/ตำบล</option>');
        $.get('get_amphur.php?province_id=' + provinceId, function(data) {
            var result = JSON.parse(data);
            $.each(result, function(index, item) {
                amphureObject.append(
                    $('<option></option>').val(item.id).html(item.name_th1)
                );
            });
        });
    });
    // on change amphure
    amphureObject.on('change', function() {
        var amphureId = $(this).val();
        districtObject.html('<option value="">เลือกแขวง/ตำบล</option>');
        $.get('get_district.php?amphure_id=' + amphureId, function(data) {
            var result = JSON.parse(data);
            $.each(result, function(index, item) {
                districtObject.append(
                    $('<option></option>').val(item.id).html(item.name_th2)
                );
            });
        });
    });
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
                if(response=="Success"){
                    swal("Login Success", {
                    icon: "success",
                });
                    setTimeout(function() {
                    window.location.href = "index.php";
                    }, 2000);
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
© 2020 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
Pricing
API
Training
Blog
About

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
                    <img src="pic/bg_2.png" class="rounded float-left img-fluid" alt="..." style="width: 300px; height: 685px;">
                    <form action="register_query.php" method="POST" id="register_form" enctype="multipart/form-data" >
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
                                                placeholder="กรอกชื่อของคุณ" data-validation="required" required>
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
                                                data-validation="required" required>
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
                                                id="MEMBER_GENDER" data-validation="required" required>
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
                                                id="MEMBER_BIRTH">
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
                                                placeholder="กรอกเบอร์โทรศัพท์ของคุณ" data-validation="required" required>
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
                                                data-validation="required" required>
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
                                                data-validation="required" required>
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
                                                data-validation="required" required>
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
                                            data-validation="required" required>
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
                                            data-validation="required" required>
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
                                                    data-validation="required" required>
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
                                                id="BANK_BRANCH" placeholder="สาขา" required>
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
                                                id="ACCOUNT_BANK_NUMBER" data-validation="required" placeholder="กรอกเลขที่บัญชีธนาคาร" required>
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
                                                data-validation="required" required>
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
                                                data-validation="required" required>
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
                                                data-validation="strength" data-validation-strength="2" required>
                                        </div>
                                        <div id="error-nwl"></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group-md">
                                            <label for="inputEmail4"><b>
                                                    <font
                                                        style="color: #000000; font-size: 18px; font-family: 'DB Heavent', DB Heavent;">
                                                        ยืนยันรหัสผ่าน</font>
                                                </b></label>
                                            <input type="password" class="form-control" name="MEMBER_PASSWORD1"
                                                id="MEMBER_PASSWORD1" placeholder="รหัสผ่าน 6 ตัวขึ้นไป"
                                                data-validation="confirmation" required>
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
                                                    data-validation="required" required>
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
            <!-- End Sign up -->

                
</body>

<?php require_once __DIR__.'/require/script.php';?>
<?php require_once __DIR__.'/require/timecircle.php';?>
<script src="dist/css1/main.js"></script>
<script src="validator/jquery.form.validator.min.js"></script>
<script src="validator/security.js"></script>
<script src="validator/file.js"></script>
<script src="require/script.js"></script>
<script src="src/jquery.stepProgressBar.js"></script>
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
            $.validate({
                modules: 'security, file',
                onModulesLoaded: function () {
                    $('input[name="MEMBER_PASSWORD"]').displayPasswordStrength();
                }
            });
        </script>
<script type="text/javascript">
$(function() {
    var provinceObject = $('#province');
    var amphureObject = $('#amphure');
    var districtObject = $('#district');
    // on change province
    provinceObject.on('change', function() {
        var provinceId = $(this).val();
        amphureObject.html('<option value="">เลือกเขต/อำเภอ</option>');
        districtObject.html('<option value="">เลือกแขวง/ตำบล</option>');
        $.get('get_amphur.php?province_id=' + provinceId, function(data) {
            var result = JSON.parse(data);
            $.each(result, function(index, item) {
                amphureObject.append(
                    $('<option></option>').val(item.id).html(item.name_th1)
                );
            });
        });
    });
    // on change amphure
    amphureObject.on('change', function() {
        var amphureId = $(this).val();
        districtObject.html('<option value="">เลือกแขวง/ตำบล</option>');
        $.get('get_district.php?amphure_id=' + amphureId, function(data) {
            var result = JSON.parse(data);
            $.each(result, function(index, item) {
                districtObject.append(
                    $('<option></option>').val(item.id).html(item.name_th2)
                );
            });
        });
    });
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
                if(response=="Success"){
                    swal("Login Success", {
                    icon: "success",
                });
                    setTimeout(function() {
                    window.location.href = "index.php";
                    }, 2000);
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