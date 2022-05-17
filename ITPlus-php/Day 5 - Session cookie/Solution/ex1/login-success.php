<?php 
    session_start();
    
    if (isset($_POST['logout'])) { 
        unset($_SESSION['username']);
        $_SESSION['logout-success'] = "Đăng xuất thành công";
        header('location: ex1.php');    
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
    <?php if (isset($_SESSION['username'])) { ?>
        <p>Username: <?php echo $_SESSION['username']; ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <button name="logout">Logout</button>
        </form>
    <?php } else { 
        echo "<p>Cần đăng nhập để thực hiện chức năng này</p>";
        header('Refresh:5; url=ex1.php', true, 303);
    }?>
</body>
</html>