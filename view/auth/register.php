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
    <?php
        //menyertakan file program koneksi.php pada register
        include '../../config/koneksi.php';
        //inisialisasi session
        session_start();

        $error = '';
        $validate = '';
        if( isset($_SESSION['user']) ) header('Location: index.php');
        //mengecek apakah data username yang diinpukan user kosong atau tidak
        if( isset($_POST['submit']) )
        {
            // menghilangkan backshlases
            $username = stripslashes($_POST['username']);
            //cara sederhana mengamankan dari sql injection
            $username = mysqli_real_escape_string($koneksi, $username);
            $name     = stripslashes($_POST['name']);
            $name     = mysqli_real_escape_string($koneksi, $name);
            $email    = stripslashes($_POST['email']);
            $email    = mysqli_real_escape_string($koneksi, $email);
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($koneksi, $password);
            $repass   = stripslashes($_POST['repassword']);
            $repass   = mysqli_real_escape_string($koneksi, $repass);
            //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
            if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))){
                //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
                if($password == $repass){
                    //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                    if( cek_nama($name,$koneksi) == 0 ){
                        //hashing password sebelum disimpan didatabase
                        $pass   = password_hash($password, PASSWORD_DEFAULT);
                        //insert data ke database
                        $query  = "INSERT INTO users (username,name,email, password ) VALUES ('$username','$name','$email','$pass')";
                        $result = mysqli_query($koneksi, $query);
                        //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                        if ($result) {
                            $_SESSION['username'] = $username;
                        
                            echo "<script>alert('Berhasil daftar dan login');window.location='../../index.php';</script>";
                        
                            //jika gagal maka akan menampilkan pesan error
                        } else {
                            $error =  'Register User Gagal !!';
                        }
                    } else {
                        $error =  'Username sudah terdaftar !!';
                    }
                } else {
                    $validate = 'Password tidak sama !!';
                }
            } else {
                $error =  'Data tidak boleh kosong !!';
            }
        } 

        //fungsi untuk mengecek username apakah sudah terdaftar atau belum
        function cek_nama($username,$koneksi)
        {
            $user   = mysqli_real_escape_string($koneksi, $username);
            $query  = "SELECT * FROM users WHERE username = '$user'";
            if ( $result = mysqli_query($koneksi, $query) ) return mysqli_num_rows($result);
        }
    ?>
    <section class="container-fluid mb-4">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="register.php" method="POST">
                    <h4 class="text-center font-weight-bold"> Daftar </h4>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Alamat Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="email" aria-describeby="emailHelp" placeholder="Masukkan email">
                    </div>
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
                    <div class="form-group">
                        <label for="InputPassword">Re-Password</label>
                        <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Re-Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Daftar</button>
                    <div class="form-footer mt-2">
                        <p> Sudah punya akun? <a href="login.php">Login</a></p>
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
