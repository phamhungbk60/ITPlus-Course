<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="exercise4.php">
        <label>Name</label>
        <input type="text" name="name"/>

        <button type="submit" name="save">Save</button>
    </form>
</body>
<?php 
    if (isset($_POST['save'])) { 
        $name = $_POST['name']; ?>
        <!-- Mở script để viết confirmation -->
        <script>
        const areYouSure = confirm('Are you sure to reveal your name ?');
        if (areYouSure) {
            alert('<?php echo $name; ?>');
        }
        </script>
        <!-- Đóng script để viết confirmation -->
    <?php } ?>
</html>