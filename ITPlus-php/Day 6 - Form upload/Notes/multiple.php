<?php

$fileNames = [];
$uploadDirectory = "public";
$allowableExtensions = ['jpeg', 'jpg', 'gif', 'heic'];


if (isset($_POST['upload'])) {
    $file = $_FILES['upload_file'];

    //upload-11112021151413.jpg time() => 16312371231upload
    //upload-12122012050423.jpg
    foreach ($file['error'] as $key => $value) {
        //Nếu ko có lỗi xảy ra
        if ($value == UPLOAD_ERR_OK) {
            $tmpName = $file['tmp_name'][$key];
            $actualName = $file['name'][$key];
            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory);
            }

            $isUploaded = move_uploaded_file($tmpName, $uploadDirectory . DIRECTORY_SEPARATOR . $actualName);
            if ($isUploaded) {
                $fileNames[] = $actualName;
            }
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
        <input type="file" name="upload_file[]" multiple />
        <button name="upload" name="upload">Upload</button>
    </form>

    <!-- public/ -->
    <?php foreach ($fileNames as $fileName) { ?>
        <img src="<?php echo $uploadDirectory . DIRECTORY_SEPARATOR . $fileName; ?>" />
    <?php } ?>
</body>




</html>