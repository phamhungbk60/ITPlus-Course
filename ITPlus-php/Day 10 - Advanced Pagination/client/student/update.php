<?php
require('../config/database.php');

if (isset($_POST['submit'])) :
    $studentId = $_POST['student_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $id = $_GET['id'];

    $sql = sprintf("UPDATE students 
    SET student_id='%s', 
    first_name='%s', 
    last_name='%s',
    email='%s', 
    dob='%s' WHERE id=$id", $studentId, $firstName, $lastName, $email, $dob);

    $result = $conn->query($sql);
    if ($result) :
        header('location:index.php');
    endif;
endif;
