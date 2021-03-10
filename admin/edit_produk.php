<?php 
include "functions.php";
include "templates/db.php";
$id = $_GET["id"];
$select = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_produk = $id ");
$produk = mysqli_fetch_assoc($select);

if(isset($_POST["edit"])){

	if(edit($_POST) > 0){
		echo "<script>alert('produk berhasil diubah'); location='index.php';</script>";
	}else{
		echo mysqli_error($conn);
	}
}


 ?>


 <form method="post" enctype="multipart/form-data" >
 	<input type="hidden" name="id" value="<?=$produk['id'];?>">
 	<input type="hidden" name="gambarlama" value="<?=$produk['gambar'];?>">
 	<label>Nama</label>
	<input type="text" name="nama" class="form-control" value="<?=$produk['nama'];?>">
	<label>Tanggal</label>
	<input type="date" name="tanggal" class="form-control" value="<?=$produk['tanggal'];?>">
	<label>Harga</label>
	<input type="number" name="harga" class="form-control" value="<?=$produk['harga'];?>">
	<label>foto</label><br>
	<img src="produk/<?=$produk['gambar'];?>" style="width: 100px;">
	<input type="file" name="gambar" class="form-control mt-1">
	<button class="btn btn-info mt-2" name="edit" type="submit">Simpan</button>
 </form>


