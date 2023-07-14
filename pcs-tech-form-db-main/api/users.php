<?php
    header("Content-Type:application/json");
    include('../db_connection.php');
    $conn = OpenCon();
    $result = mysqli_query($conn, "SELECT * FROM users;");

    $users = [];
    while($row = mysqli_fetch_array($result)) {
        array_push($users, (object)[
            'id' => (int)$row['id'],
            'login' => $row['login'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'password' => $row['pass'],
        ]);
    }

    resp($users);
    mysqli_close($conn);

    function resp($users) {
        $json_response = json_encode($users);
        echo $json_response;
    }
?>