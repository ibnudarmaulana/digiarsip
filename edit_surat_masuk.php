<?php
// memulai session
session_start();
if(!isset($_SESSION['login'])){
    header('location: login.php');
}

require "database/koneksi.php";

if(isset($_POST['simpan'])){
    $nomor_surat = htmlspecialchars($_POST['nomor_surat']);
    $tanggal_surat = htmlspecialchars($_POST['tanggal_surat']);
    $perihal_surat = htmlspecialchars($_POST['perihal_surat']);
    $asal_surat = htmlspecialchars($_POST['asal_surat']);

    if(isset($_FILES["file_surat_baru"])){
        $namaFile = $_FILES['file_surat_baru']['name'];
        $tmpName = $_FILES['file_surat_baru']['tmp_name'];
    
        $randName = uniqid();
        $explode = explode('.',$namaFile);
        $ektensiFile = strtolower(end($explode));
    
        $namaFileRandom = $randName.'.'.$ektensiFile;
    
        move_uploaded_file($tmpName, 'file_surat/surat_masuk/'.$namaFileRandom);
        
        $file_surat = $namaFileRandom;   
    }
    $pengguna_id = $_SESSION['auth']['id'];

    mysqli_query($koneksi, "UPDATE `surat_masuk` SET `nomor_surat` = '$nomor_surat', `tanggal_surat` = '$tanggal_surat', `perihal_surat` = '$perihal_surat', `asal_surat` = '$asal_surat' WHERE `surat_masuk`.`id` = '$_GET[id]';");

    echo "<script>alert('Perubahan Berhasil Disimpan')</script>";
}

if(isset($_GET['id'])){
    $surat_masuk = mysqli_query($koneksi,"SELECT * FROM surat_masuk WHERE id = '$_GET[id]'");
    $hasil = mysqli_fetch_array($surat_masuk);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Surat Masuk</title>
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
        <a href="surat_masuk.php" class="tombol-kembali">Kembali</a>
    <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" id="nomor_surat" name="nomor_surat" value="<?=$hasil["nomor_surat"]?>" required>

                <label for="tanggal_surat">Tanggal Surat</label>
                <input type="date" id="tanggal_surat" name="tanggal_surat" value="<?=$hasil["tanggal_surat"]?>" required>

                <label for="perihal_surat">Perihal Surat</label>
                <input type="text" id="perihal_surat" name="perihal_surat" value="<?=$hasil["perihal_surat"]?>" required>

                <label for="asal_surat">Asal Surat</label>
                <input type="text" id="asal_surat" name="asal_surat" value="<?=$hasil["asal_surat"]?>" required>

                <label for="file_surat">File Surat</label>
                <input type="file" id="file_surat" name="file_surat_baru">

                <button type="submit" name="simpan">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>
</html>
