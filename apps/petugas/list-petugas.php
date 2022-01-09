
            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>
            <h3>DATA PETUGAS</h3>
            <br>
            <form action='superadmin.php?page=tambahpetugas' method='post'> 
                <input  type='submit' name='submit' value='+ Tambah Petugas'>
            </form>
            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM tblogin WHERE level = '1' ");
                $ambil->execute();
                echo "<br> </br>";
                echo "<table id='users' border= 1'>
                <tr>
                <th>Id Petugas</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>No. Telepon</th>
                <th>Level</th>
                <th>Actions</th>
                </tr>";

                while($row=$ambil->fetch())
                {

                echo "<tr>";
                echo "<td><center>" . $row['kd_user'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['telp'] . "</td>";
                $status = $row['level'];
                if ($status == 1){
                    $status = "Petugas" ;
                    echo "<td><center>" . $status . "</td>";
                    
                }
                else {
                    $status = "Admin" ;
                    echo "<td>" . $status . "</td>";
                }
                echo "<td><center><form method='post' action='/superadmin.php?page=edituser' style='display:inline-block'>
                    <input type='submit' name='edit' value='Edit' />
                    <input type='hidden' name='kd_user' value=".$row['kd_user']." />
                    </form>
                    <form method='post' action='/superadmin.php?page=deleteuser' style='display:inline-block'>
                    <input type='submit' name='delete' value='Delete' />
                    <input type='hidden' name='kd_user' value=".$row['kd_user']." />
                    </form ></td>"
                    
                    ;
                echo "</tr>";
                }
                
                echo "</table>";
                
                $db=null;
            ?>         
