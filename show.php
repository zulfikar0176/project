<?php 
	require_once "function.php";
	require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">



	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	
</head>
<body>

	<?php 

		$id = $_GET['id'];
		$sql= "SELECT * FROM product_info WHERE id='$id'";
		$data = $connection -> query($sql);
		$student_dat = $data -> fetch_assoc();
	?>
	
	<div style="width: 450px;" class="wrap-table shadow">
		<a class="btn btn-info btn-sm" href="allstudent.php">Back</a>
		<div class="card" >
			<div class="card-body" >
				<img style="width: 150px;" class="img-thumbnail d-block mx-auto" src="photos/<?php echo $student_dat['photo']; ?>" alt="">
				<table>
					<tr>
						<td>Product Name :  </td>
						<td><?php echo $student_dat['product_name']; ?></td>
					</tr>

					<tr>
						<td>Regular Price :  </td>
						<td><?php echo $student_dat['regular_prize']; ?></td>
					</tr>

					<tr>
						<td>Cell Prize :  </td>
						<td><?php echo $student_dat['cell_prize']; ?></td>
					</tr>

					<tr>
						<td>Discription :  </td>
						<td><?php echo $student_dat['discription']; ?></td>
					</tr>

					<tr>
						<td>Category :  </td>
						<td><?php echo $student_dat['category']; ?></td>
					</tr>

					<tr>
						<td>Tag :  </td>
						<td><?php echo $student_dat['tag']; ?></td>
					</tr>

					<tr>
						<td>Brand :  </td>
						<td><?php echo $student_dat['brand']; ?></td>
					</tr>
				</table>
			</div>
		</div>
		
	</div>



</body>
</html>