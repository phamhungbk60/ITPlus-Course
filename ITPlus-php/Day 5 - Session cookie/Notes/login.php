<?php

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberMe = $_POST['remember_me'];
    $error = "";

    //Nếu username là admin và password = admin là đúng, ngược lại là sai
    if ($username == 'admin' && $password == 'admin') {
        if (isset($rememberMe)) {
            setcookie('username', $username, time() + 3600, '/');
        } else {
            $_SESSION['username'] = $username;
        }
        //điều hướng sang một trang homepage.php
        header('location:homepage.php');
    } else {
        $error = "Nhập sai rồi";
    }
}

if (isset($_SESSION['username'])) :
    header('location:homepage.php');
endif;

if (isset($_COOKIE['username'])) :
    header('location:homepage.php');
endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Login form</h2>
    <?php
    if (isset($error)) :
        echo $error;
    endif;
    ?>

    <?php
    if (isset($_SESSION['logout_success'])) :
        echo $_SESSION['logout_success'];
        unset($_SESSION['logout_success']);
    endif;
    ?>

    <form method="POST" action="">
        <input type="text" name="username" />
        <input type="password" name="password" />
        <input type="checkbox" name="remember_me" /> Ghi nhớ tôi
        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>