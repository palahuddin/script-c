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
  <h1>PLN Pasca Bayar</h1>
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
                $ambil=$db->prepare("SELECT * FROM tbregister where telp='$telp'");
                $ambil->execute();

                echo "<table id='users' border= 1'>
                <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>No. Telp</th>
                <th>Status</th>
                </tr>";

                while($row=$ambil->fetch())
                {
                echo "<tr>";
                echo "<td>" . $row['kd_user'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['telp'] . "</td>";
                $status = $row['status'];
                if ($status == '0') {
                    echo "<td><center>" . "Menunggu Approval" . "</td>";
                    
                }
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