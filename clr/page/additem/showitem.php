<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">สินค้าในระบบ</h3>
		<div class="card-tools">
			<a href="index.php?page=additem" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> เพิ่มสินค้า</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<table class="table table-hover table-striped" id="kk">

					<thead>
						<tr>
							<th>#</th>
							<th>code</th>
							<th>รูปสินค้า</th>
							<th>หมวดหมู่</th>
							<th>ชื่อสินค้า</th>
							<th>ไซส์</th>
							<th>สี</th>
							<th>ประเภทสินค้า</th>
							<th>หน่วยสินค้า</th>
							<th>ราคา</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$servername = "172.18.106.100";
						$username = "pe";
						$password = "123456";
						$dbname = "cleanroom";

						$conn = new mysqli($servername, $username, $password, $dbname);

						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} else {
							// echo "dwefrgthyju";
						}

						mysqli_set_charset($conn, "utf8");

						$i = 1;
						$qry = $conn->query("SELECT additem.*, category.category as name_product from `additem` LEFT JOIN `category` ON additem.name_product = category.id where additem.id != '0' ORDER BY additem.id ASC");
						while ($row = $qry->fetch_assoc()) :
						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<!-- <td class="text-center"><img src="" class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar"></td> -->
								<td>
									<p class="m-0 truncate-1"><?php echo $row['code'] ?></p>
								</td>
								<td><img src="./dist/img/item/<?= $row['picture'] ?>" width="80" height="80"></td>
								<td>
									<p class="m-0"><?php echo ($row['name_product']) ?></p>
								</td>
								<td>
									<p class="m-0"><?php echo ($row['product']) ?></p>
								</td>
								<td>
									<p class="m-0"><?php echo ($row['size']) ?></p>
								</td>
								<td>
									<p class="m-0"><?php echo ($row['color']) ?></p>
								</td>
								<td>
									<p class="m-0"><?php echo ($row['type_product']) ?></p>
								</td>
								<td>
									<p class="m-0"><?php echo ($row['unit']) ?></p>
								</td>
								<td>
									<p class="m-0"><?php echo ($row['price']) ?></p>
								</td>
								<td>
									<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
										Action
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" href="http://172.18.106.100:8888/clr/index.php?page=edititem&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item delete_data" href="javascript:void(0)" onclick="myFunction(<?php echo $row['id'] ?>)"><span class="fa fa-trash text-danger"></span> Delete</a>
										<script>
											function myFunction(id) {
												console.log(id);
												if (confirm("แน่ใจหรือไม่ว่าจะลบข้อมูล?")) {
													$.ajax({
														url: "./page/additem/deleteitem.php",
														type: "POST",
														data: {
															id: id,
															status: 'deleteitem',
														},
														success: function(response) {
															// Reload the page to reflect the updated data
															window.location.href = 'http://172.18.106.100:8888/clr/index.php?page=showitem'
														},
														error: function(xhr, status, error) {
															console.log(xhr.responseText);
														}
													});
												}
											}

											function editemp(id) {
												console.log(id);
												$.ajax({
													url: "./page/additem/deleteitem.php",
													type: "POST",
													data: {
														id: id,
														status: 'editemp',

													},
													success: function(response) {

													}
												});
											}
										</script>
									</div>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

