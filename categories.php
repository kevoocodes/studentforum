<?php include("includes/config.php"); ?>
<?php
 include("session.php");
?>
<?php include("includes/header.php"); ?>

<?php include("includes/navbar.php"); ?>

<?php 
include "addpost.php";
?>

<?php include 'postdate.php'; ?>

<style>
    h2 a{
    font-size: 20px;
}
</style>


<!-- POST  -->

<?php 

if(isset($_POST['post'])){
    //declare varibles
    

    $categories = $_GET['categoriesid'];
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $content = mysqli_real_escape_string($con,$_POST['content']);   
    $date = date("Y-m-d H:i:s");

    if(empty($title) || empty($content)){
        echo "<script>alert('Title and Content Required')</script>";
    }else{
        
        $studentId  = $row['studentID'];
        // $select = $con->query("SELECT * FROM students WHERE id = '$studentId'");
        // $querySelect =  mysqli_fetch_array($select);
        // $id = $querySelect['id'];
        $sql = mysqli_query($con,"INSERT INTO posts (studentID,cat_id,title,content,dateCreated) VALUES ('$studentId','$categories','$title', '$content','$date')");

        if(!$sql) {
              echo "<script>alert('Data not Posted')</script>";
        }
    }
}

?>
     
    
    <div id="trending" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-light">
                    <?php
                       if(isset($_GET['categoriesid'])){
                            $categories = $_GET['categoriesid'];
                            $sql = $con->query("SELECT * FROM categories WHERE id = '$categories'");
                            $sqli = mysqli_fetch_array($sql);

                            ?>
                                <h1  class="lead align-items-center mt-5"><?php
                            
                            echo $sqli['cat_name']; 
                            
                            ?></h1>
                            <p class="lead" style="font-size: 14px;"> <strong> **<?php
                            
                            echo $sqli['cat_description']; 
                            
                            ?></strong></p>

                            <?php

                            }
                                
                            ?>
                  
                    
                    <a href="" class="btn btn-warning col-md-3 mb-5 text-dark" data-toggle="modal" data-target="#addPostModal">
                               <i class="fas fa-plus"></i>Click to Add Posts
                    </a>

                    
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
                                            
                                            <div class='row mb-3 pt-2 pb-2' id="topic" style="margin-left: 10px;margin-right: 10px; box-shadow: 5px 5px 10px #cccccc;">
                                            <div class='col-md-2 border-right'>
                                                <div class='outter'>
                                                    <img style="border: 1px solid gray;" id='profileTrending' src='assets/images/profilepicture/<?php echo $queryinfo['profileImage'];  ?>' alt=''>
                                                    <h1 id='headingTrending' class='lead mt-3'><?php  echo $username; ?></h1>
                                                </div>
                                            </div>
                                                            
                                           
                    
                                            <div class='col-md-10'>
                                          
                                                <h2><a id='linkTrending' href='singleposts.php?post_id=<?php echo $post['id']; ?>'> <?php echo $post['title']; ?></a></h2>
                                                <p class="overflo"></p>

                                                <?php 
                                                    
                                             // To display number of comments
                                                $sqlcomment  = mysqli_query($con,"SELECT * FROM comments WHERE postid = '". $post['id'] ."'");
                                                $sqlcommentrows = mysqli_num_rows($sqlcomment);
                                                // echo $sqlcommentrows;
                                                
                                                ?>
                                                <p class='lead  text-secondary' id='pTrending' style="font-size: 10px;"> <img  style="width: 12px;height:12px;" src="assets/images/icons/round.png" alt=""> <?php  echo $sqlcommentrows; ?> Comments</p>
                                                <p class="lead text-secondary text-right" style="font-size: 10px;"><?php echo timeAgo(strtotime($date_time)); ?></p>
                                              
                                            </div>
                                        </div>
                                            <?php

                                        }

                                    
                                }
                            
                            ?>
                            
                   
                </div>

                <div class="col-md-3"> <a href=""></a>
                    
                </div>
                
            </div>
        </div>
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

   


<?php include("includes/footer.php"); ?>


<!-- 
    Developed by: @kevoocodes
 -->