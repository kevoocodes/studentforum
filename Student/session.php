<?php 

if(!isset($_SESSION['username'])) {
    header("location: index.php");
}

$username = $_SESSION['username'];
$query = mysqli_query($con, "SELECT * FROM studentinfo WHERE username = '$username'");
$row = mysqli_fetch_array($query);
$studentId  = $row['studentID'];
$profileimg = $row['profileImage'];
$email = $_SESSION['email'];

?>