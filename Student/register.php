<?php
error_reporting(0);
 include('../includes/config.php');?>

<?php 
    require '../includes/form_handlers/register_handlers.php'; 
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
                            <h3 class="sign-up__title">Sign Up</h3>
                            <small class="text-danger" style="color: red;">
                                    <?php if(in_array("Your Identity is unknown", $error_array)) echo "Your Identity is unknown";
                                            else if(in_array("Your IDENTITY already used by somenone", $error_array)) echo "Your IDENTITY already used by somenone";
                                    ?>
                            </small> <br>
                            <small id="helpId" class="text-danger" style="color: red;">
                                    <?php if(in_array("Email already in Use", $error_array)) echo "Email already in Use"; else if(in_array("Invalid email format", $error_array)) echo "Invalid email format"; ?>
                            </small> <br>

                                <small class="text-danger" style="color: red;">
                                    <?php if(in_array("Your username must be betwen 5 and 30 characters<br>", $error_array)) echo "Your username must be betwen 5 and 30 characters<br>";
                                       else if(in_array("Username is already in Use", $error_array)) echo "Username is already in Use"; ?>
                            </small> <br>
                            <small class="text-danger" style="color: red;">
                                    <?php 
                                        if(in_array("Your Password do not match", $error_array)) echo "Your Password do not match";
                                        else if(in_array("Your Password can only contain english caharacters or numbers", $error_array)) echo "Your Password can only contain english caharacters or numbers";
                                        else if(in_array("Your Password must be 5 to 30 characters", $error_array)) echo "Your Password must be 5 to 30 characters";
                                    ?>
                                </small>
                        </div>
                          

                          <div class="inputs-btn__container">
                            <div class="input_container">
                                <img src="assetss/icons/user.ico" alt="">
                                <input type="text" name="studentID" placeholder="student id">
                               
                            </div>
                            <div class="input_container">
                                <img src="assetss/icons/user.ico" alt="">
                                <input type="text" name="email" placeholder="email">
                                
                            </div>
                            <div class="input_container">
                                <img src="assetss/icons/user.ico" alt="">
                                <input type="text" name="username" placeholder="username">
                              
                            </div>

                            <div class="input_container">
                                <img src="assetss/icons/lock.ico" alt="">
                                <input type="text" name="password" placeholder="password">
                            </div>
                            
                            <div class="input_container">
                                <img src="assetss/icons/lock.ico" alt="">
                                <input type="text" name="password2" placeholder="confirm password">
                               
                            </div>


                            <div class="btn btn-primary" style=" text-align: center;">
                                <a href="" style="color: white;">
                                <button name="register" type="submit">Verify</button>
                            </a>
                                
                            </div>

                            <div class="link"><a href="index.php">Already a member? Sign in</a></div>
                          </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</body>
</html>
