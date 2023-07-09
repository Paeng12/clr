<?php
header('Content-Type: text/html; charset=utf-8');

require "../../db.php";
mysqli_set_charset($conn, "utf8");

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
$path = '../../dist/img/category/'; // upload directory

$categorydb = $_POST['categorydb'];

$img = $_FILES['uploadfile']['name'];
$tmp = $_FILES['uploadfile']['tmp_name'];
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
$final_image = rand(1000, 1000000) . '.' . $ext;

$data = array('status' => false);

$sql = "INSERT INTO category (category, time, name_pic) VALUES ('$categorydb', now(), '$final_image')";

if (mysqli_query($conn, $sql)) {
    $path = $path . $final_image;
    if (in_array($ext, $valid_extensions) && move_uploaded_file($tmp, $path)) {
      header( "location: http://172.18.106.100:8888/clr/index.php?page=showcategory" );
      exit(0);
    } else {
        $data['status'] = false;
    }
} else {
    $data['status'] = false;
}

mysqli_close($conn);
echo json_encode($data);
?>



