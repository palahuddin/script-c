

<?php 

if (isset($_POST['detail'])) {


require_once("config.php");

$kode = $_POST['KodeTagihan'];
$ambil=$db->prepare("SELECT * FROM tbtagihan join tbpelanggan using(NoPelanggan) where KodeTagihan= '$kode'");
$ambil->execute();
$row=$ambil->fetch();
}
?>

<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Detail Tagihan</h3>
<p>
<div>

  <form action="/superadmin.php?page=setstatus" method="post">
  <input type="hidden" name="KodeTagihan" value="<?php echo $row['KodeTagihan'] ?>">
    <label for="fullname">No. Tagihan</label>
    <br>
    <input value="<?php echo $row['NoTagihan'] ?>" type="text" id="fname" name="name" placeholder="Nama Lengkap " readonly >
    </br>
    <label for="email">Nama Pelanggan</label>
    <br>
    <input value="<?php echo $row['NamaLengkap'] ?>" type="text"  name="email" placeholder="Email" readonly >
    </br>
    <label for="email">Bulan / Tahun</label>
    <br>
    <input value="<?php echo $row['BulanTagih'] ?> / <?php echo $row['TahunTagih'] ?>" type="text"  name="email" placeholder="Email" readonly >
    </br>
    <label for="email">Total Bayar</label>
    <br>
    <input value="Rp <?php echo number_format($row['TotalBayar']); ?>" type="text"  name="email" placeholder="Email" readonly >
    </br>
    <label for="email">Status</label>
    <br>
    <input value="<?php echo $row['Status'] ?>" type="text"  name="" placeholder="Email" readonly >
    </br>
    <label for="country">Set Status</label>
    <br>
    <select id="country" name="Status">
      <option value="">--Set Status--</option>
      <option value="Sudah">Sudah  Bayar</option>
      <option value="Belum">Belum Bayar</option>
    </select>
    </br>
    <input  type="submit" id=red name=save value="Save"> 
    <p>&larr; <a href="/superadmin.php?page=tagihan">Kembali</a>

  </form>
  <!-- <form action="home.php?page=profil" method="post"> <input  type="submit" name=cancel value="Cancel"> </form> -->
  
</div>


