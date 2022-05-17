<?php require('../config/connection.php'); ?>

<?php 
	//if submit button is clicked
	if (isset($_POST['save'])) {
		$studentId = $_POST['student_id'];
		$firstName = $_POST['first_name'];
		$lastName = $_POST['last_name'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];
		
		$sql = sprintf("INSERT INTO students(student_id, first_name, last_name, email, dob) 
		VALUES ('%s','%s','%s','%s','%s')", $studentId, $firstName, $lastName, $email, $dob );
		
		$result = $conn->query($sql);
		if ($result) {
			header('location:index.php');
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create new student</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	
	<body>
		<div class="container">
			<h1>Create new student</h1>
			<form action="create.php" method="POST">
				<div class="form-group">
					<label>StudentID</label>
					<input class="form-control" type="text" name="student_id" />
				</div>
				<!-- First name -->
				<div class="form-group">
					<label>First name</label>
					<input class="form-control" type="text" name="first_name" />
				</div>
				<!-- Last name -->
				<div class="form-group">
					<label>Last name</label>
					<input class="form-control" type="text" name="last_name" />
				</div>
				
				<!-- Email -->
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="text" name="email" />
				</div>
				
				<!-- DOB -->
				<div class="form-group">
					<label>DOB</label>
					<input class="form-control" type="date" name="dob" />
				</div>
				
				<button type="submit" name="save" class="btn btn-primary">Save</button>
			</form>
		</div>
	</body>
</html>