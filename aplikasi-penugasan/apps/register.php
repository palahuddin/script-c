<?php

require 'lib/controller.php';
$cmd = new account();
if(isset($_POST['register'])){

    $Telp = $_POST['Telp'];
    $No = "10";
    $NoPelanggan = sprintf($No . rand(100,999));
    $Password = $_POST['Password'];
    $NamaLengkap = $_POST['NamaLengkap'];

    $cmd->check_no($Telp,"tbregister","register.php");
    $cmd->register($NoPelanggan,$Password,$NamaLengkap,$Telp);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Akun</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">


        <h4>Registrasi Pelanggan Baru</h4>
        <p>Sudah Jadi Pelanggan? <a href="index.php">Login di sini</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="NamaLengkap" placeholder="Nama kamu" required />
            </div>

            <div class="form-group">
                <label for="username">No. Handphone</label>
                <input class="form-control" type="text" name="Telp" placeholder="No. Handhphone" required />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="Password" placeholder="Password" required />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="assets/img/connect.png" />
        </div>

    </div>
</div>

</body>
</html>