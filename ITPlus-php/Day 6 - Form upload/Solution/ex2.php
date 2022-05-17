<?php 

if (isset($_POST['register'])) {
    $errors = [];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];
    $avatar = $_FILES['avatar'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate username
    if ($username === "") {
        $errors[] = "Username không được để trống";
    }

    //validate email
    if ($email === "") {
        $errors[] = "Email không được để trống";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email nhập không đúng định dạng";
        }
    }

    //validate password
    if ($password === "" || $passwordConfirmation === "") {
        if ($password === "") {
            $errors[] = "Password không được để trống";
        }

        if ($passwordConfirmation === "") {
            $errors[] = "Password confirmation không được để trống";
        }
    } else {
        if ($password !== $passwordConfirmation) {
            $errors[] = "Password và confirm password phải trùng nhau";
        }
    }

    //validate avatar, 4 means: No files uploaded
    if ($avatar['error'] === UPLOAD_ERR_NO_FILE) {
        $errors[] = "Avatar không được để trống";
    } else {
        $pathToUpload = "uploads";
        $fileName = $avatar['name'];
        // Kiểm tra xem directory đã có server hay chưa, nếu chưa có thì tạo mới
        if (!file_exists($pathToUpload."/$fileName")) {
            mkdir($pathToUpload);
        }
        $fileType = $avatar['type'];
        $fileError = $avatar['error'];
        $fileTempName = $avatar['tmp_name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        // Làm tròn kích cỡ xuống chỉ còn 2 chữ số thập phân
        $fileSizeInMb = round($avatar['size'] / (1024 * 1024), 2);
        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors[] = "Ảnh không đúng định dạng";
        }
        else {
            if ($fileError === UPLOAD_ERR_OK) {
                // copy file từ ngoài và lưu vào thư mục uploads trên server
                // __DIR__ sẽ lấy ra đường dẫn hiện tại là "Solution"
                move_uploaded_file($fileTempName, __DIR__."/{$pathToUpload}/{$fileName}");
            }
        }
    } 
}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1>Create an account</h1>
            <?php if (isset($errors) && count($errors) > 0) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> 
                    <?php foreach($errors as $error): ?>
                        <p><?php echo $error ?></p>
                    <?php endforeach ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

            <!-- No error found -->
            <?php if (isset($errors) && count($errors) == 0) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> 
                    <!-- Content success -->
                    <p>Username: <?php echo $username;?></p>
                    <p>Avatar: <img src="<?php echo "uploads/{$fileName}" ?>"/></p>
                    <p>File name: <?php echo $fileName ?></p>
                    <p>File format: <?php echo $fileType ?></p>
                    <p>Size: <?php echo $fileSizeInMb.'MB';?></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Confirm password" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <input type="file" name="avatar">
            </div>

            <button class="btn btn-primary form-control" name="register">Register</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>