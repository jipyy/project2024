<?php
session_start();
// Lakukan koneksi ke database MySQL
$koneksi = mysqli_connect("localhost", "root", "", "web_makanan");

// Periksa koneksi
if (mysqli_connect_error()) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Tangkap data dari form login
if (isset($_POST{'btnlogin'})){
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari pengguna dengan username yang cocok
$query = "SELECT * FROM pengguna2 WHERE username='$username' and password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 1) {
  // if($data=mysqli_fetch_array($query)){
  //   $_SESSION['username'] = $data['username'];
  // }
  $akun = $result->fetch_assoc();
  $_SESSION["pengguna"] = $akun;
    // Pengguna ditemukan, periksa kata sandi
    header("Location: index_lgt.php"); // Arahkan ke halaman dashboard
  } else {
      // Password salah
      echo "<script>alert('Anda gagal login, periksa akun anda !');</script>";
  }
    
}
// Tutup koneksi
mysqli_close($koneksi);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="formlogin.css">
  </head>
  <body>
    <div class="container">
        <form class="form-container" method="post">
            <div class="mb-3">

              <label for="username" class="form-label">Username</label>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
              </svg>
              <div class="row">
              </div>
              <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="username" class="form-text">pastikan username yang anda masukan benar.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
              </svg>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              <div id="username" class="form-text">pastikan pasword yang anda masukan benar.</div>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">saya sudah memeriksa</label>
            </div>
            <div class="mt-4">
              <input type="submit" class="btn btn-success" value="login" name="btnlogin">
            </div>
            <div class="mt-4">
              Belum punya akun silahkan daftar <a href="formsignup.php">Daftar</a>
            </div>
          </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>