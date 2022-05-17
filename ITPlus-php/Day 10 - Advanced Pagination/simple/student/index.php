<?php require('../config/connection.php'); ?>

<?php
	// Pagination begins
	$offset = 0;
	$limit = 1;

	//câu truy vấn để lấy danh sách (sẽ kèm thêm điều kiện sau đó)
	$studentSql = "SELECT * FROM students";
	//lấy tổng số bản ghi để tiến hành phân trang
	$totalStudentsCountSql = "SELECT COUNT(*) FROM students";

	if (isset($_GET['search'])) {
		$searchCondition = mysqli_real_escape_string($conn, $_GET['search']);
		$totalStudentsCountSql .= " WHERE last_name LIKE '%$searchCondition%'";
		$studentSql .= " WHERE last_name LIKE '%$searchCondition%'";
	}

	/**
	 * Nếu biến $page tồn tại trên url thì
	 * chúng ta sẽ tính $offset bằng $limit * ($page_hiện_tại - 1)
	 */
	if (isset($_GET['page'])) {
		$offset = $limit * ($_GET['page'] - 1);
		$studentSql .= " LIMIT $limit OFFSET $offset";
	} 
	/**
	 * Nếu page không tồn tại trên url (ví dụ như bắt đầu vào trang)
	 * thì $offset = 0
	 */
	else {
		$offset = 0;
		$studentSql .= " LIMIT $limit OFFSET $offset";
	}

	//get total records
	$totalStudentsResult = $conn->query($totalStudentsCountSql);
	$totalStudents = $totalStudentsResult->fetch_array()[0];

	/**
	 * tổng số trang bằng số lượng bản ghi chia limit và LÀM TRÒN LÊN
	 * VD: ceil(3.5) => 4
	 */
	$totalPages = ceil($totalStudents / $limit);

	$result = $conn->query($studentSql);

	$rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Students</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	
	<body>
		<div class="container">
			<div class="mt-3 d-flex justify-content-between">
				<a href="create.php">
					<button class="btn btn-primary">Create new student</button>
				</a>

				<!-- Thực hiện viết form search với method là GET, khi submit sẽ trả về trang đầu tiên -->
				<form class="form-inline" method="GET">
					<!-- Sử dụng hidden field khi gửi form, khi đó khi gửi form lên
					trên thanh url sẽ có giá trị của page, ví dụ xxx.com?page=1&search=abc -->
					<input type="hidden" name="page" value="1"/>
					<input class="form-control" name="search" placeholder="Search last name"/>
					<button class="btn btn-primary ml-2">Search</button>
				</form>
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
					<?php if(count($rows) > 0): ?>
						<?php foreach($rows as $row): ?>
							<tr>
								<td><?php echo $row['student_id']?></td>
								<td><?php echo $row['first_name']?></td>
								<td><?php echo $row['last_name']?></td>
								<td><?php echo $row['email']?></td>
								<td><?php echo $row['dob']?></td>
								<td>
									<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
									<a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure');">Delete</a>
								</td>
							</tr>
						<?php endforeach ?>
					<?php else: ?>
						<tr>
							<td colspan="6">0 results</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>

			<!-- Pagination -->
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<?php for($i = 1; $i <= $totalPages; $i++) { ?>
						<!-- Nếu $_GET['page'] tồn tại thì đặt trang hiện tại là active -->
						<li class="page-item <?php echo (isset($_GET['page']) && $_GET['page'] == $i || 
						//nếu $_GET['page'] không tồn tại thì đặt trang 1 là active
						!isset($_GET['page']) && $i == 1) ? 'active' : '' ?>">
						<!-- Trong trường hợp nếu search trước rồi mới phân trang thì cần kiểm tra isset() trước
						Nếu trong trường hợp đã search thì mới đẩy $_GET['search'] trên URL vào -->
							<a class="page-link" 
							href="index.php?page=<?php echo $i; ?><?php echo isset($_GET['search']) ? '&search='.$_GET['search'] : null ?>">
								<?php echo $i; ?>
							</a>
						</li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	</body>
</html>