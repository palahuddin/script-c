<style>
<?php 
require_once "auth.php";
include 'assets/css/tables.css'; 
require_once("config.php"); 
?>
</style>
<?php
    $NoPelanggan = $_SESSION['users']['username'];
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
                
                $NoPelanggan = $_SESSION['users']['username'];
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
                echo "<td><center><form method='post' action='tagihan/print-tagihan-pelanggan.php' style='display:inline-block'>
                    <input type='submit' name='edit' value='Print' />
                    <input type='hidden' name='NoTagihan' value=".$row['NoTagihan']." />
                    </form>
                    </form ></td>"
                    
                    ;
                echo "</tr>";
                }
                
                echo "</table>";
                $db=null;
            ?>      
    </div>              


