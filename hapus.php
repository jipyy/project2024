<?php
session_start();
$id_produk=$_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);
echo "<script>alert(' Produk berhasil di hapus '):</script>";
echo "<script>document.location.href='keranjang.php'</script>";
?>