<?php
session_start();
$user = $_SESSION['user_login'];
header('Content-Type: text/html; charset=utf-8');

require "../../db.php";

mysqli_set_charset($conn, "utf8");
$status = $_REQUEST['status'];

if ($status == 'delete') {
    $id = $_POST['id'];
    //  echo $status;
    $sql = "DELETE FROM add_product WHERE id = $id";

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