<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,500&display=swap"
      rel="stylesheet"
    />
    <!-- style css -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="footer.css" />

    <!-- logo title -->
    <link rel="icon" href="img/baso.jpg" type="img/x-icon" />
    <title>Toko Online</title>
    <style>
      .search {
        width: 259px;
        height: 31px;m
        border-radius: 5px;
        background: #e0dddd;
      }

      ::-webkit-scrollbar{
        display: none;
      }
    </style>
  </head>
  <body>
    <!-- search -->
    <!-- <div class="position-fixed translate-middle" style="top: 15vh; left: 50vw; z-index: 99;">
      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </imput>
    </div> -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">JIPY FOOD</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="#">HOME</a>
            </li>
            <!-- <li class="nav-item mx-2">
              <a class="nav-link" href="checkout.php">CHECKOUT</a>
            </li> -->
            <li class="nav-item mx-2">
              <a class="nav-link active" href="#">CONTACT</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link active" href="#">ABOUT ME</a>
            </li>
          </ul>
          <ul>
            <li class="d-flex align-items-center">
              <button class="btnicon nav-item mx-3 pt-3">
                <svg
                  class="mx-2"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                >
                  <path
                    d="M22.0819 14.0822C21.4762 16.0593 20.2624 17.7951 18.6131 19.0425C17.1651 20.1323 15.442 20.797 13.6373 20.9619C11.8325 21.1268 10.0175 20.7855 8.39594 19.9762C6.7744 19.1668 5.41051 17.9216 4.45737 16.3802C3.50422 14.8388 2.99955 13.0623 2.99998 11.25C2.99347 9.13467 3.68113 7.07562 4.95749 5.38874C6.20486 3.73948 7.94064 2.52566 9.9178 1.91999C10.0481 1.87987 10.1869 1.87602 10.3192 1.90888C10.4516 1.94173 10.5724 2.01004 10.6688 2.10645C10.7653 2.20286 10.8336 2.32373 10.8664 2.45607C10.8993 2.5884 10.8954 2.72718 10.8553 2.85749C10.423 4.28758 10.3867 5.80817 10.7504 7.25724C11.1141 8.7063 11.8641 10.0296 12.9206 11.086C13.977 12.1424 15.3002 12.8924 16.7493 13.2561C18.1984 13.6198 19.719 13.5836 21.149 13.1512C21.2794 13.1111 21.4181 13.1073 21.5505 13.1401C21.6828 13.173 21.8037 13.2413 21.9001 13.3377C21.9965 13.4341 22.0648 13.555 22.0977 13.6873C22.1305 13.8196 22.1267 13.9584 22.0865 14.0887L22.0819 14.0822Z"
                    fill="url(#paint0_linear_5_2)"
                  />

                  <!-- bulan -->

                  <!-- <defs>
                    <linearGradient
                      id="paint0_linear_5_2"
                      x1="12.5598"
                      y1="1.88678"
                      x2="12.5598"
                      y2="21.0024"
                      gradientUnits="userSpaceOnUse"
                    >
                      <stop />
                      <stop
                        offset="1"
                        stop-color="#FAFF00"
                        stop-opacity="0.25"
                      />
                    </linearGradient>
                  </defs> -->
                </svg>

                <!-- keranjang -->
                <!-- <a href="keranjang.php">

                  <svg
                   xmlns="http://www.w3.org/2000/svg"
                   width="25"
                   height="25"
                   fill="green"
                   class="bi bi-bag-fill"
                   viewBox="0 0 16 16"
                 >
                   <path
                     d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"
                   />
                 </svg> 
                </a> -->
              </button>
            </li>
          </ul>
          <!-- button -->
          <div>
          <a href="formsignup.php" style="text-decoration:none; color:white;"><button class="button-primary1 nav-item mx-2 text-light">SIGN UP</button></a>
          </div>
          <div>
          <a href="formlogin.php" style="text-decoration:none; color:green;"><button class="button-primary2 nav-item mx-2">LOGIN</button></a>
          </div>
          
      </div>

    </nav>

     <!-- carousel -->

     <div class="container">
      <div id="carouselExampleAutoplaying" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/carousel.jpg" class="d-block img-fluid" style="border-radius: 20px;">
          </div>
          <div class="carousel-item">
            <img src="img/restaurant.jpg" class="d-block img-fluid" style="border-radius: 20px;">
          </div>
          <div class="carousel-item">
            <img src="img/Latihan.jpg" class="d-block img-fluid" style="border-radius: 20px;">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div> 

    <!-- tag kategori -->
    <!-- <div class="row-container mt-5">
      <div class="tag kategori col-12" style="background-color: yellow; padding: 5px 10px; margin: 0;">
        <h5 class="text-center"><b>KATEGORI</b></h5>
      </div> -->

      <!-- kategori -->
      <!-- <div class="row text-center row-container mt-2">

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menu-kategori">
            <a href="#"><img src="img/baso.jpg" class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt1"><b>SATE</b></p>
          </div>
        </div>
        
        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>

        <div class="col-lg-2 row-cols-md-3 col-sm-4 col-6">
          <div class="menukategori">
            <a href="#"><img src="..." class="img-categori mt-3" style="border-radius: 5px;"></a>
            <p class="mt2"><b>SATE</b></p>
          </div>
        </div>
    </div> -->
 
    <!-- tag produk -->
    <div class="row-container mt-5">
      <div class="tag kategori col-12" style="background-color: yellow; padding: 5px 10px; margin: 0;">
        <h5 class="text-center"><b>PRODUK</b></h5>
      </div>

<!-- produk -->

    <?php
include "configP.php";

$dataproduct = mysqli_query($koneksi,"SELECT * FROM barang ORDER BY id_barang ASC");

?>
    <div class="content  ">
      <div class="container "> `
        <div class="row">
          <?php while($row = mysqli_fetch_object($dataproduct)) { ?>
          <div class="col-md-3 col-sm-6 mt-2">
            <div class="card">
              <img class="card-img-top" src="img/<?=$row->foto?>" alt="<?=$row->foto?>">
              <div class="card-body">
                <h4 class="card-title"><?= $row->nama_barang?></h4>
              </div>
              <div class="card-fotter">
                <!-- <a href="beli.php?id=<?//=$row->id_barang?>"class="btn btn-block btn-success">Add To Cart</a> -->
                <button disabled class="btn btn-block btn-warning">Rp. <?= $row->harga?></button>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
  </body>

  <footer class="footer mt-5">
    <div class="footer__container ">
      <div class="footer__top">
        <div>
          <center><h6 class="footer__title" class="copyright">&copy; Jippy Food</h6></center>
        </div>
  </footer>
</html>
