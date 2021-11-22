<?php
require_once("config.php");

$data = $_GET['kd_admin'];
$edit=$db->prepare("DELETE from users where kd_admin=?");
$edit->execute([$data]);

if($edit->rowCount()==0){
    echo "Gagal";
}
else{
    header("Location: home.php");
}

$db=null;