<?php
    include("../includes/config.php");
?>
<?php include ("session.php"); ?>

<?php include ("include/header.php"); ?>

<?php include ("include/navigation.php"); ?>

    <div class="row">
        <div class="container">
        <div class="col-md-12">

        <form action="searchstudent.php" method="post">
                <div class="form-row">
                            <div class="col col-md-9">
                            <input type="text" name="search" class="form-control" placeholder="Search student">
                            </div>
                            <div class="col col-md-3">
                            <input type="submit" name="submit" class="btn btn-info form-control" value="Search">
                            </div>
                </div>
                    </form>
            <p class="lead text-light text-center">Students</p>
              
            <table class="table table-light table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Student Identity</th>
                        <th>Fistname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Date Join</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php

                        if(isset($_POST['submit'])) {
                            $search = mysqli_real_escape_string($con, $_POST['search']);
                            $sql = mysqli_query($con,"SELECT * FROM students WHERE studentID LIKE '%$search%'OR firstname LIKE '%$search%' OR middlename LIKE '%$search%' OR lastname LIKE '%$search%' OR joinedDate  LIKE '%$search%'  LIMIT 10");
                            $number = 1;
                            if(mysqli_num_rows($sql) == 0) {
                                echo "<p class='lead text-left text-light text-center' style='font-size: 30px;'>No Student Found Matching " . $search . "</p>";
                            }

                            while($studentsearch = mysqli_fetch_array($sql)) {
                                ?>
                                
                                <tr>
                                    <td><?php echo $number; ?></td>
                                    <td><?php echo $studentsearch['studentID']; ?></td>
                                    <td><?php echo $studentsearch['firstname']; ?></td>
                                    <td><?php echo $studentsearch['middlename']; ?></td>
                                    <td><?php echo $studentsearch['lastname']; ?></td>
                                    <td><?php echo $studentsearch['joinedDate']; ?></td>
                                    <td><a href="updatestudent.php?id= <?php echo $studentsearch['id']; ?>" class="btn btn-info">Update</a> <a href="delete.php?id= <?php echo $studentsearch['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Student?');">Delete</a> <a href="printstudent.php?id= <?php echo $studentsearch['id']; ?>" class="btn btn-success">Print</a> </td> 
                                    
                                </tr>


                        <?php
                            $number = $number + 1;
                            }

                        }


                        ?>
                   
                </tbody>
            </table>
        </div>

        <div class="col-md-2">

        </div>
        </div>
    </div>

<?php include ("include/footer.php"); ?>