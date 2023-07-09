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
                            <th class="text-center">ลำดับ</th>
                            <th class="text-center">วันที่ขอเบิก</th>
                            <th class="text-center">ชื่อ-นามสกุล</th>
                            <th class="text-center">เหตุผลการเบิก</th>
                            <th class="text-center">สถานะ</th>
                            <th class="text-center">เช็คสถานะ</th>
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
                        $qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name from `stock_out` where id != '0' order by concat(firstname,' ',lastname) asc ");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <!-- <td class="text-center"><img src="" class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar"></td> -->
                                <td>
                                    <p class="m-0 truncate-1"><?php echo $row['request_date'] ?></p>
                                </td>

                                <td>
                                    <p class="m-0"><?php echo ($row['name']) ?></p>
                                </td>
                                <td>
                                    <p class="m-0"><?php echo ($row['cause']) ?></p>
                                </td>
                                <td>
                                    <?php
                                    $status_ap = $row['status_ap'];

                                    if ($status_ap == 1) {
                                        $message = "รออนุมัติ";
                                        $label_color = "bg-success text-white";
                                    } elseif ($status_ap == 2) {
                                        $message = "รอผู้ขอมารับของ";
                                        $label_color = "bg-warning text-white";
                                    } elseif ($status_ap == 3) {
                                        $message = "ไม่อนุมัติการขอ";
                                        $label_color = "bg-danger text-white";
                                    } elseif ($status_ap == 0) {
                                        $message = "รับของแล้ว";
                                        $label_color = "bg-secondary text-white";
                                    } elseif ($status_ap == 4) {
                                        $message = "ผู้ขอยกเลิก";
                                        $label_color = "bg-info text-white";
                                    }

                                    ?>

                                    <!-- Display the message and label with the appropriate color -->
                                    <div class="text-center">
                                        <div class="label <?php echo $label_color; ?>" style="border-radius: 5px;"><?php echo $message; ?></div>
                                    </div>
                                </td>
                                <td class="text-center">
                                <button type="button" class="btn btn-outline-primary" style="font-size: 15px; padding: 0.1rem;">เช็คสถานะ</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>