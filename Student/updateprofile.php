<?php include("includes/config.php"); ?>

<?php
 include("session.php");
?>

<?php include("includes/header.php")   ?>
<?php include("includes/sidebar.php")   ?>
<?php include 'postdate.php'; ?>

<?php
$username = $_SESSION['username'];
if(isset($_POST['submit'])){

    //declare variables
    // $username = $_POST['username'];
    // $_SESSION['name'] = $name;

    $email = $_POST['email'];
    $username = $_SESSION['username'];
    // $_SESSION['skills'] = $skills;


    $bio = $_POST['bio'];
    // $_SESSION['bio'] = $bio;


        $sql = mysqli_query($con, "UPDATE studentinfo SET  bio = '$bio'  WHERE username = '$username'");

        if($sql){
            $msg = "**Your Profile Updated";
            
        }else {
            $msg = "Database Error: Failed to save user";
            
        }
        

      
}


// ?>
     

            <!-- right-panel starts here -->
            <div class="right-panel py-2 px-2 d-flex flex-col justify-center">
              <div class="header-post">
                <h3>Update Profile</h3>
                <p class="text-danger">
                    <?php echo $msg; ?>
                 </p>
                 
              </div>
              <?php
                   $username = $_SESSION['username'];
                   if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                    $sql = mysqli_query($con, "SELECT * FROM studentinfo WHERE username = '$username'");
                    $row = mysqli_fetch_array($sql);
                    $username = $row['username'];
                    $email = $row['email'];
                    $bio = $row['bio'];
                   }
                   
                   ?>
                   
            <div class="row">
                       
                <div class="col-md-12">
        
                 <p class="lead">Update  Profile</p>
                   <small class="text-danger text-left"> <?php echo $msg; ?> </small>

                   <div style="text-align: left" class="pt-3 mb-3">
                   <small class="text-left  text-secondary" id="small">Personal Infomation</small>
                   </div>

                   <?php
                   if(isset($_GET['update_id'])){
                    $id = $_GET['update_id'];
                    $sql = mysqli_query($con, "SELECT * FROM studentinfo WHERE studentID = '$id'");
                    $row = mysqli_fetch_array($sql);
                    $username = $row['username'];
                    $email = $row['email'];
                    $bio = $row['bio'];
                   }
                   
                   
                   ?>

                 <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group text-left">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" name="skills" value="<?php echo $username; ?>" id="" aria-describedby="emailHelpId" placeholder="Enter Your Skills" required readonly>
                                        </div>



                                        <div class="form-group text-left ">
                                          <label for="">Email</label>
                                          <input type="email" class="form-control unicase-form-control" value="<?php echo $email; ?>" name="email" id="" aria-describedby="emailHelpId" placeholder="" readonly>
                                          <small id="emailHelpId" class="form-text text-muted"></small>
                                        </div>
                                        
                                        <div class="form-group text-left pb-5">
                                            <label for="">Bio</label>
                                            <textarea class="form-control" name="bio" value="" id="" rows="3" placeholder="Enter Your Bio" required><?php echo $bio; ?></textarea>
                                        </div>
                                    
                                        <button type="submit" name="submit" class="btn btn-warning mb-5 text-left">Profile Update</button>
                 </form>
                            </div>
                            
                        </div>

                                                    



                                   


            </div>
 
<?php include("includes/sidebar.php") ?>