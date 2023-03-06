<?php
    include("../includes/config.php");
?>
<?php include ("session.php"); ?>

<?php include ("include/header.php"); ?>

<?php include ("include/navigation.php"); ?> 
<style>
    @media print{
        #printbtn {
            display: none;
        }
    }
</style>

    <?php
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = mysqli_query($con, "SELECT * FROM students WHERE id = '$id'");
            $fetch = mysqli_fetch_array($sql);
            $sqlinfo = mysqli_query($con, "SELECT * FROM studentinfo WHERE studentID = '$id'");
            $fetchinfo = mysqli_fetch_array($sqlinfo);

        }
    
    ?>


    
 <div class="row">
     <div class="container">
         <div class="col-md-12">
         <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Student Identity</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>lastname</th>
                <th>Username</th>
                <th>Email</th>
                <!-- <th>phonenumber</th> -->
                <th>bio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $fetch['studentID']; ?></td>
                <td><?php echo $fetch['firstname']; ?></td>
                <td><?php echo $fetch['middlename']; ?></td>
                <td><?php echo $fetch['lastname']; ?></td>
                <td><?php echo $fetchinfo['username']; ?></td>
                <td><?php echo $fetchinfo['email']; ?></td>
                
                <td><?php echo $fetchinfo['bio']; ?></td>
            </tr>
        </tbody>
    </table>
    <button id="#printbtn" type="button" name="print" class="btn btn-primary"  onclick="window.print()">Print</button>
         </div>
     </div>

    
 </div>



<?php include ("include/footer.php"); ?>