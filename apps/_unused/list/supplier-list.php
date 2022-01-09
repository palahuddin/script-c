
            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>
            <h3>LIST SUPPLIER</h3>
                <br>
            <form action='home.php?page=tambahsupplier' method='post'> 
                <input  type='submit' name='submit' value='+ Tambah Supplier'>
            </form>
                <br>
            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM supplier ");
                $ambil->execute();
                echo "<table id='users' border= 1'>
                <tr>
                <th>Id</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Actions</th>
                </tr>";

                while($row=$ambil->fetch())
                {

                echo "<tr>";
                echo "<td>" . $row['kd_supplier'] . "</td>";
                echo "<td text-align= left >" . $row['nama_supplier'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td><form method='post' action='/superadmin.php?page=editsupplier' style='display:inline-block'>
                    <input type='submit' name='edit' value='Edit' />
                    <input type='hidden' name='kd_supplier' value=".$row['kd_supplier']." />
                    </form>
                    <form method='post' action='/superadmin.php?page=deletesupplier' style='display:inline-block'>
                    <input type='submit' name='delete' value='Delete' />
                    <input type='hidden' name='kd_supplier' value=".$row['kd_supplier']." />
                    </form ></td>"
                    
                    ;
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         
