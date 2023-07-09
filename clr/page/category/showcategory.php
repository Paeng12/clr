<!-- <div class="card card-outline card-primary">
	<div class="card-body">
		<div class="container-fluid">
			<form method="POST" action="./page/category/categorydb.php" enctype="multipart/form-data" id="addimg">
				<div class="form-group col-6">
					<label for="categorydb">เพิ่มหมวดหมู่สินค้า</label>
					<input type="text" name="categorydb" id="categorydb" class="form-control" value="" required>
				</div>
				<div class="form-group col-6">
					<label for="uploadfile">เพิ่มรูปภาพ</label>
					<input class="form-control" type="file" name="uploadfile" value="" id="uploadfile" />
				</div>
				<div class="form-group col-6"><button class="btn btn-primary" type="submit" name="upload">UPLOAD</button></div>
			</form>
		</div>
	</div>
</div> -->


<div class="card card-outline card-primary">
	<div class="card-body">
		<div class="container-fluid">
			<form method="POST" action="./page/category/categorydb.php" enctype="multipart/form-data" id="addimg">
				<div class="form-group col-6">
					<label for="categorydb">เพิ่มหมวดหมู่สินค้า</label>
					<input type="text" name="categorydb" id="categorydb" class="form-control" value="" required>
				</div>
				<div class="form-group col-6">
					<label for="uploadfile">เพิ่มรูปภาพ</label>
					<input class="form-control" type="file" name="uploadfile" value="" id="uploadfile" />
				</div>
				<div class="form-group col-6"><button class="btn btn-primary" type="submit" name="upload">UPLOAD</button></div>
			</form>
		</div>
	</div>

</div>
<!-- <div class="card-footer">
		<div class="col-md-12">
			<div class="row">
				<botton class="btn btn-sm btn-primary mr-2" name="Submit" onclick="save()">save</botton> -->
<!-- <button class="btn btn-sm btn-primary mr-2" form="manage-user">Save</button> -->
<!-- <a class="btn btn-sm btn-secondary" href="">Cancel</a> -->
<!-- </div>
		</div>
	</div> -->

<!-- <script src="./plugins/jquery/jquery.js">
</script> -->
<script>
	$(document).ready(function() {

		$("#addimg").on('submit', (function(e) {
			e.preventDefault();
			$.ajax({
				url: './page/category/categorydb.php',
				type: 'POST', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json', //หรือ json หรือ xml
				success: function(response) { //ฟังชันที่เรียกออกมา
					console.log(response); //ดูค่าว่าออกมาไหม
					console.log(response.status);

				}
			});
		}))
	});

	
	// function save() {
	// 	let categorydb = $("#categorydb").val();


	// 	console.log(categorydb);

	// 	$.ajax({
	// 		url: './page/category/categorydb.php',
	// 		type: 'POST', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
	// 		data: {
	// 			status: 'savecategory',

	// 			categorydb: categorydb,

	// 		},
	// 		dataType: 'json', //หรือ json หรือ xml
	// 		success: function(response) { //ฟังชันที่เรียกออกมา
	// 			console.log(response); //ดูค่าว่าออกมาไหม
	// 			alert(response["status"])
	// 			if (response["status"] === "ลงทะเบียนสำเร็จแล้ว") {
	// 				// let operatorid = $("#operatorid").val("");
	// 				// let firstname = $("#firstname").val("");
	// 				// let lastname = $("#lastname").val("");
	// 				// let department = $("#department").val("");
	// 				// let position = $("#position").val("");
	// 				// let username = $("#username").val("");
	// 				// let password = $("#password").val("");
	// 				// let type = $("#type").val("");
	// 				window.location.href = 'http://172.18.106.100:8888/clr/index.php?page=showcategory'
	// 			}

	// 			if (response["status"] === "Operator ID หรือ user ถูกใช้ไปแล้ว") {
	// 				let operatorid = $("#operatorid").val("");
	// 				let username = $("#username").val("");
	// 			}

	// 			// $("#firstname").val(response[0]["name"]);//แทนค่าเข้าไปในไอดี response[0]["name"] เรียกจากใน array มาทีละตัว
	// 			// $("#lastname").val(response[0]["surname"]);
	// 			// $("#department").val(response[0]["department"]);
	// 			// $("#position").val(response[0]["oeposition"]);
	// 			// console.log(response[0]["name"]);
	// 			// // $("#firstname").show(name);
	// 			//   //callback ที่เตรียมไว้รันตอนเซิร์ฟเวอร์ตอบกลับมา
	// 		}
	// 	});
	// };
</script>


<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">หมวดหมู่</h3>

	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<table class="table table-hover table-striped" id="ggg">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">รูปภาพ</th>
							<th class="text-center">หมวดหมู่</th>
							<th class="text-center">การแก้ไข</th>
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
						$qry = $conn->query("SELECT * from `category` where id != '0' ");
						while ($row = $qry->fetch_assoc()) :

						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<!-- <td class="text-center"><img src="" class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar"></td> -->
								<td class="text-center"><img src="./dist/img/category/<?= $row['name_pic'] ?>" width="80" height="80"></td>
								<td class="text-center">
									<p class="m-0 truncate-1"><?php echo $row['category'] ?></p>
								</td>
								<td class="text-center">
									<button type="button" class="btn btn-flat btn-danger  btn-sm" href="javascript:void(0)" onclick="myFunction(<?php echo $row['id'] ?>)">
										ลบข้อมูล
									</button>

									<script>
										function myFunction(id) {
											console.log(id);
											if (confirm("แน่ใจหรือไม่ว่าจะลบข้อมูล?")) {
												$.ajax({
													url: "./page/category/dbcategorydelete.php",
													type: "POST",
													data: {
														id: id,
														status: 'deletecategory',
													},
													success: function(response) {
														// Reload the page to reflect the updated data
														window.location.href = 'http://172.18.106.100:8888/clr/index.php?page=showcategory'
													},
													error: function(xhr, status, error) {
														console.log(xhr.responseText);
													}
												});
											}
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