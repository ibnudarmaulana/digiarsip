<?php
// memulai session
session_start();
if(!isset($_SESSION['login'])){
    header('location: login.php');
}

require "database/koneksi.php";
$user_id = $_SESSION['auth']['id'];
$surat_masuk = mysqli_query($koneksi, "SELECT * FROM surat_keluar WHERE pengguna_id = $user_id ");
$nomor = 1;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Surat Masuk</title>
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
        <h1 style="text-align: center;">Surat Masuk</h1>
    </div>
    <div class="tabel">
        <a href="tambah_surat_keluar.php"><button class="tombol-tambah">Tambah Surat</button></a>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal Surat</th>
                    <th>Tujuan Surat</th>
                    <th>File Surat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($surat_masuk as $value) :?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $value['nomor_surat']; ?></td>
                    <td><?= $value['tanggal_surat']; ?></td>
                    <td><?= $value['perihal_surat']; ?></td>
                    <td><?= $value['tujuan_surat']; ?></td>
                    <td><a href="file_surat/surat_keluar/<?= $value['file_surat'];?>" target="_blank">Lihat</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>
