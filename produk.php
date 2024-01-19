<?php
    include 'koneksi.php';
    if (isset($_GET['aksi'])){
        if($_GET['aksi']=="edit"){
            $result = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id_produk]'");
            while($data = mysqli_fetch_array($result)){
                $nama_produk= $data['nama_produk'];
                $harga= $data['harga'];
                $stok= $data['stok'];
                $kategori= $data['kategori'];
                $foto= $data['foto'];
            }
        }elseif($_GET['aksi']=="hapus"){
            $hapus = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$_GET[id_produk]'");
            if($hapus){
                echo "<script>document.location.href='produk.php'</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity=
    "sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <a href="index_lgt.php">Kembali Ke Home</a><br><br>

</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="25%" border=0>
        <tr>
            <td> Nama Produk</td>
            <td><input type="text" name="nama_produk" value=<?=@$nama_produk?> ></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" value=<?=@$harga?> ></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="number" name="stok" value=<?=@$stok?> ></td>
        </tr>
        <tr>
            <td>kategori</td>
            <td><input type="text" name="kategori" value=<?=@$kategori?> ></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><input type="file" name="foto" value=<?=@$foto?> ></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Tambah"></td>
        </tr>
        </table>
    </form>
<table class="table table-bordered border-warning">
  <thead>
    <tr>
        <h1>Data Produk </h1>
      <th scope="col">No</th>
      <th scope="col">Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col">kategori</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
               include 'koneksi.php';
               $no=1;
               $query = mysqli_query($koneksi, "SELECT * FROM produk");
               while($data=mysqli_fetch_array($query)){
                $id_produk=$data['id_produk'];
                echo "<tr>";
                echo "<td>".$no; $no++."</td>";
                echo "<td>".$data['nama_produk']."</td>";
                echo "<td>".$data['harga']."</td>";
                echo "<td>".$data['stok']."</td>";
                echo "<td>".$data['kategori']."</td>";
                echo "<td style ='padding: 5px;'><img src='img/".$data['foto']."'style='width= 300px;' 'height: 160px'></td>";

            ?>
                <td> <a href="produk.php?aksi=edit&id_produk=<?=$id_produk?>">Edit</a>
                     <a href="produk.php?aksi=hapus&id_produk=<?=$id_produk?>">Hapus</a></td>
                </tr>
            <?php }?>
  </tbody>
</table>
        <?php
        include 'koneksi.php';
        if(isset($_POST['submit'])){
            if(($_GET['aksi']=='edit')){
                $id_produk = $_GET['id_produk'];
                $nama_produk = $_POST['nama_produk'];
                $harga = $_POST['harga'];
                $stok = $_POST['stok'];
                $kategori = $_POST['kategori'];
                $foto = $_FILES['foto']['name'];
                $ekstensi1 = array('png','jpg','jpeg');
                $x = explode('.',$foto);
                $ekstensi = strtolower(end($x));
                $file_tmp = $_FILES['foto']['tmp_name'];
                if(in_array($ekstensi,$ekstensi1) === true){
                    move_uploaded_file($file_tmp,'img/'.$foto);
                }else{
                    echo "<script> alert('Ekstensi tidak diperbolehkan')</script>";
                }
                $edit = mysqli_query($koneksi, "UPDATE produk set nama_produk='$nama_produk',harga='$harga',stok='$stok',kategori='$kategori',foto='$foto' where id_produk='$id_produk'");
                if($edit > 0){
                    echo "<script>document.location.href='produk.php'</script>";
                }
        }else{
            $nama_produk = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $kategori = $_POST['kategori'];
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);
            $result = mysqli_query($koneksi, "INSERT INTO produk(nama_produk,harga,stok,kategori,foto) VALUES('$nama_produk','$harga','$stok','$kategori','$foto')");
            if($result > 0){
                header("Location: produk.php");
            }
        }
           
        }
        ?>
</body>
</html>