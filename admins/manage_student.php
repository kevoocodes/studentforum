
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
                    <h2 class="content-heading">Today Events</h2>

                   

                    <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Events</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th> ID</th>
                                        <th class="d-none d-sm-table-cell">Student ID</th>
                                        <th class="d-none d-sm-table-cell">Firstname</th>
                                        <th class="d-none d-sm-table-cell">Middlename</th>
                                        <th class="d-none d-sm-table-cell">Lastname</th>
                                        <th class="d-none d-sm-table-cell">Date Joined</th>
                                    
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                                       </tr>
                                </thead>
                                <tbody>
    

<?php
$sql = $con->query("SELECT * FROM students ORDER BY id DESC");
$number = 1;

while($row = mysqli_fetch_array($sql)) {
    $number++
    ?>



<tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600"><?php echo $number ?></td>
                                        <td class="font-w600"><?php echo $row['studentID'] ?></td>
                                        <td class="font-w600"><?php echo $row['firstname'] ?></td>
                                        <td class="font-w600"><?php echo $row['middlename'] ?></td>
                                        <td class="font-w600"><?php echo $row['lastname'] ?></td>
                                        <td class="font-w600"><?php echo $row['joinedDate'] ?></td>
                        
                                    
 
                                         <td class="d-none d-sm-table-cell"><a href="view_student.php?id= <?php echo $row['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        
                                    </tr>
<?php


 }?>


                                
                                   

                                    
                                
                                
                                
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full Pagination -->

                    <!-- END Dynamic Table Simple -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
  








    

     

    <?php include("includes/footer.php") ?>