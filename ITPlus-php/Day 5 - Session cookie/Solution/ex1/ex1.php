<?php 
    session_start();

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $error = "";

        if ($username === "camnh" && $password === "123456") {
            $_SESSION['username'] = $username;
            header('location: login-success.php');
        }
        $error = "Login failed";
    }

    //Kiểm tra nếu login success thì ghi ra thông báo Login success -->
    if (isset($_SESSION['logout-success'])) {
        $message = $_SESSION['logout-success'];
        unset($_SESSION['logout-success']);
    }

    //Nếu đã login mà vào trang login sẽ được điều hướng trục tiếp sang trang login-success
    if (isset($_SESSION['username'])) {
        header('location: login-success.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif ?>
    
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <div>
            <label>Username</label>
            <input type="text" name="username"/>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password"/>
        </div> 

        <button type="submit" name="login">Login</button>
    </form>

    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif ?>    
</body>
</html>