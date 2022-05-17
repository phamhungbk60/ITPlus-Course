<?php

                $fileName = "";
                $uploadDirectory = "public";
                $allowableExtensions = ['jpeg', 'jpg', 'gif', 'heic'];

                if (isset($_POST['upload'])) {
                    $file = $_FILES['upload_file'];
                    $fileName = $file['name'];

                    //         Array
                    // (
                    //     [name] => 6bcbe10420ae10b82b550b3d4adeb13e.jpg
                    //     [type] => image/jpeg
                    //     [tmp_name] => /Applications/MAMP/tmp/php/phpiGHmRJ
                    //     [error] => 0
                    //     [size] => 117803
                    // )

                    // Chỉ có file jpg mới được upload, png thì không

                    if ($file['error'] == UPLOAD_ERR_OK) {
                        //Cách lấy đuôi ảnh
                        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                        //Nếu thư mục public không có ==> tạo nó ra (tạo = code)
                        if (!is_dir($uploadDirectory)) {
                            //make directory ==> tạo thư mục cho bạn
                            mkdir($uploadDirectory);
                        }

        if (in_array($fileExtension,
            $allowableExtensions
        )) {
            //jpg, png, gif, jpeg, heic (docx/xlsx/pptx/psd)
            //upload ảnh lên thư mục public đó
            move_uploaded_file($file['tmp_name'], $uploadDirectory . DIRECTORY_SEPARATOR . $fileName);
            //size: 117803 bytes = 117803/1024*1024 = (MB)
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>




<body>
                <!-- Encryption type -->
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="upload_file"    />
        <button name="upload" name="upload">Upload</button>
    </form>

                <!-- public/ -->
    <img src="<?php echo $uploadDirectory    .    DIRECTORY_SEPARATOR    .    $fileName ?>" />
</body>




</html>