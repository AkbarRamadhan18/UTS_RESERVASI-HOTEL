<?php

//menghubungkan ke database
require_once("config/config.php");


$connection = new Connection();

// memanggil metode getConnection() dari objek Connection untuk mendapatkan koneksi ke database.
$conn = $connection->getConnection();

// memeriksa apakah nilai noid yang dikirim melalui metode POST tidak kosong.
if (!empty($_POST["noid"])) {

  //menjalankan query SELECT untuk memilih baris dari tabel tamu dengan kondisi nomor identitas yang sesuai dengan nilai yang diterima.
  $sql2 = $conn->query("SELECT * FROM tamu WHERE no_identitas='" . $_POST["noid"] . "'");

  //mengeksekusi query yang telah disiapkan.
  $sql2->execute();

  //mendapatkan baris hasil query dalam bentuk array asosiatif.
  $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
  $sql1 = $conn->query("SELECT count(*) FROM tamu WHERE no_identitas='" . $_POST["noid"] . "'");

  //mengambil jumlah baris yang dihitung dari hasil query.
  $row = $sql1->fetchColumn();
  $user_count = $row[0];

  // memeriksa apakah jumlah baris yang dihitung lebih dari 0.
  if ($user_count > 0) {
    echo "<span class='status-not-available'>Maaf, No Identitas sudah digunakan atas nama '" . $row2['nama_tamu'] . "' dengan ID Tamu '" . $row2['id_tamu'] . "'.</span>";
  } else {
    echo "<span class='status-available'> </span>";
  }
}
