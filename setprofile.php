<?php include("includes/config.php"); ?>
<?php include("session.php"); ?>
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

<style>
        body{
            background-color: #bfbfbf;
        }

        #brand{
            /* font-size: 30px; */
            color: #ff0000;
            text-shadow: 2px 2px 7px    #000000;
        }

        #spanbrand{
            font-size: 20px;
            color: #00aaff;
        }

        img {
            width: 20px;
            height: 20px;
        }

        #linkTrending{
            color: #000000;
        }

        #trending h1{
            text-align: center;
        }

        #profileTrending{
            width: 70%;
            height: 70%;
            margin-left: 15%;
            margin-right: 15%;
            border-radius: 50%;
            cursor: pointer;
        }

        #headingTrending{
            cursor: pointer;
            font-size: 16px;
        }


        #pTrending{
            font-size: 13px;
        }

        #profileDisplay{
        border-radius: 50%;
        cursor: pointer;
      }

   


    </style>

</head>



<?php
$msg =NULL; //error message

$studentId  = $row['studentID'];
if(isset($_POST['submit'])){

    //declare variables
    $name = $_POST['name'];
    $_SESSION['name'] = $name;

    $skills = $_POST['skills'];
    $_SESSION['skills'] = $skills;


    $bio = $_POST['bio'];
    $_SESSION['bio'] = $bio;

    $university = $_POST['university'];
    $_SESSION['university'] = $university;


    $facult  = $_POST['faculty'];
    $_SESSION['faculty'] = $facult;

    $profileImageName =  $_FILES['profileImage']['name'];

    //temporary file for images
    $target = 'assets/images/profilepicture/' . $profileImageName;


    //move to temporary image folder
      if   (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){
        $sql = "INSERT INTO studentinfo (studentID,username,skills,bio,university,faculty,profileImage) VALUE('$studentId','$name','$skills','$bio','$university','$facult','$profileImageName')";

        if(mysqli_query($con, $sql)) {
            header('location: dashboard.php');
             
        }else {
            $msg = "Database Error: Failed to save user";
            
        }

      
      }else{
          $msg = "Failed to upload to  file";
         
      }
}


?>



<nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a id="brand" class="navbar-brand" href="index.php">Student <span id="spanbrand">forums</span></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> Trending <span class="sr-only">(current)</span></a>
                </li>
               
           
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Web Software Develpment</a>
                        <a class="dropdown-item" href="#">Finace and Accounting</a>
                        <a class="dropdown-item" href="#">Design and Creative</a>
                        <a class="dropdown-item" href="#">Digital Marketing</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Aboutus</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                     
                    <li class="nav-item">
                        <a href="login.php" class="btn btn-warning mr-2">Members</a>
                          
                    </li>

                    <!-- <li class="nav-item">
                           <button class="btn btn-secondary"> <img id="imgsearch" src="assets/images/icons/search.png" alt=""> Search</button>
                    </li> -->
            </ul> 
        </div>
    </nav>
    

<div id="trending" class="mt-5 ">
        <div class="container">
             <div class="col-md-9 bg-light text-center">
                 <p class="lead">Create Profile</p>
                   <small class="text-danger text-left"> <?php echo $msg; ?> </small>

                   <div style="text-align: left" class="pt-3 mb-3">
                   <small class="text-left  text-secondary" id="small">Personal Infomation</small>
                   </div>

                 <form action="" method="post" enctype="multipart/form-data">
                                   <div class="form-group text-left">
                                        <label for="">Upload your Image</label>
                                        <?php echo  "<img src='assets/images/profilepicture/head.png' onclick='triggerClick()''  alt='' class='d-block img-fluid mb-3 col-md-4' id='profileDisplay'>"; ?>
                                        <input type="file" name="profileImage" onchange="displayImage(this)" value="<?php  ?>" id="profileImage" class="form-control col-md-3" style="display: none;">
                                   </div>
                                  <div class="form-row">
                                        <div class="col">
                                        <div class="form-group text-left">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?php if(isset($_SESSION['name'])) { echo $_SESSION['name'];} ?>" id="" aria-describedby="emailHelpId" placeholder="Enter Your Name" required>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-group text-left">
                                            <label for="">Skills</label>
                                            <input type="text" class="form-control" name="skills" value="<?php if(isset($_SESSION['skills'])) { echo $_SESSION['skills'];} ?>" id="" aria-describedby="emailHelpId" placeholder="Enter Your Skills" required>
                                        </div>
                                        </div>
                                  </div>
                                        <div class="form-group text-left pb-5">
                                            <label for="">Bio</label>
                                            <textarea class="form-control" name="bio" value="<?php if(isset($_SESSION['bio'])) { echo $_SESSION['bio'];} ?>" id="" rows="3" placeholder="Enter Your Bio" required></textarea>
                                        </div>
                    </div>
                                        
                                                          
                                        
               

  
            
        </div>

        <div class="container">
                <div class="col-md-9 bg-light text-center">

                <div style="text-align: left" class="pt-3 mb-3">
                   <small class="text-left text-secondary" id="small">University Infomation</small>
                   </div>
                <div class="form-group text-left ">

                                            <label for="">University</label>
                                            <input type="text" class="form-control" name="university" value="<?php if(isset($_SESSION['university'])) { echo $_SESSION['university'];} ?>" id="" aria-describedby="emailHelpId" placeholder="Enter Your University" required>
                                        </div>

                                        <div class="form-group text-left">
                                            <label for="">Faculty</label>
                                            <input type="text" class="form-control" name="faculty" value="<?php if(isset($_SESSION['faculty'])) { echo $_SESSION['faculty'];} ?>" id="" aria-describedby="emailHelpId" placeholder="Enter Your Facaluty" required>
                                        </div>

                                        <div class="form-group text-left ">
                                           <button type="submit" name="submit" class="btn btn-warning mb-5">Profile Submit</button>
                                        </div>  
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