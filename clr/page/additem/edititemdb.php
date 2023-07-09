<?php
// $servername = "172.18.106.100";
// $username = "pe";
// $password = "123456";
// $dbname = "cleanroom";
require "../../db.php";
header('Content-Type: text/html; charset=utf-8');

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

mysqli_set_charset($conn, "utf8");

if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $code = $_POST['code'];
  $productname = $_POST['productname'];
  $color = $_POST['color'];
  $size = $_POST['size'];
  $typeproduct = $_POST['typeproduct'];
  $unit = $_POST['unit'];
  $price = $_POST['price'];
  $product = $_POST['product'];
  // Check if file was uploaded
  if(isset($_FILES['uploadfile']) && $_FILES['uploadfile']['name'] != '') {
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $final_image = rand(1000,1000000).$filename ;
    $folder = "../../dist/img/item/".$final_image;
    move_uploaded_file($tempname, $folder);
    
    $gg = array(
      'status' => false
  );
    // Update query with new file
    $update = "UPDATE additem SET code='$code', name_product='$productname',product='$product', color='$color', size='$size', type_product='$typeproduct', unit='$unit', price='$price', picture='$final_image' WHERE id='$id'";
  } else {
    // Update query without new file
    $update = "UPDATE additem SET code='$code', name_product='$productname',product='$product', color='$color', size='$size', type_product='$typeproduct', unit='$unit', price='$price' WHERE id='$id'";
  }

  if (mysqli_query($conn, $update)) {
    // $gg['status'] = true;
    // $gg['message'] = "แก้ไขสำเร็จ";
    header( "location: http://172.18.106.100:8888/clr/index.php?page=showitem" );
    exit(0);
  } else {
    $gg['status'] = false;
    // $gg['message'] = "เกิดข้อผิดพลาดในการแก้ไข";
  }
  
  echo json_encode($gg);
  mysqli_close($conn);
  
}

?>