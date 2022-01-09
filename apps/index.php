<?php 
include 'config.php'; // panggil perintah koneksi database 

if(!isset($_SESSION['username'] )== 0) { // cek session apakah kosong(belum login) maka alihkan ke index.php
    header('Location: index.php');
}

if(isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
    $username = $_POST['username']; // isi varibel dengan mengambil data username pada form
    $password = $_POST['password']; // isi variabel dengan mengambil data password pada form

    $sql = "SELECT * FROM  tbregister WHERE username = :username OR telp = :username AND password = :password";
    $stmt = $db->prepare($sql); 
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute(); // jalankan query
    $login = $stmt->fetch();
    
    $count = $stmt->rowCount();
    if ($count == 1){
        if ($login['status'] == 0){
            session_start();
            $_SESSION["users"] = $login; // set sesion dengan variabel login
            header("Location: welcome.php");
        } elseif ($login['status'] == 1){
            session_start();
            $_SESSION["users"] = $login; // set sesion dengan variabel login
            header("Location: home.php");
        } else {
            echo "<script type='text/javascript'>
            alert('Login Gagal!');
            window.location.href = 'index.php'
            </script>";
        }
    } else {
        $sql = "SELECT * FROM  tblogin WHERE username = :username OR telp = :username AND password = :password"; // buat queri select
        $stmt = $db->prepare($sql); 
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute(); // jalankan query
        $login = $stmt->fetch();
        $count = $stmt->rowCount(); // mengecek row
        if ($count == 1) { // jika rownya ada 
            if ($login['level'] == 0){
                session_start();
                $_SESSION["users"] = $login; // set sesion dengan variabel login
                header("Location: superadmin.php");
            } elseif ($login['level'] == 1){
                session_start();
                $_SESSION["users"] = $login; // set sesion dengan variabel login
                header("Location: petugas.php");
            } else {
                session_start();
                $_SESSION["users"] = $login; // set sesion dengan variabel login
                header("Location: home.php");
            }       
                
        }else{
            echo "<script type='text/javascript'>
            alert('Login Gagal!');
            window.location.href = 'index.php'
            </script>";
        }
    }
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