
<?php include("includes/config.php"); ?>
<?php
 include("session.php");
?>
<?php include("includes/header.php"); ?>
<?php include("includes/navbar.php"); ?>


<?php 
//include session
$msg = NULL;   //error messsage
$profile = $_SESSION['username'];

if(isset($_POST['submit'])){ 
    $old = $_POST['old'];
    $new = $_POST['new'];
    $comfirm = $_POST['comfirm'];

    $query = mysqli_query($con, "SELECT password FROM studentinfo WHERE username ='$profile'");

    while( $row = mysqli_fetch_array($query)){
        $pass = $row['password'];

        if($pass === $old){
           if($new == $comfirm){
                $update = "UPDATE studentinfo SET password = '$comfirm' WHERE username = '$profile'";
                $update = $con->query($update);

                if($update){
                    $msg = "**Password Change Successful";
                }else{
                    $msg =  "**Change Password Not Successful";
                }
           }else{
               $msg =  "**New and comfirm Password do not match";
           }
        }else{
            $msg =  "**Old password not match";
        }
    }
}
  
?>
    

    <div id="trending" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-light">
                    <h1  class="lead align-items-center mt-5">Change Password</h1>
                        <form action="" method="post">
                            <div class="form-group">
                              <label for="">Old Password</label>
                              <input type="password" name="old" id="" class="form-control" placeholder="****" aria-describedby="helpId" required>
                              <small id="helpId" class="text-muted"></small>
                            </div>

                            <div class="form-group">
                              <label for="">New Password</label>
                              <input type="password" name="new" id="" class="form-control" placeholder="****" aria-describedby="helpId" required>
                              <small id="helpId" class="text-muted"></small>
                            </div>

                            <div class="form-group">
                              <label for="">Comfirm Password</label>
                              <input type="password" name="comfirm" id="" class="form-control" placeholder="****" aria-describedby="helpId" required>
                              <small id="helpId" class="text-danger"><?php echo $msg; ?></small> 
                            </div>
                           

                            <button type="submit" name="submit" class="btn btn-warning mb-5">Change Password</button>
                        </form>
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>

   


<?php include("includes/footer.php"); ?>


<!-- 
    Developed by: @kevoocodes
 -->