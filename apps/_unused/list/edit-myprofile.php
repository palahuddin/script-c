

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

<h3>Profil Update</h3>
<div>

  <form  method="post">
  <label for="username">Username</label>
    <br>
    <input value="<?php echo $row['username'] ?>" type="text" id="fname" name="username" placeholder="Username" readonly >
    </br>
    <label for="fullname">Nama Lengkap</label>
    <br>
    <input value="<?php echo $row['name'] ?>" type="text" id="fname" name="name" placeholder="Nama Lengkap" >
    </br>
    <label for="email">Email</label>
    <br>
    <input value="<?php echo $row['email'] ?>" type="text" id="lname" name="email" placeholder="Email" >
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

<?php

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $edit=$db->prepare("UPDATE users set
    name='$name', email='$email' where username='$username'");
    $edit->execute();

if($edit->rowCount()==0){
    echo "Gagal";
}
else{
    echo "<script type='text/javascript'>
        window.location.href = 'home.php?page=profil'
    </script>";
}

$db=null;

}
elseif (isset($_POST['cancel'])) {
  echo "<script type='text/javascript'>
  window.location.href = 'home.php?page=profil'
  </script>";
}
?>


