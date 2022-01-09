<?php
require_once("../config.php");

$data = $_GET['kd_admin'];
$approve=$db->prepare("UPDATE users SET admin = 1 where kd_admin=?");
$approve->execute([$data]);


$data = $_GET['kd_admin'];
$approve=$db->prepare("UPDATE approve SET admin = 1 where kd_admin=?");
$approve->execute([$data]);

if($approve->rowCount()==0){
    echo "Gagal";
}
else{
    header("Location: ../superadmin.php");
}

$db=null;