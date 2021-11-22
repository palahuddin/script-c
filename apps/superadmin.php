<?php
  require_once("auth.php");
  function tglIndonesia($str){
    $tr   = trim($str);
    $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
    return $str;
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<body class="bg-light">
<div class="container mt-1">
<div class="header">
<div style="display:inline-block;vertical-align:top;">
    <img src="img/connect.png" alt="logo" style="width:100px;height:100px;" />
<div style="display:inline-block;">
    <div><h1> PT. XYZ </h1></div>
    <h5>Welcome,<b> <?php echo $_SESSION["users"]["name"] ?></b></h5>
    <p> </p>
    <p> </p>
</div>

</div>
</div>
</div>
</div>
</head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory Barang</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--FOR TABLE -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
</head>
<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>    
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php">Inventory Admin</a> 
      </div>
      <div style="color: white;padding: 15px 20px 15px 20px;float: right;font-size: 16px;"> 
        <span style="margin-right:20px"><?php echo tglIndonesia(date('D, d F, Y')); ?></span>
        <a href="home.php?page=logout" class="btn btn-danger square-btn-adjust">Logout</a> 
      </div>
    </nav>   
<!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center">
            <img src="img/admin.png" class="user-image img-circle img-responsive" style="width:70px;height:80px;"/>
          </li>
          <li>
            <a  class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li> 
          <li>
            <a  href="#"><i class="fa fa-money"></i> Pembelian<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a  href="home.php?page=barangpembelian"><i class="fa fa-cube"></i> Data Barang Pembelian</a>
              </li>
              <li>
                <a  href="home.php?page=pembelian"><i class="fa fa-database"></i> Data Pembelian</a>
              </li>
              <li>
                <a  href="home.php?page=tambahpembelian"><i class="fa fa-plus-square"></i> Tambah Data</a>
              </li>
            </ul>
          </li>
          <li>
            <a  href="#"><i class="fa fa-money"></i> Penjualan<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a  href="home.php?page=penjualan"><i class="fa fa-database"></i> Data Penjualan</a>
              </li>
              <li>
                <a  href="home.php?page=tambahpenjualan"><i class="fa fa-plus-square"></i> Tambah Data</a>
              </li>
            </ul>
          </li>
          <li>
            <a  href="home.php?page=barang"><i class="fa fa-qrcode"></i> Barang</a>
          </li>
          <li>
            <a  href="home.php?page=supplier"><i class="fa fa-group"></i> Supplier</a>
          </li>
          <li>
            <a  href="#"><i class="fa fa-book"></i> Laporan<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a  href="home.php?page=laporanpenjualan"><i class="fa fa-file-archive-o"></i> Penjualan</a>
              </li>
              <li>
                <a  href="home.php?page=laporanpembelian"><i class="fa fa-file-archive-o"></i> Pembelian</a>
              </li>
              <li>
                <a  href="home.php?page=laporanprofit"><i class="fa fa-dollar"></i> Profit</a>
              </li>
            </ul>
          </li>
          <li>
            <a  href="#"><i class="fa fa-wrench"></i> Pengaturan<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a  href="home.php?page=admin"><i class="fa fa-user"></i> Admin</a>
              </li>
              <li>
                <a  href="home.php?page=perusahaan"><i class="fa fa-home"></i> Perusahaan</a>
              </li>
            </ul>
          </li>
      </div>      
    </nav>  
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
      <div id="page-inner">
        <?php  
          if (isset($_GET['page'])) {
            if ($_GET['page']=="admin") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="tambahadmin") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="ubahadmin") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="barang") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="tambahbarang") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="ubahbarang") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="supplier") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="tambahsupplier") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="ubahsupplier") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="pembelian") {
              include 'data-pembelian.php';
            }
            elseif ($_GET['page']=="tambahpembelian") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="barangpembelian") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="simpanbaranggudang") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="penjualan") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="tambahpenjualan") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="laporanpenjualan") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="laporanpembelian") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="laporanprofit") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="perusahaan") {
              include 'user-list.php';
            }
            elseif ($_GET['page']=="logout") {
              session_destroy();
              echo "<script>location='/';</script>";
            }
          }
          else{
            include 'request-userlist.php';
          }
        ?>  
      </div>
    </div>
  </div>
     <!-- /. WRAPPER  -->
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!--DATA TABLE-->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
      $(document).ready(function () {
        $('#tabelku').dataTable();
      });
    </script>
    <script>
    $(document).on("click", "#alertHapus", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      bootbox.confirm("Lanjutkan Menghapus!", function(confirmed){
        if (confirmed) {
          window.location.href = link;
        };
      });
    });
    </script>
    <script src="assets/js/custom.js"></script>
</body>
</html>