<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<style>
    <?php 
    include '../assets/css/tables.css'; 
    include '../assets/css/form.css';
    require_once("../config.php"); ?>
    </style>
    <?php
        $NoPelanggan = $_POST['NoTagihan'];
        $ambil=$db->prepare("SELECT * FROM tbtagihan JOIN tbpelanggan using(NoPelanggan) where NoTagihan='$NoPelanggan'");
        $ambil->execute();
        $row=$ambil->fetch()
    ?>

    <table id="users-2">
      <tr>
        <td>No Pelanggan</td>
        <th>
          <?=$row['NoPelanggan'];?>
        </th>
      </tr>
      <tr>
        <td>No Meter</td>

        <th>
          <?=$row['NoMeter'];?>
        </th>
      </tr>
      <tr>
        <td>Nama Pelanggan</td>

        <th>
          <?=$row['NamaLengkap'];?>
        </th>
      </tr>
      <tr>

      </tr>
    </table>
            <?php
                
                $NoPelanggan = $_POST['NoTagihan'];
                $ambil=$db->prepare("SELECT * FROM tbtagihan JOIN tbpelanggan using(NoPelanggan) where NoTagihan='$NoPelanggan'");
                $ambil->execute();
                echo "<br> </br>";
                echo "<table id='users' border= 1'>
                <tr>
                <th>No. Tagihan</th>
                <th>Tahun Tagihan</th>
                <th>Bulan Tagih</th>
                <th>Jumlah Pemakaian</th>
                <th>Total Bayar</th>
                </tr>";

                while($row=$ambil->fetch())
                {

                echo "<tr>";
                echo "<td><center>" . $row['NoTagihan'] . "</td>";
                echo "<td><center>" . $row['TahunTagih'] . "</td>";
                echo "<td><center>" . $row['BulanTagih'] . "</td>";
                echo "<td><center>" . $row['JumlahPemakaian'] . "</td>";
                echo "<td><center>" ."Rp ". number_format($row['TotalBayar']) . "</td>";
                echo "</tr>";
                }
                
                echo "</table>";




                
                
                $db=null;
            ?>   
<p>   
<input type="button" value="Cetak Tagihan" onClick="window.print()">
<p>&larr; <a href="/superadmin.php?page=tagihan">Kembali</a>
</body>
</html>

