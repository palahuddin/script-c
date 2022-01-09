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
    <img src="assets/img/connect.png" alt="logo" style="width:100px;height:100px;" />
<div style="display:inline-block;">
    <div><h1> PLN Pasca Bayar </h1></div>
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
    <link href="assets/main/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/main/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/main/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--FOR TABLE -->
    <link href="assets/main/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="assets/main/js/jquery.js"></script>
    <script src="assets/main/js/bootstrap.min.js"></script>
    <script src="assets/main/js/bootbox.min.js"></script>
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
        <a class="navbar-brand" href="superadmin.php">Admin PLN</a> 
      </div>
      <div style="color: white;padding: 15px 20px 15px 20px;float: right;font-size: 16px;"> 
        <span style="margin-right:20px"><?php echo tglIndonesia(date('D, d F, Y')); ?></span>
        <a href="superadmin.php?page=logout" class="btn btn-danger square-btn-adjust">Logout</a> 
      </div>
    </nav>   
<!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center">
            <img src="assets/img/admin.png" class="user-image img-circle img-responsive" style="width:70px;height:80px;"/>
          </li>
          <li>
            <a  class="active-menu" href="superadmin.php"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li> 
          <li>
            <a  href="superadmin.php?page=petugas"><i class="fa fa-qrcode"></i> Data Petugas</a>
          </li>
          <li>
          <li>
            <a  href="superadmin.php?page=pelanggan"><i class="fa fa-qrcode"></i> Data Pelanggan</a>
          </li>
          <li>
          <li>
            <a  href="superadmin.php?page=tagihan"><i class="fa fa-qrcode"></i> Data Tagihan</a>
          </li>
          <li>
          <li>
            <a  href="superadmin.php?page=pembayaran"><i class="fa fa-qrcode"></i> Data Pembayaran</a>
          </li>
          <li>
          <li>
            <a  href="superadmin.php?page=tarif"><i class="fa fa-qrcode"></i> Data Tarif</a>
          </li>
          <li>

      
            <a  href="#"><i class="fa fa-wrench"></i> Pengaturan<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a  href="superadmin.php?page=edituserlist"><i class="fa fa-user"></i> Edit User</a>
              </li>
              <li>
                <a  href="superadmin.php?page=importuser"><i class="fa fa-home"></i> Import Users</a>
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
            if ($_GET['page']=="tambahpelanggan") {
              include 'pelanggan/tambah-pelanggan.php';
            }
            if ($_GET['page']=="editpelanggan") {
              include 'pelanggan/edit-pelanggan.php';
            }
            if ($_GET['page']=="deletepelanggan") {
              include 'pelanggan/delete-pelanggan.php';
            }
            if ($_GET['page']=="savepelanggan") {
              include 'pelanggan/save-pelanggan.php';
            }
            elseif ($_GET['page']=="petugas") {
              include 'petugas/list-petugas.php';
            }
            if ($_GET['page']=="pelanggan") {
              include 'pelanggan/list-pelanggan.php';
            }
            if ($_GET['page']=="pelangganbaru") {
              include 'pelanggan/list-pelangganbaru.php';
            }
            elseif ($_GET['page']=="importuser") {
              include 'import/form-import_user.php';
            }
            elseif ($_GET['page']=="tagihan") {
              include 'tagihan/cari-tagihan.php';
            }
            elseif ($_GET['page']=="listtagihan") {
              include 'tagihan/list-tagihan.php';
            }
            elseif ($_GET['page']=="pembayaran") {
              include 'pembayaran/input-pembayaran.php';
            }
            elseif ($_GET['page']=="simpanbayar") {
              include 'pembayaran/save-pembayaran.php';
            }
            elseif ($_GET['page']=="simpantagihan") {
              include 'tagihan/save-tagihan.php';
            }
            elseif ($_GET['page']=="detailtagihan") {
              include 'tagihan/detail-tagihan.php';
            }
            elseif ($_GET['page']=="setstatus") {
              include 'pembayaran/set-status-pembayaran.php';
            }
            elseif ($_GET['page']=="tarif") {
              include 'tarif/input-tarif.php';
            }
            elseif ($_GET['page']=="simpantarif") {
              include 'tarif/save-tarif.php';
            }
            elseif ($_GET['page']=="listtarif") {
              include 'tarif/list-tarif.php';
            }
            elseif ($_GET['page']=="listbayar") {
              include 'pembayaran/list-pembayaran.php';
            }
            elseif ($_GET['page']=="logout") {
              session_destroy();
              echo "<script>location='/';</script>";
            }
          }
          else{
            include 'dashboard.php';
          }
        ?>  
      </div>
    </div>
  </div>
     <!-- /. WRAPPER  -->
    <!-- METISMENU SCRIPTS -->
    <script src="assets/main/js/jquery.metisMenu.js"></script>
    <!--DATA TABLE-->
    <script src="assets/main/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/main/js/dataTables/dataTables.bootstrap.js"></script>
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
    <script src="assets/main/js/custom.js"></script>
</body>
</html>