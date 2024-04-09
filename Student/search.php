<?php include("includes/config.php"); ?>

<?php
 include("session.php");
?>

<?php include("includes/header.php")   ?>
<?php include("includes/sidebar.php")   ?>
<?php include 'postdate.php'; ?>
     

            <!-- right-panel starts here -->
            <div class="right-panel py-2 px-2 d-flex flex-col justify-center">
<div class="container">
<div class="header-post text-center">
                <h3>Search Page</h3>
              </div>

              <?php 

if(isset($_POST['submit'])){
    $search = mysqli_real_escape_string($con,$_POST['search']);
    $sql = mysqli_query($con,"SELECT * FROM studentinfo WHERE username LIKE '%$search%' LIMIT 10");

    if(mysqli_num_rows($sql) == 0) {
        echo "<p class='lead text-left' style='font-size: 12px;'>No Username Found Matching " . $search . "</p>";
    }
  

        while($row = mysqli_fetch_array($sql)) {
            $id = $row['studentID'];
            $sqlinfo = $con->query("SELECT * FROM studentinfo WHERE studentID = '$id'");
            $fetchinfo = mysqli_fetch_array($sqlinfo);

            ?>

                                                         <div class='row mb-3 pt-2 pb-2' id="topic" style="margin-left: 10px;margin-right: 10px; box-shadow: 5px 5px 10px #cccccc;">
                                                                        <div class='col-md-2 border-right'>
                                                                            <div class='outter'>
                                                                                <img style="width: 100%; border-radius: 50%" id='profileTrending' src='../assets/images/profilepicture/<?php echo $fetchinfo['profileImage'];  ?>' alt=''>
                                                                                <h1 id='headingTrending' class='lead mt-3'></h1>
                                                                            </div>
                                                                        </div>
                                                                                        
                                                                    
                                                
                                                                        <div class='col-md-10'>
                                                                    
                                                                            <h2><a id='linkTrending' href='search_profile.php?profileid=<?php echo $id; ?>'> <?php echo $row['username'];  ?></a></h2>
                                                                            <p class="text-secondary" style="font-size: 12px"><?php echo $fetchinfo['bio'] ?></p>
                                                                        

                                            
                                                                            <!-- <p class='lead  text-secondary' id='pTrending' style="font-size: 10px;"> <img  style="width: 12px;height:12px;" src="assets/images/icons/round.png" alt=""></p>  -->
                                                                        
                                                                        </div>
                                </div>
                 
                
                   



            
<?php 
        
    }

    ?>
            <p class="lead text-center mt-5" style="font-size: 14px;">Posts</p>
    <?php

    $postquery = mysqli_query($con,"SELECT * FROM posts WHERE title LIKE '%$search%' LIMIT 10");

    if(mysqli_num_rows($postquery) == 0) {
        echo "<p class='lead text-left' style='font-size: 12px;'>No Post Found Matching " . $search . "</p>";
    }

    while ($row = mysqli_fetch_array($postquery)) {
        $studentid = $row['studentID'];
        $studentquery = mysqli_query($con,"SELECT * FROM students WHERE studentID = '$studentid'");
        $fechstudent = mysqli_fetch_array($studentquery);
        $infoquery = mysqli_query($con, "SELECT * FROM studentinfo WHERE studentID = '$studentid'");
        $fetchinfo =mysqli_fetch_array($infoquery);

        ?>
                   
                    <div class='row mb-3 pt-2 pb-2' id="topic" style="margin-left: 10px;margin-right: 10px; box-shadow: 5px 5px 10px #cccccc;">
                        <div class='col-md-2 border-right'>
                            <div class='outter'>
                                <img style="border-radius: 50%; width: 100%" id='profileTrending' src='../assets/images/profilepicture/<?php echo $fetchinfo['profileImage'];  ?>' alt=''>
                                <h1 id='headingTrending' class='lead mt-3'><?php  echo  $fetchinfo['username']; ?></h1>
                            </div>
                        </div>
                                        
                       

                        <div class='col-md-10'>
                      
                            <h2><a id='linkTrending' href='post.php?post_id=<?php echo $row['id']; ?>'> <?php echo $row['title']; ?></a></h2>
                            <p class="overflo"></p>

                            <?php 
                                
                         // To display number of comments
                            $sqlcomment  = mysqli_query($con,"SELECT * FROM comments WHERE postid = '". $row['id'] ."'");
                            $sqlcommentrows = mysqli_num_rows($sqlcomment);
                            // echo $sqlcommentrows;
                            
                            ?>
                            <p class='lead  text-secondary' id='pTrending' style="font-size: 10px;"> <img  style="width: 12px;height:12px;" src="assets/images/icons/round.png" alt=""> <?php  echo $sqlcommentrows; ?> Comments</p> 
                          
                        </div>
                    </div>


    <?php
    }

}


?>
</div>
                      
            </div>
 
<?php include("includes/sidebar.php") ?>