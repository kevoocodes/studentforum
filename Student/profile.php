<?php include("includes/config.php"); ?>

<?php
 include("session.php");
?>

<?php include("includes/header.php")   ?>
<?php include("includes/sidebar.php")   ?>
<?php include 'postdate.php'; ?>
    

<style>
    .right-panel .post-card .left-content .img-wrapper img {
        width: 100%;
        height: 100%;
    }
</style>

<div class="right-panel py-2 px-2 d-flex flex-col justify-center">
              <div class="header-post text-center">
                <h3>My Profile</h3>
              </div>
              <div class="user-profile d-flex gap-2">
                   <div class="img-wrapper rounded">
                   <?php
                                $username = $_SESSION['username'];
                                $sql = $con->query("SELECT * FROM students WHERE id  ='$studentId'");
                                $student = mysqli_fetch_array($sql);
                                $studentidentity = $student['studentID'];
                                $studentid = $student['studentID'];
                                $firstname = $student['firstname'];
                                $middlename = $student['middlename'];
                                $lastname = $student['lastname'];


                                $sql = $con->query("SELECT * FROM studentinfo WHERE studentID ='$studentId'");
                                $info = mysqli_fetch_array($sql);
                                $username = $info['username'];
                                $email = $info['email'];
                                // $skills = $info['skills'];
                                $bio = $info['bio'];
                                // $phonenumber = $info['phonenumber'];
                                // $faculty = $info['faculty'];
                                $profileImage = $info['profileImage'];
                                $university = $info['university'];

                    ?>
                       <img src="../assets/images/profilepicture/<?php echo $info['profileImage'];  ?>" alt="">
                   </div>

                   <div class="profile-details d-flex flex-col gap-1">
                       <div class="detail-item">
                            <span class="font-bold">Student ID:</span>
                            <span><?php echo $studentidentity; ?></span>
                       </div>
                        <div class="detail-item">
                            <span class="font-bold">Name:</span>
                            <span><?php echo $firstname . " " . $middlename . " " . $lastname; ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="font-bold">Username:</span>
                            <span><?php echo $username ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="font-bold">Email:</span>
                            <span><?php echo $email ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="font-bold">University:</span>
                            <span><?php echo $university ?></span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="font-bold">Bio:</span>
                            <p class="bio"><?php echo $bio; ?></p>
                        </div>

                        <div class="edit-profile-btn">
                            <a href="updateprofile.php">Edit profile</a>
                        </div>
                   </div>

                   <div class="total-posts">
                        <h4>Your posts</h4>

                        <div class="colored-bg text-center">
                        <?php 
                            $studentId  = $row['studentID'];
                            $sql = $con->query("SELECT * FROM posts WHERE studentID = '$studentId'");
                            $number_post = mysqli_num_rows($sql);
                     ?>
                            <h3><?php echo $number_post; ?></h3>
                            <span>Posted</span>
                        </div>
                   </div>
              </div>


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
                                 <div class="post-card w-9 d-flex">
                                        <div class="left-content d-flex flex-col justify-center">
                                            <div class="img-wrapper">
                                                <img src="../assets/images/profilepicture/<?php echo $info['profileImage'];  ?>" alt="x" class="w-10">
                                            </div>
                                            <a href="/users/uid" class="name">
                                                <span class="name"><?php echo $firstname . "  " . $lastname ?></span>
                                            </a>
                                        </div>

                                        <div class="right-content">
                                            <h4><a style="color: #000;" href="post.php?post_id=<?php echo $id; ?>"> <?php echo $postcontent; ?></a> </h4>
                                            <div class="post-body">
                                            <p> </p>
                                            </div>
                                            <a href="/posts/pid/show" class="comments-show flex">
                                                <i class="fas fa-comments"></i>
                                                <?php 
                                                    
                                                    // To display number of comments
                                                       $sqlcomment  = mysqli_query($con,"SELECT * FROM comments WHERE postid = '". $post['id'] ."'");
                                                       $sqlcommentrows = mysqli_num_rows($sqlcomment);
                                                       // echo $sqlcommentrows;
                                                       
                                                       ?>
                                                <span><?php echo $sqlcommentrows; ?>comments</span>
                                            </a>

                                            <div class="time">
                                            <span>2 hours ago</span>
                                            <h3>
                                                  
                                                <a style="font-size: 14px" href="postupdate.php?postupdate= <?php echo $id; ?>" class="text-info" >Update</a>
                                                                            
                                                
                                                <a style="font-size: 14px" href="postdelete.php?id= <?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this Post?');" class="text-danger">Delete</a> </h3> 
                                            </div>
                                        </div>
                                        </div>







                

                                       

                                <?php
                            } 
                            
                    
                    ?>

               
                
               
            </div>
 
<?php include("includes/sidebar.php") ?>