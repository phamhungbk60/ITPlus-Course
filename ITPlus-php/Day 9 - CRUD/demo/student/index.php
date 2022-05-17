<?php require('../config/connection.php'); 
	//1. Viết câu truy vấn SQL
	$sql = "SELECT * FROM students";
	//2. Thực thi truy vấn SQL
	$queryExecuted = $conn->query($sql);
	//3. Đổ toàn bộ kết quả trả về dưới dạng Associative array.
	$result = $queryExecuted->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Students</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	
	<body>
		<div class="container">
			<div class="mt-3">
				<a href="create.php">
					<button class="btn btn-primary">Create new student</button>
				</a>
			</div>
			<br/>
			<!-- Todo: Create table in html -->
			<table class="table" style="border-collapse:collapse">
				<thead>
					<tr>
						<th>StudentID</th>
						<th>First name</th>
						<th>Last name</th>
						<th>Email</th>
						<th>Dob</th>
						<th></th>
					</tr>
				</thead>
				
				<tbody>
				<!-- Kiểm tra số lượng dòng trả về, nếu số lượng dòng trả về > 0, loop và lấy ra kết quả -->
					<?php if (count($result) > 0): ?>
						<?php foreach($result as $row): ?>
							<tr>
								<td><?php echo $row['first_name']?></td>
								<td><?php echo $row['student_id']?></td>
								<td><?php echo $row['last_name']?></td>
								<td><?php echo $row['email']?></td>
								<td><?php echo $row['dob']?></td>
								<td>
									<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
									<a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure');">Delete</a>
								</td>
							</tr>
						<?php endforeach ?>
					<!-- Nếu trong trường hợp số lượng dòng trả về = 0 thì in ra 0 kết quả, -->
					<?php else: ?>
							<tr>
								<td colspan="6">0 results</td>
							</tr>
					<?php endif ?>
				</tbody>
			</table>
			</div>
	</body>
</html>