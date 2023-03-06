<?php include 'includes/config.php'; ?>
<?php include("includes/other/header.php"); ?>
<?php include("includes/other/navbar.php"); ?>


<style>
    #comments{
        margin-bottom: 20px;
    }

    /* #comments:hover{
        background-color: #e6e6e6;
    } */

.commentUsername{
    margin-left: 10px;
    font-weight: 800;
}

.commentUser{
    margin: 0% 2% 2% 2%;
     font-size: 14px;
}

.commentImage img{
    margin-left: 10px;
    border-radius: 50%;
    cursor: pointer;
}

.commentLink h2{
    text-align: center;
}

.commentLink a{
    text-decoration: none;
    color: #003380;
}

.commentLink a:hover{
    text-decoration: underline;
}

.Allcomment:hover{
    background-color: #e6e6e6;
    cursor: pointer;
}



</style>

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
    

     <div id="trending" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-light">
                
                    <h1   class="lead align-items-center mt-5 mb-5 text-left" style="font-size: 14px;">**Please login to create comment for this Post.</h1>
                    <div style= "">
                    <div class="row mb-3">
                        <div class="col-md-2 border-right">
                            <div class="outter">
                                <img id="profileTrending" src="assets/images/profilepicture/<?php echo $fetchInfo['profileImage'];  ?>" alt="">
                                <h1 id="headingTrending" class="lead mt-3"><?php echo $fetchInfo['username']; ?></h1>
                            </div>
                        </div>

                        <div class="col-md-10">
                           
                    
                          
                            <p style="font-size: 10px;" class="text-secondary">Title</p>
                           
                            <h2 style="font-size: 20px;" ><?php echo $post['title']; ?></h2>

                            <hr>
                            <p style="font-size: 10px;" class="text-secondary">Content</p>
                            <p class="lead  text-dark" id="pPost" style="color: #bfbfbf;"><?php echo $post['content']; ?></p>
                            <hr>
        

                             <?php 
                                $sqlcomment = $con->query("SELECT * FROM comments WHERE postid = '$post_id' ORDER BY id DESC");
                                $row = mysqli_num_rows($sqlcomment);

                                echo "<p style='font-size: 10px;' class='text-secondary text-left'><img  style='width: 12px;height:12px;' src='assets/images/icons/round.png' alt=''> " . $row . " comments</p>
                             
                                
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
                                      <div class="Allcomment" id="comments" style="display: block;border-radius: 10px;background-color: #cccccc;">
                                 <div>
                                     <p class="commentUsername"><?php echo $sstudentinfo['username'] ?></p>
                                  </div>
                                  <div style="display: flex;">
                                        <div class="commentImage" id="imageComment"> 
                                            <img src="assets/images/profilepicture/<?php echo $sstudentinfo['profileImage'];  ?>" alt="" class="imageComments"> 
                                            
                                        </div>
                                        <div class="commentUser">
                                            <p  style="font-size: 16px;"><?php echo $comment['content']; ?></p>
                                        </div>
                                  </div>
                                   </div>

                                    <?php

                                }
                             
                             ?>
                     

                            

                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>



    


 


   


<?php include("includes/other/footer.php"); ?>




<!-- 
    Developed by: @kevoocodes
 -->