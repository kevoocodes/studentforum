<?php
    include("../includes/config.php");
?>

<?php include ("session.php"); ?>

<?php include("includes/header.php") ?>

  

<!-- SIDE NA -->
<?php include("includes/sidenav.php") ?>

<!-- TOP NAVIGATION -->
<?php include("includes/topnav.php") ?>



<?php

    $msg = NULL;
    if(isset($_POST['submit'])) {
        $id = $_POST['identity'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $date = date("Y-m-d");

        $sqlidentity = $con->query("SELECT * FROM students WHERE studentID = '$id'");

        if(mysqli_num_rows($sqlidentity) > 0) {
            $msg = "**This Student Identity is already exists";
        }else {
            $sql = "INSERT INTO students(studentID,firstname,middlename,lastname,joinedDate) VALUES('$id','$firstname','$middlename','$lastname','$date')";
            $query = mysqli_query($con,$sql);

            if($query){
                $msg = "**Student Registered";
            }else {
                $msg = "**Student Not Registered";
            }
        }
    }


?>

 <!-- HEADER -->


         
  




    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #1 -->
             
                <div class="card border-secondary bg-white col-md-12">
                  <img class="card-img-top" src="holder.js/100px180/" alt="">
                  <div class="card-header">
                    <h2 class="p-4">Student Registration</h2>
                    <?php echo $msg; ?>
                  </div>
                  <div class="card-body">
                <form action="" method="POST" class="p-4">
                            
                            <div class="form-group">
                              <label for="">Student Identity</label>
                              <input type="text" name="identity" id="" class="form-control" placeholder="" aria-describedby="helpId">
            
                            </div>

                            <div class="form-group">
                                <label for="">Firstname</label>
                                <input type="text" name="firstname" id="" class="form-control" placeholder="" aria-describedby="helpId">
              
                            </div>

                            <div class="form-group">
                                <label for="">Middlename</label>
                                <input type="text" name="middlename" id="" class="form-control" placeholder="" aria-describedby="helpId">
              
                            </div>

                            <div class="form-group">
                                <label for="">Lastname</label>
                                <input type="text" name="lastname" id="" class="form-control" placeholder="" aria-describedby="helpId">
              
                            </div>

                        
                         
                    

                            <div class="form-group">
                                
                                    <button name="submit" type="submit" class="btn btn-alt-success">
                                        <i class="fa fa-plus mr-5"></i> Add Student
                                    </button>
                            
                            </div> 

                </form>
                  </div>
                </div>
            
                
                <!-- END Row #1 -->
            </div>
          
          
        </div>
        

        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

     
    <?php include("includes/footer.php") ?>