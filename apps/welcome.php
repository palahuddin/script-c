<?php require_once("auth.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="bg-light">


<div class="container mt-1">
<div class="header">
  <img src="img/connect.png" alt="logo" style="width:50px;height:50px;" />
  <h1>PT. Faza Teknindo</h1>
  <p> </p>
  <p> </p>

  

            <div class="col-md-10">
            <h6>Welcome,<b> <?php echo $_SESSION["users"]["name"] ?></b></h6>
            <p><a href="logout.php">Logout</a></p>

            <style>
            <?php include 'css/tables.css'; ?>
            </style>


            <?php
                require_once("config.php");
                $myid=$_SESSION["users"]["name"];
                $ambil=$db->prepare("SELECT * FROM users where name='$myid'");
                $ambil->execute();

                echo "<table id='users' border= 1'>
                <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
                </tr>";

                while($row=$ambil->fetch())
                {
                echo "<tr>";
                echo "<td>" . $row['kd_admin'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='request.php?kd_admin=".$row['kd_admin']."'>Request Access</a></td>";
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