<?php

/**
 * TODO: Tạo ra 1 form đăng nhập, sau đó nếu username = 'admin', password='admin'
 * TODO: tiến hành nhảy sang trang dashboard/profile và hiển thị thông tin admin ra ngoài
 */
date_default_timezone_set("Asia/Ho_Chi_Minh"); // +7

session_start();
$username = "";

if (isset($_COOKIE['username'])) {
    header('location:dashboard.php');
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin') {
        // 1: nguoi dung co check remember_me
        // ['key'] => $value
        if (isset($_POST['remember_me'])) {
            //3600s = 1h
            //30' = 30*60
            setcookie('username', $username, time() + 30 * 60);
        }
        // 2: nguoi dung ko check remember_me
        else {
            //['key_as_string' => $value]
            $_SESSION['username'] = $username;
            //redirect
        }
        header('location:dashboard.php');
    } else {
        echo "Sai roi";
    }
}
?>

<?php
if (isset($_SESSION['logout_success'])) {
    echo $_SESSION['logout_success'];
    unset($_SESSION['logout_success']);
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" />
    <input type="password" name="password" placeholder="Password" />
    <input type="checkbox" name="remember_me" />Remember me
    <button type="submit" name="submit">Login</button>
</form>