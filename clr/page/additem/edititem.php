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
  // Get the additem record by ID
  $additem = $conn->query("SELECT * FROM additem where id ='{$_GET['id']}'");
  if ($additem->num_rows > 0) {
    $meta = $additem->fetch_assoc();
    // Check if the product_name of the additem exists as an ID in the category table
    $category = $conn->query("SELECT * FROM category where id ='{$meta['name_product']}'");
    if ($category->num_rows > 0) {
      $category_data = $category->fetch_assoc();
      $meta['category'] = $category_data['category'];
    }
  }
}

?>


<div class="card card-outline card-primary">
  <div class="card-body">
    <div class="container-fluid">
      <form method="POST" action="./page/additem/edititemdb.php" enctype="multipart/form-data" id="edititem">
        <input type="hidden" name="id" id="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
        <!-- <input type="hidden" name="status" id="status" value="edititem"> -->
        <div class="form-group col-6">
          <label for="code">Code</label>
          <input type="text" name="code" id="code" class="form-control" value="<?php echo isset($meta['code']) ? $meta['code'] : '' ?>" required>
        </div>
        <div class="form-group col-6">
          <label for="productname">หมวดหมู่</label>

          <select name="productname" id="productname" class="custom-select" required>
            <?php

            $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
            mysqli_set_charset($db, "utf8");
            $result = mysqli_query($db, "SELECT id, category FROM category");

            $selectedCategory = isset($meta['category']) ? $meta['category'] : '';

            while ($row = mysqli_fetch_assoc($result)) {
              $categoryId = $row['id'];
              $categoryName = $row['category'];

              // Check if the category is the same as the selected category
              if ($categoryName == $selectedCategory) {
                echo '<option value="' . $categoryId . '" selected>' . $categoryName . '</option>';
              } else {
                echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
              }
            }

            ?>
          </select>


        </div>
        <div class="form-group col-6">
          <label for="product">ชื่อสินค้า</label>
          <input type="text" name="product" id="color" class="form-control" value="<?php echo isset($meta['product']) ? $meta['product'] : '' ?>" required>
        </div>
        <div class="form-group col-6">
          <label for="color">สี</label>
          <select name="color" id="color" class="custom-select" value="" required>
            <?php
            $colors = array(
              'เขียว(green)',
              'เหลือง(yellow)',
              'แดง(red)',
              'ขาว(white)',
              'ฟ้า(blue)'
            );
            foreach ($colors as $color) {
              $selected = ($color == $meta['color']) ? 'selected' : '';
              echo "<option value=\"$color\" $selected>$color</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group col-6">
          <label for="size">ไซส์</label>
          <input type="text" name="size" id="size" class="form-control" value="<?php echo isset($meta['size']) ? $meta['size'] : '' ?>" required>
        </div>
        <div class="form-group col-6">
          <label for="typeproduct">ประเภทสินค้า</label>

          <select name="typeproduct" id="typeproduct" class="custom-select" required>
            <option value="">-- เลือกประเภทสินค้า --</option>
            <?php
            $selectedTypeProduct = isset($meta['type_product']) ? $meta['type_product'] : '';
            if ($selectedTypeProduct == 'มือ 1') {
              echo '<option value="มือ 1" selected>มือ 1</option>';
              echo '<option value="มือ 2">มือ 2</option>';
            } else if ($selectedTypeProduct == 'มือ 2') {
              echo '<option value="มือ 1">มือ 1</option>';
              echo '<option value="มือ 2" selected>มือ 2</option>';
            } else {
              echo '<option value="มือ 1">มือ 1</option>';
              echo '<option value="มือ 2">มือ 2</option>';
            }
            ?>
          </select>
        </div>

        <div class="form-group col-6">
          <label for="unit">หน่วยสินค้า</label>
          <input type="text" name="unit" id="unit" class="form-control" value="<?php echo isset($meta['unit']) ? $meta['unit'] : '' ?>" required autocomplete="off">
        </div>
        <div class="form-group col-6">
          <label for="price">ราคา</label>
          <input type="text" name="price" id="price" class="form-control" value="<?php echo isset($meta['price']) ? $meta['price'] : '' ?>" required autocomplete="off">
        </div>
        <div class="form-group col-6">
          <label for="uploadfile">เพิ่มรูปภาพ</label>
          <input class="form-control" type="file" name="uploadfile" value="" id="uploadfile" <?php echo isset($meta['id']) ? "" : 'required' ?> />
          <?php if (isset($_GET['id'])) : ?>
            <small class="text-info"><i>กรุณาปล่อยว่างไว้ถ้าคุณไม่ต้องการเปลี่ยนรูป</i></small>
          <?php endif; ?>
        </div>
        <div class="form-group col-6"><button class="btn btn-primary" type="submit" name="edit">Edit</button></div>
      </form>




      <!-- <script src="./plugins/jquery/jquery.js">
</script> -->
      <script>
        $(document).ready(function() {

          $("#edititem").on('submit', (function(e) {
            e.preventDefault();
            // alert ("rtghyf");
            $.ajax({
              url: './page/additem/edititemdb.php',
              type: 'POST', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: 'json', //หรือ json หรือ xml
              success: function(response) {
                if (response.status) {
                  alert(response.message);
                  window.location.href = response.redirect;
                } else {
                  alert("การแก้ไขไม่สำเร็จ");
                }
              }




            });
          }))
        });
      </script>
    </div>
  </div>
</div>