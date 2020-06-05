<?php session_start(); ?>
        
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="pic/nextforce1.png" alt="" style="width: 300px; height: 50px;">
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
                                    <?php if (isset($_SESSION['MEMBER_ID'])) { ?>
                                   
                                            <label class ="font07">|</label>&emsp;
                                            <img src ="pic/AW_Icon_V1-15.png" style="height: 20px">&emsp;
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><label class ="font06"><?php echo $_SESSION['MEMBER_NAME']; ?> <?php echo $_SESSION['MEMBER_SERNAME']; ?></label> </a>&emsp;
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="index.php">Home</a>
                                                <a class="dropdown-item" href="UserBuy.php">Profile</a>
                                                <a class="dropdown-item" href="logout.php">Log out</a>
                                            </div> 
                                            <img src="pic/user3.jpg" class="rounded-circle" width="50" />
                                               
                                    <?php 
                                    
                                    }else{
                                            echo "<div class='d-none d-lg-block'>
                                                    <a class='linkhover' href='#' data-toggle='modal' data-target='#loginModal'>
                                                        <font style='font-size: 26px; font-family: 'Roboto', sans-serif; font-weight: 350;'>Sign in</font>
                                                    </a>
                                                  </div>
                                                &emsp;
                                                <font style='font-size: 26px; font-family: 'Roboto', sans-serif; font-weight: 350;'> /</font>
                                                &emsp;
                                                  <div class='d-none d-lg-block'>
                                                    <a class='linkhover' href='#' data-toggle='modal' data-target='#exampleModal'>
                                                        <font
                                                            style='font-size: 26px; font-family: 'Roboto', sans-serif; font-weight: 350;'>
                                                            Sign up</font>
                                                    </a>
                                                  </div>";
                         
                                    ?>    
                                    <?php } ?>
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