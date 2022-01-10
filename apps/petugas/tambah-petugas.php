<?php 
require_once "auth.php";
if (isset($_POST['save'])) {

require_once("config.php");
$No = "99";
$NoPelanggan = sprintf($No . rand(100,999));
$NamaLengkap = $_POST['name'];
$Telp = $_POST['telp'];
$Password = $_POST['password'];

$simpan=$db->prepare("INSERT INTO tblogin (username, password, name, level, telp, photo)
    VALUES ('$NoPelanggan', '$Password', '$NamaLengkap', '1', '$Telp', 'default.svg')");
$simpan->execute();
  $count = $simpan->rowCount();
  if ($count == 0) {
    echo "<script type='text/javascript'>
      alert('Pelanggan Gagal Di Tambah');
      window.location.href = '/superadmin.php?page=petugas'
      </script>";
  } else {
    echo "<script type='text/javascript'>
      alert('Pelanggan Berhasil Di Tambah');
      window.location.href = '/superadmin.php?page=petugas'
      </script>";
  }
$db=null;
}
?>



<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Input Petugas Baru</h3>
<p>
<div>

  <form action="" method="post">
    <label for="username">Nama Petugas</label>
    <br>
    <input value="" type="text" id="fname" name="name" required placeholder="Nama Lengkap" >
    </br>
    <label for="level">Level Akses</label>
    <br>
    <select id="KodeTarif" required name="KodeTarif">
    <option disable value="">-- Pilih Level Akses --</option>
    <option  value="0">Superadmin</option>
    <option  value="1">Petugas</option>
    </select>
    </br>
    <label for="email">No. Handphone</label>
    <br>
    <input value="" type="text" id="lname" name="telp" required placeholder="No. Handphone" >
    </br>
    <label for="fullname">Password</label>
    <br>
    <input value="" type="password" id="fname" name="password" required placeholder="Password" >
    </br>

    <input  type="submit" id=red name=save value="Save"> 
    <p>&larr; <a href="/superadmin.php?page=pelanggan">Kembali</a>
  </form>
  
</div>


