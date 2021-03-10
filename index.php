<?php include "templates/header.php"; ?>
<?php 
include "templates/db.php";
error_reporting(0);
session_start();
$select = mysqli_query($conn, "SELECT * FROM tb_product");

 ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Sepatu store.com</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">produk</a>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- nav -->
  <!-- product -->
  <div class="container ">
    <div class="title d-flex justify-content-between mt-2">
      <h6 class="text-secondary">News Product</h6>
      <!-- <h6 class="text-secondary">All Product</h6> -->
    </div>
    <div class="row mt-3">
      <?php while($produk = mysqli_fetch_assoc($select)) : ?>
      <div class="col-md-4">
        <div class="box">
          <img src="<?=$produk['gambar'];?>" class="img-fluid">
          <div class="card-body">
            <h5><?= $produk['nama']; ?> </h5>
            <p>Rp. <?= number_format($produk['harga']); ?></p>
            <a href="beli.php?id=<?=$produk['id_produk'];?>" class="btn btn-info">Beli</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <!-- product -->





<?php include "templates/footer.php"; ?>  

  