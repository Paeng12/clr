<?php
session_start(); // เปิดใช้งาน session
if (isset($_SESSION['user_login'])) { // ถ้าเข้าระบบอยู่
    header("location: http://172.18.106.100:8888/clr/index.php?page=regis"); // redirect ไปยังหน้า index.php
    exit;
}

require "../../db.php";
mysqli_set_charset($conn, "utf8");
$objCon = $conn; // เชื่อมต่อฐานข้อมูล

$username = mysqli_real_escape_string($objCon, $_POST['username']); // รับค่า username
$password = mysqli_real_escape_string($objCon, $_POST['password']); // รับค่า password

$strSQL = "SELECT * FROM user WHERE username = '$username' AND passwordd = md5('$password')";
$objQuery = mysqli_query($objCon, $strSQL);
$row = mysqli_num_rows($objQuery);
if($row) {
    $res = mysqli_fetch_assoc($objQuery);
    $_SESSION['user_login'] = array(
        'id' => $res['id'],
        'fristname' => $res['fristname'],
        'lastname' => $res['lastname'],
        'usertype' => $res['usertype'],
        'operatorid' => $res['operatorid']
    );
    echo '<script>alert("ยินดีต้อนรับคุณ ', $res['fristname'],'");window.location="http://172.18.106.100:8888/clr/index.php?page=report";</script>';
} else {
    echo '<script>alert("username หรือ password ไม่ถูกต้อง!!");window.location="http://172.18.106.100:8888/clr/page/login/login.php";</script>';
}
?>