<?php
    include 'koneksi.php';
    if (isset($_GET['aksi'])){
        if($_GET['aksi']=="edit"){
            $result = mysqli_query($koneksi, "SELECT * FROM penjual WHERE id_penjual='$_GET[id_penjual]'");
            while($data = mysqli_fetch_array($result)){
                $nama= $data['nama'];
                $uname= $data['username'];
                $pass= $data['password'];
                $foto= $data['foto'];
            }
        }elseif($_GET['aksi']=="hapus"){
            $hapus = mysqli_query($koneksi, "DELETE FROM penjual WHERE id_penjual='$_GET[id_penjual]'");
            if($hapus){
                echo "<script>document.location.href='user.php'</script>";
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
    <a href="login.php">Kembali Ke Home</a><br><br>

</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="25%" border=0>
        <tr>
            <td> Nama</td>
            <td><input type="text" name="nama" value=<?=@$nama?> ></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value=<?=@$uname?> ></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value=<?=@$pass?> ></td>
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
<table class="table table-bordered border-primary">
  <thead>
    <tr>
        <h1>Data Penjual </h1>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
               include 'koneksi.php';
               $no=1;
               $query = mysqli_query($koneksi, "SELECT * FROM penjual");
               while($data=mysqli_fetch_array($query)){
                $id_pengguna=$data['id_penjual'];
                echo "<tr>";
                echo "<td>".$no;$no++."</td>";
                echo "<td>".$data['nama']."</td>";
                echo "<td>".$data['username']."</td>";
                echo "<td>".$data['password']."</td>";
                echo "<td style ='padding: 5px;'><img src='img/".$data['foto']."'style='width= 300px;' 'height: 160px'></td>";

            ?>
                <td><a href="user.php?aksi=edit&id_penjual=<?=$id_pengguna?>">Edit</a>
                    <a href="user.php?aksi=hapus&id_penjual=<?=$id_pengguna?>">Hapus</a></td>
                </tr>
            <?php }?>
  </tbody>
</table>
        <?php
        include 'koneksi.php';
        if(isset($_POST['submit'])){
            if(($_GET['aksi']=='edit')){
                $id_pengguna = $_GET['id_penjual'];
                $nama_pengguna = $_POST['nama'];
                $username = $_POST['username'];
                $password = $_POST['password'];
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
                $edit = mysqli_query($koneksi, "UPDATE penjual set nama='$nama_pengguna',username='$username',password='$password',foto='$foto' where id_penjual='$id_pengguna'");
                if($edit > 0){
                    echo "<script>document.location.href='user.php'</script>";
                }
        }else{
            $nama_pengguna = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);
            $result = mysqli_query($koneksi, "INSERT INTO penjual(nama,username,password,foto) VALUES('$nama_pengguna','$username','$password','$foto')");
            if($result > 0){
              echo "<script>document.location.href='user.php'</script>";
            }
        }
           
        }
        ?>
</body>
</html>