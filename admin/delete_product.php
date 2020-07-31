<?php
include 'herader.php';
include 'connect.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query =mysqli_query($connect,"delete from product where id = $id");
	if ($query) {
		echo "<script>alert('Xóa sản phẩm thành công !');document.location='product.php'</script>";
		// header('location:product.php');
	}
	else {
		echo 'Lỗi không xóa được !';
	}
	
}
?>