<?php
    //inisialisasi session
    session_start();

    //mengecek username pada session
    if( !isset($_SESSION['username']) ){
        $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
        echo "<script>alert('anda harus login untuk mengakses halaman ini');window.location='view/auth/login.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>M Noval Nur Auliya - 191011401333</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img{width:100%;}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
        <div class="container">
            <a href="index.php" class="navbar-brand">KODEKREASI</a>
            <button class="navbar-toggler" type="button" data-togle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ml-auto pt-2 pb-2">
                <li class="nav-item">
                    <a href="../../index.php" class="nav-link text-light">Beranda</a>
                </li>
                <li class="nav-item ml-4">
                    <a href="../mahasiswa/index.php" class="nav-link text-light">Mahasiswa</a>
                </li>
                <li class="nav-item ml-4">
                    <a href="index.php" class="nav-link text-light">Postingan</a>
                </li>
                <li class="nav-item ml-4">
                    <a href="../auth/logout.php" class="nav-link text-light">Keluar</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <a href="tambah.php">+ TAMBAH POSTINGAN</a>
        <button type="button" onclick="window.print()">
            Print Laporan
        </button>
        <div class="row">
            <?php
            // import file database.php untuk menggunakan fungsi di dalamnya
            include "../../config/koneksi.php";
            
            $userSess = $_SESSION['username'];
            $join   = "SELECT judul, kategori, name, tanggal, isi, postingan.id as postId FROM postingan 
                        JOIN users ON users.id = postingan.user_id
                        JOIN kategori ON kategori.id = postingan.kategori_id WHERE username = '$userSess'
                        ORDER BY postId DESC";
            $select = mysqli_query($koneksi, $join);
            
            //melakukan looping
            while($data = mysqli_fetch_array($select)){ ?>
                <div class="row">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="../../assets/gambar/404.png">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="news-title">
                                                <a href="#">
                                                    <h5><?php echo $data['judul']; ?></h5>
                                                </a>
                                            </div>
                                            <div class="news-cats">
                                                <ul class="list-unstyled list-inline mb-1">
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-user text-danger"></i>
                                                        <!-- menampilkan data nama dan status dari tabel user -->
                                                        <small><?php echo $data['kategori']; ?></small> - 
                                                        <small><?php echo $data['name']; ?></small>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-calendar text-danger"></i>
                                                        <!-- menampilkan data tanggal -->
                                                        <a href="#"><small><?php echo $data['tanggal']; ?></small></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="news-content">
                                                <p><?php echo $data['isi']; ?></p>
                                            </div>
                                            <div class="news-buttons">
                                                <a href="hapus.php?id=<?php echo $data['postId']; ?>" class="btn btn-outline-danger btn-sm">Hapus</a>
                                                <a href="edit.php?id=<?php echo $data['postId']; ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan yang terakhit Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="assets/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>