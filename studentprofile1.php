<?php include("includes/config.php"); ?>
<?php
 include("session.php");
?>
<?php include("includes/header.php"); ?>

<?php include("includes/navbar.php"); ?>
    

<style>
    #profileDisplay{
        border-radius: 50%;
        cursor: pointer;
    }

    #profileTrending{
        height: 200px;
    }

   
</style>
    

<!-- <a href="search.php">Back</a> -->
<div id="trending" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-light">

                    <?php 

                    if(isset($_GET['profileid'])){
                        $id = $_GET['profileid'];
                        $sql = $con->query("SELECT * FROM students WHERE id = '$id'");
                        $sqlfetch = mysqli_fetch_array($sql);

                        $sqlinfo = $con->query("SELECT * FROM studentinfo WHERE studentID = '$id'");
                        $sqlfetchinfo = mysqli_fetch_array($sqlinfo);


                    }
                    
                    
                    ?>
                    <h1  class="lead align-items-center mt-5 mb-3"><?php echo $sqlfetchinfo['username']; ?> Profile </h1>
                    <div class="row mb-3">
                        <div class="col-md-5 border-right mb-3 border-bottom">
                            <div class="outter">
                        
                                  <h2 class="lead mb-3 text-center">
                                        <strong style="font-size: 12px;"> <b> Image </b></strong>
                                </h2>

                        

                                <form action="" method="post" enctype="multipart/form-data">
                                    <img src='assets/images/profilepicture/<?php echo $sqlfetchinfo['profileImage'];  ?>' onclick='triggerClick()''  alt='' class='' id='profileTrending'>
                                
                                   
                                </form>

                              
                            </div>
                        </div>


          

                        <div class="col-md-7 border-right border-bottom" id="profileThings">
                            <h2 class="lead mb-3">
                            <strong style="font-size: 12px;"> <b> Username </b></strong>  : <?php echo $sqlfetchinfo['username']; ?>
                            </h2>

                            <h2 class="lead mb-3">
                            <strong style="font-size: 12px;"> <b> Email </b></strong>  : <?php echo $sqlfetchinfo['email']; ?>
                            </h2>

                            <h2 class="lead mb-3">
                            <strong style="font-size: 12px;"> <b> Name </b></strong> : <?php echo $sqlfetch['firstname'] . " " . $sqlfetch['middlename'] . " " . $sqlfetch['lastname'] ; ?>
                            </h2>

                    

                            <h2 class="lead mb-3">
                               <strong style="font-size: 12px;"> <b> University </b></strong> :  <?php echo $sqlfetchinfo['university']; ?>
                            </h2>


                     
                            <h2 class="lead mb-3">
                                <strong style="font-size: 12px;"> <b> bio </b></strong> :  <?php echo $sqlfetchinfo['bio']; ?>
                            </h2>

                            
                            
</div>
                    </div>
                </div>

              
            </div>
        </div>
    </div>

    
<script>
            function triggerClick(){
                document.querySelector('#profileImage').click();
            }


            function displayImage(e) {
                if (e.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        document.querySelector('#profileTrending').setAttribute('src', e.target.result);
                    }

                    reader.readAsDataURL(e.files[0]);
                }
            }
</script>



<?php include("includes/footer.php"); ?>
    

<!-- 
    Developed by: @kevoocodes
 -->