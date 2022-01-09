

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
  <form action="home.php?page=editprofil" method="post">
  <label for="username">Username</label>
    <br>
    <input value="<?php echo $row['username'] ?>" type="text" id="fname" name="firstname" placeholder="Username" readonly disabled>
    </br>
    <label for="fullname">Nama Lengkap</label>
    <br>
    <input value="<?php echo $row['name'] ?>" type="text" id="fname" name="firstname" placeholder="Nama Lengkap" disabled>
    </br>
    <label for="email">Email</label>
    <br>
    <input value="<?php echo $row['email'] ?>" type="text" id="lname" name="lastname" placeholder="Email" disabled>
    </br>
    <!-- <label for="country">Country</label>
    <br>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> -->
    </br>
  
    <input type="submit" id=red value="Edit">
  </form>
</div>


