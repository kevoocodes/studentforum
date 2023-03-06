<?php 
include("../includes/config.php"); //connection to the database

if(isset($_GET['id'])) {

    $studentid = $_GET['id'];
    $sql = $con->query("DELETE  FROM students WHERE id = '$studentid'");

    if($sql) {
        // echo "<script>alert('Student deleted')window.location = 'students.php'</script>";
        header('location: students.php');
    }else{
        echo "<script>alert('Student not deleted')window.location = 'students.php'</script>";
    }
    
}




?>