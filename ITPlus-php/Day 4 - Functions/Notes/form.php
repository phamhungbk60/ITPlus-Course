<?php

if (isset($_POST['submit'])) {
    calculateWords($searchString);
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
    <form method="POST">
        <div>
            <label>Searched string</label>
            <input type="text" name="string" />
        </div>
        <button name="submit">Submit</button>
    </form>

</body>

</html>