<?php
// memulai sesi
session_start();
if(isset($_SESSION['login'])){
    header('location: index.php');
}

// Memanggil file Koneksi
require "database/koneksi.php";

// Mengecek Request POST dari Login
if(isset($_POST['login'])) {
  // Memasukan data ke dalam variable
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Mengecek username ke database
  $query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username'");

  // Mendapatkan hasil query
  $result = mysqli_fetch_array($query);

  // Mengecek apakah username ditemukan
  if($result) {
    // Mengecek apakah password cocok
    if(password_verify($password, $result['password'])) {
      // Jika password cocok, maka redirect ke halaman dashboard
      $_SESSION['login'] = true;
      $_SESSION['auth'] = $result;
      header("Location: index.php");
      exit();
    } else {
      // Jika password tidak cocok, maka tampilkan pesan error
      $error = "Password yang Anda masukkan salah";
    }
  } else {
    // Jika username tidak ditemukan, maka tampilkan pesan error
    $error = "Username yang Anda masukkan tidak ditemukan";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>DIGIARSIP | Login</title>
</head>
<body>
<div class="kotak-login">
        <h3>LOGIN DIGIARSIP</h3>
        <p>Sistem Informasi Kearsipan Surat</p>
        <form action="" method="post">
            <input type="text" placeholder="Username" name="username" autocomplete="off" required>
            <input type="password" placeholder="Password" name="password" id="password" required>
            <div class="lihat-password">
                <input type="checkbox" id="lihat_password" onclick="lihatPassword()">
                <label for="lihat_password">Lihat Password</label>
            </div>
            <input type="submit" name="login" value="Masuk">
            <a href="registrasi.php">Daftar Akun</a>
        </form>
    </div>

    <script>
    let password = document.getElementById("password");
    function lihatPassword() {
        if (password.type == "password") {
        password.type = "text";
        }else{
        password.type = "password";
        }
    }
</script>
</body>
</html>