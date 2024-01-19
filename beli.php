<?php
session_start();
// Mendapatkan id produk dari button 
$id_produk = $_GET['id'];

// Menambahkan produk + 1 jika sudah ada produknya
if(isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk]+=1;
}

// Menambahkan produk + 1 jika belum ada produknya
else{
    $_SESSION['keranjang'][$id_produk] = 1;
}

// echo"<pre>";
// print_r($_SESSION);
// echo"</pre>";
echo"<script>alert('Berhasil menambahkan produk ke keranjang belanja');</script>";
echo"<script>location='keranjang.php';</script>";
?>