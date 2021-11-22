<?php
require_once("config.php");

$data = $_GET['kd_admin'];
$ambil=$db->prepare("SELECT * FROM users where kd_admin = $data");
$ambil->execute();
$row=$ambil->fetch();

$id = $row['kd_admin'];
$name = $row['name'];
$username = $row['username'];
$email = $row['email'];
$admin = $row['admin'];

$sql = "INSERT INTO approve (kd_admin, name, username, email, admin) 
            VALUES ('$id', '$name', '$username', '$email', '$admin')";
$insert=$db->prepare($sql);
$insert->execute();

if($insert->rowCount()==0){
    echo "Gagal";
}
else{
    header("Location: welcome.php");
}

$db=null;