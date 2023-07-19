<?php

class Connection
{
	function getConnection()
	{
		// menyimpan informasi koneksi ke database, yaitu host (localhost), username (root), password (kosong), dan nama database (hotel).
		$host = "localhost";
		$pass = "";
		$user = "root";
		$db = "hotel";

		// membuat objek koneksi baru dengan menggunakan informasi host, nama database, username, dan password yang telah ditentukan
		try {
			$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (PDOException $e) {
			echo "Gagal Koneksi, Karena : " . $e->getMessage();
		}
	}
}
