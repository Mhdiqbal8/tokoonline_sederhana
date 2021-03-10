<?php include "templates/header.php"; ?>
<?php 
include "templates/db.php";

if(isset($_POST["registrasi"])) {

	// echo "berhasil"; die;
	$username = $_POST["username"];
	$tlp 	  = $_POST["tlp"];
	$password1= $_POST["password1"];
	$password2= $_POST["password2"];

	if($password1 !== $password2){
		$error = true;
	}

	$password = password_hash($password1, PASSWORD_DEFAULT);
	// var_dump($password);

	$insert = mysqli_query($conn, "INSERT INTO tb_users VALUES ('', '$username','$tlp', '$password')");

	if($insert){
		echo "<script>alert('registrasi berhasil'); location='login.php';</script>";
	}


}



 ?>

<div class="container mt-5">
<div class="card">
	<div class="card-header text-center text-secondary">FORM REGISTRASI</div>
	<form  class="p-3" autocomplete="off" method="post">
		<label>Username</label>
		<input type="text" name="username" class="form-control">
		<label>No tlp</label>
		<input type="text" name="tlp" class="form-control">
		<label>password</label>
		<input type="password" name="password1" class="form-control">
		<label>Konfirmasi password</label>
		<input type="password" name="password2" class="form-control">
		<button class="btn btn-primary w-100 mt-2" name="registrasi">Registrasi</button>
		<?php if(isset($error)) : ?>
		<div class="alert alert-danger mt-2">
			password tidak sesuai
		</div>
	<?php endif; ?>
	</form>
</div>
</div>
<?php include "templates/footer.php"; ?>