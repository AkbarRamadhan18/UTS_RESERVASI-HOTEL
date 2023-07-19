<?php
//memasukkan file konfigurasi yang berisi pengaturan koneksi ke database
require_once('config/config.php');

//memulai sesi PHP untuk pengguna yang telah login. Ini memungkinkan penggunaan variabel
//$_SESSION untuk menyimpan informasi tentang pengguna yang sedang login.
session_start();

//mengatur zona waktu default menjadi "Asia/Jakarta" untuk mendapatkan tanggal yang akurat.
date_default_timezone_set("Asia/Jakarta");
$tanggal = date('d-m-Y');


//kondisi untuk memeriksa apakah variabel $_SESSION['username'] telah di-set, 
//yaitu apakah pengguna telah login. Jika tidak, maka pengguna akan diarahkan ke halaman login menggunakan fungsi 
if (!isset($_SESSION['username'])) {
	header("Location: halaman_utama.php");
	exit;
} else {

	$connection = new Connection();

	//memanggil metode getConnection() dari objek koneksi untuk mendapatkan koneksi PDO yang sesuai dengan konfigurasi.
	$conn = $connection->getConnection();

	//adalah perintah SQL yang akan dijalankan untuk mendapatkan informasi admin dari tabel 
	//'admin' berdasarkan username yang tersimpan dalam $_SESSION['username'].
	$sql78 = $conn->prepare("SELECT * FROM admin WHERE username='$_SESSION[username]'");

	//menjalankan perintah SQL yang telah dipersiapkan sebelumnya.
	$sql78->execute();
	$hasil78 = $sql78->fetch(PDO::FETCH_ASSOC);

?>

	<!doctype html>
	<html lang="en">

	<head>
		<title>Dashboard | Akbar Heights Hotel </title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<!-- menghubungkan file CSS dari library Bootstrap yang digunakan untuk mengatur tampilan dan komponen tata letak halaman web -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
		<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

		<!-- Memberikan logo icon pada web -->
		<link rel="icon" href="assets/img/logo-2.png" type="image/x-icon">
	</head>

	<body>
		<!-- WRAPPER -->
		<div id="wrapper">
			<!-- adalah elemen navbar yang menampilkan menu navigasi di bagian atas halaman. Navbar ini memiliki kelas CSS navbar-default yang menentukan gaya default dari navbar
			Bootstrap dan navbar-fixed-top yang membuat navbar tetap terlihat saat melakukan scroll.-->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="brand">
					<img src="assets/img/logoindex.png" alt="logo">
					<a href="?p=home">Akbar Heights Hotel</a>
				</div>
				<div class="container-fluid">
					<div class="navbar-btn">
						<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
					</div>

					<!-- adalah formulir pencarian yang terletak di sebelah kiri navbar. Ketika pengguna memasukkan kata kunci dan mengklik tombol "Cari",
					data akan dikirim ke halaman yang sedang aktif ($_SERVER['PHP_SELF']). -->
					<form class="navbar-form navbar-left" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
						<div class="input-group">
							<input type="text" class="form-control" name="txtKataKunci" placeholder="Cari data disini ...">
							<span class="input-group-btn"><button type="submit" class="btn btn-primary" name="btnCari">Cari</button></span>
						</div>
					</form>
					<div id="navbar-menu">
						<ul class="nav navbar-nav navbar-right">

							<!--adalah tautan yang digunakan untuk mengaktifkan dropdown menu. Ketika pengguna mengklik tautan ini, menu dropdown akan muncul.-->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span><?php echo $hasil78['nama_admin']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="?p=profil"><i class="lnr lnr-user"></i> <span>Profil</span></a></li>
									<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<!-- LEFT SIDEBAR -->
			<div id="sidebar-nav" class="sidebar">
				<!-- adalah div dengan kelas sidebar-scroll yang digunakan untuk memberikan efek scroll pada konten sidebar jika terlalu panjang -->
				<div class="sidebar-scroll">
					<nav>
						<!-- adalah elemen navigasi yang berisi daftar menu yang akan ditampilkan dalam sidebar-->
						<ul class="nav">
							<li><a href="?p=home" class="active"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
							<li>
								<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-database"></i> <span>Master Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								<div id="subPages" class="collapse ">
									<ul class="nav">
										<li><a href="?p=tamu" class="">Tamu</a></li>
										<li><a href="?p=kamar" class="">Kamar</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-list"></i> <span>Transaksi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								<div id="subPages2" class="collapse ">
									<ul class="nav">
										<li><a href="?p=trx_reservasi7" class="">Reservasi</a></li>
										<li><a href="?p=data_reservasi" class="">Lihat Reservasi</a></li>
									</ul>
								</div>
							</li>
							<li><a href="?p=laporan" class=""><i class="lnr lnr-printer"></i> <span>Laporan</span></a></li>
						</ul>
					</nav>
				</div>
			</div>

			<!-- adalah sintaks PHP yang digunakan untuk menyisipkan konten dari file isi.php ke dalam elemen <div> dengan kelas main. Dalam konteks ini, isi.php
				/merupakan file yang berisi kode HTML dan PHP untuk mengatur tampilan dan logika halaman yang akan ditampilkan di area konten utama.-->
			<div class="main">
				<?php include('isi.php'); ?>
			</div>
			<div class="clearfix"></div>
			<footer>
				<div class="container-fluid">
					<p class="copyright">&copy; 2023 Azzammil Akbar Ramadhan.</p>
				</div>
			</footer>
		</div>

		<!-- Javascript -->
		<script src="assets/vendor/jquery/jquery.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="assets/vendor/chartist/js/chartist.min.js"></script>
		<script src="assets/scripts/klorofil-common.js"></script>

	</body>

	</html>
<?php } ?>