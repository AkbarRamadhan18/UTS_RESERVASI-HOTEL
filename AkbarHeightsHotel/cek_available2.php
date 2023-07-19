<?php
require_once("config/config.php");
$connection = new Connection();
$conn = $connection->getConnection();

// Memeriksa apakah nilai nokamar yang dikirim melalui metode POST tidak kosong.
if (!empty($_POST["nokamar"])) {

  // Untuk menjalankan query SELECT untuk memilih baris dari tabel kamar dengan kondisi nomor kamar yang sesuai dengan nilai yang diterima.
  $sql = $conn->prepare("SELECT * FROM kamar WHERE no_kamar = :nokamar");
  $sql->bindParam(':nokamar', $_POST["nokamar"]);
  $sql->execute();

  // Untuk mendapatkan baris hasil query dalam bentuk array asosiatif.
  $row = $sql->fetch(PDO::FETCH_ASSOC);

  // Untuk memeriksa apakah nomor kamar sudah ada dalam database.
  if ($row) {
    echo "<span class='status-not-available'>Maaf, No Kamar sudah ada!</span>";
  } else {
    echo "<span class='status-available'></span>";
  }
}
