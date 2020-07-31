<?php
include 'herader.php';
include 'connect.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query =mysqli_query($connect,"delete from category where id = $id");
	if ($query) {
			echo "<script>alert('Xóa danh mục thành công !');document.location='category.php'</script>";
		// header('location:category.php');
	}
	else {
		echo 'Lỗi không xóa được !';
	}
if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$status = $_POST['name'];
	$sql = "update category set
	 name = '$name',
	status = '$status' where id = '$id'
	 ";
	 $query = mysqli_query($connect,$sql);
	 if ($query) {
	 	header('location:category.php');
	 }
	 else{
	 	echo"Sua that bai";
	 }
}
}
?>