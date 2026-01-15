<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4" style="width: 350px;">
        <h1 class="text-center">Login</h1><br>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input name="email" type="email"
                       class="form-control"
                       placeholder="masukkan email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password"
                       class="form-control"
                       placeholder="masukkan password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>

            <p class="text-center mt-3">
                Belum punya akun?
                <a href="register.php"
                   class="fw-bold text-primary text-decoration-none">
                   Daftar disini
                </a>
            </p>
        </form>
    

        <?php
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $pass = md5($_POST['password']);

            require 'koneksi.php';
            //cek credentials user
            $ceklogin = "SELECT * FROM pengguna1 WHERE email='$email' AND password='$pass'";
            $result = $koneksi->query($ceklogin);

            if($result->num_rows > 0){
                //echo "login berhasil";
                $_SESSION['login'] = TRUE;
                $_SESSION['email'] = $email;
                header("Location: index.php");
            } else {
                echo "login gagal";
            }
        }
        ?>
    </div>
</body>
</html>