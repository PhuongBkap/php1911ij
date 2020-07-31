<?php
include'herader.php';
include "connect.php";
if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$status = $_POST['status'];
	$sql = "insert into category(name,status)values('$name','$status')";
	$query = mysqli_query($connect,$sql);
	if ($query) {
		
		header('location:category.php');
	}
	else {
		echo 'Thêm mới thất bại !';
 
	}

}
?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm mới danh mục</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form">
						<div class="form-group">
							<label for="">Tên danh mục</label>
							<input type="text" class="form-control" id="" placeholder="Nhập tên danh mục" name="name">
						</div>
						<div class="form-group">
							<label for="">Trạng thái</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="1">Kích hoạt
								</label>
								<label>
									<input type="radio" name="status" id="input" value="0">Không kích hoạt
								</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Thêm danh mục</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include'footer.php';
?>