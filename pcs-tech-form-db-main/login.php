<?php
    session_start();
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
            <h2>User login</h2>
            <form action="login.php" method="post" name="login_form">
                <div class="form-group">
                    <div>
                        <label for="user_login">Login</label>
                        <input type="text" id="user_login" name="login">
                    </div>
                    <div>
                        <label for="user_password">Password</label>
                        <input type="password" id="user_password" name="password">
                    </div>
                    <input style="margin-top:20px" type="submit" value="Login" name="login_btn">
                </div>
            </form>
        </div>
    </body>
</html>

<?php
    if (isset($_POST['login_btn']) && !empty([$_POST['login']]) && !empty($_POST['password'])) {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "root";
        $db = "pcs_practice";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

        $login =  $_REQUEST['login'];
        $password = $_REQUEST['password'];

        $sql = "SELECT id, login, firstname, lastname, pass FROM users WHERE login='$login' AND binary pass='$password'";

        $result = mysqli_query($conn, $sql);
        $num_results = mysqli_num_rows($result);
        if ($num_results > 0) {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $login;
            echo "<p style='color:red;margin-left:25px'>Logged in as: " .$login ."</p>";
        } else {
            echo "<p style='color:red;margin-left:25px'>Wrong credentials</p>";
        }
        mysqli_close($conn);
    }
?>