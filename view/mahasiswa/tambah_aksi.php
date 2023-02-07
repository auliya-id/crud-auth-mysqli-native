<?php 
    // koneksi database
    include '../../config/koneksi.php';
    
    // menangkap data yang di kirim dari form
    $nama   = $_POST['nama'];
    $nim    = $_POST['nim'];
    $alamat = $_POST['alamat'];

    // unggah foto
    $rand       = rand();
    $ekstensi   = array('png','jpg','jpeg','gif');
    $filename   = $_FILES['foto']['name'];
    $ukuran     = $_FILES['foto']['size'];
    $ext        = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext, $ekstensi) ) {
        echo "<script>alert('Ekstensi Harus png, jpg, jpeg');window.location='tambah.php';</script>";
    }else{
        if($ukuran < 99999999999){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/gambar/'.$rand.'_'.$filename);

            // menginput data ke database
            mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES(NULL,'$nama','$nim','$alamat','$xx')"); 

            // mengalihkan halaman kembali ke index.php
            echo "<script>alert('Data Berhasil Ditambah');window.location='index.php';</script>";
        }else{
            echo "<script>alert('Ukuran terlalu besar');window.location='tambah.php';</script>";
        }
    }
?>