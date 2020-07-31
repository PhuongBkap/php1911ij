<?php
include 'herader.php';
include 'connect.php';
$product = mysqli_query($connect,"SELECT product.*, category.name as 'NameCategory'
FROM product JOIN category 
ON product.id_category = category.id");
?>
<div class="container">
	<div class="row">
		<div class="col-md-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Sản phẩm</h3>
				</div>
				<div class="panel-body">
					<a href="add_product.php" title="" class="btn btn-info">Thêm mới</a>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách sản phẩm</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover" id="my-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Name</th>
								<th>Name Category</th>
								<th>Price</th>
								<th>Sale_price</th>
								<th>Image</th>
								<th>Status</th>
								<th>Dess</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($product as $key =>$value) {?> 
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value['name']?></td>
								<td><?php echo $value['NameCategory']?></td>
								<td><?php echo $value['price']?></td>
								<td><?php echo $value['sale_price'] ?></td>
								<td><img src="../upload/<?php echo $value['image'] ?>" width="100"></td>
								<?php if ($value['status']==1) {?>
											<td>Còn hàng</td>
										<?php }else{?>
											<td style="color:red;">Hết hàng</td>
										<?php } ?>
								<td><?php echo $value['dess'] ?></td>
								<td align="center">
											<a href="edit_product.php?id=<?php echo $value['id'] ?>" class="btn btn-info">
												<span class="glyphicon glyphicon-edit"></span>
											</a>

										</td>
										<td align="center">
											<a href="delete_product.php?id=<?php echo 
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
include 'footer.php';
?>