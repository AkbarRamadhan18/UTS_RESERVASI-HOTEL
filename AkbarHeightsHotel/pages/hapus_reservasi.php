<?php
// Membuat objek koneksi ke database.
require_once('config/config.php');

$connection = new Connection();
$conn = $connection->getConnection();

// Mendapatkan nilai parameter "id" dari URL menggunakan $_GET['id'].
$id = $_GET['id'];

// Melakukan query SELECT untuk mendapatkan data reservasi berdasarkan id yang diterima.
$query3 = $conn->prepare("SELECT * FROM reservasi  WHERE no_reservasi='$id'");
$query3->execute();
$data = $query3->fetch(PDO::FETCH_ASSOC);


// Mengecek apakah status reservasi adalah "Checkin". 
if ($data['status'] == "Checkin") {
	echo "<script>alert(\"Mohon maaf data reservasi tidak bisa di hapus karena statusnya sedang Checkin\") ; window.location.href='?p=data_reservasi' ; </script>";
} else {
	// ika status reservasi bukan "Checkin", maka menjalankan pernyataan 
	// SQL DELETE untuk menghapus data reservasi berdasarkan id yang diterima, serta menghapus data-detail reservasi terkait.
	$sql2 = "DELETE FROM reservasi WHERE no_reservasi='$id'";
	$delete2 = $conn->exec($sql2);

	$sql3 = "DELETE FROM detail_reservasi WHERE no_reservasi='$id'";
	$delete3 = $conn->exec($sql3);
?>

	<!--  Menampilkan pesan alert bahwa data berhasil dihapus, dan mengarahkan pengguna kembali ke halaman "data_reservasi". -->
	<script>
		alert('Data berhasil dihapus');
		window.location.href = "?p=data_reservasi";
	</script>
<?php

}


?>