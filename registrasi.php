<?php
session_start();
if(isset($_SESSION['login'])){
    header('location: index.php');
}

// Memanggil File Koneksi
require "database/koneksi.php";

// Mengecek Permintaan HTTP POST
if(isset($_POST['registrasi'])){
  // Memasukan Data Ke dalam Variable dan Membuat filter isi
  $nama = htmlspecialchars($_POST['nama']);
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $konfirmasi_password = htmlspecialchars($_POST['konfirmasi_password']);
  // Mengecek Kesamaan Password
  if($password == $konfirmasi_password){
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
    // Query Memasukan Data ke dalam Database
    $query = mysqli_query($koneksi, "INSERT INTO pengguna VALUES ('','$nama','$username','$hashed_password')");
  
    // Mengalihkan ke Halaman Login
    return header('location: login.php');
  }else{
    echo "<script>alert('Konfirmasi Password Tidak Sama')</script>";
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>DIGIARSIP | Registrasi</title>
</head>
<body>
<div class="kotak-login">
        <h3>REGISTRASI DIGIARSIP</h3>
        <p>Sistem Informasi Kearsipan Surat</p>
        <form action="" method="post">
            <input type="text" placeholder="Nama" name="nama" autocomplete="off" required>
            <input type="text" placeholder="Username" name="username" autocomplete="off" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="password" placeholder="Konfirmasi Password" name="konfirmasi_password" required>
            <input type="submit" name="registrasi" value="Registrasi">
            <a style="text-align: center;" href="login.php">Sudah Punya Akun</a>
        </form>
    </div>
</body>
</html>