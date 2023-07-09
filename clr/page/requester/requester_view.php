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
    $stock_out = $conn->query("SELECT * FROM stock_out where id ='{$_GET['id']}'");
    foreach ($stock_out->fetch_array() as $k => $v) {
        $meta[$k] = $v;
    }
}
?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">การร้องขอ</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <input type="hidden" name="id" id="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
            <div class="form-group col-6">
                <label for="operatorid">รหัสพนักงาน</label>
                <input type="text" name="operatorid" id="operatorid" class="form-control" value="<?php echo isset($meta['operatorid']) ? $meta['operatorid'] : '' ?>" readonly required>
            </div>
            <div class="form-group col-6">
                <label for="firstname">ชื่อ</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname'] : '' ?>" readonly required>
            </div>
            <div class="form-group col-6">
                <label for="lastname">นามสกุล</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname'] : '' ?>" readonly required>
            </div>
            <div class="form-group col-6">
                <label for="department">แผนก</label>
                <input type="text" name="department" id="department" class="form-control" value="<?php echo isset($meta['department']) ? $meta['department'] : '' ?>" readonly required>
            </div>
            <div class="form-group col-6">
                <label for="position">ตำแหน่ง</label>
                <input type="text" name="position" id="position" class="form-control" value="<?php echo isset($meta['position']) ? $meta['position'] : '' ?>" readonly required>
            </div>
            <div class="form-group col-6">
                <label for="position">คำร้องขอ</label>
                <input type="text" name="position" id="position" class="form-control" value="<?php echo isset($meta['position']) ? $meta['position'] : '' ?>" readonly required>
            </div>

        </div>
    </div>
</div>