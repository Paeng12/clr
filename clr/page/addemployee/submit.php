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
    $sql = "SELECT name, surname, department, oeposition FROM employeelist_name WHERE employeeid = '$employee'";

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
} else {

    // รับข้อมูลจากฟอร์ม HTML

    $operatorid = $_REQUEST['operatorid'];
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $department = $_REQUEST['department'];
    $position = $_REQUEST['position'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $type = $_REQUEST['type'];
    // Check if the operatorid already exists
    $sqluser = "SELECT username FROM user WHERE username='$username'";
    $sqlopid = "SELECT operatorid FROM user WHERE operatorid='$operatorid'";
    $resultuser = mysqli_query($conn, $sqluser);
    $resultopid = mysqli_query($conn, $sqlopid);
    if (mysqli_num_rows($resultuser) > 0 || mysqli_num_rows($resultopid) > 0) {
        $data['status']="Operator ID หรือ user ถูกใช้ไปแล้ว";
        // Operator ID already exists
        // echo '<script>alert("Operator ID นี้มีอยู่ในระบบแล้ว"); window.location="index.php?page=regis";</script>';
        // exit;
    } else {
        // Insert the new user record
        $sql = "INSERT INTO user (operatorid, fristname, lastname, department, position, username, passwordd, usertype, last_login, date_added, date_update )
VALUES ('$operatorid', '$firstname', '$lastname', '$department', '$position', '$username', md5('$password'), '$type' , now() , now() , now())";

        if (mysqli_query($conn, $sql)) {
            $data['status']="ลงทะเบียนสำเร็จแล้ว";
        } else {
            $data['status']="ลงทะเบียนไม่สำเร็จ";
        }
    }


echo json_encode($data);
mysqli_close($conn);
}
// เรียกใช้งานสคริปต์ PHP สำหรับดึงข้อมูลจากฐานข้อมูล
// include './page/addemployee/get_employee_data.php';
// เรียกใช้งานสคริปต์ PHP สำหรับการส่งข้อมูลลงฐานข้อมูล
// include './page/addemployee/save_employee_data.php';
?>