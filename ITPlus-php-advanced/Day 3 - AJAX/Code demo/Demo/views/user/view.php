<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/vendors/bootstrap/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <h1>User</h1>
        <p>Id: <?php echo $user['id'] ?></p>
        <p>First name: <?php echo $user['first_name']; ?></p>
        <p>Last name: <?php echo $user['last_name']; ?></p>
    </div>
</body>
</html>

