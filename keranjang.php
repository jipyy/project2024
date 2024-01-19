<?php
session_start();


// if(!isset($_SESSION['keranjang'])){
//     header("Location: keranjang.php");
// }


//  echo"<pre>";
//  print_r($_SESSION['keranjang']);
//  echo"</pre>";
 $koneksi = mysqli_connect("localhost", "root", "", "web_makanan");

//  if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
//  {
//     echo "<script>alert(' Keranjang kosong, silahkan pilih produk dahulu '):</script>";
//     echo "<script>document.location.href='index_lgt.php'</script>";
//  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar.nav">
                <li><a href="index_lgt.php"></a></li>
                <li><a href="checkout.php"></a></li>
            </ul>
        </div>
    </nav>
    <section class="konten">
        <div class="container">
            <center><h1>keranjang Belanja</h1></center>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Produk</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Total Harga</td>
                        <td>Foto</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                <?php $nomor=1;?>
                    <?php
                    if(isset($_SESSION['keranjang'])){

                 
                    foreach($_SESSION['keranjang'] as $id_barang => $jumlah){
                    ?>
                    <?php
                    // Menampilkan produk yang di beli berdasarkan Id Produk
                    $ambil = $koneksi->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["harga"]*$jumlah;
                    //print atas
                    // echo"<pre>";
                    // print_r($pecah);
                    // echo"</pre>";
                    
                    ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $pecah["nama_barang"];?></td>
                        <td>Rp. <?php echo number_format($pecah["harga"]);?></td>
                        <td><?php echo $jumlah;?></td>
                        <td>Rp. <?php echo number_format($subharga);?></td>
                        <td><img src="img/<?php echo $pecah["foto"];?>" alt=""></td>
                        <td><a href="hapus.php?id=<?php echo $id_barang?>" class="btn btn-danger btn-xs">Hapus</a></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php //endforeach
                    }
                }
                    ?>
                    <?php?>
                </tbody>
            </table>
            <a href="index_lgt.php" class="btn btn-success">Lanjut Belanja</a>
            <a href="checkout.php" class="btn btn-danger">checkout</a>
        </div>
    </section>
</body>
</html>