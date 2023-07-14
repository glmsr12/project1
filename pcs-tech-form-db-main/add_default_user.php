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

    $sql = "INSERT INTO users (login, firstname, lastname, pass, active) 
            VALUES ('default','Firstname','Lastname','123456', true)";
          
        if(mysqli_query($conn, $sql)){
            echo "Data was saved in a database."; 
  
        } else {
            echo "ERROR: Something went wrong. $sql. " 
                . mysqli_error($conn);
        }

        mysqli_close($conn);
?>