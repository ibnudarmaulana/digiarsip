<?php
// memulai session
session_start();
if(!isset($_SESSION['login'])){
    header('location: login.php');
}

require "database/koneksi.php";
$user_id = $_SESSION['auth']['id'];
$surat_masuk = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE pengguna_id = $user_id ");
$nomor = 1;

if(isset($_GET['cari'])){
    $key = $_GET['cari'];
    $user_id = $_SESSION['auth']['id'];
    $surat_masuk = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE pengguna_id = $user_id AND perihal_surat LIKE '%$key%' ");
    $nomor = 1;
}

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
    <div class="pencarian">
        <form action="">
            <input type="text" name="cari">
            <input type="submit" value="cari">
        </form>
    </div>
    <div class="tabel">
        <a href="tambah_surat_masuk.php"><button class="tombol-tambah">Tambah Surat</button></a>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal Surat</th>
                    <th>Asal Surat</th>
                    <th>File Surat</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($surat_masuk as $value) :?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $value['nomor_surat']; ?></td>
                    <td><?= $value['tanggal_surat']; ?></td>
                    <td><?= $value['perihal_surat']; ?></td>
                    <td><?= $value['asal_surat']; ?></td>
                    <td>
                        <a style="text-decoration: none;" href="file_surat/surat_masuk/<?= $value['file_surat'];?>" target="_blank">Lihat</a>
                    </td>
                    <td>
                        <a style="text-decoration: none;" href="edit_surat_masuk.php?id=<?= $value['id'];?>">Edit</a>
                    </td>
                    <td>
                        <a style="text-decoration: none;" href="hapus_surat_masuk.php?id=<?= $value['id'];?>">Hapus</a>                        
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>
