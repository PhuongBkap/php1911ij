<?php
include'herader.php';
include "connect.php";
$sql ="select * from category";
$category=mysqli_query($connect,$sql);

?>

<div class="container">
	<div class="row">
		<div class="col-md-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Danh mục</h3>
				</div>
				<div class="panel-body">
					<!-- <a href="add_category.php" title="" class="btn btn-info">Thêm mới</a> -->
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
		<div class="col-md-10">
			<div class="panel panel-info">
				<div class="panel panel-heading">
					<h3 class="panel-title">
						Danh sach danh muc
					</h3>
				</div>
				<div class="panel panel-body">
					<table class="table table-hover" id="my-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Name</th>
								<th>Status</th>
								<th align="center">Update</th>
								<th align="center">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($category as $key => $value) {?>
								<tr>
									<td><?php echo $key+1 ?></td>
									<td><?php echo $value['name'] ?></td>
										<?php if ($value['status']==1) {?>
											<td>Kích hoạt</td>
										<?php }else{?>
											<td style="color:red;">Không kích hoạt</td>
										<?php } ?>
										<td align="center">
											<a href="edit_category.php?id=<?php echo $value['id'] ?>" class="btn btn-info">
												<span class="glyphicon glyphicon-edit"></span>
											</a>

										</td>
										<td align="center">
											<a href="delete.php?id=<?php echo 
											$value['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">
											<span class="glyphicon glyphicon-trash"></span>
										</a>

									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include'footer.php';
?>
