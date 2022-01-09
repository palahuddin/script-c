

<?php 

if (isset($_POST['edit'])) {


require_once("config.php");

$uid = $_POST['kd_supplier'];
$ambil=$db->prepare("SELECT * FROM supplier where kd_supplier = '$uid'");
$ambil->execute();
$row=$ambil->fetch();
}
?>

<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Update Data Supplier</h3>
<div>

  <form action="/superadmin.php?page=savesupplier" method="post">
  <label for="nama_supplier">Nama Supplier</label>
    <br>
    <input value="<?php echo $row['nama_supplier'] ?>" type="text" id="fname" name="nama_supplier" placeholder="nama_supplier" >
    </br>
    <label for="fullname">Alamat</label>
    <br>
    <input value="<?php echo $row['alamat'] ?>" type="text" id="fname" name="alamat">
    </br>
    <br>
    <input value="<?php echo $row['kd_supplier'] ?>" type="hidden" name="kd_supplier">
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


