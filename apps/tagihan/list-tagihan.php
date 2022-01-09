<style>
<?php 
include 'assets/css/tables.css'; 
require_once("config.php"); ?>
</style>
<?php
    $NoPelanggan = $_POST['NoPelanggan'];
    $ambil=$db->prepare("SELECT * FROM tbtagihan JOIN tbpelanggan using(NoPelanggan) where NoPelanggan='$NoPelanggan'");
    $ambil->execute();
    $row=$ambil->fetch();
    $count=$ambil->rowCount();
    if ($count == 0){
      $NoPelanggan = 'NULL' ;
      $NamaLengkap = 'NULL' ;
      $NoMeter = 'NULL' ;
    } else {
      $NoPelanggan = $row['NoPelanggan'];
      $NamaLengkap = $row['NamaLengkap'];
      $NoMeter = $row['NoMeter'];
    }
    
?>

    <table id="users-2">
      <tr>
        <td>No Pelanggan</td>
        <th>
          <?=$NoPelanggan;?>
        </th>
      </tr>
      <tr>
        <td>No Meter</td>

        <th>
          <?=$NoMeter;?>
        </th>
      </tr>
      <tr>
        <td>Nama Pelanggan</td>

        <th>
          <?=$NamaLengkap;?>
        </th>
      </tr>
      <tr>

      </tr>
    </table>

  <div>
            <?php
                
                $NoPelanggan = $_POST['NoPelanggan'];
                $ambil=$db->prepare("SELECT * FROM tbtagihan JOIN tbpelanggan using(NoPelanggan) where NoPelanggan='$NoPelanggan'");
                $ambil->execute();
                echo "<br> </br>";
                echo "<table id='users' border= 1'>
                <tr>
                <th>No. Tagihan</th>
                <th>Tahun Tagihan</th>
                <th>Bulan Tagih</th>
                <th>Jumlah Pemakaian</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Actions</th>
                </tr>";

                while($row=$ambil->fetch())
                {

                echo "<tr>";
                echo "<td><center>" . $row['NoTagihan'] . "</td>";
                echo "<td><center>" . $row['TahunTagih'] . "</td>";
                echo "<td><center>" . $row['BulanTagih'] . "</td>";
                echo "<td><center>" . $row['JumlahPemakaian'] . "</td>";
                echo "<td><center>" ."Rp ". number_format($row['TotalBayar']) . "</td>";
                echo "<td><center>" . $row['Status'] . "</td>";
                echo "<td><center><form method='post' action='tagihan/print-tagihan.php' style='display:inline-block'>
                    <input type='submit' name='edit' value='Print' />
                    <input type='hidden' name='NoTagihan' value=".$row['NoTagihan']." />
                    </form>
                    <form method='post' action='/superadmin.php?page=detailtagihan' style='display:inline-block'>
                    <input type='submit' name='detail' value='Detail' />
                    <input type='hidden' name='KodeTagihan' value=".$row['KodeTagihan']." />
                    </form ></td>"
                    
                    ;
                echo "</tr>";
                }
                
                echo "</table>";
                $db=null;
            ?>      
    </div>              
<p>
<div>
<h3>Input Tagihan</h3>
<style>
<?php include 'assets/css/form-bayar.css'; ?>
</style>
<form action="/superadmin.php?page=simpantagihan" method="post">
    </br>
    <label for="TahunTagih">Tahun Tagih</label>
    <br>
    <input value="" type="text" id="fname" name="TahunTagih" placeholder="Tahun Tagihan" >
    <input value="<?=$_POST['NoPelanggan'];?>" type="hidden" id="fname" name="NoPelanggan">
    </br>
    <label for="BulanTagih">Bulan Tagih</label>
    <br>

    <select id="country" name="BulanTagih">
    <option value="">-- Pilih Bulan --</option>
              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>
              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>
              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>
              <option value="Oktober">Oktober</option>
              <option value="November">November</option>
              <option value="Desember">Desember</option>
    </select>
    </br>
    <label for="JumlahPemakaian">Jumlah Pemakaian</label>
    <br>
    <input value="" type="text" id="fname" name="JumlahPemakaian" placeholder="Jumlah Pemakaian" >
    </br>
    <input  type="submit" name=save value="Save"> 
    <p>&larr; <a href="/superadmin.php?page=tagihan">Kembali</a>
</form>
</div>

