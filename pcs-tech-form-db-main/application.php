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
            <h2>New application</h2>
            <form action="application.php" method="post" name="application" id="application" onsubmit="return applicationSubmit()">
                <div class="form-group">
                    <div id="fname_div">
                        <label for="user_firstname">Firstname</label>
                        <input type="text" id="user_firstname" name="firstname">
                    </div>
                    <div id="lname_div">
                        <label for="user_lastname">Lastname</label>
                        <input type="text" id="user_lastname" name="lastname">
                    </div>
                    <div id="phone_div">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                    <div>
                        <label for="country">Country</label>
                        <select class="select" id="country" name="country">
                            <?php
                                include 'db_connection.php';
                                $conn = OpenCon();
                                $sql = "SELECT id, name FROM dct_country";
                                foreach ($conn->query($sql) as $row) {
                                    echo  "<option value='$row[id]'>$row[name]</option>";
                                }
                                CloseCon($conn);
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="car">Car</label>
                        <select class="select" name="car" id="car">
                            <?php
                                $conn = OpenCon();
                                $sql = "SELECT id, name FROM dct_cars";
                                foreach ($conn->query($sql) as $row) {
                                    echo  "<option value='$row[id]'>$row[name]</option>";
                                }
                                CloseCon($conn);
                            ?>
                        </select>
                    </div>
                    <div style="margin-top:15px;margin-bottom:20px">
                        <input type="radio" name="color" value="red">
                        <label>Red</label>
                        <input type="radio" name="color" value="green">
                        <label>Green</label>
                        <input type="radio" name="color" value="black">
                        <label>Black</label>
                        <input type="radio" name="color" value="blue">
                        <label>Blue</label>
                    </div>
                    <div>
                        <label for="downpayment">Downpayment</label>
                        <input type="number" id="downpayment" name="downpayment">
                    </div>
                    <div>
                        <input type="checkbox" id="insurance" name="insurance">
                        <label for="insurance">Include insurance</label>
                    </div>
                    <div style="margin-top:15px">
                        <label for="delivery_date">Delivery date</label>
                        <input class="datefield" type="date" id="delivery_date" name="delivery_date">
                    </div>
                    <input style="margin-top:20px" type="submit" value="Save" name="save" id="save">
                </div>
            </form>
        </div>
        <script src="validator.js"></script>
    </body>
</html>

<?php
    if (isset($_POST['save'])) {

        $conn = OpenCon();

        $firstname =  $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $phone = $_REQUEST['phone'];
        $country = $_REQUEST['country'];
        $car = $_REQUEST['car'];
        $color = $_REQUEST['color'];
        $downpayment = $_REQUEST['downpayment'];

        $insurance = 0;
        if ($_REQUEST['insurance'] == 'on') {
            $insurance = 1;
        }

        $delivery_date = $_REQUEST['delivery_date'];


        $sql = "INSERT INTO applications (firstname, lastname, phone_number, country_id, car_id, color, downpayment, insurance, delivery_date) 
                VALUES ('$firstname', '$lastname','$phone','$country', '$car', '$color', '$downpayment', '$insurance', '$delivery_date')";
          
        if(mysqli_query($conn, $sql)){
            echo "<p style='color:red;margin-left:25px'>Application saved</p>"; 
  
        } else {
            echo "<p style='color:red;margin-left:25px'>ERROR: $sql. </p>" 
                 . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>