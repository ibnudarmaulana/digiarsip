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
    <div class="form-container">
            <form>
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" id="nomor_surat" name="nomor_surat" required>

                <label for="asal_surat">Asal Surat</label>
                <input type="text" id="asal_surat" name="asal_surat" required>

                <label for="tanggal_surat">Tanggal Surat</label>
                <input type="date" id="tanggal_surat" name="tanggal_surat" required>

                <button type="submit">Simpan Surat</button>
            </form>
        </div>
    </div>
</body>
</html>
