<?php
require('../config/database.php');

if (isset($_GET['id'])) :
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    //Nếu trả về 1 kq thì dùng fetch_assoc
    $student = $result->fetch_assoc();
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
    <h2>Update student <?php echo $_GET['id'] ?? '' ?></h2>
    <form action="update.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <div>
            <label>StudentId</label>
            <input type="text" name="student_id" value="<?php echo $student['student_id'] ?>" />
        </div>

        <div>
            <label>First name</label>
            <input type="text" name="first_name" value="<?php echo $student['first_name'] ?>" />
        </div>

        <div>
            <label>Last name</label>
            <input type="text" name="last_name" value="<?php echo $student['last_name'] ?>" />
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $student['email'] ?>" />
        </div>

        <div>
            <label>Dob</label>
            <!-- YYYY-MM-DD -->
            <input type="date" name="dob" value="<?php echo $student['dob'] ?>" />
        </div>

        <button type="submit" name="submit">Update</button>
    </form>
</body>

</html>