<?php
session_start();
if(!isset($_SESSION["admin"])){
	header("location: login.php");
}
 include "templates/header.php";
  ?>

<div class="container mt-5">
	<?php 
	error_reporting(0);
	$hal = $_GET["v"];

	if($hal == 'home')
		include "home.php";	
	else if($hal == 'tambah_produk')
		include "tambah_produk.php";
	else if($hal == 'hapus_produk')
		include "hapus_produk.php";
	else if($hal == 'edit_produk')
		include "edit_produk.php";
	else if($hal == 'login')
		include "login.php";
	else if($hal == 'logout')
		include "logout.php";


	 ?>
</div>

<?php include "templates/footer.php"; ?>
 