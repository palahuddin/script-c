<?php
require_once("config.php");

$data = $_GET['id'];
$edit=$db->prepare("DELETE from users where id=?");
$edit->execute([$data]);

if($edit->rowCount()==0){
    echo "Gagal";
}
else{
    header("Location: admin.php");
}

$db=null;