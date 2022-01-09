<?php
if (isset($_POST['approve'])) {
  require_once("config.php");
  $id = $_POST['kd_user'];
  
  $ambil=$db->prepare("SELECT * FROM tbregister where kd_user=$id");
  $ambil->execute();
  $row = $ambil->fetch();

  $ambil=$db->prepare("UPDATE tbregister SET status='1' where kd_user=$id");
  $ambil->execute();

  $username = $row['username'];
  $password = $row['password'];
  $name = $row['name'];
  $telp = $row['telp'];

  $simpan=$db->prepare("INSERT INTO tblogin (username, password, name, level, telp, photo)
        VALUES ('$username', '$password', '$name', '3', '$telp', 'default.svg')");
  $simpan->execute();
      if($simpan->rowCount()==0){
      echo "Gagal";
      }
      else{
      echo "<script type='text/javascript'>
      alert('Pelanggan Berhasil Di Tambah');
      window.location.href = '/superadmin.php?page=pelangganbaru'
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

                $ambil=$db->prepare("SELECT * FROM tbregister");
                $ambil->execute();
                echo "<br> </br>";
                echo "<table id='pelangganbaru' border= 1'>
                <tr>
                <th>Id</th>
                <th>Uername</th>
                <th>Nama Pelanggan</th>
                <th>No. Telepon</th>
                <th>Actions</th>
                </tr>";

                while($row=$ambil->fetch())
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
