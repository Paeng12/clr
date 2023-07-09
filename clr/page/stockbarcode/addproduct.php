<?php
$servername = "172.18.106.100";
$username = "pe";
$password = "123456";
$dbname = "cleanroom";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8");

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $user = $conn->query("SELECT * FROM additem where id ='{$_GET['id']}'");
    foreach ($user->fetch_array() as $k => $v) {
        $meta[$k] = $v;
    }
}
?>

<style>
    .m-0 {
        font-size: 13px;
    }

    .bar{
        font-size: 30px;
    }

    .center-btn {
        display: block;
        margin: 0 auto;
    }

    .name {
        font-size: 18px;
    }

    span.color-blue {
        color: blue;
    }

    span.color-white {
        color: white;
    }

    span.color-red {
        color: red;
    }

    span.color-green {
        color: green;
    }

    span.color-yellow {
        color: yellow;
    }

    span.color-default {
        color: black;
    }
</style>

<div class="card card-outline card-primary">
    <div class="card-header">
        <input type="hidden" name="id" id="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
        <label class="name" for="name" value=""><?php
                                                $color = $meta['color'];
                                                switch ($color) {
                                                    case 'ฟ้า':
                                                        $text_color_class = 'color-blue';
                                                        break;
                                                    case 'แดง':
                                                        $text_color_class = 'color-red';
                                                        break;
                                                    case 'เขียว':
                                                        $text_color_class = 'color-green';
                                                        break;
                                                    case 'เหลือง':
                                                        $text_color_class = 'color-yellow';
                                                        break;
                                                    default:
                                                        $text_color_class = 'color-default';
                                                        break;
                                                }
                                                echo "ชื่อสินค้า: " . $meta['product'] . "      " . "ไซส์: " . $meta['size'] . "      " . "สี: <span class='$text_color_class'>" . $color . "</span>" . "      ". "สินค้า: " . $meta['type_product'];
                                                ?></label>
    </div>
    <div class="card-body">
        <div class="container-fluid">

            <div class="container text-center">
                <div class="col-12">
                    <label for="bar"  class="bar">กรุณาแสกนบาร์โค้ด</label>

                </div>
                <div class="row">
                    <div class="col align-self-start">
                    </div>
                    <div class="col align-self-center">
                        <div class="form-group col-12">
                            <input type="text" name="barcode" id="barcode" class="form-control" value="" style="width: 400px; height: 80px; font-size: 40px;" onkeydown="handleKeyDown(event)" required>
                        </div>
                    </div>
                    <div class="col align-self-end">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="card card-outline card-primary">
    <div class="card-header">
        <div class="full-container">
            <div class="col-12">
                <label class="name">รายละเอียดสินค้า</label>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-hover table-striped" id="taa">

                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">barcode</th>
                        <th class="text-center">ชื่อสินค้า</th>
                        <th class="text-center">วันที่และเวลา</th>
                        <th class="text-center">สถานะสินค้า</th>
                        <th class="text-center">ผู้เพิ่มสินค้า</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $servername = "172.18.106.100";
                    $username = "pe";
                    $password = "123456";
                    $dbname = "cleanroom";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } else {
                        // echo "dwefrgthyju";
                    }

                    mysqli_set_charset($conn, "utf8");

                    $i = 1;
                    $qry = $conn->query("SELECT * from `add_product` where id != '0' ORDER BY id DESC");
                    while ($row = $qry->fetch_assoc()) :

                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td>
                                <p class="m-0 truncate-1"><?php echo $row['barcode'] ?></p>
                            </td>
                            <td class="text-center">
                                <p class="m-0 truncate-1"><?php echo $row['name_product'] ?></p>
                            </td>
                            <td class="text-center">
                                <p class="m-0 truncate-1"><?php echo $row['date_time_in'] ?></p>
                            </td>
                            <td class="text-center">
                                <p class="m-0 truncate-1"><?php $status = $row['status'];
                                                            if ($status == 1) {
                                                                echo "อยู่ในคลัง";
                                                            } else if ($status == 0) {
                                                                echo "ออกจากคลัง";
                                                            } else {
                                                                echo "ไม่ทราบสถานะ";
                                                            }
                                                            ?></p>
                            </td>
                            <td class="text-center">
                                <p class="m-0 truncate-1"><?php echo $row['operatorid'] ?></p>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm fa fa-window-close" href="javascript:void(0)" onclick= "deleteProduct(<?php echo $row['id'] ?>)">ลบ</button>

                                <script>
                                    function deleteProduct(id) {
                                        Swal.fire({
                                            title: 'คุณแน่ใจไหมว่าจะลบ?',
                                            text: "ชัวร์ใช่ไหม",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'ใช่, ลบเลย!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Send the delete request to the server using AJAX
                                                $.ajax({
                                                    url: './page/stockbarcode/dbdeleteproduct.php',
                                                    type: 'POST',
                                                    data: {
                                                        id: id,
                                                        status: "delete"
                                                    },
                                                    success: function(response) {

                                                        // Show a success message using SweetAlert2
                                                        Swal.fire(
                                                            'ลบแล้ว!',
                                                            'Your file has been deleted.',
                                                            'สำเร็จ'
                                                        ).then((result) => {
                                                            // Reload the table to show the updated data
                                                            $('#table-body').load('./page/stockbarcode/dbselectproduct.php');
                                                        });
                                                        location.reload();
                                                    },
                                                    error: function(xhr, status, error) {
                                                        console.log(xhr.responseText);
                                                        // Show an error message using SweetAlert2
                                                        Swal.fire(
                                                            'ไม่สำเร็จ!',
                                                            'An error occurred while deleting the file.',
                                                            'error'
                                                        );
                                                    }
                                                });
                                            }
                                        });
                                    }
                                </script>
        </div>
        </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
    </table>
    </div>
</div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="./plugins/jquery/jquery.js"></script>

<script>
    function handleKeyDown(event) {
        if (event.key === "Enter") { // Check if the key pressed was Enter
            // handleBarcodeInput(); // Call the function that handles barcode input
            let iditem = $("#id").val();
            let barcode = $("#barcode").val();
            console.log(barcode);
            // If it is, assign the value of the barcode to a variable called scan
            let scan = barcode;
            console.log(`The value of scan is ${scan}`);
            $.ajax({
                url: './page/stockbarcode/dbaddproduct.php', // Change to the PHP file that will update the data
                type: 'POST',
                data: {
                    iditem: iditem,
                    scan: scan,


                },
                success: function(data) { //ฟังชันที่เรียกออกมา
                    location.reload();
                }

            });
        }

        // let iditem = $("#id").val();
        // let barcode = $("#barcode").val();
        // let barcodee = $("#barcode").val();

        // // Get the value of the barcode input field
        // // const barcode = $("#barcode").val();

        // // Check if the length of the barcode is more than 7 characters
        // if (barcode.length > 7) {
        //     // If it is, assign the value of the barcode to a variable called scan
        //     let scan = barcodee;
        //     console.log(`The value of scan is ${scan}`);
        //     $.ajax({
        //         url: './page/stockbarcode/dbaddproduct.php', // Change to the PHP file that will update the data
        //         type: 'POST',
        //         data: {
        //             iditem: iditem,
        //             scan: scan,


        //         },
        //         success: function(data) { //ฟังชันที่เรียกออกมา
        //             var tableData = "";
        //             $.each(JSON.parse(data), function(index, value) {
        //                 tableData += "<tr>";
        //                 tableData += "<td>" + (index + 1) + "</td>";
        //                 tableData += "<td>" + value.barcode + "</td>";
        //                 tableData += "<td>" + value.name_product + "</td>";
        //                 tableData += "<td>" + value.date_time_in + "</td>";

        //                 // Check the value of status and show appropriate message
        //                 if (value.status == 1) {
        //                     tableData += "<td>สินค้าอยู่ในคลัง</td>";
        //                 } else if (value.status == 0) {
        //                     tableData += "<td>นำจ่ายแล้ว</td>";
        //                 } else {
        //                     tableData += "<td></td>"; // if status is neither 0 nor 1, leave the cell empty
        //                 }

        //                 tableData += "<td>" + value.operatorid + "</td>";
        //                 tableData += "<td><button class='btn btn-danger btn-sm' onclick='deleteProduct(" + value.id + ")'>Delete</button></td>";
        //                 tableData += "</tr>";
        //             });
        //             $('#table-body').html(tableData);
        //             $("#barcode").val("")


        //         }

        //     });
        // } else {
        //     // If it is not, do nothing
        //     console.log("The barcode is not more than 7 characters");
        // }
    };

    // function handleBarcodeInput() {
    //     let iditem = $("#id").val();
    //     let barcode = $("#barcode").val();
    //     let barcodee = $("#barcode").val();

    //     // Get the value of the barcode input field
    //     // const barcode = $("#barcode").val();

    //     // Check if the length of the barcode is more than 7 characters
    //     if (barcode.length > 7) {
    //         // If it is, assign the value of the barcode to a variable called scan
    //         let scan = barcodee;
    //         console.log(`The value of scan is ${scan}`);
    //         $.ajax({
    //             url: './page/stockbarcode/dbaddproduct.php', // Change to the PHP file that will update the data
    //             type: 'POST',
    //             data: {
    //                 iditem: iditem,
    //                 scan: scan,


    //             },
    //             success: function(data) { //ฟังชันที่เรียกออกมา
    //                 var tableData = "";
    //                 $.each(JSON.parse(data), function(index, value) {
    //                     tableData += "<tr>";
    //                     tableData += "<td>" + (index + 1) + "</td>";
    //                     tableData += "<td>" + value.barcode + "</td>";
    //                     tableData += "<td>" + value.name_product + "</td>";
    //                     tableData += "<td>" + value.date_time_in + "</td>";

    //                     // Check the value of status and show appropriate message
    //                     if (value.status == 1) {
    //                         tableData += "<td>สินค้าอยู่ในคลัง</td>";
    //                     } else if (value.status == 0) {
    //                         tableData += "<td>นำจ่ายแล้ว</td>";
    //                     } else {
    //                         tableData += "<td></td>"; // if status is neither 0 nor 1, leave the cell empty
    //                     }

    //                     tableData += "<td>" + value.operatorid + "</td>";
    //                     tableData += "<td><button class='btn btn-danger btn-sm' onclick='deleteProduct(" + value.id + ")'>Delete</button></td>";
    //                     tableData += "</tr>";
    //                 });
    //                 $('#table-body').html(tableData);
    //                 $("#barcode").val("")


    //             }

    //         });
    //     } else {
    //         // If it is not, do nothing
    //         console.log("The barcode is not more than 7 characters");
    //     }
    // };

    // function deleteProduct(id) {
    //     Swal.fire({
    //         title: 'คุณแน่ใจไหมว่าจะลบ?',
    //         text: "ชัวร์ใช่ไหม",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'ใช่, ลบเลย!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             // Send the delete request to the server using AJAX
    //             $.ajax({
    //                 url: './page/stockbarcode/dbdeleteproduct.php',
    //                 type: 'POST',
    //                 data: {
    //                     id: id,
    //                     status: "delete"
    //                 },
    //                 success: function(response) {

    //                     // Show a success message using SweetAlert2
    //                     Swal.fire(
    //                         'ลบแล้ว!',
    //                         'Your file has been deleted.',
    //                         'สำเร็จ'
    //                     ).then((result) => {
    //                         // Reload the table to show the updated data
    //                         $('#table-body').load('./page/stockbarcode/dbselectproduct.php');
    //                     });
    //                     location.reload();
    //                 },
    //                 error: function(xhr, status, error) {
    //                     console.log(xhr.responseText);
    //                     // Show an error message using SweetAlert2
    //                     Swal.fire(
    //                         'ไม่สำเร็จ!',
    //                         'An error occurred while deleting the file.',
    //                         'error'
    //                     );
    //                 }
    //             });
    //         }
    //     });
    // }
</script>