<?php
$servername = "172.18.106.100";
$username = "pe";
$password = "123456";
$dbname = "cleanroom";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8");

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $user = $conn->query("SELECT * FROM user where id ='{$_GET['id']}'");
    foreach ($user->fetch_array() as $k => $v) {
        $meta[$k] = $v;
    }
}
?>


<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="container-fluid">
            <input type="hidden" name="id" id="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
            <div class="form-group col-6">
                <p for="operatorid">รหัสพนักงาน: <strong><?php echo isset($meta['operatorid']) ? '<span style="font-weight: bold;">' . $meta['operatorid'] . '</span>' : '' ?></strong></p>
            </div>
            <div class="form-group col-6">
                <p for="operatorid">ชื่อ: <strong><?php echo isset($meta['fristname']) ? '<span style="font-weight: bold;">' . $meta['fristname'] . '</span>' : '' ?></strong></p>
            </div>
            <div class="form-group col-6">
                <p for="operatorid">นามสกุล: <strong><?php echo isset($meta['lastname']) ? '<span style="font-weight: bold;">' . $meta['lastname'] . '</span>' : '' ?></strong></p>
            </div>
            <div class="form-group col-6">
                <p for="operatorid">แผนก: <strong><?php echo isset($meta['department']) ? '<span style="font-weight: bold;">' . $meta['department'] . '</span>' : '' ?></strong></p>
            </div>
            <div class="form-group col-6">
                <p for="operatorid">ตำแหน่ง: <strong><?php echo isset($meta['position']) ? '<span style="font-weight: bold;">' . $meta['position'] . '</span>' : '' ?></strong></p>

            </div>
        </div>
    </div>
</div>