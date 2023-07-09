<?php 
$a = $_REQUEST['a'];
$b = $_REQUEST['b'];

echo $a+$b;
session_start();
session_destroy(); // ลบ session ทั้งหมด
// header("location: http://172.18.106.100:8888/clr/page/login/login.php"); // redirect ไปยังหน้า login.php
