<?php include("includes/config.php"); ?>
<?php include("session.php"); ?>
<?php include("includes/header.php"); ?>

<?php include("includes/navbar.php"); ?>


<style>
    #profileDisplay{
        border-radius: 50%;
        border: 1px solid #000;
        cursor: pointer;
    }

    #profileTrending{
        height: 200px;
        border: 1px solid gray;
    }

   
</style>
    

<div id="trending" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-light">
                    <h1  class="lead align-items-center mt-5">Your Profile </h1>
                    <div class="row mb-3">
                        <div class="col-md-5 border-right mb-3 border-bottom">
                            <div class="outter">
                            <?php
                                $studentId  = $row['studentID'];
                                $sql = $con->query("SELECT * FROM students WHERE id  ='$studentId'");
                                $student = mysqli_fetch_array($sql);
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
                                  <h2 class="lead mb-3 text-center">
                                        <strong style="font-size: 12px;"> <b>Click Image To Edit Profile </b></strong>
                                </h2>

                                <?php
                                        $msg =NULL; //error message

                                        $studentId  = $row['studentID'];
                                        if(isset($_POST['submit'])){

                                            //declare variables

                                            $profileImageName =  $_FILES['profileImage']['name'];

                                            //temporary file for images
                                            $target = 'assets/images/profilepicture/' . $profileImageName;


                                            //move to temporary image folder
                                            if   (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){
                                                $sql = mysqli_query($con, "UPDATE studentinfo SET profileImage = '$profileImageName'  WHERE studentID = '$studentId'");

                                                if($sql){
                                                    echo "<script>alert('Profile Image Updated'); window.location = 'profile.php';</script>";
                                                    
                                                }else {
                                                    $msg = "Database Error: Failed to save user";
                                                    echo "<script>alert('Database Error'); window.location = 'profile.php';</script>";
                                                    
                                                }

                                            
                                            }else{
                                                echo "<script>alert('Failed to Update Profile Picture');</script>";
                                                
                                            }
                                        }


// ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <img src='assets/images/profilepicture/<?php echo $info['profileImage'];  ?>' onclick='triggerClick()''  alt='' class='' id='profileTrending'>
                                    <input type="file" name="profileImage" onchange="displayImage(this)" value="<?php  ?>" id="profileImage" class="form-control col-md-3" style="display: none;">
                                    <button type="submit" name="submit" class="btn btn-warning  mb-5 text-center">Edit Photo</button>
                                </form>

                              
                            </div>
                        </div>


          

                        <div class="col-md-7 border-right border-bottom" id="profileThings">
                            <h2 class="lead mb-3">
                            <strong style="font-size: 12px;"> <b> Student ID </b></strong> : <?php echo $studentid; ?>
                            </h2>

                            <h2 class="lead mb-3">
                            <strong style="font-size: 12px;"> <b> Name </b></strong> : <?php echo $firstname . " " . $middlename . " " . $lastname; ?>
                            </h2>

                            <h2 class="lead mb-3">
                            <strong style="font-size: 12px;"> <b> Username </b></strong>  : <?php echo $username; ?>
                            </h2>

                            <h2 class="lead mb-3">
                            <strong style="font-size: 12px;"> <b> Email </b></strong>  : <?php echo $email ?>
                            </h2>

                          

                            

                            

                          
                            <h2 class="lead mb-3">
                               <strong style="font-size: 12px;"> <b> University </b></strong> :  <?php echo $university; ?>
                            </h2>


                         

                            <h2 class="lead mb-3">
                                <strong style="font-size: 12px;"> <b> bio </b></strong> :  <?php echo $bio; ?>
                            </h2>

                            <p class="lead "> <a href="updateprofile.php?update_id= <?php echo $student['id']; ?>" style="font-size: 14px;" class="text-info">Click here to Update your Profile</a> </p>
                            
</div>
                    </div>
                </div>

                <div class="col-md-3 bg-light">
                     <h1  class="lead align-items-center mt-5 mt-3">Your Post </h1>

                     <div class="card bg-info text-light border-0 mb-3">

                     <?php 
                            $studentId  = $row['studentID'];
                            $sql = $con->query("SELECT * FROM posts WHERE studentID = '$studentId'");
                            $number_post = mysqli_num_rows($sql);
                     ?>
                      
                        <div class="card body bg-info">
                            <h1 class="display-4"><?php echo $number_post; ?></h1>
                                <h1 class="lead">Posted</h1>
                            </div>

                        <div class="card-footer">
                          <a href="studentpost.php" class="small-box-footer text-light" style="text-decoration: none;">View All <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

    
<script>
            function triggerClick(){
                document.querySelector('#profileImage').click();
            }


            function displayImage(e) {
                if (e.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        document.querySelector('#profileTrending').setAttribute('src', e.target.result);
                    }

                    reader.readAsDataURL(e.files[0]);
                }
            }
</script>



<?php include("includes/footer.php"); ?>


<!-- 
    Developed by: @kevoocodes
 -->