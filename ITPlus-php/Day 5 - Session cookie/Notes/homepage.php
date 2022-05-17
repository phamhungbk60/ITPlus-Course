<?php
session_start();

$isLogin = false;
if (isset($_SESSION['username'])) :
    echo "Welcome: session " . $_SESSION['username'];
    $isLogin = true;

endif;

if (isset($_COOKIE['username'])) :
    echo "Welcome: cookie" . $_COOKIE['username'];
    $isLogin = true;
endif;

if (isset($_POST['logout'])) :
    unset($_SESSION['username']);
    setcookie('username', $_COOKIE['username'], time() - 1, '/');
    $_SESSION['logout_success'] = "Đăng xuất thành công";
    header('location: login.php');
endif;

if (!$isLogin) :
    header('location: login.php');
endif;

?>

<form action="" method="POST">
    <button type="submit" name="logout">Đăng xuất</button>
</form>