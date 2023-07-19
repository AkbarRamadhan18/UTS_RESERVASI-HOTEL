<?php

//mengimpor file konfigurasi
require_once('config/config.php');

//Mengatur zona waktu menjadi "Asia/Jakarta"
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('d-M-Y');
$today = date('Y-m-d');

//Mengambil nilai dari input form yang memiliki atribut name
$ngaran = $_POST['nama'];
$passl = $_POST['passl'];
$passb = $_POST['passb'];
$user = $_POST['user'];

//Membuat objek koneksi baru dari kelas Connection dan mendapatkan koneksi ke database.
$connection = new Connection();
$conn = $connection->getConnection();
$sql79 = $conn->prepare("SELECT * FROM admin WHERE username='$_SESSION[username]'");

//Menjalankan pernyataan SQL yang telah disiapkan 
$sql79->execute();

//Mengambil baris pertama hasil query dalam bentuk array asosiatif 
$admin = $sql79->fetch(PDO::FETCH_ASSOC);



//mengambil nilai-nilai tertentu dari array asosiatif $admin dan menyimpannya dalam variabel $ngarana, $pass, dan $username.
$ngarana = $admin['nama_admin'];
$pass = $admin['password'];
$username = $admin['username'];

//melakukan pengecekan kondisi, jika nilai $passl sama dengan nilai $pass dan nilai $passb kosong, maka akan dieksekusi query UPDATE untuk mengubah 
//nilai kolom nama_admin dalam tabel admin menjadi $ngaran dengan kondisi username yang sesuai dengan nilai dari $_SESSION['username'].
if ($passl == $pass and $passb == "") {
	$sqInsert = "UPDATE admin SET nama_admin='$ngaran' WHERE username='$_SESSION[username]'";
	$conn->exec($sqInsert);
?>
	<script>
		alert("Perubahan Berhasil");
		window.location.href = "?p=profil";
	</script>
<?php } elseif ($passl == $pass) {
	$sqInsert = "UPDATE admin SET password='$passb',nama_admin='$ngaran' WHERE username='$_SESSION[username]'";
	$conn->exec($sqInsert);

?>
	<script>
		alert("Perubahan Berhasil");
		window.location.href = "?p=profil";
	</script>
<?php } else {
?>
	<script>
		alert("Password Lama Salah ! Silahkan Coba Lagi !");
		window.location.href = "?p=profil";
	</script>
<?php } ?>