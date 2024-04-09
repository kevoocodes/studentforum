<?php include("includes/config.php"); ?>

<?php
 include("session.php");
?>

<?php include("includes/header.php")   ?>
<?php include("includes/sidebar.php")   ?>
<?php include 'postdate.php'; ?>

<?php
// Include session
$msg = NULL; // Error message
$profile = $_SESSION['username'];


// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $oldPassword = $_POST['old'];
    $newPassword = $_POST['new'];
    $confirmPassword = $_POST['comfirm'];

    // Validate inputs and perform password change
    if ($newPassword === $confirmPassword) {
        // Query the database to retrieve the current password
        $query = "SELECT password FROM studentinfo WHERE username = '$profile'";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_array($result);
            $currentPassword = $row['password'];

            // Compare old password with the current password
            if (password_verify($oldPassword, $currentPassword)) {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password in the database
                $updateQuery = "UPDATE studentinfo SET password = '$hashedPassword' WHERE username = '$profile'";
                $updateResult = mysqli_query($con, $updateQuery);

                if ($updateResult) {
              
                    echo "<script>alert('Password updated successfully!')window.location = 'change_password.php'</script>";
                } else {
                  echo "<script>alert('Failed to update password')window.location = 'change_password.php'</script>";
                    //echo "Failed to update password: " . mysqli_error($connection);
                }
            } else {
              echo "<script>alert('Incorrect old password!')window.location = 'change_password.php'</script>";
                //echo "Incorrect old password!";
            }
        } else {
          echo "<script>alert('Failed to retrieve current password: ')window.location = 'change_password.php'</script>";
            //echo "Failed to retrieve current password: " . mysqli_error($connection);
        }
    } else {
      echo "<script>alert('New password and confirm password do not match!')window.location = 'change_password.php'</script>";
        //echo "New password and confirm password do not match!";
    }
}
?>

     

            <!-- right-panel starts here -->
            <div class="right-panel py-2 px-2 d-flex flex-col justify-center">
              <div class="header-post text-center">
                   <h3>Change Password</h3>
              </div>
            
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
 
<?php include("includes/sidebar.php") ?>