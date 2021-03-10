 
<?php 
include "templates/db.php";
include "functions.php";
if(isset($_POST["simpan"])){

	if(tambah($_POST) > 0){
		echo "<script>alert('tambah Produk berhasil'); location='index.php';</script>";
	}else{
		echo mysqli_error($conn);
	}
	
}


 ?>
<form method="post" enctype="multipart/form-data">
	<label>Nama</label>
	<input type="text" name="nama" class="form-control">
	<label>Tanggal</label>
	<input type="date" name="tanggal" class="form-control">
	<label>Harga</label>
	<input type="number" name="harga" class="form-control">
	<label>foto</label>
	<input type="file" name="gambar" class="form-control">
	<button class="btn btn-info mt-2" name="simpan" type="submit">Simpan</button>
</form>


<table class="table mt-5 table-responsive">
	<tr class="table-bordered ">
		<th>No</th>
		<th>Nama</th>
		<th>Tanggal</th>
		<th>Harga</th>
		<th>Foto</th>
		<th>Aksi</th>
	</tr>
	<?php 
	$no = 1;
	$select = mysqli_query($conn, "SELECT * FROM tb_product");
	while($produk = mysqli_fetch_assoc($select)) :
	?>
	<tr class="table-bordered ">
		<td><?= $no++; ?></td>
		<td><?= $produk["nama"]; ?></td>
		<td><?= $produk["tanggal"]; ?></td>
		<td>Rp. <?= number_format($produk["harga"]); ?></td>
		<td><img src="produk/<?=$produk['gambar'];?>" style="width: 50px;"></td>
		<td>
			<a href="?v=hapus_produk&id=<?=$produk['id_produk'];?>" class="btn btn-danger">Hapus</a> |
			<a href="?v=edit_produk&id=<?=$produk['id_produk'];?>" class="btn btn-warning">Edit</a>
		</td>
	</tr>
	<?php endwhile; ?>
</table>