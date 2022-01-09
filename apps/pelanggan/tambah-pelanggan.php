<?php 
require_once "auth.php";
if (isset($_POST['save'])) {

require_once("config.php");
$No = "10";
$NoPelanggan = sprintf($No . rand(100,999));
$NoMeter = $_POST['NoMeter'];
$KodeTarif = $_POST['KodeTarif'];
$NamaLengkap = $_POST['NamaLengkap'];
$Telp = $_POST['Telp'];
$Alamat = $_POST['Alamat'];

$simpan=$db->prepare("INSERT INTO tbpelanggan (NoPelanggan, NoMeter, KodeTarif, NamaLengkap, Telp, Alamat)
      VALUES ('$NoPelanggan', '$NoMeter', '$KodeTarif', '$NamaLengkap', '$Telp', '$Alamat')");
$simpan->execute();
$count = $simpan->rowCount();
if($count == 0){
  echo "<script type='text/javascript'>
  alert('Pelanggan Gagal Di Tambah');
  window.location.href = '/superadmin.php?page=tambahpelanggan'
  </script>";
}
else{
  $simpan=$db->prepare("INSERT INTO tblogin (username, password, name, level, telp, photo)
      VALUES ('$NoPelanggan', 'asd', '$NamaLengkap', '2', '$Telp', 'default.svg')");
  $simpan->execute();
  $count = $simpan->rowCount();
  if ($count == 0) {
    echo "<script type='text/javascript'>
      alert('Pelanggan Gagal Di Tambah');
      window.location.href = '/superadmin.php?page=tambahpelanggan'
      </script>";
  } else {
    echo "<script type='text/javascript'>
      alert('Pelanggan Berhasil Di Tambah');
      window.location.href = '/superadmin.php?page=pelanggan'
      </script>";
  }
}
$db=null;
}
?>



<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Input Data Pelanggan Baru</h3>
<p>
<div>

  <form action="" method="post">
    <label for="username">No Meter</label>
    <br>
    <input value="" type="text" id="fname" name="NoMeter" required placeholder="No. Meter" >
    </br>
    <label for="level">Tarif (Daya / Tarif Per-Kwh / Beban)</label>
    <br>
    <select id="KodeTarif" required name="KodeTarif">
      <option disable value="">-- Pilih Tarif --</option>
      <?php 
     require_once "config.php";
     $ambil=$db->prepare("SELECT * FROM tbtarif");
     $ambil->execute();
      while($row = $ambil->fetch()){
          $tarif = $row['TarifPerKwh'];
          $beban = $row['Beban'];
          $tarifformat = number_format($tarif,0,'.','.');
          $bebanformat = number_format($beban,0,'.','.');
      ?>
      <option required value="<?=$row['KodeTarif'];?>">
          <?=$row['Daya'];?> Watt /
          <?=$tarifformat?> Rp / Rp
          <?=$bebanformat?>
      </option>
      <?php 
      }
      ?>
    </select>
    </br>
    <label for="username">Alamat</label>
    <br>
    <input value="" type="text" id="fname" name="Alamat" required placeholder="Alamat" >
    </br>
    <label for="fullname">Nama Pelanggan</label>
    <br>
    <input value="" type="text" id="fname" name="NamaLengkap" required placeholder="Nama Pelanggan" >
    </br>
    <label for="email">No. Handphone</label>
    <br>
    <input value="" type="text" id="lname" name="Telp" required placeholder="No. Handphone" >
    </br>

    <input  type="submit" id=red name=save value="Save"> 
    <p>&larr; <a href="/superadmin.php?page=pelanggan">Kembali</a>
  </form>
  
</div>


