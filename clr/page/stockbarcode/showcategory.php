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
                            <th class="text-center">ดูสินค้า</th>
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
                                    <a href="http://172.18.106.100:8888/clr/index.php?page=addstock&id=<?php echo $row['id'] ?>" class="btn btn-flat btn-primary btn-sm">
                                        <span class="fa fa-edit text-light"></span> ดูสินค้า
                                    </a>

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