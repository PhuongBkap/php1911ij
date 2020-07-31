<?php
include 'herader.php';
if (isset($_FILES['file'])) {
	$file = $_FILES['file'];
	$file_name = $file['name'];
	move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.['file']['name']);
}
?>
<div class="container">
	<div class="row">
		<form action="" method="POST" role="form enc" enctype="multipart/form-data">
			<legend>Form Upload</legend>
		
			<div class="form-group">
				<label for="">Chọn file</label>
				<input type="file" class="form-control" id="" placeholder="Input field" name="file">
			</div>
		
			
		
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>