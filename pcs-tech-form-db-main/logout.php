<?php
    session_start();
    unset($_SESSION["username"]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php include 'menu.php'?>
        <div class="page-content">
            <h2>User logout</h2>
            <p>Your session was ended</p>
        </div>
    </body>
</html>