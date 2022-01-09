

<?php 
include ("config.php");
if (isset($_POST['save'])) {
  $Huruf = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  $NoTagihan = substr(str_shuffle($Huruf),0,6);
  $NoPelanggan = $_POST['NoPelanggan'];
  $TahunTagih = $_POST['TahunTagih']; 
  $BulanTagih = $_POST['BulanTagih']; 
  $JumlahPemakaian = $_POST['JumlahPemakaian'];

  $simpan=$db->prepare("SELECT * from tbtagihan where NoTagihan='$NoPelanggan' And NoPelanggan='$NoPelanggan' And TahunTagih='$TahunTagih' And BulanTagih='$BulanTagih'");
  $simpan->execute();
  if($simpan->rowCount() > 0){
    echo "<script>
    alert('Gagal! Bulan Tersebut Sudah Ada Tagihannya!');
    location.href='/superadmin.php?page=tagihanlist';
    </script>";
  }
  else {
    function cariTotalBayar($JumlahPemakaian)
    {   
    include ("config.php");
    $NoPelanggan = $_POST['NoPelanggan'];
    $simpan=$db->prepare("SELECT * from tbpelanggan join tbtarif using(KodeTarif) where NoPelanggan='$NoPelanggan'");
    $simpan->execute();
    $row=$simpan->fetch();
    
    $tarif = $row['TarifPerKwh'];
    $beban = $row['Beban'];
    $TotalBayar = ($JumlahPemakaian * $tarif) + $beban;
    return $TotalBayar;
    }
    $TotalBayar = cariTotalBayar($JumlahPemakaian);
    $Status = "Belum";
    $simpan=$db->prepare("INSERT INTO tbtagihan (NoTagihan, NoPelanggan, TahunTagih, BulanTagih, JumlahPemakaian, TotalBayar, Status )
        VALUES('$NoTagihan','$NoPelanggan','$TahunTagih','$BulanTagih','$JumlahPemakaian','$TotalBayar','$Status')");
    $simpan->execute();
    
    if($simpan)
    {
    echo "<script>
    alert('Data Berhasil Disimpan');
    location.href='/superadmin.php?page=tagihan';
    </script>";
    }
    else
    {
    echo "<script>
    alert('Data GAGAL Disimpan');
    location.href='/superadmin.php?page=tagihan';
    </script>";
    }
  }
    
}

elseif (isset($_POST['cancel'])) {
  echo "<script type='text/javascript'>
  window.location.href = 'superadmin.php?page=edituserlist'
  </script>";
}

?>


