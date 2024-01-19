<?php
include "koneksi.php";
session_start();

$_GET['id']=$id_barang;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk</title>
  <!-- css bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  

</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-warning bg-warning border-bottom border-body" data-bs-theme="light">
    <div class="container-fluid">
      <a class="navbar-brand active" href="#">Jippy Food</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index_lgt.php">Beranda</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="keranjang.php">Keranjang</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="checkout.php">Checkout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section>
    <div class="container">
      <center>
        <h2 class=" py-3">Detail Pembelian</h2>
        </center>

      <?php

      include "koneksi.php";
      $ambil = mysqli_query($koneksi, "SELECT * FROM transaksi  JOIN pengguna2
      ON transaksi.id_pengguna2=pengguna.id_pengguna2 WHERE transaksi.id_transaksi = '$_GET[id_pengguna2]'");
      $detail = $ambil->fetch_assoc();

      $ambil2 = $koneksi->query("SELECT * FROM metode_pembayaran WHERE id_metode_pembayaran");
      $detail2 = $ambil2->fetch_assoc();
      ?>
     
<div class="row">
  <div class="col-md-4">
    <h3>Pembelian</h3>
    <strong>No. Pembelian : <?php echo $detail['id_transaksi'] ?></strong>
    <p>
        Tanggal : <?php echo $detail['tgl_transaksi']; ?><br>
        Total : <?php echo number_format($detail['total_beli']); ?>
      </p>
  </div>
  <div class="col-md-4">
    <h3>Pelanggan</h3>
    <strong><?php echo $detail['nama_pengguna']; ?></strong>
      <p>
        <?php echo $detail['no_telp']; ?><br>
        <?php echo $detail['email']; ?>
      </p>
  </div>
</div>
    
      <table class="table table-bordered border-success">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>SubTotal</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $nomor = 1;
          $ambil = $koneksi->query("SELECT * FROM detail WHERE id_transaksi = '$_GET[id]' ");
          while($pecah5 = $ambil->fetch_assoc() ) {
          ?>
            <tr>
              <td> <?php echo $nomor; ?> </td>
              <td> <?php echo $pecah5['nama']; ?> </td>
              <td>Rp. <?php echo number_format($pecah5['harga2']); ?> </td>
              <td> <?php echo $pecah5['jumlah_beli']; ?> </td>
              <td> Rp.<?php echo number_format($pecah5['subharga']); ?></td>
            </tr>
            <?php $nomor++; ?>

          <?php
          }
          ?>
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-7">
          <div class="alert alert-info">
            <p>Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_beli']) ?> ke<br>
              <strong><?php echo "$detail2[metode] $detail2[nama] $detail2[nomor]" ?></strong>
            </p>
          </div>
        </div>
      </div>

      <center>
        <button class="btn btn-primary" onclick="window.print()">Print</button>
      </center>
    </div>
  </section>
</body>

</html>