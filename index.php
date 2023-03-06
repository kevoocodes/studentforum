<?php include 'includes/config.php'; ?>
<?php include("includes/other/header.php"); ?>
<?php include("includes/other/navbar.php"); ?>
<?php include 'postdate.php'; ?>

<style>
    
#profileTrending{
    width: 60%;
    height: 60px;
    margin-left: 20%;
    margin-right: 20%;
    border-radius: 50%;
    cursor: pointer;

}

</style>


<div id="trending" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-10 bg-light">
                    <h1  class="lead align-items-center mt-5">Trending Stories</h1>

                         
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
                                            $studentIdentity = $queryarray['studentID'];
                                            // $studentusername = $queryarray['username'];
                                            
                                            $info = $con->query("SELECT * FROM studentinfo WHERE studentID = '$userid'");
                                            $queryinfo = mysqli_fetch_array($info);
                                            $profileimage = $queryinfo['profileImage'];


                                            ?>
                                            
                                            <div class='row mb-3 pt-2 pb-2' id="topic" style="margin-left: 10px;margin-right: 10px; box-shadow: 5px 5px 10px #cccccc;">
                                            <div class='col-md-2  border-right'>
                                                <div class='outter'>
                                                    <img style="border: 1px solid gray;" id='profileTrending' src='assets/images/profilepicture/<?php echo $queryinfo['profileImage'];  ?>' alt=''>
                                                    <h1 id='headingTrending' class='lead mt-3'><?php  echo  $queryinfo['username']; ?></h1>
                                                </div>
                                            </div>
                                                            
                                           
                    
                                            <div class='col-md-10'>
                                          
                                                <h2><a id='linkTrending' href='singlepostss.php?post_id=<?php echo $post['id']; ?>'> <?php echo $post['title']; ?></a></h2>
                                                

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

                                    

                            
                            ?>
                            
                   
                </div>

                 

                <div class="col-md-3"> <a href=""></a>
               
                </div>
            </div>
        </div>
    </div>
   


    <?php include("includes/other/footer.php"); ?>