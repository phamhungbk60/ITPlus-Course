<?php require('../config/connection.php'); ?>

<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM students WHERE id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$studentId = $row['student_id'];
	$firstName = $row['first_name'];
	$lastName = $row['last_name'];
	$email = $row['email'];
	$dob = $row['dob'];
	$id = $row['id'];	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit student</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	
	<body>
		<div class="container">
			<h1>Edit student</h1>
			<form action="edit.php?id=<?php echo $id;?>" method="POST">
				<div class="form-group">
					<label>StudentID</label>
					<input class="form-control" type="text" name="student_id" value="<?php echo $studentId; ?>"/>
				</div>
				<!-- First name -->
				<div class="form-group">
					<label>First name</label>
					<input class="form-control" type="text" name="first_name" value="<?php echo $firstName; ?>"/>
				</div>
				<!-- Last name -->
				<div class="form-group">
					<label>Last name</label>
					<input class="form-control" type="text" name="last_name" value="<?php echo $lastName; ?>"/>
				</div>
				
				<!-- Email -->
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="email" name="email" value="<?php echo $email; ?>"/>
				</div>
				
				<!-- DOB -->
				<div class="form-group">
					<label>DOB</label>
					<input class="form-control" type="date" name="dob" value="<?php echo $dob; ?>"/>
				</div>
				
				<button class="btn btn-primary" type="submit" name="save">Save</button>
			</form>
			
			<?php 
				if (isset($_POST['save'])) {
					$studentId = $_POST['student_id'];
					$firstName = $_POST['first_name'];
					$lastName = $_POST['last_name'];
					$email = $_POST['email'];
					$dob = $_POST['dob'];
					$id = $_GET['id'];
					
					$sql = sprintf("UPDATE students SET student_id='%s', first_name='%s', last_name = '%s',
					email='%s', dob='%s' WHERE id = %d ", $studentId, $firstName, $lastName, $email, $dob, $id);
					
					$result = $conn->query($sql);
					if ($result) {
						header('location:index.php');
					}
				}
				
			?>
		</div>
	</body>
</html>