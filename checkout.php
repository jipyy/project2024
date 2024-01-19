<?php
session_start();

//  echo"<pre>";
//  print_r($_SESSION['keranjang']);
//  echo"</pre>";
 $koneksi = mysqli_connect("localhost", "root", "", "web_makanan");

//  if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
//  {
//     echo "<script>alert(' Keranjang kosong, silahkan pilih produk dahulu '):</script>";
//     echo "<script>document.location.href='index_lgt.php'</script>";
//  }

//jika belum login maka tidak bisa checkout
// if (!isset($_SESSION["pengguna"])){

//     echo"<script>alert('silahkan login');</script>";
//     echo"<script>location='formlogin.php';</script>";
// }

//jika keranjang kosong maka ada pemberitahuan dan kembali ke halaman index
if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang masih kososng, silahkan isi keranjang anda')</script>";
    echo "<script>location='index_lgt.php'</script>";
  }
  
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
            <center><h1>CHECKOUT</h1></center>
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
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1;?>
                    <?php $totalbelanja = 0;?>
                    <?php
                    foreach($_SESSION['keranjang'] as $id_barang => $jumlah):
                        
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
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja+=$subharga;?>
                    <?php endforeach?>
                </tbody>
                <tfoot>
                    <th>Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja)?></th>
                </tfoot>
            </table>
            <a href="index_lgt.php" class="btn btn-success">Lanjut Belanja</a>
            <a href="keranjang.php" class="btn btn-danger">Keranjang</a>
            <a href="nota.php" class="btn btn-primary" name="checkout">Checkout</a>
            <br><br>
            <form method="post" >
                <div class="row">
                    <div class="col-md-4">
                        <div class="col-md-4">
                          <div class="form-group">
                                 <input type="text" readonly class="form-control" value="<?php echo $_SESSION["pengguna"]['username']?>" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                                 <!-- <select class="form-control" name="id_ongkir">
                                    <option value="">Pilih Kota</option>
                                    <?php 
                                    //$ambil = $koneksi->query("SELECT * FROM ongkir");
                                    //while($perongkir = $ambil->fetch_assoc()){
                                    ?>
                                    <option value="<?php //echo $perongkir["id_ongkir"]?>">
                                        <?php //echo $perongkir['nama_kota']?>
                                        Rp. <?php //echo number_format($perongkir['tarif'])?>
                                    </option>
                                    <?php //} ?>
                                 </select> -->
                        </div>
                        </div>
                    </div>
                </div>
            </form>


            <?php
    //menambahkan data beli ke database
    include 'koneksi.php';
    if (isset($_POST['checkout'])) {
      // $metode_bayar = $_POST['metode_bayar'];
      // $id_pengguna = $_SESSION['pengguna']['id_pengguna'];
      //$id_metode_pembayaran = $_POST['id_metode'];
      //$tanggal_beli = date('Y-m-d');

// ambil id_pengguna
      $data1 = mysqli_query($koneksi, "SELECT * FROM pengguna2 WHERE id_pengguna");
      $pisah2 = mysqli_fetch_assoc($data1);
      $id_pengguna = $pisah2['id_pengguna'];

      
      // menambahkan data ke table transaksi
      mysqli_query($koneksi, "INSERT INTO transaksi(id_pengguna2,id_barang,subharga,jumlah_beli) 
                VALUES ('$id_pengguna','$id_barang','$subharga','$jumlah_beli') ");

// mendapatkan id_transaksi barusan terjadi
$id_pembelian_barusan = $koneksi->insert_id;

      foreach ($_SESSION['keranjang'] as $id_barang => $jumlah) {
        // mendapatkakn data produk berdasarkan id_produk
        $ambil = $koneksi->query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
        $perproduk = $ambil->fetch_assoc();
        $nama = $perproduk['nama_barang'];
        $harga = $perproduk['harga'];
        $subharga = $perproduk['harga'] * $jumlah;
        

        $dataa =mysqli_query($koneksi,"INSERT INTO transaksi( id_transaksi, id_barang, nama_barang, harga, subharga, jumlah_beli)
 VALUES ('$id_pembelian_barusan', '$id_barang', '$nama', '$harga', '$subharga', '$jumlah')");

      }

      
      unset($_SESSION['keranjang']);
      // unset($_SESSION['keranjang'][$id_barang]);

      echo "<script>alert('Pembelian berhasil')</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
    }
    ?>

  <?php
  $data = mysqli_query($koneksi, "SELECT * FROM pengguna2 WHERE id_pengguna2");
  $pisah = mysqli_fetch_assoc($data);
  $id_pengguna = $pisah['id_pengguna2'];


?>





            <?php
            //  if(isset($_POST["checkout"])){
            //      $id_pengguna = $_SESSION["pengguna"]["id_pengguna"];
            //      $id_ongkir = $_POST["id_ongkir"];
            //      $tgl_beli = date("y-m-d");
            //      $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
            //      $arrayongkir = $ambil->fetch_assoc();
            //      $tarif = $arrayongkir['tarif'];
            //      $total_pembelian = $totalbelanja + $tarif;

            //      menyimpan data ke table checkout
            //       $koneksi->query("INSERT INTO checkout (id_pengguna,tgl_beli,total_harga,id_ongkir) 
            //       VALUES ('$id_pengguna','$tgl_beli','$total_pembelian','$id_ongkir')");

            //       $sql = "INSERT INTO checkout (id_pengguna,tgl_beli,total_harga,id_ongkir) VALUES ('$id_pengguna','$tgl_beli','$total_pembelian','$id_ongkir')";
            //  }
            ?>
        </div>
    </section>
    <!-- <pre>
    <?php //print_r($_SESSION["pengguna"]);?>
    </pre> 
    <pre>
    <?php //print_r($_SESSION["keranjang"]);?>
    </pre>  -->
</body>
</html>