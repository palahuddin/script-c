<?php
session_start();
include 'config.php';
if(isset($_POST['upload'])){

// ambil data file
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "terupload/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

$filename = $dirUpload.$namaFile ;
$row = 1;
if (($handle = fopen("$filename", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      if($row != 1){
      $password = password_hash($data[2], PASSWORD_DEFAULT);
      $sql = "INSERT INTO users ( username, email, password, name, admin, photo) 
              VALUES ('$data[0]', '$data[1]', '$password', '$data[3]', $data[4], '$data[5]')";
      $stmt = $db->prepare($sql);
      $stmt->execute();
        }
      $row++;
      }
    }
    fclose($handle);
}

header('location: superadmin.php?page=importuser'); 
?>