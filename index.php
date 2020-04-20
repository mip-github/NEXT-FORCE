<!doctype html>
<html class="no-js" lang="zxx">
    <?php require_once __DIR__ . '/require/head.php';?>
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
                                    <div class="d-none d-lg-block">
                                        <a class="linkhover" href="apply.html">
                                        <font style="font-size: 26px; font-family: 'Roboto', sans-serif; font-weight: 350;">Sign in</font>
                                        </a>
                                    </div>
                                    &emsp;
                                    <font style="font-size: 26px; font-family: 'Roboto', sans-serif; font-weight: 350;">/</font>
                                    &emsp;
                                    <div class="d-none d-lg-block">
                                        <a class="linkhover" href="apply.html">
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
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".1s">Get Loan for your Business growth or startup</h3>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                                <a href="#" class="boxed-btn3">How it Works</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once __DIR__ . '/require/script.php'; ?>
</html>