<?php 
require_once("auth.php"); 

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>

<body class="bg-light">


<div class="container mt-1">
<div class="header">
  <img src="assets/img/connect.png" alt="logo" style="width:50px;height:50px;" />
  <h1>List Penugasan</h1>
  <p> </p>
  <p> </p>

  

            <div class="col-md-10">
            <h6>Welcome,<b> <?php echo $_SESSION["users"]["name"] ?></b></h6>
            <p><a href="logout.php">Logout</a></p>

            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>


            <?php
                require_once("config.php");
                $telp = $_SESSION["users"]["telp"];
                $ambil=$db->prepare("SELECT * FROM tbtugas ");
                $ambil->execute();

                echo "<table id='users' border= 1'>
                <tr>
                <th>Id</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>PIC Customer</th>
                <th>No. Kontak</th>
                <th>Aksi</th>
                </tr>";

                while($row=$ambil->fetch())
                {
                echo "<tr>";
                echo "<td>" . $row['id_tugas'] . "</td>";
                echo "<td>" . $row['nama_customer'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['pic_customer'] . "</td>";
                echo "<td>" . $row['pic_kontak'] . "</td>";
                echo "<td><center><form method='post' action='#/teknisi.php?page=checkin' style='display:inline-block'>
                    <input type='submit' name='edit' value='Check-In' />
                    </form>
                    <form method='post' action='lokasi.php' style='display:inline-block'>
                    <input id='demo' type='submit' name='delete' value='Check-Out' />
                    
                    </form ></td>"
                    
                    ;
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         

            
            
        </div>
    
    </div>
</div>

</body>
</html>