<?php include "templates/header.php"; ?>
<?php 
include "templates/db.php";
session_start();	
if(isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	// tampilkan data user yg registrasi
	// uji apakah usename dan password ada di database
	$select = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username' ");
	$data   = mysqli_fetch_assoc($select);
	// uji apakah data tersebut ada di baris database
	if(mysqli_num_rows($select) === 1){
		
		// cek passwordnya

		if(password_verify($password, $data["password"])) {
			$_SESSION['id_user'] = $data['id']; 
			$_SESSION['user'] 	 = true;
			echo "<script>alert('Login Berhasil'); location='index.php';</script>";
		}
	} else{
		$error = true;
	}
}



 ?>

<div class="container mt-5">
<div class="card">
	<div class="card-header">FORM LOGIN</div>
	<form  class="p-3" autocomplete="off" method="post">
		<?php if(isset($error)) : ?>
		<div class="alert alert-danger">
			username/password salah
		</div>
		<?php endif; ?>
		<label>Username</label>
		<input type="text" name="username" class="form-control">
		<label>password</label>
		<input type="password" name="password" class="form-control">
		<button class="btn btn-primary w-100 mt-2" name="login">Login</button>
		<a class="btn btn-primary w-100 mt-2" href="registrasi.php">Registrasi</a>

	</form>
</div>
</div>
<?php include "templates/footer.php"; ?>