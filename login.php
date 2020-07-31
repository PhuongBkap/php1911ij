<?php
include 'admin/connect.php';

if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "select * from users where email = '$email'";
	$query = mysqli_query($connect,$sql);
	$data = mysqli_fetch_assoc($query);
	$checkEmail = mysqli_num_rows($query);
	if ($checkEmail ==1) {
		$checkPass = password_verify($password, $data['password']);
		if ($checkPass) {
			$_SESSION['name']	= $data;
			header('location:index.php');
		

		}
		else{
			echo "<script>alert('Sai mật khẩu !');document.location='login.php'</script>";
		}
	}
	else {
		echo "<script>alert('Email không tồn tại !');document.location='login.php'</script>";
	}
	// var_dump($checkEmail);
	// if (empty($email)) {
	// 	$err['email']="Bạn chưa nhập email !";
	// }
	// if (empty($password)) {
	// 	$err['password']="Bạn chưa nhập mật khẩu";
	// }
	
	// var_dump($err);
	// if (!empty($err)) {
	// 	$password = password_hash($password, PASSWORD_DEFAULT);
	// 	// var_dump($password);
		 
	// 	$query=mysqli_query($connect,$sql);
	// 	if ($query) {
	// 		echo "<script>alert('Đăng ký thành công !');document.location='login.php'</script>";
	// 	}
		
	// }
	
}
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Đăng nhập</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<style type="text/css">
		.has-error {
			color: red;
		}
	</style>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form action="" method="POST" role="form">
						<legend>Đăng Nhập</legend>
					
						
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="email">
							<div class="has-error">
								<span><?php echo(isset($err['email']))?$err['email']:''?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="">Mật khẩu</label>
							<input type="password" class="form-control" id="" placeholder="Input field" name="password">
							<div class="has-error">
								<span><?php echo(isset($err['password']))?$err['password']:''?></span>
							</div>
						</div>
					
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>