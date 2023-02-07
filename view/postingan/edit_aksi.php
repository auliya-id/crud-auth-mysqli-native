<?php 
    // koneksi database
    include '../../config/koneksi.php';
    
    $id       = $_POST['id'];
    $kategori = $_POST['kategori'];
    $judul    = $_POST['judul'];
    $isi      = $_POST['isi'];

    // jalankan query UPDATE berdasarkan ID yang kita edit
    $query  = "UPDATE postingan SET kategori_id = '$kategori', judul = '$judul', isi = '$isi' WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    // periksa query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        echo "<script>alert('Data berhasil Diubah');window.location='index.php';</script>";
    }
    
?>