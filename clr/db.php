<?php 

$servername = "172.18.106.100";
$username = "pe";
$password = "123456";
$dbname = "cleanroom";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
}
?>