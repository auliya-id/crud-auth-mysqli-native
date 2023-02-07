<?php 
    // koneksi database
    include '../../config/koneksi.php';
    session_start();
    
    $username = $_SESSION['username'];
    $idUser = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    
    $userId   = $idUser->fetch_assoc()['id'];
    $kategori = $_POST['kategori'];
    $judul    = $_POST['judul'];
    $isi      = $_POST['isi'];
    $tanggal  = date("Y-m-d H:i:s");

    // menginput data ke database
    mysqli_query($koneksi, "INSERT INTO postingan VALUES(NULL,'$userId','$kategori','$judul','$isi','$tanggal')"); 

    // mengalihkan halaman kembali ke index.php
    echo "<script>alert('Data Berhasil Ditambah');window.location='index.php';</script>";
?>