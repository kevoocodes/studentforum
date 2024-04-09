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
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #ffffff;
    color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: #e5e5e5;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #080710;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
    border: 1px solid gray;
}
::placeholder{
    color: gray;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #23a2f6;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;

}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
</head>
<body>
    <form method="POST">
        <h3>Admin Login</h3>

        <label for="username">Username</label>
        <input name="username" value="<?php if(isset($_SESSION['username'])) { echo $_SESSION['username'];} ?>"" type="text" placeholder="username" id="username" required>

        <label for="password">Password</label>
        <input name="password" type="password" placeholder="Password" id="password" required>

        <button name="login" type="submit">Log In</button>
        
    </form>
</body>
</html>
