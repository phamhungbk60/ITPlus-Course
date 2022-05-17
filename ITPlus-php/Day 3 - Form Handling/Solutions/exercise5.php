<?php 
    if (isset($_POST['plus'])) {
        $info = 'Plus button clicked';
    }
    if (isset($_POST['minus'])) {
        $info = 'Minus button clicked';
    }
    if (isset($_POST['multiply'])) {
        $info = 'Multiply button clicked';
    }
    if (isset($_POST['divide'])) {
        $info = 'Divide button clicked';
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
    <form action="exercise5.php" method="POST">
        <button type="submit" name="plus">Cộng</button>
        <button type="submit" name="minus">Trừ</button>
        <button type="submit" name="multiply">Nhân</button>
        <button type="submit" name="divide">Chia</button>
    </form>
    <?php if (isset($info)) { ?>
        <p><?php echo $info; ?></p>
    <?php } ?>
</body>
</html>