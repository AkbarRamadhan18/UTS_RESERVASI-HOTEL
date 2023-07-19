<?php

// Membuat objek koneksi ke database.
require_once('config/config.php');

$connection = new Connection();
$conn = $connection->getConnection();

//  Mendapatkan nilai parameter "id" dari URL menggunakan $_GET['id'].
$id = $_GET['id'];

// Menjalankan pernyataan SQL DELETE untuk menghapus data kamar berdasarkan nomor kamar (id) yang diterima.
$sql2 = "DELETE FROM kamar WHERE no_kamar='$id'";

//  Mengambil jumlah baris yang terpengaruh oleh pernyataan DELETE menggunakan metode exec() dan menyimpannya dalam variabel $delete2.
$delete2 = $conn->exec($sql2);

?>

<!-- Menampilkan pesan alert bahwa data berhasil dihapus, 
dan mengarahkan pengguna kembali ke halaman "kamar" menggunakan window.location.href. -->
<script>
	alert('Data berhasil dihapus');
	window.location.href = "?p=kamar";
</script>