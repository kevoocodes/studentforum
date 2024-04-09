<?php 
session_start();
$server = 'localhost';
$user = 'root';
$password =  '';
$database = 'forum';

//connection to the database
$con = new mysqli($server,$user,$password,$database);

//Test conection
if(!$con) {
    echo "Not connected";
}

?>