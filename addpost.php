<?php 
$msg = NULL;
$studentId  = $row['studentID'];
if(isset($_POST['submit'])){
    //declare varibles
    $catid = $_GET['categoriesid'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if(empty($title) || empty($content)){
        echo "<script>alert('Title and Content Required')</script>";
    }else{
        $sql = $con->query("INSERT INTO posts (studentID,cat_id,title,content) VALUES ('$studentId','$catid','$title', '$content')");

        if(!$sql) {
              echo "<script>alert('Data not Posted')</script>";
        }else {
              echo "<script>alert('Post is Posted'); window.location = 'categories.php';</script>";
        }
    }
}



?>