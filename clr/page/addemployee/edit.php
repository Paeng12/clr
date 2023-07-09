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
        <label for="operatorid">รหัสพนักงาน</label>
        <input type="text" name="operatorid" id="operatorid" class="form-control" value="<?php echo isset($meta['operatorid']) ? $meta['operatorid'] : '' ?>" required>
      </div>
      <div class="form-group col-6">
        <label for="firstname">ชื่อ</label>
        <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['fristname']) ? $meta['fristname'] : '' ?>" required>
      </div>
      <div class="form-group col-6">
        <label for="lastname">นามสกุล</label>
        <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname'] : '' ?>" required>
      </div>
      <div class="form-group col-6">
        <label for="department">แผนก</label>
        <input type="text" name="department" id="department" class="form-control" value="<?php echo isset($meta['department']) ? $meta['department'] : '' ?> " required>
      </div>
      <div class="form-group col-6">
        <label for="position">ตำแหน่ง</label>
        <input type="text" name="position" id="position" class="form-control" value="<?php echo isset($meta['position']) ? $meta['position'] : '' ?>" required>
      </div>
      <div class="form-group col-6">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>" required autocomplete="off">
      </div>
      <div class="form-group col-6">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "" : 'required' ?>>
        <?php if (isset($_GET['id'])) : ?>
          <small class="text-info"><i>กรุณาปล่อยว่างไว้ถ้าคุณไม่ต้องการเปลี่ยน password</i></small>
        <?php endif; ?>
      </div>


    </div>
  </div>
  <div class="card-footer">
    <div class="col-md-12">
      <div class="row">
        <botton class="btn btn-sm btn-primary mr-2" name="Submit" onclick="update()">แก้ไขข้อมูล</botton>
        <!-- <button class="btn btn-sm btn-primary mr-2" form="manage-user">Save</button> -->
        <!-- <a class="btn btn-sm btn-secondary" href="">Cancel</a> -->
      </div>
    </div>
  </div>
</div>

<script src="./plugins/jquery/jquery.js">
</script>
<script>
  function update() {
    let id = $("#id").val();
    let operatorid = $("#operatorid").val();
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let department = $("#department").val();
    let position = $("#position").val();
    let username = $("#username").val();
    let password = $("#password").val();


    $.ajax({
      url: './page/addemployee/deleteemp.php', // Change to the PHP file that will update the data
      type: 'POST',
      data: {
        status: 'edit',
        id: id,
        operatorid: operatorid,
        firstname: firstname,
        lastname: lastname,
        department: department,
        position: position,
        username: username,
        password: password

      },
      success: function(response) {
        // Handle the response from the PHP file
        console.log(response);
        console.log(response);
        alert('แก้ไขข้อมูลสำเร็จแล้ว');
        window.location.href = 'http://172.18.106.100:8888/clr/index.php?page=showemployee'
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(xhr);
        alert('แก้ไขข้อมูลไม่สำเร็จแล้ว');
      }
    });
  };
</script>
