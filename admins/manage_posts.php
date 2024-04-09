<?php
    include("../includes/config.php");
?>
<?php
    include("../includes/config.php");
?>
<?php include("includes/header.php") ?>

  

<!-- SIDE NA -->
<?php include("includes/sidenav.php") ?>

<!-- TOP NAVIGATION -->
<?php include("includes/topnav.php") ?>


<?php
        
        if(isset($_GET['deleteid'])){
            $postid = $_GET['deleteid'];
            $sql = $con->query("DELETE  FROM posts WHERE id = '$postid'");
        
            if($sql) {
                header("Location: view_post.php");
            }else{
                echo "<script>alert('Posts not deleted')window.location = 'posts.php'</script>";
            }
        }

        ?>

 <!-- HEADER -->


 
  

          <!-- Main Container -->
          <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <h2 class="content-heading">Posts</h2>

                   

                    <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Posts</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th> ID</th>
            
                                        <th class="d-none d-sm-table-cell">title</th>
                                        <th class="d-none d-sm-table-cell">Sender</th>
                                    
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                                       </tr>
                                </thead>
                                <tbody>
    

                                <?php
                        $sql = $con->query("SELECT * FROM Posts ORDER BY id DESC");
                        $number = 1;

                        while($row = mysqli_fetch_array($sql)) {
                            $studentid = $row['studentID']; 
                                $sqlstudentinfo = mysqli_query($con, "SELECT * FROM studentinfo WHERE studentID = '$studentid'");
                                $fetchstudentinfo = mysqli_fetch_array($sqlstudentinfo);
                                $studentinfo = $fetchstudentinfo['studentID'];
                                $studentinfousername =  $fetchstudentinfo['username'];
                                ?>
                                    

                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600"><?php echo $number ?></td>
                                        <td class="font-w600"><?php echo $row['title'] ?></td>
                                        <td class="font-w600"><?php echo $studentinfousername; ?></td>
                                    
                        
                                    
 
                                         <td class="d-none d-sm-table-cell">
                                            <a href="view_post.php?id= <?php echo $row['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="deletepost.php?id= <?php echo $row['id']; ?>"  onclick="return confirm('Are you sure you want to delete this Student?');">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        
                                    </tr>

                                <?php

                            $number = $number + 1;
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