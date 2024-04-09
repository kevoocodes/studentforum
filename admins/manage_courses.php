
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
                    <h2 class="content-heading">Manage Courses</h2>

                   

                    <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Manage Courses</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                
                                        <th class="d-none d-sm-table-cell">ID</th>
                                        <th class="d-none d-sm-table-cell">Course name</th>
                        
                                    
                                        <th class="d-none d-sm-table-cell">Course Description</th>
                                        
                                       </tr>
                                </thead>
                                <tbody>
    

                                <?php
                    $sql = mysqli_query($con, "SELECT * FROM courses");

                    $number = 1;
                    while($row = mysqli_fetch_array($sql)) {
  
                        $number = $number + 1;
                        ?>

<tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600"><?php echo $row['id'] ?></td>
                                        <td class="font-w600"><?php echo $row['name'] ?></td>
                                        <td class="font-w600"><?php echo $row['description'] ?></td>
                        
<!--                                     
                                         <td class="d-none d-sm-table-cell"><a href="view-booking-detail.php?editid=<?php echo htmlentities ($row->id);?>&&bookingid=<?php echo htmlentities ($row->BookingID);?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td> -->
                                        
                                    </tr>

                        <?php
                    }
                        ?>






                                
                                        
                                  
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