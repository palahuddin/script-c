            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>


            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM tbpembayaran");
                $ambil->execute();

                echo "<table id='tarif' border= 1'>
                <tr>
                <th>Kode Pembaayaran</th>
                <th>Kode Tagihan</th>
                <th>Jumlah Tagihan</th>
                <th>TglBayar</th>
                <th>Status</th>
                </tr>";

                while($row=$ambil->fetch())
                {

                echo "<tr>";
                echo "<td>" . $row['KodePembayaran'] . "</td>";
                echo "<td>" . $row['KodeTagihan'] . "</td>";
                echo "<td>" ."Rp ". number_format($row['JumlahTagihan']) . "</td>";
                echo "<td>" . $row['TglBayar'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         
             <p>&larr; <a href="/superadmin.php?page=pembayaran">Kembali</a>

