

<?php 

if (isset($_POST['delete'])) {


require_once("config.php");

$uid = $_POST['kd_supplier'];
$del=$db->prepare("DELETE from supplier where kd_supplier = '$uid'");
$result = $del->execute();
if ($result) { 
      echo "<script>
      alert('Delete Sukses!');
        window.location='/superadmin.php?page=supplier';
      </script>"; 
      die ();
  }else {
    echo "<script>
      alert('Email Already Exist!');
        window.location='superadmin.php?page=supplier';
      </script>";
  }
}
?>


