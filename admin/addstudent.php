<?php
    include("../includes/config.php");
?>
<?php include ("session.php"); ?>

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

<?php include ("include/header.php"); ?>

<?php include ("include/navigation.php"); ?>

    <div class="row">
        <div class="container">
            <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                               <h5> Add Student</h5>
                        </div>
                        <div class="card-body">
                                <small class="text-danger"><?php echo $msg; ?></small>
                                <form action="" method="post">
                                    <div class="form-group">
                                    <label for="">Student Identity</label>
                                    <input type="text" name="identity" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted"></small>
                                    </div>

                                    <div class="form-group">
                                    <label for="">Firstname</label>
                                    <input type="text" name="firstname" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted"></small>
                                    </div>

                                    <div class="form-group">
                                    <label for="">Middlename</label>
                                    <input type="text" name="middlename" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted"></small>
                                    </div>

                                    <div class="form-group">
                                    <label for="">Lastname</label>
                                    <input type="text" name="lastname" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted"></small>
                                    </div>

                                    
                                    <button type="submit" name="submit" class="btn btn-info">Add Student</button>   
                                 
                                    
                                </form>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <!-- <div class="card-header">
                            Header
                        </div> -->
                        <!-- <div class="card-body">
                            <h5 class="card-title">Upload Many Students</h5>
                            <form method="post" action="uploadexcel.php" enctype="multipart/form-data">
                                            <input type="file" class="form-control mb-2" name="file" accept=".xls,.xlsx">
                                            <input type="submit" class="btn btn-info"  name="submit" value="Upload"/>
                            </form>
                        </div> -->
                    </div>
            </div>

            <div class="col-md-2">

            </div>
        </div>
    </div>



<?php include ("include/footer.php"); ?>