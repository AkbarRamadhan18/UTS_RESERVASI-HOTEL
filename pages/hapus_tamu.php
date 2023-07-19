<?php
//  Membuat objek koneksi ke database.
require_once('config/config.php');

$connection = new Connection();
$conn = $connection->getConnection();

//Mendapatkan nilai parameter "id" dari URL menggunakan $_GET['id'].
$id = $_GET['id'];

// Mengeksekusi pernyataan SQL DELETE untuk menghapus data tamu berdasarkan id yang diterima.
$sql2 = "DELETE FROM tamu WHERE id_tamu='$id'";
$delete2 = $conn->exec($sql2);

?>

<!-- Menampilkan pesan alert bahwa data berhasil dihapus, dan mengarahkan pengguna kembali ke halaman "tamu" -->
<script>
	alert('Data berhasil dihapus');
	window.location.href = "?p=tamu";
</script>