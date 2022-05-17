<?php 
    session_start();
    require('../config/connection.php');

    if (isset($_POST['login'])) {
        $errors = [];
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (strlen(trim($email)) === 0) {
            $errors['email'] = "Email must not be null";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email không đúng định dạng";
            }
        }

        if (strlen(trim($password)) === 0) {
            $errors['password'] = "Password must not be null";
        }

        $sql = sprintf("SELECT email,password FROM users WHERE email='%s' AND password='%s'",$email, md5($password));
        if ($result = $conn->query($sql)) {
            if (mysqli_num_rows($result) <= 0) {
                $_SESSION['login_failure'] = "Login failed";
            } else {
                $_SESSION['email'] = $email;
                header('location:../dashboard/index.php');
            } 
        }
    }
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Bootstrap Simple Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .login-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <h2>Login</h2>
            
            <?php if (isset($_SESSION['login_failure'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['login_failure']; 
                        unset($_SESSION['login_failure']); 
                    ?>
                </div>
            <?php endif ?>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required" value="<?php echo isset($email) ? $email : '' ?>">
                <?php if (isset($errors) && $errors['email'] != ""):?>
                    <div class="invalid-feedback">
                        <?php echo $errors['email'] ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                <?php if (isset($errors) && $errors['password'] != ""):?>
                    <div class="invalid-feedback">
                        <?php echo $errors['password'] ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" name="login">Login</button>
            </div>
        </form>
        <div class="text-center">Don't have an account? <a href="register.php">Register</a></div>
    </div>

</body>

</html>