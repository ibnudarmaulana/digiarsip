<?php
// Memanggil File Koneksi
require "koneksi.php";

// Mengecek Permintaan HTTP POST
if(isset($_POST['registrasi'])){
  // Memasukan Data Ke dalam Variable dan Membuat filter isi
  $nama = htmlspecialchars($_POST['nama']);
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Query Memasukan Data ke dalam Database
  $query = mysqli_query($koneksi, "INSERT INTO pengguna VALUES ('','$nama','$username','$hashed_password')");

  // Memasang sesi registrasi
  // $_SESSION['registrasi'] = "Registrasi Berhasil";

  // Mengalihkan ke Halaman Login
  return header('location: ../login.php');

}
