<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">ผู้ดูแลระบบ</h3>
		<div class="card-tools">
			<a href="index.php?page=regis" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> เพิ่มพนักงาน</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<table class="table table-hover table-striped">
					<!-- <colgroup>
					<col width="5%">
					<col width="10%">
					<col width="20%">
					<col width="20%">
					<col width="15%">
					<col width="15%">
					<col width="10%">
				</colgroup> -->
					<thead>
						<tr>
							<th>#</th>
							<th>OperatorID</th>
							<th>FirstName LastName</th>
							<th>User Type</th>
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
						$qry = $conn->query("SELECT *,concat(fristname,' ',lastname) as name from `user` where id != '0' order by concat(fristname,' ',lastname) asc ");
						while ($row = $qry->fetch_assoc()) :

						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<!-- <td class="text-center"><img src="" class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar"></td> -->
								<td>
									<p class="m-0 truncate-1"><?php echo $row['operatorid'] ?></p>
								</td>
								<td><?php echo ucwords($row['name']) ?></td>

								<td>
									<p class="m-0"><?php echo ($row['usertype']) ?></p>
								</td>
								<td>
									<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
										Action
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" href="http://172.18.106.100:8888/clr/index.php?page=edit&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item delete_data" href="javascript:void(0)" onclick="myFunction(<?php echo $row['id'] ?>)"><span class="fa fa-trash text-danger"></span> Delete</a>
										<script>
											function myFunction(id) {
												console.log(id);
												if (confirm("แน่ใจหรือไม่ว่าจะลบข้อมูล?")) {
													$.ajax({
														url: "./page/addemployee/deleteemp.php",
														type: "POST",
														data: {
															id: id,
															status: 'deleteemp',
														},
														success: function(response) {
															// Reload the page to reflect the updated data
															window.location.href = 'http://172.18.106.100:8888/clr/index.php?page=showemployee'
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
													url: "./page/addemployee/deleteemp.php",
													type: "POST",
													data: {
														id: id,
														status: 'editemp',

													},
													success: function(response) {
														// Reload the page to reflect the updated data
														// window.location.href = 'http://172.18.106.100:8888/clr/index.php?page=edit'
													}
												});
											}


											// $(document).ready(function(){
											// 	$('.delete_data').click(function(){
											// 		alert("iukyjthrgefsdz");
											// 	})
											// 	// $('.table td,.table th').addClass('py-1 px-2 align-middle')
											// 	// $('.table').dataTable();
											// })
											// function delete_user($id){
											// 	start_loader();
											// 	$.ajax({
											// 		url:_base_url_+"classes/Users.php?f=delete",
											// 		method:"POST",
											// 		data:{id: $id},
											// 		dataType:"json",
											// 		error:err=>{
											// 			console.log(err)
											// 			alert_toast("An error occured.",'error');
											// 			end_loader();
											// 		},
											// 		success:function(resp){
											// 			if(typeof resp== 'object' && resp.status == 'success'){
											// 				location.reload();
											// 			}else{
											// 				alert_toast("An error occured.",'error');
											// 				end_loader();
											// 			}
											// 		}
											// 	})
											// }
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