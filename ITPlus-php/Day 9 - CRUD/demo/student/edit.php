<?php require('../config/connection.php'); ?>

<?php 
	//1. Lấy id cần truy cập
	$id = $_GET['id'];
	//2. Viết câu SQL để lấy bản ghi với id trên thanh URL
	$sql = "SELECT * FROM students WHERE id = $id";
	//3. Chạy câu sql và trả kết quả (1 bản ghi dứoi dạng assoc. array)
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	//Nếu nút save được clicked
	if (isset($_POST['save'])) {
		$studentId = mysqli_real_escape_string($conn, $_POST['student_id']); // / => \/ (sql injection)
		$firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
		$lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		
		//chạy câu sql, nếu không có lỗi gì thì trang sẽ redirect sang trang chủ
		$sql = sprintf("UPDATE students SET student_id='%s', first_name='%s', last_name = '%s',
		email='%s', dob='%s' WHERE id = %d ", $studentId, $firstName, $lastName, $email, $dob, $id);
		
		$result = $conn->query($sql);
		if ($result) {
			header('location:index.php');
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit student</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	
	<body>
	<!-- Tải trước dữ liệu lên trang web -->
		<div class="container">
			<h1>Edit student</h1>
			<form action="edit.php?id=<?php echo $row['id']?>" method="POST">
				<div class="form-group">
					<label>StudentID</label>
					<input class="form-control" type="text" name="student_id" value="<?php echo $row['student_id']; ?>"/>
				</div>
				<!-- First name -->
				<div class="form-group">
					<label>First name</label>
					<input class="form-control" type="text" name="first_name" value="<?php echo $row['first_name']; ?>"/>
				</div>
				<!-- Last name -->
				<div class="form-group">
					<label>Last name</label>
					<input class="form-control" type="text" name="last_name" value="<?php echo $row['last_name']; ?>"/>
				</div>
				
				<!-- Email -->
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="email" name="email" value="<?php echo $row['email']; ?>"/>
				</div>
				
				<!-- DOB -->
				<div class="form-group">
					<label>DOB</label>
					<input class="form-control" type="date" name="dob" value="<?php echo $row['dob']; ?>"/>
				</div>
				
				<button class="btn btn-primary" type="submit" name="save">Save</button>
			</form>
		</div>
	</body>
</html>