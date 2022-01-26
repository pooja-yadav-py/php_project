<?php
    //connecting to database
    $servername = "localhost";
    $username = "admin";
    $password = "Bigstep@123";
    $database = "idiscuss";

    //create a connection
    $conn = mysqli_connect($servername, $username, $password , $database);
 
    //die if connection was not successfull
    if(!$conn){
        die("Sorry we failed to connect:".mysqli_connect_error());
    }
?>