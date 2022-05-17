<?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username !== 'admin' || $password !== 'admin') { 
            $error = "Thông tin không hợp lệ";
        } else {
            $info = 'Welcome ' . $username;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Materials/reset.css" />
    <link rel="stylesheet" href="./exercise1.css" />
</head>
<body>
    <form action="exercise1.php" method="POST" id="exercise1">
        <div class="login">
            <!-- Login header -->
            <div class="login-header">
                Sign in
            </div>

            <!-- Login content -->
            <div class="login-content">
                <div class="form-group">
                    <input type="text" placeholder="Username" name="username" id="username"/>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Password" name="password" id="password"/>
                </div>

                <div class="form-group">
                    <button type="submit" name="login">Login</button>
                </div>
            </div>

            <!-- Login footer -->
            <div class="login-footer">
                <?php if (isset($error)): ?>      
                    <p><?= $error ?></p>                        
                <?php endif ?>

                <?php if (isset($info)): ?>      
                    <p><?= $info ?></p>                        
                <?php endif ?>
            </div>  
        </div>
    </form>
</body>
</html>