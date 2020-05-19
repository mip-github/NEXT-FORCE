
<style>
	
    .btn-a {
      background: linear-gradient(-90deg, #003333,#009999);
      box-shadow: 0 5px 0 #052030;
      border-radius: 10px;
      color: white;
      /* color: white; */
      /* padding: 1em 1.5em; */
      padding: 0.6em 0.5em;
      position: relative;
      text-decoration: none;
      text-transform: uppercase;
    }
    
    .btn-a:hover {
      background-color: #164a6b;
    }
    
    .btn-a:active {
      box-shadow: none;
      top: 5px;
    }
    
    #scount{
        border-top: 3px solid lightblue;
        border-bottom: 3px solid lightblue;
        /* width: 100%; */
        text-align:right;
        
    }
    #scount a{
        padding-top:10px;
        padding-bottom:10px;
        font-size:17px;
        letter-spacing: 8pt;
        color: #315252;
        text-shadow: -0px 0px hsla(0, 0%, 0%, 0.2), 0px -0px hsla(0, 0%, 100%, 0.2), -0.5px 0.5px hsla(0, 0%, 0%, 0.2), 0.5px -0.5px hsla(0, 0%, 100%, 0.2), -1px 1px hsla(0, 0%, 0%, 0.2), 1px -1px hsla(0, 0%, 100%, 0.2), -1.5px 1.5px hsla(0, 0%, 0%, 0.2), 1.5px -1.5px hsla(0, 0%, 100%, 0.2), 0px 0px 4.5px hsla(0, 0%, 0%, 1);
    }
    
    
        
    </style>
    



<footer class="footer">
        <!-- Slide Logo -->
        
	<div class="team">
		<div id="section-logo-slide">
            <div class="container">
                <div class="logo-slide supermartket-owl-carousel" data-number="4" data-margin="100" data-navcontrol="yes" align = 'center'>
                    <img src="pic/logo_mi.png" alt="logo" width="141" height="100">
                    <img src="pic/mie.png" alt="logo" width="141" height="100">
                </div>
            </div>
        </div>
	</div>
        <!-- End .logo-slide-->
        <div class="container">
            <hr class="supermartket-hr">
        </div>

        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md-3 col-sm-6 has-logo">
                        <div class="footer-top-logo">
                            <h1 class="logo">
                                <img src="pic/logo.png" style="height:42px" alt="logo">
                            </h1>
                        </div>
                        <div class="footer-infomation">
							<p>ระบบการเงินโดยเทคโนโลยี</p>
                            <p>Blockchain ที่จะทำให้ทุกการใช้</p>
                            <p>จ่ายในชีวิตประจำวันเป็น</p>
                            <p>เรื่องง่ายผ่านแอปพลิเคชั่น T10</p>
							<p><a href="#"><img src="pic/Icon_ICO-14.png" width="25" height="25"></a> &nbsp;&nbsp;
							<a href="#"><img src="pic/Icon_ICO-15.png" width="15" height="25"></a>&nbsp;&nbsp;
							<a href="#"><img src="pic/Icon_ICO-16.png" width="25" height="25"></a>&nbsp;&nbsp;
							<a href="#"><img src="pic/Icon_ICO-17.png" width="25" height="25"></a></p>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-top-title"><h3 class="title-footer" >Contact</h3></div>
                            <p><span>Address:</span>351 Everymail Nonthburi 10890</p>
                            <p><span>Email :</span>T10@kalungka.com</p>
							<p><span>Phone :</span>0876865467</p>
                    </div>
					<div class="col-md-3 col-sm-6">
                        <div class="footer-top-title"><h3 class="title-footer">Link</h3></div>
                        <ul>
                            <li class="footer-item"><a href="#">About</a></li>
                            <li class="footer-item"><a href="#">Project</a></li>
                            <li class="footer-item"><a href="#">Investment</a></li>
                            <li class="footer-item"><a href="#">Team</a></li>
							<li class="footer-item"><a href="#">Roadmap</a></li>
                        </ul>
                    </div>
					
					<div class="col-md-3 col-sm-6">
                        <div class="footer-top-title"><h3 class="title-footer">Subscribe</h3></div>
                        <td>
							<input type="text" placeholder="Email"></br></br>
							<button class="btn7" type="send">Send</button>
						</td>
                    </div>
                </div>
            </div>
        </div>
       
    </footer>

<script>
function logoff(){
    $.post("Command", {action: "logoff"})
    .done(function( data ) {
        if(data=="success")
        {
            location.reload();
        }
        else
            alert(data);
    });

}
</script>