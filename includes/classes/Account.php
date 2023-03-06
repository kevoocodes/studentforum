<?php

class Account {
    private $con;
    private $errorArray;

    public function __construct($con)
    {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function login($us, $pw) {
      
        $query = mysqli_query($this->con, "SELECT * FROM studentinfo WHERE username ='$us' AND password='$pw'");

        if(mysqli_num_rows($query) == 1) {
            return true;
        }
        else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }

    }


    public function register($studentID,$em,$us,$pw,$pw2) {
        $this->validateEmail($em);
        $this->validateUsername($us);
        $this->validatePassword($pw,$pw2);
        $this->validateStudentId($studentID);

        if(empty($this->errorArray) == true) {
            return $this->insertUserDetails($studentID,$em,$us,$pw);
        }else{
            return false;
        }
    }

    private function insertUserDetails($studentID,$em,$us,$pw) {
        $profilePic = 'assets/images/profilePicture/head.png';
        $date = date("Y-m-d");
        $university = "UDSM";

        $result = mysqli_query($this->con, "INSERT INTO studentinfo(id,studentID,username,email,university,password,profileImage,date_added) VALUES ('','$studentID', '$us','$em','$university','$pw','$profilePic', '$date')");
        return $result;
    }



    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }


    private function validateEmail($em) {
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM studentinfo WHERE email = '$em'");
        if(mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }
    }
    
    private function validateStudentId($studentID) {
            $checkStudentID = mysqli_query($this->con, "SELECT studentID FROM students WHERE studentID = '$studentID'");
            if(mysqli_num_rows($checkStudentID) == 0) {
                array_push($this->errorArray, Constants::$studentID);
            }

            $checkStudentQuery = mysqli_query($this->con, "SELECT * FROM studentinfo WHERE studentID = '$studentID'");
            if(mysqli_num_rows($checkStudentQuery) != 0) {
                array_push($this->errorArray, Constants::$studentIDTaken);
            }

           
    }


    private function validateUsername($us) {
        if(strlen($us) > 20 || strlen($us) < 4) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM studentinfo WHERE username = '$us'");
        if(mysqli_num_rows($checkUsernameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
    }


    private  function validatePassword($pw,$pw2) {
        if($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordDoNotMatch);
            return;
        }

        if(preg_match('/[^A-Za-z0-9]/', $pw)) {
            array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
            return;
        }

        if(strlen($pw) > 30 || strlen($pw) < 4)  {
            array_push($this->errorArray, Constants::$passwordCharacter);
        }
    }

    // public function update($em,$us,$profilePic,$id){
    //     $updateStudent = mysqli_query($this->con, "UPDATE students set email = '$em', username = '$us', profileImage = '$profilePic' WHERE id = '$id'");
    //     return $updateStudent;
    // }


    // public function fetchonerecord($id) {
    //     $oneresult = mysqli_query($this->con, "SELECT * FROM students WHERE id = '$id'");
    //     return $oneresult;
    // }
}

?>