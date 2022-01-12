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
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $regex = "/^[^ ]+@[^ ]+\.[a-z]{2,3}$/";
        $flag = false;
        if (preg_match($regex, $email) && strlen($password) >= 8 && $repassword === $password) {
            if (isset($_SESSION['users'])) {
                foreach ($_SESSION['users'] as $value) {
                    if ($value['email'] === $email) {
                        echo "<script>alert('email already exists')</script>";
                        $flag = true;
                    }
                }
                if ($flag === false) {
                    $user = array('email' => $email, 'password' => $password, 'username' => $username);
                    $_SESSION['users'][] = $user;
                    // $pushedArray = [];
                    // array_push($pushedArray, $user, ...$_SESSION['users']);
                    // $_SESSION['users'] = $pushedArray;
                    header('Location:login.php');
                }
            } else {
                $user = array('email' => $email, 'password' => $password, 'username' => $username);
                $_SESSION['users'][] = $user;
                // array_push($_SESSION['users'], $user);
                header('Location:login.php');   
            }   
        }
        echo "<pre>";
        print_r($_SESSION['users']);
        echo "</pre>";
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