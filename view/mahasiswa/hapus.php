<?php 
    // koneksi database
    include '../../config/koneksi.php';
    
    // menangkap data id yang di kirim dari url
    $id = $_GET['id'];
    
    // mengambil data mahasiswa
    $data = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE id = '$id'");

    // Hapus foto yang telah diupload dari folder assets/gambar
    unlink("../../assets/gambar/" . $data->fetch_assoc()['foto']);

    // menghapus data dari database
    mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE id = '$id'");
    
    // mengalihkan halaman kembali ke index.php
    echo "<script>alert('Berhasil menghapus');window.location='index.php';</script>";
?>