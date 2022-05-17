<?php

require('../config/database.php');

//Bước 2: Viết câu sql
$limit = 1;
$page = 1;
$condition = "";

// <img src ="image/$data['img_name']";

//?page = 2
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_GET['student_id'])) {
    $studentId = $_GET['student_id'];
    $condition = "WHERE student_id LIKE '%$studentId%'";
}
//why -1
$offset = ($page - 1) * $limit;

$limitSql = "LIMIT $limit OFFSET $offset";

//$condition = "LIMIT 1 OFFET 4";
$sql = "SELECT * FROM students $condition $limitSql";

// Count number of records
$studentsCount = "SELECT COUNT(*) as student_count FROM students $condition";
$resultCount = $conn->query($studentsCount);
$count = $resultCount->fetch_assoc();
$totalRecordsCount = $count['student_count'];

//check number of 

$totalPages = ceil($totalRecordsCount / $limit);

$result = $conn->query($sql);

$students = $result->fetch_all(MYSQLI_ASSOC);
// echo "<pre>";
// print_r($students);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <a href="create.php">Create new student</a>
    <form method="GET" action="index.php">
        <input type="text" name="student_id" placeholder="StudentID" />
        <button type="submit" name="search">Search</button>
    </form>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Student Id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Dob</th>
            <th></th>
        </tr>

        <?php
        if (count($students) > 0) :
            foreach ($students as $student) : ?>
                <tr>
                    <td><?php echo $student['id'] ?></td>
                    <td><?php echo $student['student_id'] ?></td>
                    <td><?php echo $student['first_name'] ?></td>
                    <td><?php echo $student['last_name'] ?></td>
                    <td><?php echo $student['email'] ?></td>
                    <td><?php echo $student['dob'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $student['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $student['id'] ?>" onclick="return confirm('Are you sure')">Delete</a>
                    </td>
                </tr>
            <?php endforeach;
        else :
            ?>
            <tr>
                <td colspan="6">No result</td>
            </tr>
        <?php endif; ?>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            <?php if (isset($_GET['page']) && $_GET['page'] != 1) : ?>
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? 'active' : '' ?>">
                    <a class="page-link" href="index.php?page=<?php echo $i ?>&student_id=<?php echo isset($_GET['student_id']) ? $_GET['student_id'] : '' ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page == 1 || isset($_GET['page']) && $_GET['page'] != $totalPages) : ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>

</html>