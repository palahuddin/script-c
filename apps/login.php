<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:uname OR email=:mail";
    $stmt = $db->prepare($sql);
    $stmt->BindParam(":uname", $username);
    $stmt->BindParam(":mail", $username);
    $stmt->execute();

    $user = $stmt->fetch();
    $id = $stmt->fetch();
    $row = $stmt->fetch();

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["users"] = $user;
            $admin = $_SESSION["users"]["admin"];
            if ($admin == 1){
                header("Location: home.php");
            }
            elseif ($admin == 2){
                header("Location: superadmin.php");
            }
            else {
                header("Location: welcome.php");
            }

            // login sukses, alihkan ke halaman timeline
            
            
        }
    }
    // $akses = $row['admin'];
    // session_start();
    
    // $_SESSION["users"] = $user;

    
    // login sukses, alihkan ke halaman timeline
    // header("Location: home.php");
    // elseif ($akses = 1 ){
    //         session_start();
    //         $_SESSION["users"] = $user;
    //         // login sukses, alihkan ke halaman timeline
    //         header("Location: admin.php");
    // }
            
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Sistem</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Login Admin</h4>
        <p> </a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username atau email" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />

        </form>
            
        </div>

        <div class="col-md-6">
            <!-- isi dengan sesuatu di sini -->
        </div>

    </div>
</div>
    
</body>
</html>