<?php
    include("../includes/config.php");
?>

<?php include ("session.php"); ?>
        <?php include("includes/header.php") ?>

  

        <!-- SIDE NA -->
        <?php include("includes/sidenav.php") ?>

        <!-- TOP NAVIGATION -->
        <?php include("includes/topnav.php") ?>


         <!-- HEADER -->

    
                 
          

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Row #1 -->
                       

                       <div class="card text-left">
                         
                         <div class="card-body">
                            <?php
                            
                            $studentid = $_GET['id'];
                            $sql = $con->query("SELECT * FROM students WHERE id = '$studentid'");
                            $sqlrow = $sql->fetch_array();
                            $studID = $sqlrow['id'];
                            $sqlstudentinfo = $con->query("SELECT * FROM studentinfo  WHERE studentID = '$studID'");
                            $RowInfo = $sqlstudentinfo->fetch_array();
                            
                            ?>
                         <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <tr>
                                        <th>Firstname</th>
                                        <td><?php echo $sqlrow['firstname']; ?></td>
                                        <th>Sponsor</th>
                                        <td><?php echo $sqlrow['middlename']; ?></td>
                                        </tr>


                                        <tr>
                                        <th>Lastname</th>
                                        <td><?php echo $sqlrow['lastname']; ?></td>
                                        <th>Student Id</th>
                                        <td><?php echo $sqlrow['studentID']; ?></td>
                                        </tr>
                                        <tr>

                                        <th>Username</th>
                                        <td><?php echo $RowInfo['username'] ?></td>
                                        <th>University</th>
                                        <td><?php echo $RowInfo['university'] ?></td>
                            </tr>

                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $RowInfo['email'] ?></td>
                                        </tr>

                                        <tr>
                                            <th>Bio</th>
                                            <td><?php echo $RowInfo['bio'] ?></td>
                                        </tr>

                                        <tr>
                                            <th>Image</th>
                                            <td><img style="width: 200px;" src="../assets/images/profilepicture/<?php echo $RowInfo['profileImage'];  ?>" alt=""></td>
                                        </tr>
                                        


                            </table> 
                            <button id="#printbtn" type="button" name="print" class="btn btn-primary"  onclick="window.print()">Print</button>
                         </div>
                       </div> 
                    
                        
                        <!-- END Row #1 -->
                    </div>
                  
                  
                </div>
                

                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

             
            <?php include("includes/footer.php") ?>