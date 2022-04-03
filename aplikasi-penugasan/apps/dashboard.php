<?php 
require_once("auth.php"); 
include 'lib/controller.php';
$cmd = new petugas();
?>

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

$tarif = $cmd->dashboard("tbtarif");
$petugas = $cmd->dashboard("tblogin");
$pelanggan = $cmd->dashboard("tbpelanggan");
$tagihan = $cmd->dashboard("tbtagihan");
$pembayaran = $cmd->dashboard("tbpembayaran");
$register = $cmd->dashboard("tbregister");

?>
<table id="petugas">
  <tr><h2>
    <th><h4>Jumlah Data Tarif</h4></th>
    <th><h4>Jumlah Data Petugas</h4></th>
    <th><h4>Jumlah Data Pelanggan</h4></th>
    <th><h4>Jumlah Data Tagihan</h4></th>
    <th><h4>Jumlah Data Pembayaran</h4></th>
    <th><h4>Jumlah Request Pelanggan Baru</h4></th>
  </tr>
  
  <tr>
  <td><center><h1><?php echo $tarif ?></h1></td>
  <td><center><h1><?php echo $petugas ?></h1></td>
  <td><center><h1><?php echo $pelanggan ?></h1></td>
  <td><center><h1><?php echo $tagihan ?></h1></td>
  <td><center><h1><?php echo $pembayaran ?></h1></td>
  <td><center><h1><?php echo $register ?></h1></td>
  </tr>
</table>
