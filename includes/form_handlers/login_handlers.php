<?php

$username = " "; //This is for error
$error_array = "";
if(isset($_POST['login'])) {

	$username = $_POST['loginusername']; //sanitize username
	$_SESSION['loginusername'] = $username; //Store username into session variable 
	$password = md5($_POST['loginpassword']); //Get password

	$check_database_query = mysqli_query($con, "SELECT * FROM studentinfo WHERE username='$username' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query > 0) {
        
		$_SESSION['username'] = $username;
		header("Location: dashboard.php");
		$_SESSION['loginusername'] = "" ;
	}
	else {
		array_push($error_array, "Username or password was incorrect<br>");
	}


}

?>
