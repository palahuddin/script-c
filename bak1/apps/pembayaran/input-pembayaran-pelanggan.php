
<?php
require_once "auth.php";
require_once("lib/controller.php");

if (isset($_POST['save'])) {
    $KodeTagihan = $_POST['KodeTagihan'];
    $TglBayar = $_POST['TglBayar'];
    $JumlahTagihan = $_POST['JumlahTagihan'];
    $BuktiPembayaran = $_POST['BuktiPembayaran'];
    $Status = "Belum";
    $NoTagihan = $_POST['NoTagihan'];
    $NamaLengkap =  $_SESSION['users']['name'];

    require_once("config.php");
    $simpan=$db->prepare("INSERT into tbpembayaran (KodeTagihan, TglBayar, JumlahTagihan, BuktiPembayaran, Status, NoTagihan, NamaLengkap )
            VALUES('$KodeTagihan','$TglBayar','$JumlahTagihan','$BuktiPembayaran','$Status','$NoTagihan','$NamaLengkap')");
        $simpan->execute();
        if($simpan){
            echo "<script type='text/javascript'>
                alert('Input Pembayaran Berhasil');
                window.location.href = '/home.php?page=pembayaran'
            </script>";
        }
        $db=null;


}
?>

<?php   include "config.php";
        $NoPelanggan = $_SESSION['users']['username'];
        $ambil=$db->prepare("SELECT * FROM tbtagihan WHERE NoPelanggan=$NoPelanggan");
        $ambil->execute();
        while ($row = $ambil->fetch())
        {
?>

<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Input Pembayaran</h3>
</br>
<div>

  <form action="" method="post">
    <label for="NoTagihan">No. Tagihan</label>
    <br>
    <select id="country" name="KodeTagihan">
    <option value="">--Pilih No. Tagihan--</option>

     <option value="<?=$row['KodeTagihan']; ?>"><?=$row['NoTagihan']; ?></option>
    </select>
    </br>
    <label for="TglBayar">Tanggal Bayar</label>
    <br>
    <input value="<?=$row['NoTagihan']; ?>" type="hidden" id="fname" name="NoTagihan" placeholder="" >
    <?php } ?>
    <input value="<?=date(" Y-m-d"); ?>" type="text" id="fname" name="TglBayar" placeholder="Tanggal Bayar" readonly >
    </br>
    <label for="JumlahTagihan">Jumlah Tagihan</label>
    <br>
    <input value="" type="text" id="fname" name="JumlahTagihan" placeholder="Jumlah Tagihan" >
    </br>
    <label for="BuktiPembayaran">Bukti Pembayaran</label>
    <br>
    <input value="" type="file" id="lname" name="BuktiPembayaran" placeholder="Bukti Bayar" >
    </br>
    
    <input  type="submit" id=red name=save value="Save"> 
    <input  type="submit" name=cancel value="Cancel">
  </form>
  <!-- <form action="home.php?page=profil" method="post"> <input  type="submit" name=cancel value="Cancel"> </form> -->
  
</div>

