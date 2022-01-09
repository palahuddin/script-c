

<?php 

if (isset($_POST['edit'])) {


require_once("config.php");

$uid = $_POST['kd_admin'];
$ambil=$db->prepare("SELECT * FROM tblogin where kd_admin = '$uid'");
$ambil->execute();
$row=$ambil->fetch();
}
?>

<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Update Data Users</h3>
<div>

  <form action="/superadmin.php?page=saveuser" method="post">
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


