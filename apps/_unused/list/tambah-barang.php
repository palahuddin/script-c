

<?php 

 
require_once("config.php");

$uid = $_SESSION["users"]["username"];
$ambil=$db->prepare("SELECT * FROM users where username = '$uid'");
$ambil->execute();
$row=$ambil->fetch();
?>

<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Tambah Barang</h3>
<br>
<div>

  <form  action="home.php?page=savebarang" method="post">
  <label for="username">Kode Barang</label>
    <br>
    <input type="text" id="kd_barang" name="kd_barang" required placeholder="kode barang" >
    </br>
    <label for="nama_barang">Nama Barang</label>
    <br>
    <input type="text" id="nama_barang" name="nama_barang" required placeholder="nama barang" >
    </br>
    <label for="harga_jual">Harga Jual (Rp)</label>
    <br>
    <input type="text" id="harga_jual" name="harga_jual" required placeholder="harga jual" >
    </br>
    <label for="harga_beli">Harga Beli (Rp)</label>
    <br>
    <input type="text" id="harga_beli" name="harga_beli" required placeholder="harga beli" >
    </br>
    <label for="stok">Stok</label>
    <br>
    <input type="text" id="stok" name="stok" required placeholder="stok" >
    </br>
    <label for="satuan">Satuan</label>
    <br>
    <input type="text" id="satuan" name="satuan" required placeholder="satuan" >
    </br>
    <label for="status">Status</label>
    <br>
    <input type="text" id="status" name="status" required placeholder="status" >
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
  </form>
  <!-- <form action="home.php?page=profil" method="post"> <input  type="submit" name=cancel value="Cancel"> </form> -->
  <form action="home.php?page=barang" method='post'> <input  type="submit" name=cancel value="Cancel"> </form>
</div>


