<?php
require_once("lib/controller.php");
$cmd = new petugas();

if (isset($_POST['delete'])) {
  require_once("config.php");
  $id = $_POST['kd_user'];
  $cmd->delete_petugas($id);
}

?>
            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>
            <h3>DATA PETUGAS</h3>
            <br>
            <?php 
            $level = $_SESSION['users']['level'];
            if ($level == 0) { 
            ?>
            <form action='superadmin.php?page=tambahpetugas' method='post'> 
                <input  type='submit' name='submit' value='+ Tambah Petugas'>
            </form>

            <?php } ?>

            <?php
                $rows = $cmd->petugas("1");
                
                echo "<br> </br>";
                echo "<table id='petugas' border= 1'>
                <tr>
                <th>Id Petugas</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>No. Telepon</th>
                <th>Level</th>";
                $level = $_SESSION['users']['level'];
                    if ($level == 0) {
                        echo "<th>Actions</th>
                            </tr>";
                    }

                foreach($rows as $row )
                {
                echo "<tr>";
                echo "<td><center>" . $row['kd_user'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td><center>" . $row['telp'] . "</td>";
                $status = $row['level'];
                if ($status == 1){
                    $status = "Petugas" ;
                    echo "<td><center>" . $status . "</td>";
                    
                }
                else {
                    $status = "Admin" ;
                    echo "<td>" . $status . "</td>";
                }
                $level = $_SESSION['users']['level'];
                    if ($level == 0) {
                        echo "<td><center><form method='post' action='/superadmin.php?page=edituser' style='display:inline-block'>
                        <input type='submit' name='edit' value='Edit' />
                        <input type='hidden' name='kd_user' value=".$row['kd_user']." />
                        </form>
                        <form method='post' action='' style='display:inline-block'>
                        <input type='submit' name='delete' value='Delete' />
                        <input type='hidden' name='kd_user' value=".$row['kd_user']." />
                        </form ></td>"
                    ;

                    }
                
                echo "</tr>";
                }
                
                echo "</table>";
                
                $db=null;
            ?>         
