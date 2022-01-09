

<?php 

if (isset($_POST['save'])) {
  require_once("config.php");
    $nama = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $kd_supplier = $_POST['kd_supplier'];
    

    $edit=$db->prepare("UPDATE supplier set
    nama_supplier='$nama', alamat='$alamat' where kd_supplier='$kd_supplier'");
    $edit->execute();

        if($edit->rowCount()==0){
            echo "Gagal";
        }
        else{
            echo "<script type='text/javascript'>
                window.location.href = 'superadmin.php?page=supplier'
            </script>";
        }

$db=null;

}

elseif (isset($_POST['cancel'])) {
  echo "<script type='text/javascript'>
  window.location.href = 'superadmin.php?page=supplier'
  </script>";
}

?>


