<?php
session_start();
if (!isset($_SESSION['user_login'])) { // ถ้าไม่ได้เข้าระบบอยู่
  header("location: http://172.18.106.100:8888/clr/page/login/login.php"); // redirect ไปยังหน้า login.php
  exit;
}

$user = $_SESSION['user_login'];
?>

<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CLEANROOM</title>


  <!-- Google Font: Source Sans Pro
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<!-- <body class="hold-transition sidebar-mini layout-fixed" onmousemove="mousemove(event)"> -->

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/logo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->

        <li class="nav-item">
          <div class="btn-group nav-link">
            <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <span><?php
                    //var_dump($user);
                    echo $user['fristname'];
                    echo "         ";
                    echo $user['lastname']; ?></span>
              <span class="ml-3"></span>
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="?page=showprofile&id=<?php echo $user['id']; ?>"><span class="fa fa-user"></span> My Account</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./page/login/logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a>
            </div>
          </div>
        </li>
        <li class="nav-item">

        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="?page=report" class="brand-link">
        <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CLEANROOM</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library menu-open active-->
            <?php if ($user['usertype'] === "ADMIN") { ?>


              <li class="nav-item">
                <a href="?page=report" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Report
                    <i class="right fas "></i>
                  </p>
                </a>
              </li>

              <!-- Register -->
              <li class="nav-item">
                <a href="?page=showemployee" class="nav-link">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                    เพิ่มพนักงานดูแล
                  </p>
                </a>
              </li>

              <!-- เพิ่มรายการสินค้า -->
              <li class="nav-item">
                <a href="?page=showcategory" class="nav-link">
                  <i class="nav-icon fa fa-cart-arrow-down"></i>
                  <p>
                    เพิ่มหมวดหมู่สินค้า
                  </p>
                </a>
              </li>

              <!-- เพิ่มรายการสินค้า -->
              <li class="nav-item">
                <a href="?page=showitem" class="nav-link">
                  <i class="nav-icon fa fa-cart-arrow-down"></i>
                  <p>
                    เพิ่มรายการสินค้า
                  </p>
                </a>
              </li>
            <?php } ?>
            <!-- นำเข้าสินค้า -->
            <?php if ($user['usertype'] === "ADMIN" || $user['usertype'] === "STAFF") { ?>
              <li class="nav-item">
                <a href="?page=showaddproduct" class="nav-link">
                  <i class="nav-icon fa fa-cart-plus"></i>
                  <p>
                    เพิ่มสินค้า
                  </p>
                </a>
              </li>
            <?php } ?>
            <?php if ($user['usertype'] === "ADMIN") { ?>
              <!-- เบิกจ่ายสินค้าผู้ร้องขอ -->
              <li class="nav-item">
                <a href="?page=stockout" class="nav-link">
                  <i class="nav-icon fa fa-archive"></i>
                  <p>
                    ร้องขอเบิกชุดคลีนรูม
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?page=stockout" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>ร้องขอเบิกชุดคลีนรูม</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=statusrequest" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>เช็คสถานะการเบิกชุด</p>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- เบิกจ่ายสินค้าผู้ร้องขอ -->
              <li class="nav-item">
                <a href="?page=confirmrequester" class="nav-link">
                  <i class="nav-icon fa fa-shopping-bag"></i>
                  <p>
                    เช็คคำร้องเบิกชุดคลีนรูม
                  </p>
                </a>
              </li>


              <!-- balance stock -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-cubes"></i>
                  <p>
                    balance stock
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    ประวัติการเบิกจ่าย
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    NG
                  </p>
                </a>
              </li>
          </ul>
        <?php } ?>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid p-3">
          <!-- Small boxes (Stat box) -->
          <?php
          error_reporting(0);
          $page = $_GET['page'];
          switch ($page) {
            case "home":
              echo "Your favorite color is red!";
              break;
            case "showprofile":
              require "./get_user_data.php";
              break;
            case "report":
              require "./page/report/report.php";
              break;
            case "showemployee":
              require "./page/addemployee/showemployee.php";
              break;
            case "regis":
              require "./page/addemployee/addemployee.php";
              break;
            case "edit":
              require "./page/addemployee/edit.php";
              break;
            case "showcategory":
              require "./page/category/showcategory.php";
              break;
            case "edititem":
              require "./page/additem/edititem.php";
              break;
            case "showitem":
              require "./page/additem/showitem.php";
              break;
            case "addstock":
              require "./page/stockbarcode/addstock.php";
              break;
            case "additem":
              require "./page/additem/additem.php";
              break;
            case "addproduct":
              require "./page/stockbarcode/addproduct.php";
              break;
            case "showaddproduct":
              require "./page/stockbarcode/showcategory.php";
              break;
            case "stockout":
              require "./page/stockout/stockrequest.php";
              break;
            case "statusrequest":
              require "./page/statusrequest/checkstatusrequest.php";
              break;
            case "requester_view":
              require "./page/requester/requester_view.php";
              break;
            case "confirmrequester":
              require "./page/requester/confirmrequester.php";
              break;
            default:
              echo "Your favorite color is neither red, blue, nor green!";
          }
          ?>

        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy;<a href="http://172.18.106.100:8888/clr/index.php#">AGC Micro Glass(Thailand)Co.,Ltd.</a></strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>Develop By</b> Nutwara Kaewjaima
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- วิธี logout เมื่อไม่มีการขยับเม้าส์ -->
  <!-- <script>
  var count = 0;
    function mousemove(event) {
      count = 0;
    };

    setInterval(function() {
      count += 1;
      if (count === 180) {
        $.post("./page/login/test.php", {
          a: 8,
          b: 9
        }, function(data) {
          console.log(data)
          window.location.href = "http://172.18.106.100:8888/clr/page/login/login.php"
        });

      } else {
        console.log(count);
      };

    }, 1000);
  </script> -->
  <!-- jQuery -->

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="./plugins/jquery/jquery.js"></script> -->
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!-- <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script> -->
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
  <!-- Sparkline -->
  <!-- <script src="plugins/sparklines/sparkline.js"></script> -->
  <!-- JQVMap -->
  <!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
  <!-- jQuery Knob Chart -->
  <!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
  <!-- daterangepicker -->
  <!-- <script src="plugins/moment/moment.min.js"></script> -->
  <!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
  <!-- Summernote -->
  <!-- <script src="plugins/summernote/summernote-bs4.min.js"></script> -->
  <!-- overlayScrollbars -->
  <!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard.js"></script> -->
</body>

</html>

<script>
  $(document).ready(function() {
    $('#kk').DataTable();
  });


  $(document).ready(function() {
    $('#ggg').DataTable();
  });

  $(document).ready(function() {
    $('#stock').DataTable();
  });
  $(document).ready(function() {
    $('#taa').DataTable();
  });
</script>