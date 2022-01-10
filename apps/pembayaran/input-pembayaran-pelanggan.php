<style>
<?php 
include 'assets/css/form.css'; 
require_once "auth.php";
?>
</style>

<h3>Input Pembayaran</h3>
</br>
<div>

  <form action="/home.php?page=simpanbayar" method="post">
    <label for="NoTagihan">No. Tagihan</label>
    <br>

    <select id="country" name="KodeTagihan">
    <option value="">--Pilih No. Tagihan--</option>
      <?php 
        require_once("config.php");
        $NoPelanggan = $_SESSION['users']['username'];
        $ambil=$db->prepare("SELECT * FROM tbtagihan where NoPelanggan='$NoPelanggan'");
        $ambil->execute();
        while ($row=$ambil->fetch())
        {
        ?>
     <option value="<?=$row['KodeTagihan']; ?>"><?=$row['NoTagihan']; ?></option>
        <?php } ?>
    </select>
    </br>
    <label for="TglBayar">Tanggal Bayar</label>
    <br>
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
  
</div>


