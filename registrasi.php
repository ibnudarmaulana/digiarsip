<?php
require_once "php/registrasi.php";
session_start();
if(isset($_SESSION['login'])){
    header('location: index.php');
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
            <input type="submit" name="registrasi" value="Registrasi">
            <a style="text-align: center;" href="login.php">Sudah Punya Akun</a>
        </form>
    </div>
</body>
</html>