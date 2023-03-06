<?php include("includes/config.php"); ?>
<?php include("session.php"); ?>
<?php include("includes/header.php"); ?>

<?php include("includes/navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name= "Kelvi Aron Msindai" content="Fullstack Developer">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<!-- CSS LINK -->
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

 <!-- FONT AWESOME LINK -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">

<link rel="stylesheet" href="assets/css/style.css">
<title>Ucc Forums</title>


</head>



<?php
$msg =NULL; //error message

$id = $_GET['update_id'] ;
if(isset($_POST['submit'])){

    //declare variables
    // $username = $_POST['username'];
    // $_SESSION['name'] = $name;

    $email = $_POST['email'];
    $username = $_POST['skills'];
    // $_SESSION['skills'] = $skills;


    $bio = $_POST['bio'];
    // $_SESSION['bio'] = $bio;

    // $_SESSION['university'] = $university;


    // $facult  = $_POST['faculty'];
    // $_SESSION['faculty'] = $facult;

    //temporary file for images
    // $target = 'assets/images/profilepicture/' . $profileImageName;


    //move to temporary image folder
    //   if   (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){
        // $sql = "INSERT INTO studentinfo (studentID,name,skills,bio,university,faculty) VALUE('$studentId','$name','$skills','$bio','$university','$facult')";

        // $sqlemail = $con->query("SELECT * FROM studentinfo WHERE email = '$email'");
        // $sqlusername = $con->query("SELECT * FROM studentinfo WHERE username = '$username'");
        // if(mysqli_num_rows($sqlemail) > 0){
        //     $msg = "**Email is already Taken";

        // }elseif(mysqli_num_rows($sqlusername)){
        //     $msg = "**Username is alread Taken";
        // }else{
               
        // }
        $sql = mysqli_query($con, "UPDATE studentinfo SET  bio = '$bio'  WHERE studentID = '$id'");

        if($sql){
            $msg = "**Your Profile Updated";
            
        }else {
            $msg = "Database Error: Failed to save user";
            
        }
        

      
    //   }else{
    //       $msg = "**Failed to update file";
         
    //   }
}


// ?>

<style>
    #profileDisplay{
        border-radius: 50%;
        cursor: pointer;
    }

    

   
</style>




    

<div id="trending" class="mt-5 ">
        <div class="container">
             <div class="col-md-9 bg-light text-center">
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
                    </div>
                                        
                                                          
                                        
    
            
        </div>

        
    </div>

    </form>



<script>
            function triggerClick(){
                document.querySelector('#profileImage').click();
            }


            function displayImage(e) {
                if (e.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                    }

                    reader.readAsDataURL(e.files[0]);
                }
            }
</script>


<?php include("includes/footer.php"); ?>


<!-- 
    Developed by: @kevoocodes
 -->