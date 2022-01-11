<?php

$db_host = "db";
$db_user = "root";
$db_pass = "password";
$db_name = "listrik";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}

class ambil {
    public function select($table,$field,$condition){
        global $db;
        $ambil=$db->prepare("SELECT * FROM $table WHERE $field $condition");
        $ambil->execute();
        while ($row = $ambil->fetch()){
            $data[] = $row;
        }
        return $data;
    }
}

class check_login {
    public function select($username){
        global $db;
        $ambil=$db->prepare("SELECT r.status FROM  tblogin l JOIN tbregister r ON r.username  = l.username  WHERE r.username = '$username'");
        $ambil->execute();
        $count = $ambil->rowCount();
        if ($count == 0) {
            echo "<script type='text/javascript'>
            alert('Tidak Ada Izin Akses!');
            window.location.href = '/index.php'
            </script>";
        }
        $db=null;
    }
}

class account {

    public function login($username,$password) {
        global $db;
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
                    header("Location: superadmin.php");
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
    public function check_no($Telp,$table,$url) {
        global $db;
        $ambil=$db->prepare("SELECT * FROM $table where telp = '$Telp'");
        $ambil->execute();
        $row=$ambil->fetch();

        if ($row['telp'] === $Telp) { //Check No Telp
            echo "<script>
            alert('No. Telp Already Exist!'); 
                window.location='$url';
            </script>"; 
            $db=null;
            die ();
            } 
    }
    public function register($NoPelanggan,$Password,$NamaLengkap,$Telp) {
        global $db;
        $simpan=$db->prepare("INSERT INTO tbregister (username, password, name, telp, status, level)
            VALUES ('$NoPelanggan','$Password', '$NamaLengkap', '$Telp', '0', '2')");
        $simpan->execute();
        
        if($simpan){
            echo "<script type='text/javascript'>
            alert('User Berhasil Di Daftarkan!');
            window.location.href = 'index.php'
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('User Gagal Di Daftarkan!');
            window.location.href = 'index.php'
            </script>";
        }

    }
}

class petugas {
    public function dashboard($table){
        global $db;
        $ambil=$db->prepare("SELECT * FROM $table");
        $ambil->execute();
        $row = $ambil->rowCount();
        return $row;
    }
    public function petugas($id){
        global $db;
        $ambil=$db->prepare("SELECT * FROM tblogin WHERE level = $id ");
        $ambil->execute();
        while($row = $ambil->fetch()){
            $data[] = $row;
        }
        return $data;
    }
    public function delete_petugas($id){
        global $db;
        try {
            $delete=$db->prepare("DELETE from tblogin where kd_user=$id");
            $delete->execute();
            echo "<script type='text/javascript'>
            alert('Petugas Berhasil Di Delete');
            window.location.href = '/superadmin.php?page=petugas'
            </script>";
          } catch (PDOException $error) {
            echo "<script type='text/javascript'>
            alert('Gagal Delete Petugas!');
            window.location.href = '/superadmin.php?page=petugas'
            </script>";
          }
        
          $db=null;
    }
    public function tambah_petugas($NoPelanggan,$Password,$NamaLengkap,$Telp){
        global $db;
        $simpan=$db->prepare("INSERT INTO tblogin (username, password, name, level, telp, photo)
                VALUES ('$NoPelanggan', '$Password', '$NamaLengkap', '1', '$Telp', 'default.svg')");
        $simpan->execute();
        $count = $simpan->rowCount();
        if ($count == 0) {
            echo "<script type='text/javascript'>
            alert('Pelanggan Gagal Di Tambah');
            window.location.href = '/superadmin.php?page=petugas'
            </script>";
        } else {
            echo "<script type='text/javascript'>
            alert('Pelanggan Berhasil Di Tambah');
            window.location.href = '/superadmin.php?page=petugas'
            </script>";
        }
        $db=null;
    }
}

class pelanggan {
    public function pelanggan(){
        global $db;
        $ambil=$db->prepare("SELECT * FROM tbpelanggan p JOIN tbtarif t ON p.KodeTarif = t.KodeTarif");
        $ambil->execute();
        while($row=$ambil->fetch()){
            $data[] = $row;
        }
        return $data;

    }
    public function delete_pelanggan($id){
        global $db;
        try {
        $delete=$db->prepare("DELETE from tbpelanggan where KodePelanggan=$id");
        $delete->execute();
            echo "<script type='text/javascript'>
            alert('Pelanggan Berhasil Di Delete');
            window.location.href = '/superadmin.php?page=pelanggan'
            </script>";
        } catch (PDOException $error) {
            echo "<script type='text/javascript'>
            alert('Gagal Delete Pelanggan!');
            window.location.href = '/superadmin.php?page=pelanggan'
            </script>";
        }

        $db=null;
    }
    public function edit_pelanggan($uid){
        global $db;
        $ambil=$db->prepare("SELECT * FROM tbpelanggan p JOIN tbtarif t ON p.KodeTarif = t.KodeTarif where KodePelanggan = $uid");
        $ambil->execute();
        $row=$ambil->fetch();
        return $row;
    }
    public function save_pelanggan($NoMeter,$NamaLengkap,$Alamat,$Telp,$KodeTarif,$NoPelanggan){
        global $db;
        $edit=$db->prepare("UPDATE tbpelanggan set
                NoMeter='$NoMeter', NamaLengkap='$NamaLengkap', Alamat='$Alamat', Telp='$Telp', KodeTarif='$KodeTarif' 
            where NoPelanggan='$NoPelanggan'");
        $edit->execute();
        if($edit->rowCount()==0){
            echo "<script type='text/javascript'>
            alert('Gagal di Update');
            window.location.href = '/superadmin.php?page=pelanggan'
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Data Pelanggan Berhasil di Update');
            window.location.href = '/superadmin.php?page=pelanggan'
            </script>";
        }

        $db=null;
    }
    public function pelanggan_baru($id){
        global $db;        
        $ambil=$db->prepare("SELECT * FROM tbregister where kd_user=$id");
        $ambil->execute();
        $row = $ambil->fetch();
      
        $ambil=$db->prepare("UPDATE tbregister SET status='1' where kd_user=$id");
        $ambil->execute();
      
        $username = $row['username'];
        $password = $row['password'];
        $name = $row['name'];
        $telp = $row['telp'];
      
        $simpan=$db->prepare("INSERT INTO tblogin (username, password, name, level, telp, photo)
              VALUES ('$username', '$password', '$name', '2', '$telp', 'default.svg')");
        $simpan->execute();
            if($simpan->rowCount()==0){
            echo "Gagal";
            }
            else{
            echo "<script type='text/javascript'>
            alert('Pelanggan Berhasil Di Tambah');
            window.location.href = '/superadmin.php?page=pelangganbaru'
            </script>";
            }
      
        $db=null;
    }
    public function insert_pelanggan($NoPelanggan,$NoMeter,$KodeTarif,$NamaLengkap,$Telp,$Alamat,$page){
        global $db;
        $simpan=$db->prepare("INSERT INTO tbpelanggan (NoPelanggan, NoMeter, KodeTarif, NamaLengkap, Telp, Alamat)
            VALUES ('$NoPelanggan', '$NoMeter', '$KodeTarif', '$NamaLengkap', '$Telp', '$Alamat')");
        $simpan->execute();
        $count = $simpan->rowCount();
        if($count == 0){
        echo "<script type='text/javascript'>
        alert('Pelanggan Gagal Di Tambah');
        window.location.href = '/$page.php?page=tambahpelanggan'
        </script>";
        }
        else {
        echo "<script type='text/javascript'>
        alert('Pelanggan Berhasil Di Tambah');
        window.location.href = '/$page.php?page=pelanggan'
        </script>";
        }
        $db=null;
    }
    public function insert_pelanggan_login($NoPelanggan,$NoMeter,$KodeTarif,$NamaLengkap,$Telp,$Alamat,$page){
        global $db;
        $simpan=$db->prepare("INSERT INTO tbpelanggan (NoPelanggan, NoMeter, KodeTarif, NamaLengkap, Telp, Alamat)
            VALUES ('$NoPelanggan', '$NoMeter', '$KodeTarif', '$NamaLengkap', '$Telp', '$Alamat')");
        $simpan->execute();
        $count = $simpan->rowCount();
        if($count == 0){
            echo "<script type='text/javascript'>
            alert('Pelanggan Gagal Di Tambah');
            window.location.href = '/$page.php?page=tambahpelanggan'
            </script>";
        }else {
            $simpan=$db->prepare("INSERT INTO tblogin (username, password, name, level, telp, photo)
                VALUES ('$NoPelanggan', 'asd', '$NamaLengkap', '2', '$Telp', 'default.svg')");
            $simpan->execute();

            $simpan=$db->prepare("INSERT INTO tbregister (username, password, name, level, telp, photo, status)
                VALUES ('$NoPelanggan', 'asd', '$NamaLengkap', '2', '$Telp', 'default.svg', '1')");
            $simpan->execute();

            $count = $simpan->rowCount();
            if ($count == 0) {
            echo "<script type='text/javascript'>
                alert('Pelanggan Gagal Di Tambah');
                window.location.href = '/$page.php?page=tambahpelanggan'
                </script>";
            } else {
            echo "<script type='text/javascript'>
                alert('Pelanggan Berhasil Di Tambah');
                window.location.href = '/$page.php?page=pelanggan'
                </script>";
            }
       }
    }
    
}

class pembayaran {
    public function save_pembayaran($KodeTagihan,$TglBayar,$JumlahTagihan,$BuktiPembayaran,$Status,$page){
        global $db;
        $simpan=$db->prepare("INSERT into tbpembayaran (KodeTagihan, TglBayar, JumlahTagihan, BuktiPembayaran, Status )
            VALUES('$KodeTagihan','$TglBayar','$JumlahTagihan','$BuktiPembayaran','$Status')");
        $simpan->execute();
        if($simpan){
            echo "<script type='text/javascript'>
                alert('Input Pembayaran Berhasil');
                window.location.href = '/$page.php?page=pembayaran'
            </script>";
        }
        $db=null;
    }
    public function detail_tagihan($kode){
        global $db;
        $ambil=$db->prepare("SELECT * FROM tbtagihan join tbpelanggan using(NoPelanggan) where KodeTagihan= '$kode'");
        $ambil->execute();
        $row=$ambil->fetch();
        return $row;
        }
    public function set_status($Status,$KodeTagihan){
        global $db;
        $simpan=$db->prepare("UPDATE tbpembayaran set Status='$Status' where KodeTagihan='$KodeTagihan'");
        $simpan->execute();
        $simpan=$db->prepare("UPDATE tbtagihan set Status='$Status' where KodeTagihan='$KodeTagihan'");
        $simpan->execute();

            if($simpan){
                echo "<script type='text/javascript'>
                alert('Pembayaran Sudah Di Set');
                window.location.href = 'superadmin.php?page=tagihan'
                </script>";
            }
        $db=null;
    }
}

?>