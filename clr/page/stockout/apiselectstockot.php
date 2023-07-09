<?php
header('Content-Type: text/html; charset=utf-8');

require "../../db.php";

mysqli_set_charset($conn, "utf8");

if (isset($_POST['request'])) {
  $request = $_POST['request'];

  // Query additem table to retrieve color for the specified name_product
  $result = mysqli_query($conn, "SELECT color FROM additem WHERE name_product = $request GROUP BY color");

  // Check if query was successful
  if ($result) {
    $colors = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $colors[] = $row['color'];
    }
    // Send JSON response with status set to "success" and color values
    echo json_encode(array(
      'colors' => $colors
    ));
  } else {
    // Send JSON response with status set to "error"
    echo json_encode(array(
      'status' => 'error'
    ));
  }
}


if (isset($_POST['color'])) {
  $color = $_POST['color'];

  // Query additem table to retrieve color for the specified name_product
  $result = mysqli_query($conn, "SELECT size FROM additem WHERE name_product = $color GROUP BY size");

  // Check if query was successful
  if ($result) {
    $sizes = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $sizes[] = $row['size'];
    }
    // Send JSON response with status set to "success" and size values
    echo json_encode(array(
      'sizes' => $sizes
    ));
  } else {
    // Send JSON response with status set to "error"
    echo json_encode(array(
      'status' => 'error'
    ));
  }
}
?>