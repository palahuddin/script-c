<?php
require_once "auth.php";
require_once("lib/controller.php");
$cmd = new pelanggan();

if (isset($_POST['delete'])) {
  $id = $_POST['KodePelanggan'];
  $cmd->delete_pelanggan($id);
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
                $rows = $cmd->pelanggan();
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

                foreach($rows as $row )
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
