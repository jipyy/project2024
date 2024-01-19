<?php
// Pastikan Anda mengganti informasi koneksi database sesuai dengan pengaturan Anda
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'toko_makanan';

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
    $sql = "INSERT INTO pengguna ( username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil. Silakan login dengan akun Anda.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Pengguna Baru</h2>

        <?php
        if (!empty($PesanEror)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$PesanEror</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user" value="<?php echo $user;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password ;?>">
                </div>
            </div>

            <?php
            if (!empty($PesanSukses)) {
                echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-3 d-grid'>
                   <div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>$PesanSukses</strong>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>
            ";

            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/myshop/admin.php" role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>
</body>
</html>