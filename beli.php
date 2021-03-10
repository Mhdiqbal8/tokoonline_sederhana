<?php include "templates/header.php";?>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Sepatu store.com</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Product</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">halaman transaksi</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>


  <div class="container mt-4">
	<?php 
	include "templates/db.php";
	$id = $_GET["id"];
	$select = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_produk = '$id'");
	
	$product = mysqli_fetch_assoc($select);
	// echo "<pre>";
	// var_dump($product);
	// echo "</pre>";
	 ?>

	<!-- <div class="card" style="width: 16rem;"> -->
		<form method="post">
			<div class="box d-flex ">
				
			<img src="<?=$product['gambar']?>" class="img-fluid " width="30%">
				<div class="desc d-block ml-3">
					<h6>ID  : <?php echo $product['id_produk']; ?></h6> 
					<h6>Nama Produk : <?= $product['nama']; ?></h6>
				</div>
			</div>
			<div class="form-row mt-1">
				<div class="col-md-6 col-6">
					<select class="form-control" name="warna">
						<option hidden="">-- Pilih warna --</option>
						<option>Merah</option>
						<option>Biru</option>
						<option>Coklat</option>
					</select>
				</div>
				<div class="col-md-6 col-6">
					<input type="number" name="jumlah" class="form-control" placeholder="Jumlah order ... ">
				</div>
			</div>
			<hr>

			<div class="form-row">
				<div class="col-12">
					<h6>Data Penerima: </h6>
				</div>
				<div class="col-md-6 mb-3">
					<input type="text" name="nama" class="form-control" placeholder="Nama Anda">
				</div>
				<div class="col-md-6 ">
					<input type="text" name="no" class="form-control" placeholder="No Whatsapp Anda">
					<input type="hidden" name="no_penerima" value="08979655692">
				</div>
				<div class="col-md-12 mt-3">
					<textarea type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap Anda"></textarea>
				</div>
			</div>

			<button class="btn btn-primary mt-3 w-100" name="beli">Beli Sekarang</button>
		</form>
	<!-- </div> -->

	<?php 
	if(isset($_POST["beli"])){
		$warna = $_POST["warna"];
		$jumlah = $_POST["jumlah"];
		$nama = $_POST["nama"];
		$no = $_POST["no"];
		$no_penerima = $_POST["no_penerima"];
		$alamat = $_POST["alamat"];

		// header("location:https//.api.whatsapp.com/send?phone=$no_penerima&text=Nama:%20$nama%20%0DAlamat:%20$alamat%20");
		// echo "<script>location='location:https//.api.whatsapp.com/send?phone=$no_penerima&text=$nama&alamat=$alamat'</script>";
		echo "<script>window.location = 'https://api.whatsapp.com/send?phone=$no_penerima&text=$nama&alamat=$jumlah&alamat=$alamat&source=&data='</script>";

		// https://api.whatsapp.com/send?phone=$no&text=$pesan&source=&data
	}

	 ?>
</div>
<?php include "templates/footer.php";?>