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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
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
                    <a href="index.php" class="nav-link text-light">Beranda</a>
                </li>
                <li class="nav-item ml-4">
                    <a href="view/mahasiswa/index.php" class="nav-link text-light">Mahasiswa</a>
                </li>
                <li class="nav-item ml-4">
                    <a href="view/postingan/index.php" class="nav-link text-light">Postingan</a>
                </li>
                <li class="nav-item ml-4">
                    <a href="view/auth/logout.php" class="nav-link text-light">Keluar</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="jumbotron jumbotron-fluid bg-light" style="height:90vh">
        <div class="container">
            <h1 class="display-4 text-center mt-4">HOME</h1>
            <p class="lead text-center">LOGIN OR REGISTER SUCCESSFULLY ):</p>
        </div>
    </div>
</body>
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan yang terakhit Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="assets/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>