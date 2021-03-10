<?php
include "templates/db.php"; 
include "functions.php";
$id = $_GET["id"];

	$select = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_produk = $id");
	// var_dump($select);

	$produk = mysqli_fetch_assoc($select);
	$fotoproduk = $produk['gambar'];


	if(file_exists("produk/$fotoproduk")){
		unlink("produk/$fotoproduk");
	} 
	$delete = mysqli_query($conn, "DELETE FROM tb_product WHERE id_produk = $id ");

	if($delete){
		echo "<script>alert('produk berhasil dihapus'); loaction='index.php';</script>";
	}else{
		echo "<script>alert('produk gagal dihapus'); loaction='index.php';</script>";
	}

// if(hapus($id) > 0){
// 	echo "<script>
// 	alert('Hapus Produk berhasil');
// 	location='index.php';
// 	</script>";
// }else{
// 	echo "<script>
// 	alert('Hapus Produk gagal');
// 	location='index.php';
// 	</script>";
// }

 ?>

 