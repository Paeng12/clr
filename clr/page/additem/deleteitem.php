<?php
session_start();
$user = $_SESSION['user_login'];
header('Content-Type: text/html; charset=utf-8');

require "../../db.php";

mysqli_set_charset($conn, "utf8");

$status = $_REQUEST['status'];
$emp = $user['operatorid'];

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
$path = '../../dist/img/item/'; // upload directory


if ($status == 'deleteitem') {

    $id = $_POST['id'];
    //  echo $status;
    $sql = "DELETE FROM additem WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'message' => $conn->error);
    }

    $conn->close();

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>