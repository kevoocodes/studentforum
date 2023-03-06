<?php
    include("../includes/config.php");
?>
<?php include ("session.php"); ?>

<?php include ("include/header.php"); ?>

<?php include ("include/navigation.php"); ?>

   
<div class="row">
    <div class="container">
        <div class="col-md-10">

        <form action="searchpost.php" method="post">
                <div class="form-row mb-3">
                            <div class="col col-md-9">
                            <input type="text" name="search" class="form-control" placeholder="Search Post">
                            </div>
                            <div class="col col-md-3">
                            <input type="submit" name="submit" class="btn btn-info form-control" value="Search">
                            </div>
                </div>
        </form>
            
        <table class="table table-light table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Student Sender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                            <?php

                            if(isset($_POST['submit'])) {
                                $search = mysqli_real_escape_string($con, $_POST['search']);
                                $sql = mysqli_query($con,"SELECT * FROM posts WHERE title LIKE '%$search%' LIMIT 10");
                                $number = 1;
                                if(mysqli_num_rows($sql) == 0) {

                                    echo "<p class='lead text-left text-light text-center' style='font-size: 30px;'>No Posts Found Matching " . $search . "</p>";
                                }else{
                                    
                                while($post = mysqli_fetch_array($sql)) {
                                    $studentid = $post['studentID']; 
                                    $sqlstudentinfo = mysqli_query($con, "SELECT * FROM studentinfo WHERE studentID = '$studentid'");
                                    $fetchstudentinfo = mysqli_fetch_array($sqlstudentinfo);
                                    $studentinfo = $fetchstudentinfo['studentID'];
                                    $studentinfousername =  $fetchstudentinfo['username'];
                                    ?>
                                     <tr>
                                         <td><?php echo $number; ?></td>
                                        <td><?php echo $post['title']; ?></td>
                                        <td><?php echo $studentinfousername; ?></td>
                                        <td><a href="viewpost.php?id= <?php echo $post['id']; ?>" class="btn btn-info">View</a> <a href="deletepost.php?id= <?php echo $post['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Student?');">Delete</a> </td>
                                        
                                    </tr>

                                <?php

                            $number = $number + 1;

                                }

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