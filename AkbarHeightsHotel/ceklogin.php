<?php
//mengatur koneksi ke database.
require_once('config/config.php');

//yang memiliki fungsi getceklogin() untuk melakukan proses verifikasi login.
class ceklogin
{
	function getceklogin()
	{
		$connection = new Connection();
		$conn = $connection->getConnection();
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		try {
			//digunakan untuk memilih baris dari tabel admin yang memiliki username dan password yang sesuai dengan nilai yang diterima.
			$query = $conn->prepare("select * from admin where username=:user and password=:pass");

			//digunakan untuk mengikat nilai parameter :user dan :pass dengan nilai dari variabel $user dan $pass.
			$query->BindParam(":user", $user);
			$query->BindParam(":pass", $pass);

			//digunakan untuk menjalankan query yang telah disiapkan.
			$query->execute();
			//jika login berhasil, session dimulai dan username disimpan dalam session. 
			//Pengguna akan diarahkan ke halaman beranda (index.php?p=home) menggunakan header().
			if ($query->rowCount() > 0) {
				session_start();
				$data = $query->fetch();
				$_SESSION['username'] = $data['username'];
				header('location: index.php?p=home');
			} else {
				echo "<script>alert(\"Username atau Password tidak ada !\"); window.location.href='login.php';</script>";
			}

			//jika terjadi exception (misalnya, kesalahan dalam query), pesan kesalahan akan ditampilkan.	
		} catch (PDOException $e) {
			echo "tidak ada : " . $e->getMessage();
		}
	}
}

//melakukan proses verifikasi login.
$cek = new ceklogin();
$cek->getceklogin();
