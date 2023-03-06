<?php
include '../includes/config.php'; //connection to the database
if(isset($_POST["submit"]))
{


          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
            $studID = $filesop[0];
          $fname = $filesop[1];
          $Mname = $filesop[2];
          $Lname = $filesop[3];
          $date = date('m/d/Y h:i:s a', time());
          
          $sql = "insert into students(studentID,firstname,middlename,lastname,joinedDate) values ('$studID','$fname','$Mname','$Lname',$date)";
          $stmt = mysqli_prepare($con,$sql);
          mysqli_stmt_execute($stmt);

         $c = $c + 1;
           }

            if($sql){
               echo "<script>alert('Data sent')</script>";
             } 
		 else
		 {
                  echo "<script>alert('Data Not sent')</script>";
          }

}
?>