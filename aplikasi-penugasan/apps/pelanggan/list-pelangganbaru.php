<?php
require_once "auth.php";
require_once("lib/controller.php");
$cmd = new pelanggan();

if (isset($_POST['approve'])) {
  $id = $_POST['kd_user'];
  $cmd->pelanggan_baru($id);
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
                $cmd = new ambil();
                $rows = $cmd->select("tbregister","kd_user","!=0");
                echo "<br> </br>";
                echo "<table id='pelangganbaru' border= 1'>
                <tr>
                <th>Id</th>
                <th>Uername</th>
                <th>Nama Pelanggan</th>
                <th>No. Telepon</th>
                <th>Actions</th>
                </tr>";

                foreach($rows as $row)
                {

                echo "<tr>";
                echo "<td><center>" . $row['kd_user'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['telp'] . "</td>";
                $status = $row['status'];
                  if ($status == '0'){
                  echo "<td><center><form method='post' action='' style='display:inline-block'>
                    <input type='submit' name='approve' value='Approve' />
                    <input type='hidden' name='kd_user' value=".$row['kd_user']." />
                    </form>
                    <form method='post' action='' style='display:inline-block'>
                    <input type='submit' name='delete' value='Reject' />
                    <input type='hidden' name='kd_user' value=".$row['kd_user']." />
                    </form ></td>"
                    ;
                  }else {
                  echo "<td><center><form method='post' action='' style='display:inline-block'>
                    <input type='submit' name='approve' value='Already Approve' disabled/>
                    <input type='hidden' name='kd_user' value=".$row['kd_user']." />
                    </form>
                    <form method='post' action='' style='display:inline-block'>
                    <input type='submit' name='delete' value='Reject' hidden/>
                    <input type='hidden' name='kd_user' value=".$row['kd_user']." />
                    </form ></td>"
                    ;
                  }
                
                echo "</tr>";
                }
                
                echo "</table>";
                
                $db=null;
            ?>         
