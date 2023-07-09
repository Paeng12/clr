<?php

header('Content-Type: text/html; charset=utf-8');

require "../../db.php";

mysqli_set_charset($conn, "utf8");

$status = $_REQUEST['status'];
if ($status == 'deleteemp') {
    
    $id = $_POST['id'];
    //  echo $status;
    $sql = "DELETE FROM user WHERE id = $id";

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

if ($status == 'edit') {
    if(isset($_POST['id']) && $_POST['id'] > 0){
        $id = $_POST['id'];
        $operatorid = $_POST['operatorid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $department = $_POST['department'];
        $position = $_POST['position'];
        $username = $_POST['username'];
        $password = $_POST['password'];

    
        // Update the data in the database
        $sql = "UPDATE user SET operatorid='$operatorid', fristname='$firstname', lastname='$lastname', department='$department', position='$position', username='$username' , date_update=now() WHERE id=$id";
    
        if ($password != '') {
            $sql = "UPDATE user SET operatorid='$operatorid', fristname='$firstname', lastname='$lastname', department='$department', position='$position', username='$username', date_update=now() ,passwordd='".md5($password)."' WHERE id=$id";
        }
    
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully";
            $data['status']="บันทึกสำเร็จแล้ว";
        } else {
            echo "Error updating data: " . $conn->error;
        }
    
        $conn->close();
    }
}

// Perform the delete operation
?>