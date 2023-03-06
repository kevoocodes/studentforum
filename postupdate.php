<?php include("includes/config.php"); ?>
<?php
 include("session.php");
?>
<?php include("includes/header.php"); ?>

<?php include("includes/navbar.php"); ?>
    
<?php
//  include("includes/config.php"); 
 
 if(isset($_GET['postupdate'])){
     $id = $_GET['postupdate'];
     $sql = $con->query("SELECT * FROM posts WHERE id = '$id'");
     $sqlpostview = mysqli_fetch_array($sql);
     $postTitle = $sqlpostview['title'];
     $postPost = $sqlpostview['content'];
 } 
 

 ?>


<?php
    $id = $_GET['postupdate'];
    $msg = NULL;
    if(isset($_POST['submit'])){
        $id = $_GET['postupdate'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        if(empty($title) || empty($content)){
        
            $msg =  "**Please Fill the blank space";
        }else{
            $sql =  "UPDATE posts SET title = '$title', content = '$content' WHERE id = '$id'";
            $sqlqery = mysqli_query($con,$sql);
            if($sqlqery){
              
                $msg =  "**Post Updated";
            }else{
                
                $msg =  "**Post not updated";
            }
        }
    }


?>

<div id="trending" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-light">
                    <h1  class="lead align-items-center mt-5">Post Update</h1>
                        <form action="" method="post">
                            <div class="form-group">
                                <small class="text-danger"><?php echo $msg; ?></small> <br>
                              <label for="">Title</label>
                              <input type="text" name="title" id="" value="<?php echo $postTitle; ?>" class="form-control" placeholder="" aria-describedby="helpId" required>
                              <small id="helpId" class="text-muted"></small>
                            </div>

                            <div class="form-group">
                              <label for="">Content</label>
                                <textarea name="content" id="editor" cols="30" rows="3"class = "form-control" placeholder="Type Post Content" required><?php echo  $postPost; ?></textarea>
                              <small id="helpId" class="text-muted"></small>
                            </div>

                
                           

                            <button type="submit" name="submit" class="btn btn-warning mb-5">Update Post</button>
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



     


<?php include("includes/footer.php"); ?>

 
 
<!-- 
    Developed by: @kevoocodes
 -->