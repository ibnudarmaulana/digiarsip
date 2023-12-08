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
    <title>Dashboard</title>
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
        <h2>Selamat Datang <?= $_SESSION['auth']['nama'] ?></h2>
    </div>
</body>
</html>
