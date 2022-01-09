

<?php 

if (isset($_POST['save'])) {
  require_once("config.php");
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
                window.location.href = 'superadmin.php?page=edituserlist'
            </script>";
        }

$db=null;

}

elseif (isset($_POST['cancel'])) {
  echo "<script type='text/javascript'>
  window.location.href = 'superadmin.php?page=edituserlist'
  </script>";
}

?>


