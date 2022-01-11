<?php 
require_once "auth.php";
require_once("lib/controller.php");
$cmd = new pelanggan();

if (isset($_POST['save'])) {

$No = "10";
$NoPelanggan = sprintf($No . rand(100,999));
$NoMeter = $_POST['NoMeter'];
$KodeTarif = $_POST['KodeTarif'];
$NamaLengkap = $_POST['NamaLengkap'];
$Telp = $_POST['Telp'];
$Alamat = $_POST['Alamat'];

$cmd->insert_pelanggan_login($NoPelanggan,$NoMeter,$KodeTarif,$NamaLengkap,$Telp,$Alamat,"superadmin");

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
     $cmd = new ambil();
     $rows = $cmd->select("tbtarif","KodeTarif","!=0");
     foreach($rows as $row){
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


