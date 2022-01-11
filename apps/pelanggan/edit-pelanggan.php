<?php 
require_once "auth.php";
require_once("lib/controller.php");
$cmd = new pelanggan();

if (isset($_POST['edit'])) {
  $uid = $_POST['KodePelanggan'];
  $row = $cmd->edit_pelanggan($uid);
  }


if (isset($_POST['save'])) {
  $NoPelanggan=$_POST['NoPelanggan'];
  $NoMeter=$_POST['NoMeter'];
  $NamaLengkap=$_POST['NamaLengkap'];
  $Alamat=$_POST['Alamat'];
  $Telp=$_POST['Telp'];
  $KodeTarif=$_POST['KodeTarif'];
  $cmd->save_pelanggan($NoMeter,$NamaLengkap,$Alamat,$Telp,$KodeTarif,$NoPelanggan);
}
?>

<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Update Data Pelanggan</h3>
<p>
<div>

  <form action="" method="post">
    
    <label for="fullname">No. Pelanggan</label>
    <br>
    <input value="<?php echo $row['NoPelanggan'] ?>" type="text" id="fname" name="NoPelanggan" placeholder="No Pelanggan " readonly >
    </br>
    <label for="fullname">Daya Aktif</label>
    <br>
    <input value="<?php echo $row['Daya'] ?> Watt" type="text" id="fname"  placeholder="No Pelanggan " readonly >
    </br>
    <label for="email">No. Meter</label>
    <br>
    <input value="<?php echo $row['NoMeter'] ?>" type="text" id="lname" name="NoMeter" placeholder="NoMeter" >
    </br>
    
    <label for="email">Nama Pelanggan</label>
    <br>
    <input value="<?php echo $row['NamaLengkap'] ?>" type="text" id="lname" name="NamaLengkap" placeholder="NamaLengkap" >
    </br>
    <label for="email">Alamat</label>
    <br>
    <input value="<?php echo $row['Alamat'] ?>" type="text" id="lname" name="Alamat" placeholder="Alamat" >
    </br>
    <label for="email">No. Telepon</label>
    <br>
    <input value="<?php echo $row['Telp'] ?>" type="text" id="lname" name="Telp" placeholder="Telp" >
    </br>
    <label for="level">Tarif (Daya / Tarif Per-Kwh / Beban)</label>
    <br>
    <select id="KodeTarif" required name="KodeTarif">
      <option disable value="">-- Pilih Daya / Tarif --</option>
      <?php 
      $cmd = new ambil();
      $rows = $cmd->select("tbtarif","KodeTarif","!=0");
      foreach($rows as $row) {
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
    <input  type="submit" id=red name=save value="Save"> 
    <p>&larr; <a href="/superadmin.php?page=pelanggan">Kembali</a>
  </form>
  
</div>


