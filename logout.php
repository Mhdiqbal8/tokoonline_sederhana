<?php 

session_start();
session_unset($_SESSION['id_user']);

echo "<script>alert('Berhasil Logout'); location='login.php';</script>";