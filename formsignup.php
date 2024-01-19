<?php
session_start();
// Pastikan Anda mengganti informasi koneksi database sesuai dengan pengaturan Anda
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'web_makanan';

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memproses data dari form jika ada data yang dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password =($_POST["password"]);
    // Mengenkripsi password
    // Membuat query untuk menyimpan data ke dalam tabel "pengguna"
    $sql = "INSERT INTO pengguna2 ( username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil. Silakan login dengan akun Anda.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi database
$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="formlogin.css">
  </head>
  <body>
    <div class="container">
        <form class="form-container" action="" method="post">
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
            <div class="text-start">
              <input type="submit" class="btn btn-success" value="sign up" name="btnsignup">

            </div>
            <br/>
            <div class="mt-4">
              Sudah punya akun silahkan masuk <a href="formlogin.php">Login</a>
            </div>
          </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
