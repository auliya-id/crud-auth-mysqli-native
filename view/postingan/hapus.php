<?php 
    // koneksi database
    include '../../config/koneksi.php';
    
    // menangkap data id yang di kirim dari url
    $id = $_GET['id'];
    
    // mengambil data postingan
    $data = mysqli_query($koneksi,"SELECT * FROM postingan WHERE id = '$id'");

    // menghapus data dari database
    mysqli_query($koneksi,"DELETE FROM postingan WHERE id = '$id'");
    
    // mengalihkan halaman kembali ke index.php
    echo "<script>alert('Berhasil menghapus');window.location='index.php';</script>";
?>