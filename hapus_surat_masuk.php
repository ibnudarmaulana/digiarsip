<?php
require 'database/koneksi.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($koneksi,"DELETE FROM surat_masuk WHERE id = $id");
    header('location: surat_masuk.php');
}