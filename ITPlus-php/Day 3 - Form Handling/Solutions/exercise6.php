<?php 
    if (isset($_POST['submit'])) {
        $vowels = ['a','i','e','o','u'];
        $santinizedString = strtolower($_POST['name']);
        $vowelsCount = 0;

        for($i = 0; $i < strlen($santinizedString); $i++) {
            if (in_array($santinizedString[$i], $vowels)) {
                $vowelsCount ++;
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
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''?>"/>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php if (isset($vowelsCount)) { ?>
        <p><?php echo $vowelsCount?></p>
    <?php } ?>
</body>
</html>