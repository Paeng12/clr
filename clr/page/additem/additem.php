<?php
session_start();
if (!isset($_SESSION['user_login'])) { // ถ้าไม่ได้เข้าระบบอยู่
	header("location: http://172.18.106.100:8888/clr/page/login/login.php"); // redirect ไปยังหน้า login.php
	exit;
}

$user = $_SESSION['user_login'];
?>
<!DOCTYPE html>
<html lang="en">


	<div class="card card-outline card-primary">
		<div class="card-body">
			<div class="container-fluid">
				<form method="POST" action="./page/additem/addimg.php" enctype="multipart/form-data" id="addimg">
					<div class="form-group col-6">
						<label for="code">Code</label>
						<input type="text" name="code" id="code" class="form-control" value="" required>
					</div>
					<div class="form-group col-6">
						<label for="productname">หมวดหมู่</label>
						<select name="productname" id="productname" class="form-control" required>
							<?php
							// Connect to database and select categories table
							$db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
							mysqli_set_charset($db, "utf8");
							$result = mysqli_query($db, "SELECT id, category FROM category");

							// Loop through categories and create option tags
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
							}
							?>
						</select>

					</div>
					<div class="form-group col-6">
						<label for="product">ชื่อสินค้า</label>
						<input type="text" name="product" id="color" class="form-control" value="" required>
					</div>
					<div class="form-group col-6">
						<label for="color">สี</label>
						<select name="color" id="color" class="custom-select" value="" required>
							<option value="เขียว(green)">เขียว(green)</option>
							<option value="หลือง(yellow)">เหลือง(yellow)</option>
							<option value="แดง(red)">แดง(red)</option>
							<option value="ขาว(white)">ขาว(white)</option>
							<option value="ฟ้า(blue)">ฟ้า(blue)</option>
						</select>
						<!-- <input type="text" name="color" id="color" class="form-control" value="" required> -->
					</div>
					<div class="form-group col-6">
						<label for="size">ไซส์</label>
						<input type="text" name="size" id="size" class="form-control" value="" required>
					</div>
					<div class="form-group col-6">
						<label for="typeproduct">ประเภทสินค้า</label>

						<select name="typeproduct" id="typeproduct" class="custom-select" value="" required>
							<option value="มือ 1">มือ 1</option>
							<option value="มือ 2">มือ 2</option>
						</select>
					</div>
					<div class="form-group col-6">
						<label for="unit">หน่วยสินค้า</label>
						<input type="text" name="unit" id="unit" class="form-control" value="" required autocomplete="off">
					</div>
					<div class="form-group col-6">
						<label for="price">ราคา</label>
						<input type="text" name="price" id="price" class="form-control" value="" required autocomplete="off">
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

	<script src="./plugins/jquery/jquery.js">
	</script>
	<script>
		$(document).ready(function() {

			$("#addimg").on('submit', (function(e) {
				e.preventDefault();
				$.ajax({
					url: './page/additem/addimg.php',
					type: 'POST', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					dataType: 'json', //หรือ json หรือ xml
					success: function(response) { //ฟังชันที่เรียกออกมา
						console.log(response); //ดูค่าว่าออกมาไหม

						if (response["status"] === true) {
							alert("บันทึกข้อมูลสินค้าสำเร็จแล้ว");
							window.location.href = 'http://172.18.106.100:8888/clr/index.php?page=showitem'
						}

						if (response["status"] === false) {
							alert("บันทึกข้อมูลสินค้าไม่สำเร็จ");
							let code = $("#code").val("");
							let productname = $("#productname").val("");
							let color = $("#color").val("");
							let size = $("#size").val("");
							let typeproduct = $("#typeproduct").val("");
							let unit = $("#unit").val("");
							let price = $("#price").val("");
							let file = $("#file").val("");

						}

					}
				});
			}))
		});
	</script>
