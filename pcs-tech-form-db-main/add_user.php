<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $db = "pcs_practice";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

    if($conn === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }

    $login =  $_REQUEST['login'];
    $firstname = $_REQUEST['firstname'];
    $lastname =  $_REQUEST['lastname'];
    $password = $_REQUEST['password'];

    $sql = "INSERT INTO users (login, firstname, lastname, pass, active) VALUES ('$login', 
            '$firstname','$lastname','$password', true)";
          
        if(mysqli_query($conn, $sql)){
            // header('Location: ./add_user_success.html');
            echo "User form data was saved in a database."; 
  
        } else{
            echo "ERROR: Something went wrong. $sql. " 
                . mysqli_error($conn);
        }

        mysqli_close($conn);
?>