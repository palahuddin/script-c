<?php 
require_once("auth.php"); 
include 'config.php';
?>

<h3>Import CSV - Data Barang</h3>
<body>
    <form method="post" enctype="multipart/form-data">
        Pilih file: <input type="file" name="berkas" />
        <input type="submit" name="upload" value="upload" />
    </form> 
</body>


<?php


if(isset($_POST['upload'])){

// ambil data file
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "import/terupload/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

$filename = $dirUpload.$namaFile ;
$row = 1;
if (($handle = fopen("$filename", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      if($row != 1){
      $sql = "INSERT INTO barang ( kd_barang, nama_barang , satuan, harga_jual, harga_beli, stok, status) 
              VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', $data[4], '$data[5]', '$data[6]')";
      $stmt = $db->prepare($sql);
      $stmt->execute();
        }
      $row++;
      }
    }
    $result = fclose($handle);
    if($result){
    echo "<script type='text/javascript'>
    window.location.href = '/home.php?page=barang'
    </script>";
    }
}



?>