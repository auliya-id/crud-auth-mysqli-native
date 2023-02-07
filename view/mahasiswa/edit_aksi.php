<?php 
    // koneksi database
    include '../../config/koneksi.php';
    
    // menangkap data yang di kirim dari form
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $nim    = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $foto   = $_FILES['foto']['name'];

    //cek dulu jika merubah foto jalankan coding ini
    if($foto != "") {
        $ekstensi_diperbolehkan = array('png','jpg','jpeg','gif'); //ekstensi file gambar yang bisa diupload 
        $x                      = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi               = strtolower(end($x));
        $file_tmp               = $_FILES['foto']['tmp_name'];   
        $angka_acak             = rand(1,999999);
        $nama_gambar_baru       = $angka_acak . '-' . $foto; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
            move_uploaded_file($file_tmp, '../../assets/gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                
            //jalankan query UPDATE berdasarkan ID yang kita edit
            $query  = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', alamat = '$alamat', foto = '$nama_gambar_baru' WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);
            // periksa query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
            }
        } else {     
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah.php';</script>";
        }
    } else {
        // jalankan query UPDATE berdasarkan ID yang kita edit
        $query  = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', alamat = '$alamat' WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        // periksa query apakah ada error
        if(!$result){
                die ("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    }
?>