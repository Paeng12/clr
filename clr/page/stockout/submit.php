<?php

header('Content-Type: text/html; charset=utf-8');

require "../../db.php";

mysqli_set_charset($conn, "utf8");


$status = $_REQUEST['status'];

// echo $operatorid;
// echo $status;
if ($status == 'getdata') {
    //  echo $status;

    $employee = $_REQUEST['operatorid'];
    // $employee = $_POST['operatorid'];
    // ดึงข้อมูลจากฐานข้อมูล
    $sql = "SELECT name, surname, department, oeposition,shift   FROM employeelist_name WHERE employeeid = '$employee'";

    $result = mysqli_query($conn, $sql);

    //สร้างตัวแปลเดต่ารูปแบบอาร์เรย์
    $data = array();

    //var_dump($result);
    // ตรวจสอบผลลัพธ์การค้นหา
    foreach ($result as $row) {
        //ดึงตัวแปลเดต้าarray ไว้ใน โร ข้อมูลที่ได้เป็นของ php  แต่เวลาใช้ต้องแปลงข้อมูลก่อน
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);
} 
if ($status == 'save') {
    // รับข้อมูลจากฟอร์ม HTML

    $operatorid = $_REQUEST['operatorid'];
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $department = $_REQUEST['department'];
    $position = $_REQUEST['position'];
    $shift = $_REQUEST['shift'];
    $cause = $_REQUEST['cause'];
    $input = $_REQUEST['input'];

    $request = $_REQUEST['request'];
    $color = $_REQUEST['color'];
    $size = $_REQUEST['size'];

    $request2 = $_REQUEST['request2'];
    $color2 = $_REQUEST['color2'];
    $size2 = $_REQUEST['size2'];

    $request3 = $_REQUEST['request3'];
    $color3 = $_REQUEST['color3'];
    $size3 = $_REQUEST['size3'];

    $request4 = $_REQUEST['request4'];
    $color4 = $_REQUEST['color4'];
    $size4 = $_REQUEST['size4'];

    $request5 = $_REQUEST['request5'];
    $color5 = $_REQUEST['color5'];
    $size5 = $_REQUEST['size5'];

    $request6 = $_REQUEST['request6'];
    $color6 = $_REQUEST['color6'];
    $size6 = $_REQUEST['size6'];

    $request7 = $_REQUEST['request7'];
    $color7 = $_REQUEST['color7'];
    $size7 = $_REQUEST['size7'];

    $request8 = $_REQUEST['request8'];
    $color8 = $_REQUEST['color8'];
    $size8 = $_REQUEST['size8'];
   
    $sql = "INSERT INTO stock_out (operatorid, firstname, lastname, department, position, shift, cause, inputetc, request1, size1, color1, request2, size2, color2, request3, size3, color3, request4, size4, color4, request5, size5, color5, request6, size6, color6, request7, size7, color7, request8, size8, color8, request_date, status_ap)
VALUES ($operatorid, '$firstname', '$lastname', '$department', '$position', '$shift', '$cause','$input','$request','$size','$color','$request2','$size2','$color2','$request3','$size3','$color3','$request4','$size4','$color4','$request5','$size5','$color5','$request6','$size6','$color6','$request7','$size7','$color7','$request8','$size8','$color8',  now(),1 )";

        if (mysqli_query($conn, $sql)) {
            $data['status']="การร้องขอสำเร็จแล้ว";
        } else {
            $data['status']="การร้องขอไม่สำเร็จ";
        }
echo json_encode($data);
mysqli_close($conn);   
 }
