<?php 

$servername = "172.18.106.100";
$username = "pe";
$password = "123456";

try {
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $connMain = new PDO("mysql:host=$servername;dbname=cleanroom", $username, $password, $options);
    // set the PDO error mode to exception
    $connMain->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>
