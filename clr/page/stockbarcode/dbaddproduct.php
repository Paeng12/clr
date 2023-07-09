<?php
session_start();
$user = $_SESSION['user_login'];

require "../../dbaddporduct.php";


$iditem = $_REQUEST['iditem'];
$scan = $_REQUEST['scan'];
$emp = $user['operatorid'];

// Select the product column from additem where id = $iditem
$sql_product = "SELECT product, name_product, code, size, color, type_product FROM additem WHERE id = $iditem";
$stmt_product = $connMain->prepare($sql_product);
$stmt_product->execute();
$product_row = $stmt_product->fetch(PDO::FETCH_ASSOC);

$name_product = $product_row['product'];
$category_product = $product_row['name_product'];
$code = $product_row['code'];
$size = $product_row['size'];
$color = $product_row['color'];
$type_product = $product_row['type_product'];

// Construct an SQL query to check if the record already exists
$sql_check = "SELECT * FROM add_product WHERE barcode = :barcode AND status = 1";
$stmt_check = $connMain->prepare($sql_check);
$stmt_check->bindParam(':barcode', $scan);
$stmt_check->execute();
$existing_record = $stmt_check->fetch(PDO::FETCH_ASSOC);

// If no matching records were found, insert the new record
if (!$existing_record) {
    // Construct an SQL query to insert a new record into the add_product table
    $sql_insert = "INSERT INTO add_product (id_additem, name_product, category_product, code, barcode, date_time_in, date_time_out, status, boxnumber, operatorid , size, color, type_product)
                   VALUES (:id_additem, :name_product, :category_product, :code, :barcode, now(), now(), 1, 'ว่าง', :operatorid , :size, :color, :type_product)";
    $stmt_insert = $connMain->prepare($sql_insert);

    // Bind the parameters to the statement
    $stmt_insert->bindParam(':id_additem', $iditem);
    $stmt_insert->bindParam(':name_product', $name_product);
    $stmt_insert->bindParam(':category_product', $category_product);
    $stmt_insert->bindParam(':code', $code);
    $stmt_insert->bindParam(':barcode', $scan);
    $stmt_insert->bindParam(':size', $size);
    $stmt_insert->bindParam(':operatorid', $emp);
    $stmt_insert->bindParam(':color', $color);
    $stmt_insert->bindParam(':type_product', $type_product);

    // Execute the SQL query
    $stmt_insert->execute();
}

// Select the 10 most recent records from the add_product table where id_additem matches $iditem
$sql_select = "SELECT * FROM add_product WHERE id_additem = $iditem ORDER BY id DESC";
$stmt_select = $connMain->prepare($sql_select);
$stmt_select->execute();
$rows = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

// Build an array of records
$data = array();
foreach ($rows as $row) {
    $data[] = $row;
}

// Send the array as a JSON response
echo json_encode($data);
?>