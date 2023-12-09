<?php
// memulai session
session_start();
if(!isset($_SESSION['login'])){
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Surat Keluar</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="sidebar">
        <a href="index.php">Dashboard</a>
        <a href="surat_masuk.php" >Surat Masuk</a>
        <a href="surat_keluar.php" >Surat Keluar</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="konten">
    <div class="header">
        <h1 style="text-align: center;">Surat Keluar</h1>
    </div>
    <div class="tabel">
        <a href="tambah_surat_keluar.php"><button class="tombol-tambah">Tambah Surat</button></a>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nomor Surat</th>
                    <th>Asal Surat</th>
                    <th>Tanggal Surat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>SM001</td>
                    <td>Pengirim 1</td>
                    <td>2023-10-19</td>
                </tr>
                <!-- Tambahkan baris-baris tabel untuk surat masuk lainnya di sini -->
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>
