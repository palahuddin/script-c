<?php 
require_once("auth.php"); 
include 'config.php';
?>

<h3>Import CSV - Data Supplier</h3>
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
      $sql = "INSERT INTO supplier ( nama_supplier , alamat) 
              VALUES ('$data[0]', '$data[1]')";
      $stmt = $db->prepare($sql);
      $stmt->execute();
        }
      $row++;
      }
    }
    $result = fclose($handle);
    if($result){
        echo "<script type='text/javascript'>
window.location.href = '/home.php?page=supplier'
</script>";
    }
}

?>