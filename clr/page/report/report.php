<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">stock balance</h3>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<table class="table table-hover table-striped" id="stock">
					<thead>
						<tr>
							<th>#</th>
							<th>code</th>
							<th>รูปสินค้า</th>
							<th>ชื่อสินค้า</th>
							<th>ไซส์</th>
							<th>สี</th>
							<th>ประเภทสินค้า</th>
							<th>จำนวนในคลัง</th>
			
						</tr>
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
						// Get the id parameter from the URL
						

						// Build the SQL query with a WHERE clause to filter by id
						$qry = $conn->query("SELECT additem.id,
    additem.picture,
    additem.code,
    additem.name_product,
    additem.product,
    additem.size,
    additem.color,
    additem.type_product,
    COUNT(CASE WHEN add_product.status = 1 THEN add_product.id_additem END) as count,
    category.category
    FROM additem
    LEFT JOIN add_product ON additem.id = add_product.id_additem
    LEFT JOIN category ON additem.name_product = category.id
    WHERE additem.name_product
    GROUP BY additem.id,
    additem.picture,
    additem.code,
    additem.name_product,
    additem.product,
    additem.size,
    additem.color,
    additem.type_product,
    category.category");
						while ($row = $qry->fetch_assoc()) :
						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<!-- <td class="text-center"><img src="" class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar"></td> -->
								<td>
									<p class="m-0"><?php echo ($row['code']) ?></p>
								</td>
								<td><img src="./dist/img/item/<?= $row['picture'] ?>" width="80" height="80"></td>

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
									<p class="m-0"><?php echo ($row['count']) ?></p>
								</td>
								
							</tr>
						<?php endwhile; ?>
					</tbody>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>