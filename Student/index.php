<?php
error_reporting(0);
 include('includes/config.php');?>
<?php 
    require '../includes/form_handlers/login_handlers.php'; 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- google fonts end here -->

    <!-- STYLING LINK -->
    <link rel="stylesheet" href="assetss/auth.css">

    <!-- SWIPER JS CSS LINK -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">

    <title>Students forum</title>
</head>
<body>
    <section class="login-section">
        <div class="login-wrapper">
            <div class="wrapper-heading">
                <h2>Students <span>Forum </span></h2>
            </div>
            

            <div class="wrapper-contents container">
                <div class="img-link__container">
                        <img src="assetss/images/happy-student-sign-up.jpg" alt="">
                     
                </div>

                <div class="form__container">
                    <form action="" method="POST">
                        <div class="form-title">
                            <h3 class="sign-up__title">Sign In</h3>
                        </div>
                        <small class="text-danger" style="color: red">
                                        <?php if(in_array("Username or password was incorrect<br>", $error_array)) echo  "Username or password was incorrect<br>"; ?>
                        </small>
                          

                          <div class="inputs-btn__container">
                            <div class="input_container">
                                <img src="assetss/icons/user.ico" alt="">
                                <input type="text" placeholder="username" name="loginusername">
                            </div>

                            <div class="input_container">
                                <img src="assetss/icons/lock.ico" alt="">
                                <input type="password" placeholder="password" name="loginpassword">
                            </div>

                            <div class="remember-me__container">
                                <input type="checkbox" name="remember">
                                <span>Remember me</span>
                            </div>

                            <div class="btn btn-primary" style=" text-align: center;">
                                <a href="index.php" style="color: white;">
                                <button type="submit" name="login">Login</button>
                            </a>
                            </div>
                            <div class="link"><a href="register.php">Already registered, Verify your account</a></div>

                          </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</body>
</html>