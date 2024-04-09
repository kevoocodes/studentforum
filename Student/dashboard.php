<?php include("includes/config.php"); ?>

<?php
 include("session.php");
?>

<?php include("includes/header.php")   ?>
<?php include("includes/sidebar.php")   ?>
<?php include 'postdate.php'; ?>


<style>
    .right-panel .post-card .left-content .img-wrapper img {
        width: 100%;
        height: 100%;
    }
</style>
  
     

            <!-- right-panel starts here -->
            <div class="right-panel py-2 px-2 d-flex flex-col justify-center">
              <div class="header-post text-center">
                <h3>Trending stories</h3>
              </div>

              <?php 
                                    $sql = mysqli_query($con, "SELECT * FROM posts ORDER BY id DESC LIMIT 10");
                                    $row = mysqli_num_rows($sql);
                                    $postidentity = $row['id'];

                                   
                                    
                                    while($post = mysqli_fetch_array($sql)){
                                        $date_time = $post['dateCreated'];
                                            // echo "<h2 ><a id='linkTrending' href='single.php? postid = ".$post['id']."'> ".  $post['title'] . "</a></h2>";
                                            $userid = $post['studentID'];
                                            $query = $con->query("SELECT * FROM students WHERE studentID = '$userid'");
                                            $queryarray = mysqli_fetch_array($query);
                                            $studentIdentity = $queryarray['studentID']
                                            ;
                                            // $studentusername = $queryarray['username'];
                                            
                                            $info = $con->query("SELECT * FROM studentinfo WHERE studentID = '$userid'");
                                            $queryinfo = mysqli_fetch_array($info);
                                            $profileimage = $queryinfo['profileImage'];


                                            ?>
                                              <div class="post-card w-9 d-flex">
                                                <div class="left-content d-flex flex-col justify-center">
                                                    <div class="img-wrapper">
                                                        <img src="../assets/images/profilepicture/<?php echo $queryinfo['profileImage'];  ?>" alt="x" class="w-10">
                                                    </div>
                                                    <a href="/users/uid" class="name">
                                                        <span class="name"><?php  echo  $queryinfo['username']; ?></span>
                                                    </a>
                                                </div>

                                                <div class="right-content">
                                        
                                                    <div class="post-body">
                                                    <h2><a id='linkTrending' style="color: #000" href='post.php?post_id=<?php echo $post['id']; ?>'> <?php echo $post['title']; ?></a></h2>
                                                    </div>
                                                    <a href="/posts/pid/show" class="comments-show flex">
                                                    <?php 
                                                    
                                                    // To display number of comments
                                                       $sqlcomment  = mysqli_query($con,"SELECT * FROM comments WHERE postid = '". $post['id'] ."'");
                                                       $sqlcommentrows = mysqli_num_rows($sqlcomment);
                                                       // echo $sqlcommentrows;
                                                       
                                                       ?>
                                                        <i class="fas fa-comments"></i>
                                                        <span><?php  echo $sqlcommentrows; ?> comments</span>
                                                    </a>

                                                    <div class="time">
                                                    <span><?php echo timeAgo(strtotime($date_time)); ?></span>
                                                    </div>
                                                </div>
                                                </div>

                                                <?php  }
                                                
                                                ?>
                
              
               
            </div>
 
<?php include("includes/sidebar.php") ?>