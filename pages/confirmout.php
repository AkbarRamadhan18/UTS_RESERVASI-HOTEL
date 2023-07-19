<?php
// memasukkan file konfigurasi dan function yang diperlukan, serta membuat objek koneksi ke database menggunakan kelas Connection.
require_once("config/config.php");

require_once("config/function.php");
$connection = new Connection();
$conn = $connection->getConnection();
$id = $_GET['id'];

// mengambil nilai id dari URL ($_GET['id']) untuk mendapatkan data reservasi yang akan di-checkout.
$id = $_GET['id'];

// mengambil data detail reservasi yang terkait dengan reservasi
$query3 = $conn->prepare("SELECT * FROM reservasi WHERE no_reservasi='$id'");
$query3->execute();
$data = $query3->fetch(PDO::FETCH_ASSOC);


$query4 = $conn->prepare("SELECT * FROM detail_reservasi WHERE no_reservasi='$id'");
$query4->execute();
while ($data4 = $query4->fetch(PDO::FETCH_ASSOC)) {
  $kamar = $data4['no_kamar'];

  // melakukan update pada tabel reservasi dengan mengubah status menjadi "Checkout".
  $sql = "UPDATE kamar SET status_kamar='Kosong',dari='', sampai='' WHERE no_kamar='$kamar'";
  $conn->exec($sql);
}

$sql = "UPDATE reservasi SET status='Checkout' WHERE no_reservasi='$id'";
$conn->exec($sql);

//  menampilkan pesan berhasil dan mengarahkan pengguna kembali ke halaman data reservasi.
if ($sql) {

  echo "<script>alert(\"Checkuot telah dilakukan !\") ; window.location.href='?p=data_reservasi' ;</script>";
}
