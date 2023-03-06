<?php

include("includes/config.php"); 

if(isset($_GET['id'])) {
    $postid = $_GET['id'];
    // echo $postid;
    $sql = $con->query("DELETE FROM posts WHERE id = '$postid'");
    if($sql){
        header("location: studentpost.php");
        // echo "<script>alert('Post not deleted')window.location = 'studentpost.php'</script>";
    }  
}


?>