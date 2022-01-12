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
    if (isset($_POST['submit'])) {
        $loggedUser = $_POST['username'];
        $loggedPassword = $_POST['password'];
        if(isset($_SESSION['users'])){
        foreach ($_SESSION['users'] as  $value) {
            if ($loggedUser === $value['email'] && $loggedPassword === $value['password']) {
                header('Location:index.php');
            } else {
                echo "aya";
            }
        }
    }else {
        echo "<script>alert('please register')</script>";
    }
    }
    ?>

    <!-- <?php
    function to_Registration(){
        header('Location:register.php');
    }
    ?> -->

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
                <input type="submit" class="fadeIn fourth" value="Log In" name="submit">
                <!-- <input type="button" class="fadeIn fourth" value="Register" name="click" onclick=""> -->
            </form>

            <!-- Remind Passowrd -->

        </div>
    </div>
</body>

</html>