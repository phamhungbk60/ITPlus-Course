<?php
//Kiểm tra button đã được ấn hay chưa
if (isset($_POST['submit'])) {
    $files = $_FILES['avatar'];

    $pathToUpload = 'notes';
    //Nếu thư mục không tồn tại
    if (!is_dir($pathToUpload)) {
        //tạo nó ra.
        mkdir($pathToUpload);
    }

    if ($files['error'] == UPLOAD_ERR_OK) {
        $fileTmpName = $files['tmp_name'];
        $fileName = $files['name']; // abc.jpg
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION); //jpg
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
        $encryptedFileName = md5("" . time() . $fileNameWithoutExtension);
        $encryptedFileNameWithExtension = $encryptedFileName . '.' . $fileExtension;

        move_uploaded_file($fileTmpName, $pathToUpload . '/' . $encryptedFileNameWithExtension);
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
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="avatar" multiple accept="image/*" />
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>