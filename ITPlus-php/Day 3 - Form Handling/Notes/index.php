<?php 
 
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $message = [];
        $errors = [];

        if ($email == "") {
            $errors['email'] = "email không được để trống";
        } else {
            $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isValidEmail) {
                $errors['email'] = "Email không hợp lệ";
            }
        }

        if ($password == "") {
            $errors['password'] = "Password không được để trống";
        }

        if (count($errors) == 0) {
            if ($email == 'admin@example.com' && $password == 'admin') {
                $message['success'] = 'Đăng nhập thành công';
            } else {
                $message['error'] = 'Đăng nhập thất bại';
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<!-- Yêu cầu 2 trường: username / password -->
    <?php if (isset($message) && isset($message['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $message['success']; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($message) && isset($message['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $message['error']; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" class="needs-validation">
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="text" class="form-control <?php echo isset($errors) && isset($errors['email']) ? "is-invalid" : "" ?>" name="email" 
            value="<?php echo isset($email) ? $email : "" ?>"/>
            <?php if (isset($errors) && isset($errors['email'])): ?>
                <div id="emailHelp" class="invalid-feedback">
                    <?php echo $errors['email']; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-row">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control <?php echo isset($errors) && isset($errors['password']) ? "is-invalid" : "" ?>" name="password"/>
            <?php if (isset($errors) && isset($errors['password'])): ?>
                <div class="invalid-feedback">
                    <?php echo $errors['password']; ?>
                </div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
    </form>
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>