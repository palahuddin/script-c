            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>


            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM tbtarif");
                $ambil->execute();

                echo "<table id='tarif' border= 1'>
                <tr>
                <th>Kode Tarif</th>
                <th>Daya</th>
                <th>Tarif Per-Kwh</th>
                <th>Biaya Admin</th>
                </tr>";

                while($row=$ambil->fetch())
                {

                echo "<tr>";
                echo "<td>" . $row['KodeTarif'] . "</td>";
                echo "<td>" . $row['Daya'] . " Watt" . "</td>";
                echo "<td>" ."Rp ". number_format($row['TarifPerKwh']) . "</td>";
                echo "<td>" ."Rp ". number_format( $row['BiayaAdmin']) . "</td>";
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         
             <p>&larr; <a href="/home.php">Kembali</a>

