<?php
// include ('../config.php');
//Declaring variables to prevent errors
$student_identity = "";
$email = "";  //email
$username = ""; //usernmae
$password = ""; //password 
$password2 = ""; //password 2
$error_array = array(); //Holds error messages

if(isset($_POST['register'])) {

    //Registration form valuees
    //student identity
    $student_identity = $_POST['studentID'];
    $_SESSION['studentID'] = $student_identity; //store session into session variables

    //email
    $email = strip_tags($_POST['email']);
    $email = str_replace(' ', '', $email); //remove spaces
    $_SESSION['email'] = $email; //store session into session variables
    
    //username 
    $username = strip_tags($_POST['username']);
    $username = str_replace(' ','', $username);
    $_SESSION['usernamee'] = $username; //store session into session variables

    $date = date("Y-m-d H:i:s"); //Current date

    //Password
    $password = strip_tags($_POST['password']); //remove html tags
    $password2 = strip_tags($_POST['password2']); //remove html tags

    //Student identity validation
    $sqlstudent_identity = mysqli_query($con, "SELECT * FROM students WHERE studentID = '$student_identity'");
    $id_num_rows = mysqli_num_rows($sqlstudent_identity);
    $fetchidentity = mysqli_fetch_array($sqlstudent_identity);
    $studentid = $fetchidentity['id'];
    $studentidentity = $fetchidentity['studentID'];

    if($id_num_rows == 0) {
        array_push($error_array, "Your Identity is unknown");
    }


    $studentid = $fetchidentity['id'];
    $sqlstudentinfo = mysqli_query($con, "SELECT studentID FROM studentinfo WHERE studentID = '$studentid'");
    $sql_num_rows = mysqli_num_rows($sqlstudentinfo);

    if($sql_num_rows > 0) {
        array_push($error_array, "Your IDENTITY already used by somenone");
    }


    //Check if email is valid format
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        //check if email already exists
        $sqlemail =  mysqli_query($con, "SELECT email FROM studentinfo WHERE email = '$email'");
        //count number of rows returned
        $num_rows = mysqli_num_rows($sqlemail);

        if($num_rows > 0) {
            array_push($error_array, "Email already in Use");
        }
    }else {
        array_push($error_array, "Invalid email format");
    }

    //username validation
    if(strlen($username) > 30 || strlen($username) < 4) {
        array_push($error_array, "Your username must be betwen 5 and 30 characters");
    }else {
        
        $sqlusername = mysqli_query($con, "SELECT username FROM studentinfo WHERE username = '$username'");
        $num_rows_username = mysqli_num_rows($sqlusername);
    
        //username count return
        if($num_rows_username > 0) {
            array_push($error_array,"Username is already in Use");
        }

    }

   


    //Password validation
    if($password != $password2) {
        array_push($error_array, "Your Password do not match");
    }else {
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($error_array, "Your Password can only contain english caharacters or numbers");
        }
    }

    if(strlen($password) > 30 || strlen($password) < 5) {
        array_push($error_array, "Your Password must be 5 to 30 characters");
    }


    //if error is empty
    if(empty($error_array)) {
        $univerity = 'UDSM';
        $profilePic = 'assets/images/profilepicture/head.png';

        $studentid = $fetchidentity['id'];
        $sqlquery = mysqli_query($con,"INSERT INTO studentinfo(id,studentID,email,username,password,university,profileImage,date_added) VALUES ('','$studentid','$email','$username',md5('$password'),'$univerity','$profilePic', '$date')");
        if($sqlquery) {
            $_SESSION['username'] = $username;
            header('location: dashboard.php');
        }


        //clear session variables
        $_SESSION['studentID'] = "";
        $_SESSION['email'] = "";
        $_SESSION['usernamee'] = "";
    }



    






}


?>