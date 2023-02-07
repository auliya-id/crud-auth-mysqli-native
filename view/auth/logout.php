<?php
    session_start(); //inisialisasi session
    if(session_destroy()) //menghapus session
    { 
        echo "<script>alert('Berhasil keluar :(');window.location='login.php';</script>";
    }
?>