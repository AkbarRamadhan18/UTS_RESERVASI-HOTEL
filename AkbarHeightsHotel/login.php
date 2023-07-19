<?php
//memasukkan file konfigurasi yang berisi pengaturan koneksi ke database
require_once("config/config.php");


//kondisi untuk memeriksa apakah variabel $_SESSION['username'] telah di-set, 
//yaitu apakah pengguna telah login. jiksa sudah, maka pengguna akan diarahkan ke halaman index
if (isset($_SESSION['username'])) {
	header("location: index.php");
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- Memberikan logo icon pada web -->
	<link rel="icon" href="assets/img/logo-2.png" type="image/x-icon">
	<title>Login | Akbar Height Hotel</title>
	<style>

	</style>
</head>

<!-- tampilan halaman login untuk Akbar Heights Hotel, yang terdiri dari
 form login dengan input username dan password, tombol login, serta tautan untuk "Forgot Password" dan "Sign Up". -->

<body id="login">
	<div class="box">
		<div class="borderLine"></div>
		<form action="ceklogin.php" method="post">
			<img src="assets/img/logo-2.png" alt="">
			<h2>Akbar Heights Hotel</h2>
			<div class="inputBox">
				<input type="text" name="user" required="">
				<span>Username</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password" name="pass" required="">
				<span>Password</span>
				<i></i>
			</div>

			<div class="links">
				<a href="#">Forgot Password</a>
				<a href="#">Sign Up</a>
			</div>

			<div class="tombol">
				<button><a href="halaman_utama.php">Back</a></button>
				<input type="submit" value="Sign in">
			</div>
		</form>
	</div>

</body>

</html>