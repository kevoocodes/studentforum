<?php include("includes/config.php"); ?>
<?php
 include("session.php");
?>
<?php include("includes/header.php"); ?>

<?php include("includes/navbar.php"); ?>
    

    <div id="trending" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-light">
                    <h1  class="lead align-items-center mt-5">Your Post</h1>
                    
                    <?php
                            $studentId  = $row['studentID'];
                            $sql = $con->query("SELECT * FROM posts WHERE studentID = '$studentId' ORDER BY id DESC");
                            // $post = mysqli_fetch_array($sql)
                            if(mysqli_num_rows($sql) == 0 ) {
                                echo "<h2 class= 'display-4 text-center text-lead text-secondary'>Empty Post Yet</h2>";
                            }
                            while($post = mysqli_fetch_array($sql)){
                                $postcontent = $post['title'];
                                $id = $post['id'];

                                ?>
                                        <div class="row mb-3 pt-3 pb-3" style="margin-left: 10px;margin-right: 10px; box-shadow: 5px 5px 10px #cccccc;">
                                                <div class="col-md-12">
                                            <h2 ><a id="linkTrending" href="singleposts.php?post_id= <?php echo $id;  ?>"><?php echo $postcontent; ?></a></h2>

                                            <?php 
                                                    
                                                    // To display number of comments
                                                       $sqlcomment  = mysqli_query($con,"SELECT * FROM comments WHERE postid = '". $post['id'] ."'");
                                                       $sqlcommentrows = mysqli_num_rows($sqlcomment);
                                                       // echo $sqlcommentrows;
                                                       
                                                       ?>
                                            <p class="lead  text-secondary" id="pTrending" style="font-size: 10px;"> <?php echo $sqlcommentrows; ?> <img  style="width: 12px;height:12px;" src="assets/images/icons/round.png" alt=""> comments</p>
                                            <h3>
                                                  
                                                <a style="font-size: 14px" href="postupdate.php?postupdate= <?php echo $id; ?>" class="text-info" >Update</a>
                                                                            
                                                
                                                <a style="font-size: 14px" href="postdelete.php?id= <?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this Post?');" class="text-danger">Delete</a> </h3> 
                                        </div>
                                        </div>

                                       

                                <?php
                            } 
                            
                    
                    ?>

                       
                    
                </div>

                <div class="col-md-3"> <a href=""></a>
               
                </div>
            </div>
        </div>
    </div>

    
  
         <!-- MODAL -->
<!-- <div class="modal fade" id="addPostModal">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header bg-warning text-dark">
                   <h5 class="modal-title">Update Post</h5>
                   <button class="close" data-dismiss = "modal">
                       <span>&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   

           
                   <form action="" method="post">                  
                            <div class="form-group">
                            <label for="">Title</label>
              
                            <input type="text" name="title" id="" value="" class="form-control" placeholder="Type Post Title" aria-describedby="helpId">
                            </div>

                                <div class="form-group">
                                    <label for="body">Content</label>
                                    <textarea name="content" id="editor" value="" cols="30" rows="3"class = "form-control" placeholder="Type Post Content"><?php echo $postPost; ?></textarea>
                                </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-warning">Update</button>
                        </div>  
               </form>
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
    </script> -->



<?php include("includes/footer.php"); ?>


<!-- 
    Developed by: @kevoocodes
 -->