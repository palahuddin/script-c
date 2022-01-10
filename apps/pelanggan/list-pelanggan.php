<?php
if (isset($_POST['delete'])) {
  require_once("config.php");
  $id = $_POST['KodePelanggan'];

  try {
    $delete=$db->prepare("DELETE from tbpelanggan where KodePelanggan=$id");
    $delete->execute();
    echo "<script type='text/javascript'>
    alert('Pelanggan Berhasil Di Delete');
    window.location.href = '/superadmin.php?page=pelanggan'
    </script>";
  } catch (PDOException $error) {
    echo "<script type='text/javascript'>
    alert('Gagal Delete Pelanggan!');
    window.location.href = '/superadmin.php?page=pelanggan'
    </script>";
  }

  $db=null;

}


?>
            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>
            <h3>DATA PELANGGAN</h3>
            <br>
            <form action='superadmin.php?page=tambahpelanggan' method='post'> 
                <input  type='submit' name='submit' value='+ Tambah Pelanggan'>
            </form>
            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM tbpelanggan p JOIN tbtarif t ON p.KodeTarif = t.KodeTarif");
                $ambil->execute();
                echo "<br> </br>";
                echo "<table id='users' border= 1'>
                <tr>
                <th>Kode Pelanggan</th>
                <th>No. Pelanggan</th>
                <th>No. Meter</th>
                <th>Daya Aktif</th>
                <th>Nama Lengkap</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Actions</th>
                </tr>";

                while($row=$ambil->fetch())
                {

                echo "<tr>";
                echo "<td><center>" . $row['KodePelanggan'] . "</td>";
                echo "<td>" . $row['NoPelanggan'] . "</td>";
                echo "<td>" . $row['NoMeter'] . "</td>";
                echo "<td>" . $row['Daya'] ." Watt". "</td>";
                echo "<td>" . $row['NamaLengkap'] . "</td>";
                echo "<td>" . $row['Telp'] . "</td>";
                echo "<td>" . $row['Alamat'] . "</td>";
                echo "<td><center><form method='post' action='/superadmin.php?page=editpelanggan' style='display:inline-block'>
                    <input type='submit' name='edit' value='Edit' />
                    <input type='hidden' name='KodePelanggan' value=".$row['KodePelanggan']." />
                    </form>
                    <form method='post' action='' style='display:inline-block'>
                    <input type='submit' name='delete' value='Delete' />
                    <input type='hidden' name='KodePelanggan' value=".$row['KodePelanggan']." />
                    </form ></td>"
                    
                    ;
                echo "</tr>";
                }
                
                echo "</table>";
                
                $db=null;
            ?>         
