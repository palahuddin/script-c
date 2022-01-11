            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>


            <?php
                require_once("lib/controller.php");
                $cmd = new ambil();
                $row = $cmd->select("tbpembayaran","KodePembayaran","!=0");

                echo "<table id='tarif' border= 1'>
                <tr>
                <th>Kode Pembaayaran</th>
                <th>No Tagihan</th>
                <th>Nama Pelanggan</th>
                <th>Jumlah Bayar</th>
                <th>TglBayar</th>
                <th>Status</th>
                </tr>";

                foreach($row as $row)
                {

                echo "<tr>";
                echo "<td>" . $row['KodePembayaran'] . "</td>";
                echo "<td>" . $row['NoTagihan'] . "</td>";
                echo "<td>" . $row['NamaLengkap'] . "</td>";
                echo "<td>" ."Rp ". number_format($row['JumlahTagihan']) . "</td>";
                echo "<td>" . $row['TglBayar'] . "</td>";
                echo "<td>" . $row['BuktiPembayaran'] . "</td>";
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         

