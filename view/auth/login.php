<?php
    //menyertakan file program koneksi.php pada login
    include '../../config/koneksi.php';
    //inisialisasi session
    session_start();

    $error = '';
    $validate = '';

    //mengecek apakah sesssion username tersedia atau tidak jika tersedia maka akan diredirect ke halaman index
    if( isset($_SESSION['username']) ) header('Location: index.php');

    //mengecek apakah form disubmit atau tidak
    if( isset($_POST['submit']) )
    {        
        //menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($koneksi, $username);
        //menghilangkan backshlases
        $password = stripslashes($_POST['password']);
        //cara sederhana mengamankan dari sql injection
        $password = mysqli_real_escape_string($koneksi, $password);
        
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($username)) && !empty(trim($password))){

            //select data berdasarkan username dari database
            $query      = "SELECT * FROM users WHERE username = '$username'";
            $result     = mysqli_query($koneksi, $query);
            $rows       = mysqli_num_rows($result);

            if ($rows != 0) {
                $hash   = mysqli_fetch_assoc($result)['password'];
                if(password_verify($password, $hash)){
                    $_SESSION['username'] = $username;
                
                    echo "<script>alert('Berhasil Login');window.location='../../index.php';</script>";
                }
                            
            //jika gagal maka akan menampilkan pesan error
            } else {
                $error =  'Register User Gagal !!';
            }
            
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- costum css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <section class="container-fluid mb-4">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="login.php" method="POST">
                    <h4 class="text-center font-weight-bold"> Login </h4>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                    <div class="form-footer mt-2">
                        <p> Belum punya akun? <a href="register.php">Daftar</a></p>
                    </div>
                </form>
            </section>
        </section>
    </section>
</body>
    
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan yang terakhit Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="assets/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>
