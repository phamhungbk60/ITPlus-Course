<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/vendors/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
    <form method="POST" action="index.php?controller=user&action=store">
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <button type="button" class="btn btn-primary" onclick="history.go(-1)">Back</button>
    </form>
</body>
</html>