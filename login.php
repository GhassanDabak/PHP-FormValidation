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
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php
    $errMsg = "";
    if (isset($_POST['submit'])) {
        $loggedUser = $_POST['username'];
        $loggedPassword = $_POST['password'];
        $server = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "store";
        

        $conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `users` WHERE (`email`='".$loggedUser."' AND `password` ='".$loggedPassword."')";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)) {
            $sessionSQL = "SELECT `username` FROM `users` WHERE (`email`='".$loggedUser."' AND `password` ='".$loggedPassword."')";
            $sessionResult = mysqli_query($conn,$sessionSQL);
            $retrievedResult = mysqli_fetch_assoc($sessionResult);
            $_SESSION['loggedUser'] = $retrievedResult['username'];
            print_r($sessionResult);
            header('Location: index.php');
        } else {
            $errMsg = "Wrong Credentials";
        }

        mysqli_close($conn);
    }
    ?>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <h2>Login</h2>
            </div>

            <!-- Login Form -->
            <form method="post">
                <input type="text" id="login" class="fadeIn second" name="username" placeholder="email">
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
                <span><?php echo $errMsg ?></span>
                <input type="submit" class="fadeIn fourth" value="Log In" name="submit">
                <!-- <input type="button" class="fadeIn fourth" value="Register" name="click" onclick=""> -->
            </form>

            <!-- Remind Passowrd -->

        </div>
    </div>
</body>

</html>