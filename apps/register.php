<?php

require_once("config.php");

if(isset($_POST['register'])){

    require_once("config.php");

    $Telp = $_POST['Telp'];
    $ambil=$db->prepare("SELECT * FROM tbregister where telp = '$Telp'");
    $ambil->execute();
    $row=$ambil->fetch();

    if ($row['telp'] === $Telp) { //Check No Telp
        echo "<script>
        alert('No. Telp Already Exist!'); 
            window.location='register.php';
        </script>"; 
        $db=null;
        die ();
        }
    
    $No = "10";
    $NoPelanggan = sprintf($No . rand(100,999));
    $Password = $_POST['Password'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Telp = $_POST['Telp'];

    $simpan=$db->prepare("INSERT INTO tbregister (username, password, name, telp, status, level)
        VALUES ('$NoPelanggan','$Password', '$NamaLengkap', '$Telp', '0', '2')");
    $simpan->execute();
    if($simpan->rowCount()==0){
        echo "Gagal";
    }
    else{
        echo "<script type='text/javascript'>
        alert('User Berhasil Di Daftarkan!');
        window.location.href = 'index.php'
        </script>";
    }
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