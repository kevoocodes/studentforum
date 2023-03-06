<?php
include ("../includes/config.php");

$usename  = "";
$password = "";
// $message = NULL;
if(isset($_POST['login'])) {
    //declare variables
    $usename = $_POST['username'];
    $_SESSION['username'] = $usename;
    $password = md5($_POST['password']);

    $query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$usename' AND password = '$password'");
    
    if(mysqli_num_rows($query) > 0) {
        // $_SESSION['username'] = $usename;
        $adminsql = mysqli_query($con, "SELECT * FROM admin");
        $fetchquery = mysqli_fetch_array($adminsql);
        $adminID = $fetchquery['id'];
        $_SESSION['id'] = $adminID;
        header("location: dashboard.php");
        $_SESSION['username'] = "";  //empty User input
    }else{
       echo "<script>alert('Username or password is incorect')</script>";
    }

 

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Kelvin Aron Msindai" content="Fullstack Developer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forum</title>
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="section">

        <h1 class="display-4 text-dark text-center mt-5">Student Forum</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4 mt-5">
                     <div class="card bg-transparent border-primary">
                         <div class="card-header bg-primary text-light">
                                Admin Login
                         </div>
                         <div class="card-body">
                            <form action=""method="POST">
                                <div class="form-group">
                                    <small class="text-danger"></small><br>
                                    <label for="studentID" class="text-dark">Username</label>
                                    <input type="text" name="username" value="<?php if(isset($_SESSION['username'])) { echo $_SESSION['username'];} ?>" class="form-control bg-transparent  text-dark btn-outline-primary" placeholder="Type username" required>
                                </div>

                                <div class="form-group">
                                    <label for="firstname" class="text-dark">Password</label>
                                    <input type="password" name="password" class="form-control bg-transparent text-dark btn-outline-primary" placeholder="****" required>
                                </div>

                                <input type="submit" value="Login" name="login" class="btn btn-danger col-12">
                            </form>
                         </div>
                     </div>
                </div>
                <div class="col-md-4"> 
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>



<!-- 
    DEVELOPED BY: @kevoocodes
 -->