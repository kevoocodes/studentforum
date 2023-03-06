<?php
    include("../includes/config.php");
?>
<?php include ("session.php"); ?>

<?php include ("include/header.php"); ?>

<?php include ("include/navigation.php"); ?>


<?php

if(isset($_GET['id'])){
    $studentid = $_GET['id'];

    $sql = $con->query("SELECT * FROM students WHERE id = '$studentid'");
    $fetchstudent = mysqli_fetch_array($sql);
}

?>




        <div class="row">
            <div class="container">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header text-center bg-info text-light">
                                Student Update
                        </div>

                        <?php
                            $msg = NULL;
                            if(isset($_POST['update'])) {
                                //declare variables
                                $studentid = $_GET['id'];
                                // $id = $_POST['identity'];
                                $studentIDENTITY = $_POST['identity'];
                                $firstname = $_POST['firstname'];
                                $firstname = mysqli_real_escape_string($con,$firstname);
                                $middename = $_POST['middlename'];
                                $middename = mysqli_real_escape_string($con,$middename);
                                $lastname = $_POST['lastname'];
                                $lastname = mysqli_real_escape_string($con,$lastname);

                                // $sqlstudent = mysqli_query($con,"SELECT * FROM  students WHERE studentID = '$studentid'");
                                // if(mysqli_num_rows($sqlstudent) > 1) {
                                //     $msg = "**StudentID is already exists";
                                // }else {
                                    $sql = $con->query("UPDATE students SET studentID = '$studentIDENTITY',  firstname = '$firstname', middlename = '$middename', lastname = '$lastname' WHERE id = '$studentid'");

                                    if($sql) {
                                        $msg = "**Student Updated";
                                    }else{
                                        $msg = "**Student Not Updated";
                                    }
                                }
                            // }
                        
                        
                        ?>
                        <div class="card-body">
                        <form method="POST" action="">
                            <small class="text-danger"><?php echo $msg; ?></small> <br>
                            <div class="form-group">
                               
                              <label for="">Student Identity</label>
                              <input type="text" name="identity" value="<?php echo $fetchstudent['studentID']; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <small id="helpId" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                              <label for="">Firstname</label>
                              <input type="text" name="firstname" value="<?php echo $fetchstudent['firstname']; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <small id="helpId" class="text-muted"></small>
                            </div>

                            <div class="form-group">
                              <label for="">Middlename</label>
                              <input type="text" name="middlename" value="<?php echo $fetchstudent['middlename']; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <small id="helpId" class="text-muted"></small>
                            </div>

                            <div class="form-group">
                              <label for="">Lastname</label>
                              <input type="text" name="lastname" value="<?php echo $fetchstudent['lastname']; ?>"  id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <small id="helpId" class="text-muted"></small>
</div>

                            
                            <button type="submit" name="update" class="btn btn-info">Update</button> 
                            
                        </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                       
                </div>
            </div>
        </div>

<?php include ("include/footer.php"); ?>