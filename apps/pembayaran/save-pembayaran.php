

<?php 

if (isset($_POST['save'])) {
    require_once("config.php");
    $KodeTagihan = $_POST['KodeTagihan'];
    $TglBayar = $_POST['TglBayar'];
    $JumlahTagihan = $_POST['JumlahTagihan'];
    $BuktiPembayaran = $_POST['BuktiPembayaran'];
    $Status = "Belum";

    $simpan=$db->prepare("INSERT into tbpembayaran (KodeTagihan, TglBayar, JumlahTagihan, BuktiPembayaran, Status )
          VALUES('$KodeTagihan','$TglBayar','$JumlahTagihan','$BuktiPembayaran','$Status')");
    $simpan->execute();

        if($simpan->rowCount()==0){
            echo "Gagal";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Input Pembayaran Berhasil');
                window.location.href = 'superadmin.php?page=pembayaran'
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


