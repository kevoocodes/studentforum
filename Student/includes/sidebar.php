    <!-- main body starts here -->
    <div class="main-body flex">
            <!-- left absolute panel starts here -->
            <div class="left-panel d-flex flex-col justify-center gap-1">
               <div class="img-wrapper">
                <img src="../assets/images/profilepicture/<?php echo $profileimg;  ?>" alt="x" class="w-10">
               </div>
               <div class="user-info d-flex flex-col ">
               <?php
                        $username = $_SESSION['username'];

                ?>
                <span class="name"><?php echo  $username; ?></span>
                <span class="email">aron@gmail.com</span>
               </div>

               <div class="quick-links d-flex flex-col gap-1">
                
                <div class="quick-item">
                  <a href="change_password.php">Change Password</a>
                </div>
                <div class="quick-item">
                  <a href="create_post.php">Create new</a>
                </div>
                <div class="quick-item">
                  <a href="profile.php">View profile</a>
                </div>
                <!-- <div class="quick-item">
                  <a href="students.html">Notes</a>
                </div> -->
               </div>

               <div class="logout-btn">
                 <div class="logout">
                    <a href="logout.php">logout</a>
                 </div>
               </div>
            </div>
            <!-- left absolute panel ends here -->