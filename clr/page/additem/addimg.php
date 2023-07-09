<?php
session_start();
$user = $_SESSION['user_login'];
header('Content-Type: text/html; charset=utf-8');

require "../../db.php";

mysqli_set_charset($conn, "utf8");



$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = '../../dist/img/item/'; // upload directory

if(!empty($_POST['code']) )
{


$code = $_POST['code'];
$productname = $_POST['productname'];
$color = $_POST['color'];
$size = $_POST['size'];
$typeproduct = $_POST['typeproduct'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$emp = $user['operatorid'];
$product = $_POST['product'];

$img = $_FILES['uploadfile']['name'];
$tmp = $_FILES['uploadfile']['tmp_name'];
$final_image = rand(1000,1000000).$img;
// echo $code.'/'.$productname.'/'.$color.'/'.$size.'/'.$typeproduct.'/'.$unit.'/'.$price.'/'.$img;
// echo $emp;
//สร้างตัวแปลเดต่ารูปแบบอาร์เรย์
$data = array(
    'status' => false
);

$sql = "INSERT INTO additem (code, name_product,product, color, size, type_product, unit, picture, price, time_add, emd_add)
VALUES ('$code', '$productname','$product', '$color', '$size', '$typeproduct', '$unit', '$final_image', '$price' , now(), '$emp')";

        if (mysqli_query($conn, $sql)) {
            $data['status']=true;
        } else {
            $data['status']=false;
        }
mysqli_close($conn);
echo json_encode($data);



// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// // can upload same image using rand function

// // check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 

if(move_uploaded_file($tmp,$path)) 
{
    
}

} 

}
?>