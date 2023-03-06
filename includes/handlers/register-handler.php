<?php

// function sanitizeFormStudentID($inputText){
//     $inputText = strip_tags($inputText);
//     return $inputText;
// }
// function sanitizeFormPassword($inputText) {
//     $inputText = strip_tags($inputText);
//     return $inputText;
// }

// function sanitizeFormString($inputText) {
//     $inputText = strip_tags($inputText);
//     $inputText = str_replace(" ", "", $inputText);
//     return $inputText;
// }

// if(isset($_POST['register'])) {
//     //Register button was pressed
//     $studentID = sanitizeFormStudentID($_POST['studentID']);
//     $email = sanitizeFormString($_POST['email']);
//     $username = sanitizeFormString($_POST['username']);
//     $password = sanitizeFormPassword($_POST['password']);
//     $password2 = sanitizeFormPassword($_POST['password2']);


//     $wasSuccessful = $account->register($studentID,$email, $username, $password,$password2);

//     if($wasSuccessful == true) {
//         $_SESSION['username'] = $username;
//         header("location: dashboard.php");
//     }
// }


?>