<?php 
include("../includes/config.php"); //connection to the database

if(isset($_GET['id'])){
    $postid = $_GET['id'];
    $sql = $con->query("DELETE  FROM posts WHERE id = '$postid'");

    if($sql) {
        echo "<script>alert('Posts deleted')</script>";
        header("Location: manage_posts.php");
    }else{
        echo "<script>alert('Posts not deleted')window.location = 'posts.php'</script>";
    }
}


?>