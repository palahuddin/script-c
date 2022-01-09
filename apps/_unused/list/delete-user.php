

<?php 

if (isset($_POST['delete'])) {


require_once("config.php");

$uid = $_POST['kd_admin'];
$del=$db->prepare("DELETE from users where kd_admin = '$uid'");
$result = $del->execute();
if ($result) { // if user exists
      echo "<script>
      alert('Delete Sukses!');
        window.location='/superadmin.php?page=edituserlist';
      </script>"; 
      die ();
  }else {
    echo "<script>
      alert('Email Already Exist!');
        window.location='superadmin.php?page=edituserlist';
      </script>";
  }
}
?>


