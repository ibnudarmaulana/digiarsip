<?php
// memulai sesi
session_start();

// Memanggil file Koneksi
require "koneksi.php";

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