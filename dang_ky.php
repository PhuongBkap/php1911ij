<?php
include 'admin/connect.php';
$err = [];
if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rpassword = $_POST['rpassword'];
	$phone = $_POST['phone'];
	$addr = $_POST['addr'];	
	if (empty($name)) {
		$err['name']="Bạn chưa nhập tên !";
	}
	if (empty($email)) {
		$err['email']="Bạn chưa nhập email !";
	}
	if (empty($password)) {
		$err['password']="Bạn chưa nhập mật khẩu";
	}
	if (empty($password != $rpassword)) {
		$err['$rpassword']="Mật khẩu nhập lại không đúng !";
	}
	if (empty($phone)) {
		$err['phone']="Bạn chưa nhập số điện thoại !";
	}
	if (empty($addr)) {
		$err['addr']="Bạn chưa nhập địa chỉ !" ;
	}
	// var_dump($err);
	if (!empty($err)) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		var_dump($password);
		 $sql = "insert into users (name,email,password,phone,addr) values ('$name','$email','$password','$phone','$addr')";
		$query=mysqli_query($connect,$sql);
		if ($query) {
			echo "<script>alert('Đăng ký thành công !');document.location='login.php'</script>";
		}
	}
	
}
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Đăng ký</title>

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
						<legend>Đăng ký tài khoản</legend>
					
						<div class="form-group">
							<label for="">Tên người dùng</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="name">
							<div class="has-error">
								<span><?php echo(isset($err['name']))?$err['name']:''?></span>
							</div>
						</div>
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
						<div class="form-group">
							<label for="">Nhập lại mật khẩu</label>
							<input type="password" class="form-control" id="" placeholder="Input field" name="rpassword">
							<div class="has-error">
								<span><?php echo(isset($err['rpassword']))?$err['rpassword']:''?></span>
							</div>
						</div>
					<div class="form-group">
							<label for="">Số điện thoại</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="phone">
							<div class="has-error">
								<span><?php echo(isset($err['phone']))?$err['phone']:''?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="">Đại chỉ</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="addr">
							<div class="has-error">
								<span><?php echo(isset($err['addr']))?$err['addr']:''?></span>
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