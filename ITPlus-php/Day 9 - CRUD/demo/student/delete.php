<?php 
require('../config/connection.php'); 

//Lấy id từ URL
$id = $_GET['id'];

//Viết câu sql
$sql = "DELETE FROM students WHERE id = $id";

$result = $conn->query($sql);

//Nếu câu SQL chạy ok thì redirect về trang chủ
if ($result) {
	header('location:index.php');	
}
