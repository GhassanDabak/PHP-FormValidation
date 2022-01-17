<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="register.css">
</head>

<body>

    <?php

    if (isset($_POST['register'])) {
        $server = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "store";
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $regex = "/^[^ ]+@[^ ]+\.[a-z]{2,3}$/";
        $flag = false;
        if (preg_match($regex, $email) && strlen($password) >= 8 && $repassword === $password) {
            $conn = mysqli_connect($server,$dbUsername,$dbPassword,$dbName);
            if(!$conn){
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM `users` WHERE `email`='".$email."'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)){
                exit("This email already exists");
            }

            $sqlInsert = "INSERT INTO `users` (`email`,`username`,`password`) VALUES ('$email','$username','$password')";

            $resultInsert = mysqli_query($conn,$sqlInsert);

            if($result){
                echo "<h1> record added successfully </h1>";
                header('Location: login.php');
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    }
    ?>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <h2>Register</h2>
            </div>

            <!-- Login Form -->
            <form method="post" id="form">
                <input type="text" id="register" class="fadeIn second" name="email" placeholder="email">
                <br>
                <small id="emailMessage">Message</small>
                <br>
                <input type="text" id="username" class="fadeIn third" name="username" placeholder="username">
                <br>
                <small id="usernameMessage">Message</small>
                <br>
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
                <br>
                <small id="passwordMessage">Message</small>
                <br>
                <input type="text" id="re-password" class="fadeIn third" name="repassword" placeholder="re-password"><br>
                <small id="repasswordMessage">Message</small>
                <br>
                <input type="submit" id="sub-btn" name="register" class="fadeIn fourth" value="Register">
            </form>

        </div>
    </div>
    <script src="register.js"></script>
</body>

</html>