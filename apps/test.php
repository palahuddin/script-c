<?php require_once("auth.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="test2.php">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>
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
            <h6>Welcome,<b> <?php echo $_SESSION["user"]["name"] ?></b></h6>
            <p><a href="logout.php">Logout</a></p>

            <style>
            <?php include 'css/tables.css'; ?>
            </style>


            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM users");
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
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='delete.php?id=".$row['id']."'>Delete</a></td>";
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         

            
            
        </div>
    
    </div>
</div>



</body>

</body>
</html>
