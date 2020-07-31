<?php
include'herader.php';
include 'connect.php';
$category = mysqli_query($connect, "select * from category");

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "select * from product where id = $id";
	$product = mysqli_query($connect,$sql);
	$pro = mysqli_fetch_assoc($product);
	// var_dump($pro);
}

if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$id_category = $_POST['id_category'];
	$price = $_POST['price'];
	$sale_price = $_POST['sale_price'];
	$dess = $_POST['dess'];
	$status = $_POST['status'];
	if (isset($_FILES['image'])) {
		$file = $_FILES['image'];
		$file_name = $file['name'];
		 move_uploaded_file($file['tmp_name'],'../upload/'.$file_name);
	}
	$sql = "update product set 
	name = '$name',
	id_category = '$id_category',
	price = '$price',
	sale_price = '$sale_price',
	dess = '$dess',
	image ='$file_name',
	status = '$status' where id = $id";
	$query = mysqli_query($connect,$sql);
	if ($query) {
		echo "<script>alert('Sửa sản phẩm thành công !');document.location='product.php'</script>";
		// header('location:product.php');
	}
	else {
		echo 'Sửa thất bại !';
 
	}

}
?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Sửa sản phẩm</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Tên sản phẩm</label>
							<input type="text" class="form-control" id="" placeholder="Nhập tên sản phẩm" name="name" value="<?php echo $pro['name']?>">
						</div>
						<div class="form-group">
							<label for="">Tên danh mục</label>
							<select name="id_category" id="input" class="form-control" required="required">
								<option value="">________Tên danh mục________</option>
								<?php foreach ($category as $key => $value) {?>
									<option value="<?php echo $value['id'] ?>" <?php echo ($value['id']== $pro['id_category'])?'selected':''?> > <?php echo $value['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Gía sản phẩm</label>
							<input type="number" class="form-control" id="" placeholder="Nhập giá sản phẩm" name="price" value="<?php echo $pro['price'] ?>">
						</div>
						<div class="form-group">
							<label for="">Gía khuyến mãi</label>
							<input type="number" class="form-control" id="" placeholder="Nhập sale khuyến mãi" name="sale_price" value="<?php echo $pro['sale_price'] ?>">
						</div>
						<div class="form-group">
							<label for="">Ảnh sản phẩm</label>
							<input type="file" class="form-control" id="" placeholder="Chọn file" name="image">
							<img src="../upload/<?php echo $pro['image'] ?>" width="100px;">
						</div>
						<div class="form-group">
							<label for="">Mô tả sản phẩm</label>
							<textarea name="dess" id="inputDess" class="form-control" rows="3" required="required"><?php echo $pro['dess'] ?></textarea>
						</div>
						<div class="form-group">
							<label for="">Trạng thái</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="1"<?php echo (($pro['status']==1)?'checked':'')?>>Còn hàng
								</label>
								<label>
									<input type="radio" name="status" id="input" value="0"<?php echo (($pro['status']==0)?'checked':'')?>>Hết hàng
								</label>
							</div>
						</div>
						

						<button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include'footer.php';
?>