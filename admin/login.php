<?php
include "templates/header.php";
session_start();
if(isset($_SESSION["admin"])){
	header("location: index.php");
}
include "templates/db.php";

if(isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$select = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
	$data = mysqli_fetch_assoc($select);
	if(mysqli_num_rows($select) === 1)
	{	
		$_SESSION["username"] = $data["username"];
		$_SESSION["admin"] = true;
		echo "<script>alert('login berhasil'); location='index.php';</script>";
	}
}


 ?>

<div class="container mt-5">
<div class="card">
	<div class="card-header">FORM LOGIN</div>
	<form  class="p-3" autocomplete="off" method="post">
		<label>Username</label>
		<input type="text" name="username" class="form-control">
		<label>password</label>
		<input type="password" name="password" class="form-control">
		<button class="btn btn-primary mt-2" name="login">Login</button>
	</form>
</div>
</div>
<?php include "templates/footer.php"; ?>