<?php
include 'herader.php';
include 'connect.php';
$category = mysqli_query($connect, "select * from category");


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "select * from category where id = $id";
	$category = mysqli_query($connect,$sql);
	$cate = mysqli_fetch_assoc($category);
}

if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$status = $_POST['status'];

	$sql    = "update category set
	name = '$name',
	status = '$status'  where id = $id";
	$query = mysqli_query($connect,$sql);
	if ($query) {
		echo "<script>alert('Sửa danh mục thành công !');document.location='category.php'</script>";
		// header('location:category.php');
	}
	else{
		echo 'Sửa thất bại !';
	}
	
	
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Chỉnh sửa danh sách </h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form">
						<div class="form-group">
							<label for="">Tên danh mục</label>
							<input type="text" class="form-control" id="input" placeholder="Nhập tên danh mục" name="name" value="<?php echo $cate['name'] ?>">
						</div>
						<div class="form-group">
							<label for="">Trạng thái</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="1"<?php echo (($cate['status']==1)?'checked':'')?>>Kích hoạt
								</label>
								<label>
									<input type="radio" name="status" id="input" value="0"<?php echo (($cate['status']==0)?'checked':'') ?>>Không kích hoạt
								</label>
							</div>
						</div>
					
						<button type="submit" class="btn btn-primary">Sửa danh mục</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>


