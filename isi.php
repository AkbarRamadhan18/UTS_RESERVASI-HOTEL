<!--untuk mengatur pemanggilan halaman yang sesuai berdasarkan parameter p yang diterima dalam URL. Jika parameter p tidak kosong,
maka akan memeriksa apakah terdapat file halaman yang sesuai dengan nilai parameter tersebut. Jika ada, halaman tersebut akan disertakan (included) dalam tampilan. Jika tidak ada, maka akan menampilkan pesan "Halaman tidak ditemukan!
:(". Jika parameter p kosong, maka halaman beranda (home.php) akan disertakan secara default.  -->

<?php
$pages_dir = 'pages';
if (!empty($_GET['p'])) {
	$pages = scandir($pages_dir, 0);
	unset($pages[0], $pages[1]);

	$p = $_GET['p'];
	if (in_array($p . '.php', $pages)) {
		include($pages_dir . '/' . $p . '.php');
	} else {
		echo 'Halaman tidak ditemukan! :(';
	}
} else {
	include($pages_dir . '/home.php');
}
?>