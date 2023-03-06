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
                        <th>Action</th>
                        <th>Date Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = $con->query("SELECT * FROM students ORDER BY id DESC");
                        $number = 1;

                        while($row = mysqli_fetch_array($sql)) {
                                ?>
                                     <tr>
                                         <td><?php echo $number; ?></td>
                                        <td><?php echo $row['studentID']; ?></td>
                                        <td><?php echo $row['firstname']; ?></td>
                                        <td><?php echo $row['middlename']; ?></td>
                                        <td><?php echo $row['lastname']; ?></td>
                                        <td><?php echo $row['joinedDate']; ?></td>
                                        <td><a href="updatestudent.php?id= <?php echo $row['id']; ?>" class="btn btn-info">Update</a> <a href="delete.php?id= <?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Student?');">Delete</a> <a href="printstudent.php?id= <?php echo $row['id']; ?>" class="btn btn-success">Print</a> </td> 
                                        
                                    </tr>

                                <?php

                            $number = $number + 1;
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