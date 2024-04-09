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

         <?php 
                                if(isset($_GET['id'])){
                                    // echo $_GET['post_id'];
                                    $post_id = $_GET['id'];
                                    $sql = $con->query("SELECT * FROM posts WHERE id = '$post_id'");
                                    $post = mysqli_fetch_array($sql);
                                    $student_id = $post['studentID'];
                                   

                                    $sqluser = $con->query("SELECT * FROM students WHERE studentID = '$student_id'");
                                    $fetchstudent = mysqli_fetch_array($sqluser);
                                    $sqlinfo = $con->query("SELECT * FROM studentinfo WHERE studentID = '$student_id'");
                                    $fetchInfo = mysqli_fetch_array($sqlinfo);

                                }
                                
         ?>
                 
          


            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Row #1 -->
                       

                       <div class="card text-left">
                         
                         <div class="card-body">

                         <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <tr>
                                        <th>Title</th>
                                        <td><?php echo $post['title']; ?></td>
                                
                                </tr>


                                        <tr>
                                        <th>Content</th>
                                        <td><?php echo $post['content']; ?></td>
                                        
                                        </tr>
                                      

                                        <tr>
                                            
                                            <th>
                                    
                                             Comments
                                            </th>
                                            <td>
                            <?php 
                                $sqlcomment = $con->query("SELECT * FROM comments WHERE postid = '$post_id' ORDER BY postid DESC");
                                $row = mysqli_num_rows($sqlcomment);

                                echo "<p style='font-size: 10px;' class='text-secondary text-left'><img  style='width: 12px;height:12px;' src='assets/images/icons/round.png' alt=''> " . $row . " comments</p>
                             
                                
                                ";

                                
    
                                while($comment = mysqli_fetch_array($sqlcomment)){
                                    $student = $comment['studentid'];
                                    $suser = $con->query("SELECT * FROM students WHERE studentID = '$student'");
                                    $sstudent= mysqli_fetch_array($suser);

                                    $suserinfo = $con->query("SELECT * FROM studentinfo WHERE studentID = '$student'");
                                    $sstudentinfo = mysqli_fetch_array($suserinfo);
                                    ?>
                                     <div class="Allcomment" id="comments" style="display: block;border-radius: 10px;background-color: #cccccc;">
                                    <div>
                                        <p class="commentUsername"><?php echo $sstudentinfo['username'] ?></p>
                                    </div>
                                    <div style="display: flex;">
                                            <div class="commentImage" id="imageComment"> 
                                                <!-- <img src="assets/images/profilepicture/<?php echo $sstudentinfo['profileImage'];  ?>" alt="" class="imageComments">  -->
                                                
                                            </div>
                                            <div class="commentUser">
                                                <p  style="font-size: 16px;"><?php echo $comment['content']; ?></p>
                                            </div>
                                    </div>
                                   </div>




                <?php

                                    
                                }
                                    ?>
                               
                                            </td>
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

             
            <?php include("includes/footer.php") ?>