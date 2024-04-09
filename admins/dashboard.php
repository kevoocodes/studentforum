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
                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="manage_student.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">

                                    

                                <?php
                                
                                $sqlstudent = $con->query("SELECT * FROM students");
                                $studentnum = $sqlstudent->num_rows;
                                
                                ?>
                                    <div class="ribbon-box"><?php echo $studentnum; ?></div>
                                    <p class="mt-5">
                                    <i class="si si-user fa-3x text-white-op"></i>

                                    </p>
                                    <p class="font-w600 text-white">Students</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="manage_posts.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
  
                                <?php
                                
                                $sqlposts = $con->query("SELECT * FROM posts");
                                $postsnum = $sqlposts->num_rows;
                                
                                ?>
                                    <div class="ribbon-box"><?php echo $postsnum ?></div>
                                    <p class="mt-5">
                                        
                                    <img style="width: 50px;" src="assets/img/photos/chat.png" alt="">
                                    </p>
                                    <p class="font-w600 text-white">Posts</p>
                                </div>
                            </a>
                        </div>
                       
                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="manage_categories.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">

                                
                                <?php
                                
                                $sqlcategories = $con->query("SELECT * FROM categories");
                                $categoriesnum = $sqlcategories->num_rows;
                                
                                ?>
                                    <div class="ribbon-box"><?php echo  $categoriesnum ?></div>
                                    <p class="mt-5">
                                        <!-- <i class="si si-target fa-3x text-white-op"></i> -->
                                        <i class="si si-layers fa-3x text-white-op"></i>

                                       
                                    </p>
                                    <p class="font-w600 text-white">Categories</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="manage_courses.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">

                                    <div class="ribbon-box">12</div>
                                    <p class="mt-5">
                                        <!-- <i class="si si-target fa-3x text-white-op"></i> -->
                                        <img style="width: 50px;" src="assets/img/photos/chat.png" alt="">
                                    </p>
                                    <p class="font-w600 text-white">Course</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 col-md-4 col-xl-4">
                            <a class="block text-center" href="subject_notes.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">

                                    <div class="ribbon-box">12</div>
                                    <p class="mt-5">
                                        <!-- <i class="si si-target fa-3x text-white-op"></i> -->
                                        <img style="width: 50px;" src="assets/img/photos/chat.png" alt="">
                                    </p>
                                    <p class="font-w600 text-white">Subject Notes</p>
                                </div>
                            </a>
                        </div>
                    
                        
                        <!-- END Row #1 -->
                    </div>
                  
                  
                </div>
                

                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

             
            <?php include("includes/footer.php") ?>