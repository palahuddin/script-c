<?php 

require_once "auth.php";
require_once("config.php");

$NoPelanggan = $_SESSION['users']['username'];
$ambil=$db->prepare("SELECT * FROM tbpelanggan WHERE NoPelanggan = '$NoPelanggan'");
$ambil->execute();
$row = $ambil->fetch();
?>



<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Data Pelanggan</h3>
<p>
<div>

  <form action="" method="post">
    <label for="username">No Pelanggan</label>
    <br>
    <input value="<?=$row['NoPelanggan'];?>" type="text" id="fname" name="NoMeter" required placeholder="No. Meter" >
    </br>
    <label for="username">No Meter</label>
    <br>
    <input value="<?=$row['NoMeter'];?>" type="text" id="fname" name="NoMeter" required placeholder="No. Meter" >
    </br>
    <label for="level">Tarif (Daya / Tarif Per-Kwh / Beban)</label>
    <br>
    <input value="<?=$row['KodeTarif'];?>" type="text" id="fname" name="KodeTarif" required placeholder="No. Meter" >
    </br>
    <label for="username">Alamat</label>
    <br>
    <input value="<?=$row['Alamat'];?>" type="text" id="fname" name="Alamat" required placeholder="Alamat" >
    </br>
    <label for="fullname">Nama Pelanggan</label>
    <br>
    <input value="<?=$row['NamaLengkap'];?>" type="text" id="fname" name="NamaLengkap" required placeholder="Nama Pelanggan" readonly >
    </br>
    <label for="email">No. Handphone</label>
    <br>
    <input value="<?=$row['Telp'];?>" type="text" id="lname" name="Telp" required placeholder="No. Handphone" readonly >
    </br>

    <p>&larr; <a href="/superadmin.php?page=pelanggan">Kembali</a>
  </form>
  
</div>


