<?php 
if(!isset($_SESSION['id'])) {
    header("location: index.php");
}

$id = $_SESSION['id'];
$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = '$id'");
$fetchsql = mysqli_fetch_array($sql);
$username = $fetchsql['username'];

?>