<?php

session_start();

$username = "";
//nguoi dung danh thang vao dashboard
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
}

//neu khong dang nhập mà vào thẳng trang dashboard thì => điều hướng về index.php
if ($username == "") {
    header('location:index.php');
} else {
    echo "Welcome: " . $username;
}


//Khi dang xuat => index.php
if (isset($_POST['logout'])) {
    //huy session di
    unset($_SESSION['username']);
    //huy cookie
    setcookie("username", "", time() - 100);
    //minh cap session o trang nay
    $_SESSION['logout_success'] = "Dang xuat thanh cong";
    //dieu huong sang trang index.php
    header('location:index.php');
}

?>

<form method="POST">
    <button type="submit" name="logout">Logout</button>
</form>