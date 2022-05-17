<?php

require('../config/database.php');

if (isset($_POST['submit'])) :
    $studentId = $_POST['student_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    //validate
    //...
    //đẩy vào CSDL
    $sql = sprintf(
        "INSERT INTO students(student_id, first_name, last_name, email, dob) 
    VALUES ('%s', '%s', '%s', '%s', '%s')",
        $studentId,
        $firstName,
        $lastName,
        $email,
        $dob
    );

    $result = $conn->query($sql);
    //nếu tạo thành công => về trang danh sách
    if ($result) {
        header('location:index.php');
    }
endif;

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
    <h2>Create new student</h2>
    <form action="#" method="POST">
        <div>
            <label>StudentId</label>
            <input type="text" name="student_id" />
        </div>

        <div>
            <label>First name</label>
            <input type="text" name="first_name" />
        </div>

        <div>
            <label>Last name</label>
            <input type="text" name="last_name" />
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" />
        </div>

        <div>
            <label>Dob</label>
            <input type="date" name="dob" />
        </div>

        <button type="submit" name="submit">Create</button>
    </form>
</body>

</html>