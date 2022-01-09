<?php require_once("auth.php"); ?>

<style>
<?php include 'assets/css/tables.css'; ?>
</style>

</head>
<body>

<h1><center> Aplikasi PLN Pasca Bayar</h1>
<p>
<form action='/superadmin.php?page=pelangganbaru' method="post"> 
    <input  type='submit' value='+ Request List Pelanggan Baru'>
</form>
<p>
<?php
require_once("config.php");

$ambil=$db->prepare("SELECT * FROM tbtarif");
$ambil->execute();
$tarif = $ambil->rowCount();

$ambil=$db->prepare("SELECT * FROM tblogin WHERE level = '1'");
$ambil->execute();
$petugas = $ambil->rowCount();

$ambil=$db->prepare("SELECT * FROM tbpelanggan");
$ambil->execute();
$pelanggan = $ambil->rowCount();

$ambil=$db->prepare("SELECT * FROM tbtagihan");
$ambil->execute();
$tagihan = $ambil->rowCount();

$ambil=$db->prepare("SELECT * FROM tbpembayaran");
$ambil->execute();
$pembayaran = $ambil->rowCount();

?>
<table id="users">
  <tr><h2>
    <th><h3>Jumlah Data Tarif</h3></th>
    <th><h3>Jumlah Data Petugas</h3></th>
    <th><h3>Jumlah Data Pelanggan</h3></th>
    <th><h3>Jumlah Data Tagihan</h3></th>
    <th><h3>Jumlah Data Pembayaran</h3></th>
  </tr>
  
  <tr>
  <td><center><h1><?php echo $tarif ?></h1></td>
  <td><center><h1><?php echo $petugas ?></h1></td>
  <td><center><h1><?php echo $pelanggan ?></h1></td>
  <td><center><h1><?php echo $tagihan ?></h1></td>
  <td><center><h1><?php echo $pembayaran ?></h1></td>
  </tr>
</table>
