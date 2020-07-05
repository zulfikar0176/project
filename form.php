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
		$connection = new mysqli('localhost', 'root', '', 'project'); 
		if (isset($_POST['sign_up'])) {
			$pname= $_POST['pname'];
			$rprize= $_POST['rprize'];
			$cprize= $_POST['cprize'];
			$discription= $_POST['discription'];
			$category= $_POST['category'];
			$brand= $_POST['brand'];
			$tag= $_POST['tag'];
			
			
			if (empty($pname) || empty($rprize) || empty($cprize) || empty($discription) || empty($category) || empty($brand) || empty($tag)) {
				$mess= "<p class='alert alert-danger'>All filed are requird<button class='close' data-dismiss='alert'>&times;</button></p>";
			}
			else{
				

				
				$data = fileUpload($_FILES['photo'],'photos/');
				$photo_name = $data['file_name'];

				if ($data ['status'] = 'yes') {

					$sql = "INSERT INTO product_info (product_name, regular_prize, cell_prize, discription, category, tag, brand, photo) VALUES ('$pname','$rprize','$cprize','$discription','$category', '$tag', '$brand', '$photo_name')";
					$connection -> query($sql);

					$mess= "<p class='alert alert-success'>Data Recived<button class='close' data-dismiss='alert'>&times;</button></p>";
				}else{
					$mess= "<p class='alert alert-danger'>Invailid File Format<button class='close' data-dismiss='alert'>&times;</button></p>";
				}
			}
		}

	?>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
		
		<div class="card" style="margin: 300px; margin-top: 50px">
			<a class="btn btn-success btn-sm" style="margin-right : 500px" href="allstudent.php">All Table Product</a>
			<a class="btn btn-danger btn-sm" style="margin-right : 500px" href="shop-4col.php">Show Product</a>
			<?php 
				

				if (isset($mess)) {
					echo $mess;
				}
			 ?>
			<div class="card-header">
				<h1>Upload Product</h1>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="">Product Name</label>
					<input name="pname" class="form-control" value="<?php old('pname'); ?>" type="text" >
				</div>

				<div class="form-group">
					<label for="">Regular Prize</label>
					<input name="rprize" class="form-control" value="<?php old('rprize'); ?>" type="text" >
				</div>

				<div class="form-group">
					<label for="">Cell Prize</label>
					<input name="cprize" class="form-control" value="<?php old('cprize'); ?>" type="text" >
				</div>

				<div class="form-group">
					<label for="">Discription</label>
					<input name="discription" class="form-control" value="<?php old('discription'); ?>" type="text" >
				</div>

				<div class="form-group">
					<label for="">Category</label>
					<input name="category" class="form-control" value="<?php old('category'); ?>" type="text">
				</div>

				<div class="form-group">
					<label for="">Tag</label>
					<input name="tag" class="form-control" value="<?php old('tag'); ?>" type="text">
				</div>

				<div class="form-group">
					<label for="">Brand</label>
					<input name="brand" class="form-control" value="<?php old('brand'); ?>" type="text">
				</div>
				<div class="form-group">
					<label for="">Photo</label>
					<input name="photo" class="form-control" type="file">
				</div>

				<div class="form-group">
					
					<input name="sign_up" class="btn btn-primary" type="submit" value="Upload Product">
				</div>
			</div>
			<div class="card-footer"></div>
			
		</div>
	</form>



</body>
</html>