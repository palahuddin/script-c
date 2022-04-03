<?php 
require_once("auth.php");
include 'config.php';
?>

<h3>Import CSV - Data User</h3>

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

$row = 0;
$skip_row_number = array("1");
$filename = $dirUpload.$namaFile ;
$handle = fopen($filename,"r");



while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $row++;	
        // count total filed of csv row 
          $num = count($data);  
          // check row for skip row 	
        if (in_array($row, $skip_row_number))	
          {
          continue; 
          // skip row of csv
        }
        else
        {
          $name = $data[3];
          $username = $data[0] ;
          // enkripsi password
          $password = password_hash($data[2], PASSWORD_DEFAULT);
          $email = $data[1];
          $admin = $data[4];
  
          $register = "INSERT INTO users (name, username, email, password, admin) 
          VALUES (:name, :username, :email, :password, :admin)";
          
          $stmt = $db->prepare($register);
  
          // bind parameter ke query
          $params = array(
              ":name" => $name,
              ":username" => $username,
              ":password" => $password,
              ":email" => $email,
              ":admin" => $admin
          );
  
          // eksekusi query untuk menyimpan ke database
          $saved = $stmt->execute($params);
          echo "<script type='text/javascript'>
                window.location.href = '/superadmin.php?page=edituser'
                </script>";
        }
  }
}
?>