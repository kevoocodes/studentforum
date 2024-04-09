<?php include("includes/config.php"); ?>

<?php
 include("session.php");
?>

<?php include("includes/header.php")   ?>
<?php include("includes/sidebar.php")   ?>
<?php include 'postdate.php'; ?>
<?php 

if(isset($_POST['submit'])){
    //declare varibles
    

    // $categories = $_GET['categoriesid'];
    $categories = mysqli_real_escape_string($con,$_POST['category']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $content = mysqli_real_escape_string($con,$_POST['content']);   
    $date = date("Y-m-d H:i:s");

    if(empty($title) || empty($content)){
        echo "<script>alert('Title and Content Required')</script>";
    }else{
        
        $studentId  = $row['studentID'];

        $insultquery = $con->query("SELECT * FROM insultTable WHERE name = '$content'");
        if($insultquery->num_rows > 0) {
            echo "<script>alert('Data not Posted because some words are good to our society')</script>";
        }
        else {
            $sql = mysqli_query($con,"INSERT INTO posts (studentID,cat_id,title,content,dateCreated) VALUES ('$studentId','$categories','$title', '$content','$date')");

            if($sql) {
                header("location: dashboard.php");
            }
            else {
                echo "<script>alert('Data not Posted')</script>";
            }
        }

        
    }
}

?>
     

            <!-- right-panel starts here -->
            <div class="right-panel py-2 px-2 d-flex flex-col justify-center">
              <div class="header-post text-center">
                <h3>Add Post</h3>
              </div>
              <div class="container">
            <div class="row">
                <div class="col-md-12 bg-light">
                    <h1  class="lead align-items-center mt-5">Add Posts</h1>
                        <form action="" method="post">
                            <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" id="" class="form-control" placeholder="Type Post Title" aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                              <label for="">Post Category</label>
                              <select class="form-control" name="category" id="">
                                <?php
                                $sql = $con->query("SELECT * FROM categories");
                                $r = mysqli_num_rows($sql);
                                
                                while($cat = mysqli_fetch_array($sql)) {
                                    echo "<option value='$cat[id]'>$cat[cat_name]</option>";
                                }
                                
                                ?>
                               
                                
                              </select>
                            </div>


                            
                                <div class="form-group">
                                    <label for="body">Content</label>
                                    <textarea name="content" id="editor" cols="30" rows="3"class = "form-control" placeholder="Type Post Content"></textarea>
                                </div>
                           

                            <button type="submit" name="submit" class="btn btn-warning mb-5">Add Post</button>
                        </form>
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>
              
               
            </div>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
    </script>
 
<?php include("includes/sidebar.php") ?>