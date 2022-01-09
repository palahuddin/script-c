<?php 
include ("config.php");
if (isset($_POST['save'])) {
  $Daya = $_POST['Daya'];
  $TarifPerKwh = $_POST['TarifPerKwh'];
  $Beban = $_POST['Beban'];

  $simpan=$db->prepare("INSERT INTO tbtarif (Daya, TarifPerKwh, Beban) VALUES('$Daya','$TarifPerKwh','$Beban')");
  $simpan->execute();
    if($simpan){
      echo "<script>
        alert('Data Berhasil Disimpan');
        location.href='/superadmin.php?page=tarif';
        </script>";
    } else {
      echo "<script>
        alert('Data GAGAL Disimpan');
        location.href='/superadmin.php?page=tarif';
        </script>";
      }
}

?>


