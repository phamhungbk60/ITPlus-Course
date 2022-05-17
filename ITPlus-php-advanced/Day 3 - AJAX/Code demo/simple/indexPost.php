<?php

$host = 'localhost';
$username = 'root';
$password = 'root';
$db = 'mvc';

$conn = new mysqli($host, $username, $password, $db);

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];

$sql = "INSERT INTO users(first_name, last_name) VALUES ('$firstName', '$lastName')";
$conn->query($sql);
