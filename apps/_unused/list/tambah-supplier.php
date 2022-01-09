

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

<h3>Tambah Supplier</h3>
<br>
<div>

  <form  method="post">
    <label for="nama_supplier">Nama Supplier</label>
    <br>
    <input type="text" id="nama_supplier" name="nama_supplier" required placeholder="nama supplier" >
    </br>
    <label for="alamat">Alamat</label>
    <br>
    <input type="text" id="alamat" name="alamat" required placeholder="alamat" >
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
  <form action="home.php?page=supplier" method='post'> <input  type="submit" name=cancel value="Cancel"> </form>
</div>


<?php

if (isset($_POST['save'])) {
    $name = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    

    $save = $db->prepare("INSERT INTO supplier (nama_supplier, alamat) VALUES ('$name', '$alamat')");
    $save->execute();

    if($save->rowCount()==0){
        echo "Gagal";
    }
    else{
        echo "<script type='text/javascript'>
            window.location.href = 'home.php?page=supplier'
            </script>";
    }

    $db=null;
}
?>



