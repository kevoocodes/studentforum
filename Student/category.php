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
              <?php
                       if(isset($_GET['categoriesid'])){
                            $categories = $_GET['categoriesid'];
                            $sql = $con->query("SELECT * FROM categories WHERE id = '$categories'");
                            $sqli = mysqli_fetch_array($sql);

                       
                            ?>
                           <h3> <?php echo $sqli['cat_name']; ?> </h3>

                         <?php   } ?>
              </div>
            










<?php 
                                if(isset($_GET['categoriesid'])){
                                    // echo $_GET['categoriesid'];
                                    $catid = $_GET['categoriesid'];
                                    $sql = mysqli_query($con, "SELECT * FROM posts WHERE cat_id = '$catid' ORDER BY id DESC");
                                    $row = mysqli_num_rows($sql);
                                    $postidentity = $row['id'];
                                    // $date = $row['dateCreated'];

                                    // include('postdate.php');

                                   
                                    
                                    while($post = mysqli_fetch_array($sql)){
                                            // $date = $post['dateCreated'];
                                            $date_time = $post['dateCreated'];
                                            // echo "<h2 ><a id='linkTrending' href='single.php? postid = ".$post['id']."'> ".  $post['title'] . "</a></h2>";
                                            $userid = $post['studentID'];
                                            $query = $con->query("SELECT * FROM students WHERE studentID = '$userid'");
                                            $queryarray = mysqli_fetch_array($query);
                                            $studentIdentity = $queryarray['studentID'];
                                            // $studentusername = $queryarray['username'];
                                            
                                            $info = $con->query("SELECT * FROM studentinfo WHERE studentID = '$userid'");
                                            $queryinfo = mysqli_fetch_array($info);
                                            $username = $queryinfo['username'];
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
                                                    <h2><a style="color: #000;" id='linkTrending' href='post.php?post_id=<?php echo $post['id']; ?>'> <?php echo $post['title']; ?></a></h2>
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
                                            <?php

                                        }

                                    
                                }
                            
                            ?>







                
               
            </div>

                 <!-- MODAL -->
<div class="modal fade" id="addPostModal">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header bg-info text-white">
                   <h5 class="modal-title">Add Posts</h5>
                   <button class="close" data-dismiss = "modal">
                       <span>&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form action="" method="post">
                            <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" id="" class="form-control" placeholder="Type Post Title" aria-describedby="helpId">
                            </div>


                            
                                <div class="form-group">
                                    <label for="body">Content</label>
                                    <textarea name="content" id="editor" cols="30" rows="3"class = "form-control" placeholder="Type Post Content"></textarea>
                                </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="post" class="btn btn-info">Add Post</button>
                        </div>  
               </form>
           </div>
       </div>
   </div>

 
   
   <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
    </script>

<?php include("includes/sidebar.php") ?>