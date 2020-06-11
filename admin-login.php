<!doctype html>
<html class="no-js" lang="en">
    <head>
        <?php require_once __DIR__ . '/require/admin/head.php';?> 
    </head>

    <body>
        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('pic/bg_2.png')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="sign-btn text-center">
                                <a href=""><img src="pic/nextforce1.png" alt="" class="rounded mx-auto d-block" style="width: 300px; margin-right: 20px; height: 50px;"></a>
                            </div><br><br>
                            <h3>NEXTFORCE - Admin</h3>
                            <form action="AdminLoginQuery.php" method="POST" id="login_form" encypte="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" required="" name="email" id="email">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" required="" name="password" id="password">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <!-- <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;Remember Me</span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="forgot-password.html">Forgot Password ?</a>
                                    </div> -->
                                </div>
                                <div class="sign-btn text-center">
                                    <input type="submit" name="submit" value="Sign In" class="btn btn-theme">
                                    <input type="hidden" name="do" value="login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require_once __DIR__.'/require/admin/jquery.php'; ?>
<script>
    $(document).ready(function (e){
        $("#login_form").on('submit',(function(e){
            e.preventDefault();
            $.ajax({
                url: "AdminQueryLogin.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(response) {
                console.log(response)
                    if(response=="Error"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: 'Email or passwrd not valid!'
                            })
                        }
                    if(response=="Success"){
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Success'
                            })
                        }
                    },
                error: function(){} 	        
            });
        }));
    });
</script>
    </body>
</html>
