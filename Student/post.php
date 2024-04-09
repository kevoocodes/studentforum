<?php include("includes/config.php"); ?>

<?php
 include("session.php");
?>

<?php include("includes/header.php")   ?>
<?php include("includes/sidebar.php")   ?>

<style>
  .right-panel .post-card .left-content .img-wrapper img {
    width: 100%;
    height: 100%;
  }
</style>
<?php 



if(isset($_POST['comments'])){
    //declare varibles
    $postid = $_GET['post_id'];
    $content = $_POST['content'];
    // echo $content;
    $date = date("Y-m-d H:i:s");

    if(empty($content)){
        echo "<script>alert('Content Required')</script>";
    }else{
        
        $studentId  = $row['studentID'];;

        $sql = mysqli_query($con,"INSERT INTO comments (postid,studentid,content,dateCreated) VALUES ('$postid','$studentId','$content','$date')");

        if(!$sql) {
              echo "<script>alert('Not Commented')</script>";
        }
    }
}

?>

<?php include 'postdate.php'; ?>

    

            <div class="right-panel py-2 px-2 d-flex flex-col justify-center">
              <div class="header-post text-center">
                <h3>Single story view</h3>
              </div>
              <?php 
                                if(isset($_GET['post_id'])){
                                    // echo $_GET['post_id'];
                                    $post_id = $_GET['post_id'];
                                    $sql = $con->query("SELECT * FROM posts WHERE id = '$post_id'");
                                    $post = mysqli_fetch_array($sql);
                                    $student_id = $post['studentID'];
                                   

                                    $sqluser = $con->query("SELECT * FROM students WHERE studentID = '$student_id'");
                                    $fetchstudent = mysqli_fetch_array($sqluser);
                                    $sqlinfo = $con->query("SELECT * FROM studentinfo WHERE studentID = '$student_id'");
                                    $fetchInfo = mysqli_fetch_array($sqlinfo);
                                    

                                }
                                
                    ?>
             

                <div class="post-card w-9 d-flex">
                   <div class="left-content d-flex flex-col justify-center">
                      <div class="img-wrapper">
                        <img src="../assets/images/profilepicture/<?php echo $fetchInfo['profileImage'];  ?>" alt="x" class="w-10">
                      </div>
                      <a href="/users/uid" class="name">
                        <span class="name"><?php echo $fetchInfo['username']; ?></span>
                      </a>
                   </div>

                   <div class="right-content">
                    <h4><?php echo $post['title']; ?></h4>
                     <div class="post-body">
                      <p><?php echo $post['content']; ?></p>
                     </div>
                   

                    <div class="time">
                      <span>2 hours ago</span>
                    </div>
                   </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                        <form action="" method="POST">
                          <div class="row">
                            <div class="col-md-9">
                              <div class="form-group">
                                <label for="">Content</label>
                                <input type="text" name="content" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <button name="comments" type="submit" class="btn btn-primary">Comment</button>
                            </div>
                          </div>
                        </form>
                        </div>
                  </div>
             

                  <div class="container">
                    <div class="row">
                      <div class="col-md-9">
                      <div class="comments-wrapper">
                    <div class="header-top text-center">
                        <h4>Comments</h4>
                        <div class="comments-items d-flex flex-col ">
                        <?php 
                                $sqlcomment = $con->query("SELECT * FROM comments WHERE postid = '$post_id' ORDER BY id DESC");
                                $row = mysqli_num_rows($sqlcomment);

                                echo "<p style='font-size: 10px;' class='text-secondary text-left'> <i class='fas fa-comments'></i> " . $row . " comments</p>
                             
                                ";

                                if($row < 1) {
                                    echo "<p class= 'lead text-secondary text-center'> NO COMMENT HERE </p>";
                                }


                                
    
                                while($comment = mysqli_fetch_array($sqlcomment)){
                                    $student = $comment['studentid'];
                                    $suser = $con->query("SELECT * FROM students WHERE studentID = '$student'");
                                    $sstudent= mysqli_fetch_array($suser);

                                    $suserinfo = $con->query("SELECT * FROM studentinfo WHERE studentID = '$student'");
                                    $sstudentinfo = mysqli_fetch_array($suserinfo);

                                    
                        
                                    ?>
                            <div class="comment d-flex gap-1">
                              <div class="img-wrapper">
                                <img src="../assets/images/profilepicture/<?php echo $sstudentinfo['profileImage'];  ?>" alt="x" class="w-10">
                              </div>
                                <div class="comment-body">
                                  <h5><?php echo $sstudentinfo['username'] ?></h5>
                                    <p><?php echo $comment['content']; ?></p>
                                    <small>2 minutes ago</small>
                                </div>
                            </div>
                            
                              <?php
                                } 
                                
                                ?>
                        </div>
                    </div>
                </div>
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