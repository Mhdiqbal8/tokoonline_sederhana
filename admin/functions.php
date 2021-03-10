<?php
include "templates/db.php";


function tambah($data){
	global $conn;
	$nama 	 = $data["nama"];
	$tanggal = $data["tanggal"];
	$harga   = $data["harga"];
	$gambar  = upload();

	if(!$gambar){
		return false;
	}
	

	mysqli_query($conn, "INSERT INTO tb_product VALUES ('', '$nama', '$tanggal', '$harga', '$gambar') ");
	return mysqli_affected_rows($conn);
	
}


function edit($data){
	global $conn;
	$id 	 = $data["id"];
	$nama 	 = $data["nama"];
	$tanggal = $data["tanggal"];
	$harga   = $data["harga"];
	$gambarlama = $data["gambarlama"];

	if($_FILES["gambar"]["error"] === 4){
		$gambar = $gambarlama;
	}else{
		$gambar = upload();
	}
	

	mysqli_query($conn, "UPDATE tb_product SET nama = '$nama',
											   tanggal = '$tanggal',
											   harga = '$harga',
											   gambar = '$gambar'
											   WHERE id = $id ");
	return mysqli_affected_rows($conn);

}

function nama($nama){

	return $nama;
}

// function hapus($id){
// 	global $conn;

// 	$select = mysqli_query($conn, "SELECT * FROM tb_product WHERE id = $id");
// 	$produk = mysqli_fetch_assoc($select);
// 	var_dump($produk); die;
// 	$fotoproduk = $produk['gambar'];


// 	if(file_exists("produk/$fotoproduk")){
// 		unlink("produk/$fotoproduk");
// 	} 
// 	mysqli_query($conn, "DELETE FROM tb_product WHERE id = $id ");
// 	return mysqli_affected_rows($conn);
// }

function upload(){
	global $conn;


	$namafile = $_FILES["gambar"]["name"];
	$lok  = $_FILES["gambar"]["tmp_name"];
	$dir  = "produk/";
	$error = $_FILES["gambar"]["error"];

	if($error === 4){
		echo "pilih gambar dahulu";
		return false; 
	}


	// cek apakah yg diupload adalah gambar

	$ektensi = ['jpg', 'jpeg', 'png'];
	$ektensiGambar = explode('.', $namafile);
	$ektensiGambar = strtolower(end($ektensiGambar));

	if(!in_array($ektensiGambar, $ektensi)){

		echo "<script>alert('yang anda upload bukan gambar');</script>";
		return false;
	}

	// lolos
	move_uploaded_file($lok, $dir. "/". $namafile);
	return $namafile;


}


















