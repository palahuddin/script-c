

<?php 

if (isset($_POST['save'])) {
  require_once("config.php");
    $KodeTagihan = $_POST['KodeTagihan'];
    $Status = $_POST['Status'];
    

    $simpan=$db->prepare("UPDATE tbpembayaran set Status='$Status' where KodeTagihan='$KodeTagihan'");
    $simpan->execute();

    $simpan=$db->prepare("UPDATE tbtagihan set Status='$Status' where KodeTagihan='$KodeTagihan'");
    $simpan->execute();

        if($simpan->rowCount()==0){
            echo "Gagal";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Pembayaran Sudah Di Set');
            window.location.href = 'superadmin.php?page=tagihan'
            </script>";
        }

    $db=null;

}

?>


