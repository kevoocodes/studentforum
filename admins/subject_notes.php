
<?php
    include("../includes/config.php");
?>

<?php include ("session.php"); ?>
<?php

if(isset($_POST['upload']))
{   

    $course_name = $_POST['module_name'];
    $course_code = $_POST['module_code'];
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="assets/images/notes";
 
 /* new file size in KB */
 $new_size = $file_size/5000;  
 /* new file size in KB */
 
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);
 $date = date('Y-m-d');
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO modules_notes(module_name,module_code,module_file,dateCreated) VALUES('$course_name','$course_code','$final_file','$date')";
  mysqli_query($con,$sql);
  
 
  echo "<script>alert('File sucessfully upload')</script>";

        
  
 }
 else
 {
  
    echo "<script>alert('Error.Please try again')</script>";
		
		}
	}
?>

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
                            <h3 class="block-title">Manage Notes</h3>
                        </div>

                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add Module</h3>
                            <a href="" class="btn  mb-2 text-white bg-gd-emerald" data-toggle="modal" data-target="#addPostModal">
                            <i class="fa fa-plus mr-5"></i> Add  
                        </a>
                        </div>

                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                
                                        <th class="d-none d-sm-table-cell">ID</th>
                                        <th class="d-none d-sm-table-cell">Module name</th>
                        
                                    
                                        <th class="d-none d-sm-table-cell">Module code</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                                       </tr>
                                </thead>
                                <tbody>
    

                                <?php
                    $sql = mysqli_query($con, "SELECT * FROM modules_notes");

                    $number = 1;
                    while($row = mysqli_fetch_array($sql)) {
  
                        $number = $number + 1;
                        ?>

<tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600"><?php echo $row['id'] ?></td>
                                        <td class="font-w600"><?php echo $row['module_name'] ?></td>
                                        <td class="font-w600"><?php echo $row['module_code'] ?></td>
                        
                                    
                                         <td class="d-none d-sm-table-cell"><a href="view-booking-detail.php?editid=<?php echo htmlentities ($row->id);?>&&bookingid=<?php echo htmlentities ($row->BookingID);?>"><i class="fa fa-delete" aria-hidden="true"></i></a></td>
                                        
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









                        <!-- MODAL -->
    <div class="modal fade" id="addPostModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-light bg-gd-emerald">
                    
                    
                    
                        <h3 class="block-title">Add Notes</h3>
                        

                    <button class="close" data-dismiss = "modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                            
                                <div class="form-group">
                                  <label for="">Module Name</label>
                                  <input type="text" name="module_name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                                </div>

                                <div class="form-group">
                                    <label for="">Module Code</label>
                                    <input type="text" name="module_code" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  
                                </div>

                            
 
                                

                                 <div class="form-group">
                                   <label for="">File</label>
                                   <input type="file" name="file" id="" class="form-control" placeholder="Write Here" aria-describedby="helpId">
                                
                                 </div>
                             
                        
 
                                <div class="form-group">
                                    
                                        <button type="submit" class="btn btn-alt-success" name="upload">
                                            <i class="fa fa-plus mr-5"></i> Add Notes
                                        </button>
                                
                                </div> 

                    </form>
            </div>
            </div>
 </div>
    </div>
  

<?php include("includes/footer.php") ?>