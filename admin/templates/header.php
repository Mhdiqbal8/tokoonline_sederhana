
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	    <div class="container">
	    <?php if(isset($_SESSION["admin"])) :?>
	      <a class="navbar-brand" href="#"><?= $_SESSION["username"]; ?></a>
	  <?php endif; ?>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active">
	            <a class="nav-link" href="?v=home">Home</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="?v=tambah_produk">tambah Product</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="?v=penjualan">Pejualan</a>
	          </li>
	          <?php if(!isset($_SESSION["admin"])) { ?>
	          <li class="nav-item">
	            <a class="nav-link" href="?v=login">login</a>
	          </li>
	      	<?php } else{ ?>
	      		<li class="nav-item">
	            <a class="nav-link" href="?v=logout">logout</a>
	          	</li>
	        <?php } ?>  
	        </ul>
	      </div>
	    </div>
  	</nav>