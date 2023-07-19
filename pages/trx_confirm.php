<?php

// Mendapatkan nilai dari input dengan nama "cek" yang dikirimkan melalui metode POST.
$cek = $_POST['cek'];
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
$jmlh = $_POST['jml'];

// Melakukan perulangan untuk setiap nilai yang ada dalam array $cek.
for ($i = 0; $i < sizeof($cek); $i++) {

	$sqlget = $conn->prepare("SELECT * FROM kamar WHERE no_kamar='$cek[$i]'");
	$sqlget->execute();
	$data = $sqlget->fetch(PDO::FETCH_ASSOC);
	$nk = $data['no_kamar'];
	$kelas = $data['kelas'];
	$harga = $data['harga'];
	$tot = $harga * $jmlh;

	//Melakukan query INSERT untuk menyimpan informasi reservasi sementara ke dalam tabel tmp_reservasi.
	// Nilai-nilai tersebut disimpan dalam tabel menggunakan variabel-variabel yang telah didefinisikan sebelumnya.
	$sql = "INSERT INTO tmp_reservasi VALUES ('','$nk','$kelas','$harga','$jmlh','$tot')";
	$conn->exec($sql);
}

?>
<!-- Mengarahkan pengguna ke halaman trx_review dengan menyertakan informasi tanggal
 ("dari" dan "sampai") dan jumlah hari menginap ("lama") sebagai parameter dalam URL. -->
<script type="text/javascript">
	window.location.href = "?p=trx_review&&dari=<?php echo $dari; ?>&&sampai=<?php echo $sampai; ?>&&lama=<?php echo $jmlh; ?>";
</script>