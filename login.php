<?php
error_reporting(0);
 include('includes/config.php');
  include("includes/other/header.php"); ?>

<?php 
    require 'includes/form_handlers/register_handlers.php'; 
?>
<?php 
    require 'includes/form_handlers/login_handlers.php'; 
    
?>
<style>
        body{
            background-color: #bfbfbf;
        }

        #brand{
            /* font-size: 30px; */
            color: #ff0000;
            text-shadow: 2px 2px 7px    #000000;
        }

        #spanbrand{
            font-size: 20px;
            color: #00aaff;
        }

        img {
            width: 20px;
            height: 20px;
        }

        #linkTrending{
            color: #000000;
        }

        #trending h1{
            text-align: center;
        }

        #profileTrending{
            width: 70%;
            height: 70%;
            margin-left: 15%;
            margin-right: 15%;
            border-radius: 50%;
            cursor: pointer;
        }

        #headingTrending{
            cursor: pointer;
            font-size: 16px;
        }


        #pTrending{
            font-size: 13px;
        }


        #hideRegister{
            cursor: pointer;
        }

        #hideLogin{
            cursor: pointer;
        }

        #register{
            border-top: none;
        }
    </style>

<?php include("includes/other/navbar.php"); ?>



    

    <?php

if(isset($_POST['register'])) {
    echo '<script>
            $(document).ready(function() {
                $("#loginForm").hide();
                $("#registerForm").show();
            });
        </script>';
}
else {
    echo '<script>
            $(document).ready(function() {
                $("#loginForm").show();
                $("#registerForm").hide();
            });
        </script>';
}

?>

  <!-- <div class="container mt-5">
       <p class="lead">Student Registration and login for Post and Comment about Forums</p>
  </div> -->
<div class="row mt-5 mb-5">

    <div class="col-md-12 text-secondary">
        <div class="row">
            <div class="col-md-3">

            </div>

            <div class="col-md-6">
                <div class="container">
                    <form action="" method="post" id="loginForm">
                    <div class="card border-none bg-light">
                        <div class="card-header bg-info text-light">
                            Student Login
                        </div>

                        <div class="card-body bg-transparent">
                            <div class="form-group">
                            
                                <label for="">Username</label>
                                <input type="text" name="loginusername" id="" class="form-control bg-light  text-secondary" value="<?php if(isset($_SESSION['loginusername'])) {echo $_SESSION['loginusername']; } ?>"  placeholder="Type Your Username" aria-describedby="helpId">
                                <small id="helpId" class="text-danger"></small>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="loginpassword" id="" class="form-control bg-light  text-secondary" placeholder="****" aria-describedby="helpId" required>
                                <small class="text-danger">
                                        <?php if(in_array("Username or password was incorrect<br>", $error_array)) echo  "Username or password was incorrect<br>"; ?>
                                </small>
                            </div>

                            <!-- <div class="form-group">
                                <a href="forgot_password.php" class="text-info text-right">Forget Password</a>
                            </div> -->

                            <div class="form-group">
                                <button type="submit" name="login" class="btn btn-warning  col-md-12">Login</button>
                                <small id="hideLogin" class="text-info" style="cursor: pointer;">Don't have account yet? Signup here</small>
                            </div>
                        </div>
                     </div>
                    </form>

                    <div id="register" class="card border-none bg-light border-top-0">
                        <form action="" method="post" id="registerForm">
                            <div class="card-header bg-info text-light">
                                 Student Registration
                            </div>

                            <div class="card-body">

                            <div class="form-group">
                                <label for="">Student ID</label>
                                <input type="text" name="studentID" id="" class="form-control bg-light  text-secondary" value="<?php if(isset($_SESSION['studentID'])) { echo $_SESSION['studentID']; } ?>" placeholder="Type Your StudentID" aria-describedby="helpId" required>
                                <small class="text-danger">
                                    <?php if(in_array("Your Identity is unknown", $error_array)) echo "Your Identity is unknown";
                                            else if(in_array("Your IDENTITY already used by somenone", $error_array)) echo "Your IDENTITY already used by somenone";
                                    ?>
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control bg-light  text-secondary" value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email']; } ?>"  placeholder="Type Your Email" aria-describedby="helpId" required>
                                <small id="helpId" class="text-danger">
                                    <?php if(in_array("Email already in Use", $error_array)) echo "Email already in Use"; else if(in_array("Invalid email format", $error_array)) echo "Invalid email format"; ?>
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" id="" class="form-control bg-light  text-secondary" value="<?php if(isset($_SESSION['usernamee'])) { echo $_SESSION['usernamee']; } ?>" placeholder="Type Your Username" aria-describedby="helpId" required>
                                <small class="text-danger">
                                    <?php if(in_array("Your username must be betwen 5 and 30 characters<br>", $error_array)) echo "Your username must be betwen 5 and 30 characters<br>";
                                       else if(in_array("Username is already in Use", $error_array)) echo "Username is already in Use"; ?>
                            </small>
                            </div>
                        

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control bg-light  text-secondary" placeholder="****" aria-describedby="helpId" required>
                             
                            </div>

                            <div class="form-group">
                                <label for="">Comfirm Password</label>
                                <input type="password" name="password2" id="" class="form-control bg-light  text-secondary" placeholder="****" aria-describedby="helpId" required>
                                <small class="text-danger">
                                    <?php 
                                        if(in_array("Your Password do not match", $error_array)) echo "Your Password do not match";
                                        else if(in_array("Your Password can only contain english caharacters or numbers", $error_array)) echo "Your Password can only contain english caharacters or numbers";
                                        else if(in_array("Your Password must be 5 to 30 characters", $error_array)) echo "Your Password must be 5 to 30 characters";
                                    ?>
                                </small>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="register" class="btn btn-warning  col-md-12">Register</button>
                                <small id="hideRegister" class="text-info" style="cursor: pointer;">Already have an account? Log in here.</small>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                    
           </div>
        </div>
    </div>

</div>
    

<footer class="page-footer text-center pt-5 pb-5 mt-5">
       <p>Copyright <script>var year = new Date(); document.write(year.getFullYear());</script> <i class="fa fa-copyright" aria-hidden="true"> </i> Student Forums</p>
</footer>





    




<!-- JAVASCRIPT LINK -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- JAVASCRIPT LINK -->
    
</body>
</html>


<!-- 
    Developed by: @kevoocodes
 -->