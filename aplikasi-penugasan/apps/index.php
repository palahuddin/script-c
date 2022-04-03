<?php 
if(!isset($_SESSION['username'] )== 0) { // cek session apakah kosong(belum login) maka alihkan ke index.php
    header('Location: index.php');
}

require 'lib/controller.php';
$cmd = new account();
if(isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
    $username = $_POST['username']; // isi varibel dengan mengambil data username pada form
    $password = $_POST['password']; // isi variabel dengan mengambil data password pada form
    $cmd->login($username,$password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

     <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>

<body class="bg-light">
    <header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Aplikasi Sistem PLN Pasca Bayar</h1>
                        <h2></h2>
                        <section>
                            <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img class="img img-responsive" src="assets/img/connect.png" />
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                    <div class="col-md-4">
                    <form action="" method="POST">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" placeholder="Username atau No. Handphone" />
                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Password" />
                            </div>

                            <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />
                            <p>
                            <p>Daftar Pelanggan? <a href="register.php">Registrasi di sini</a></p>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </header>



</body>
</html>