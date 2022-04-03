<style>
<?php include 'assets/css/form.css'; ?>
</style>

<h3>Input Tarif</h3>
<form action='/superadmin.php?page=listtarif' method="post"> 
    <input  type='submit' value='+ Lihat Semua Tarif'>
</form>
</br>
<div>
  

  <form action="/superadmin.php?page=simpantarif" method="post">
    <label for="Daya">Daya</label>
    <br>
    <input value="" type="text" id="fname" name="Daya" placeholder="Daya" >
    </br>
    <label for="JumlahTagihan">Tarif Per-Kwh</label>
    <br>
    <input value="" type="text" id="fname" name="TarifPerKwh" placeholder="Tarif Per Kwh" >
    </br>
    <label for="BuktiPembayaran">Biaya Admin</label>
    <br>
    <input value="" type="text" id="lname" name="BiayaAdmin" placeholder="Biaya Admin" >
    </br>
    
    <input  type="submit" id=red name=save value="Save"> 

  </form>
  <!-- <form action="home.php?page=profil" method="post"> <input  type="submit" name=cancel value="Cancel"> </form> -->
  
</div>


