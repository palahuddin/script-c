

<?php 

if (isset($_POST['edit'])) {


require_once("config.php");

$uid = $_POST['kd_barang'];
$ambil=$db->prepare("SELECT * FROM barang where kd_barang = '$uid'");
$ambil->execute();
$row=$ambil->fetch();
}
?>

<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Update Data Barang</h3>
<div>

  <form action="/superadmin.php?page=savesupplier" method="post">
    <label for="nama_barang">Nama Barang</label>
    <br>
    <input value="<?php echo $row['nama_barang'] ?>" type="text" id="fname" name="nama_barang" placeholder="nama_supplier" >
    </br>
    <label for="fullname">Harga Jual</label>
    <br>
    <input value="<?php echo $row['harga_jual'] ?>" type="text" id="fname" name="harga_jual">
    </br>
    <label for="harga_beli">Harga Beli</label>
    <br>
    <input value="<?php echo $row['harga_beli'] ?>" type="text" id="fname" name="harga_beli" placeholder="nama_supplier" >
    </br>
    <label for="fullname">Stok</label>
    <br>
    <input value="<?php echo $row['stok'] ?>" type="text" id="fname" name="stok">
    </br>
    <label for="satuan">Satuan</label>
    <br>
    <input value="<?php echo $row['satuan'] ?>" type="text" id="fname" name="satuan" placeholder="nama_supplier" >
    </br>
    <label for="fullname">Status</label>
    <br>
    <input value="<?php echo $row['status'] ?>" type="text" id="fname" name="status">
    </br>
    <br>
    <input value="<?php echo $row['kd_barang'] ?>" type="hidden" name="kd_supplier">
    </br>
    <!-- <label for="country">Country</label>
    <br>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> -->
    </br>
    <input  type="submit" id=red name=save value="Save"> 
    <input  type="submit" name=cancel value="Cancel">
  </form>
  <!-- <form action="home.php?page=profil" method="post"> <input  type="submit" name=cancel value="Cancel"> </form> -->
  
</div>


