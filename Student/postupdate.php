<?php include("includes/config.php"); ?>

<?php
 include("session.php");
?>

<?php include("includes/header.php")   ?>
<?php include("includes/sidebar.php")   ?>
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
     

            <!-- right-panel starts here -->
            <div class="right-panel py-2 px-2 d-flex flex-col justify-center">
              <div class="header-post text-center">
                <h3>Update Post</h3>
              </div>

                                              <div class="post-card w-9 d-flex">
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
<?php include("includes/footer.php") ?>