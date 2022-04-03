<?php 
require_once("auth.php"); 

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
   <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="task.php">
                        <b class="logo-icon">
                            <img src="assets/img/connect.png" alt="homepage" style="width:50px;height:50px;/>
                        </b>
                        <span class="logo-text">
                            <img src="plugins/images/surya.png" alt="homepage" style="width:150px;height:50px;/>
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="task.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Halaman Teknisi</h4>
                        <h6>Welcome,<b> <?php echo $_SESSION["users"]["name"] ?></b></h6>
                        <p><a href="logout.php">Logout</a></p>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">List Jadwal & Penugasan</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                    <?php
                                        require_once("config.php");
                                        $telp = $_SESSION["users"]["telp"];
                                        $ambil=$db->prepare("SELECT * FROM tbtugas ");
                                        $ambil->execute();
                                        echo "
                                        <tr>
                                            <th class='border-top-0'>Id</th>
                                            <th class='border-top-0'>Nama Customer</th>
                                            <th class='border-top-0'>Alamat</th>
                                            <th class='border-top-0'>PIC Customer</th>
                                            <th class='border-top-0'>PIC Contact</th>
                                            <th class='border-top-0'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>" ?>
                                    <?php 
                                    while($row=$ambil->fetch())
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['id_tugas'] . "</td>";
                                        echo "<td>" . $row['nama_customer'] . "</td>";
                                        echo "<td>" . $row['alamat'] . "</td>";
                                        echo "<td>" . $row['pic_customer'] . "</td>";
                                        echo "<td>" . $row['pic_kontak'] . "</td>";
                                        echo "<td><center><form method='post' action='#/teknisi.php?page=checkin' style='display:inline-block'>
                                            <input type='submit' name='edit' value='Check-In' />
                                            </form>
                                            <form method='post' action='lokasi.php' style='display:inline-block'>
                                            <input id='demo' type='submit' name='delete' value='Check-Out' />
                                            
                                            </form ></td>"
                                            
                                            ;
                                        echo "</tr>";
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2022 © Skripsi Geo Lokasi - <a
                    href="https://lokasi.falah.web.id/">Falah</a>
            </footer>
        </div>
    </div>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>