<?php    
    if (isset($_POST['register'])) {
        $errors = [];
        $text = $_POST['text'];
        $checkboxes = isset($_POST['checkbox']) ? $_POST['checkbox'] : [];
        $textarea = $_POST['textarea'];
        $radio = isset($_POST['radio']) ? $_POST['radio'] : null;
        $select = $_POST['select'];
        $files = $_FILES['files'];
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Validate text
        if ($text === "") {
            $errors[] = "Text không được để trống";
        }

        //validate checkbox
        if (count($checkboxes) === 0) {
            $errors[] = "Checkbox không được để trống";
        }

        //validate textarea
        if ($textarea === "") {
            $errors[] = "Textarea không được để trống";
        }

        //validate radio
        if ($radio === null) {
            $errors[] = "Radio không được để trống";
        }

        //validate files, nếu không có file nào được upload thành công
        if ($files['error'][0] === UPLOAD_ERR_NO_FILE) {
            $errors[] = "Files không được để trống";
        } 
        else {
            $pathToUpload = "ex3_uploads";
            $firstFileName = $files['name'][0];
            // Kiểm tra xem directory đã có server hay chưa, nếu chưa có thì tạo mới
            if (!file_exists($pathToUpload."/$firstFileName")) {
                mkdir($pathToUpload);
            }

            //Lướt dọc qua danh sách các files được upload lên server, nếu các files
            //được upload thành công
            foreach ($files['error'] as $i => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    //get tmp name
                    $fileTmpName = $files['tmp_name'][$i];
                    //get file name
                    $fileName = $files['name'][$i];
                    //di chuyển file
                    move_uploaded_file($fileTmpName, __DIR__."/{$pathToUpload}/{$fileName}");
                } 
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
    <div class="container">
        <h1>Excercise 3</h1>
        
        <!-- If errors found -->
        <?php if (isset($errors) && count($errors) > 0) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> 
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error ?></p>
                <?php endforeach ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <!-- No error found -->
        <?php if (isset($errors) && count($errors) === 0) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> 
                <!-- Content success -->
                <p>Text: <?php echo $text;?></p>
                <p>Checkbox: <?php echo implode(',',$checkboxes)?></p>
                <p>Textarea: <?php echo $textarea; ?></p>
                <p>Radio: <?php echo $radio; ?></p>
                <p>Select: <?php echo $select; ?></p>
                <p>Images:
                    <?php foreach ($files['name'] as $i => $file): ?>
                        <img src='<?php echo "$pathToUpload/$file"?>' />
                    <?php endforeach ?>
                </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="text">Text</label>
                <input type="text" name="text" id="text" class="form-control" placeholder="Placeholder" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="text">Checkbox</label>
                <p><input type="checkbox" name="checkbox[]" value="checkbox1"/> Checkbox 1</p>
                <p><input type="checkbox" name="checkbox[]" value="checkbox2"/> Checkbox 2</p>
                <p><input type="checkbox" name="checkbox[]" value="checkbox3"/> Checkbox 3</p>
            </div>
            <div class="form-group">
                <label for="textarea">Textarea</label>
                <textarea name="textarea" id="textarea" class="form-control" placeholder="Textarea" aria-describedby="helpId"></textarea>
            </div>
            <div class="form-group">
                <label for="radio">Radio button</label>
                <div>
                    <input type="radio" name="radio" id="yep" value="yep"/>
                    <label for="yep">Yep</label> 
                    <input type="radio" name="radio" id="nope" value="nope"/>
                    <label for="nope">Nope</label> 
                    <input type="radio" name="radio" id="none" value="none"/>
                    <label for="none">None</label> 
                </div>
            </div>
            <div class="form-group">
                <label for="select">Select</label>
                <select name="select" class="form-control" id="select">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="file">Upload files (can upload multiple files)</label>
                <input type="file" name="files[]" multiple class="form-control"/>
            </div>

            <button class="btn btn-primary form-control" name="register">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>