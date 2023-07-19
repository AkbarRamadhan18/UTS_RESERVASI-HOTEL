<?php
//Mengimpor file konfigurasi yang diperlukan.
require_once('config/config.php');

//Membuat koneksi ke database.
$connection = new Connection();
$conn = $connection->getConnection();


// Mengambil nilai dari input form untuk tanggal "dari" dan "sampai", dan mengubah format tanggal menjadi "d-m-Y".
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];

$dr = date('d-m-Y', strtotime($dari));
$sm = date('d-m-Y', strtotime($sampai));
$ti = strtotime($dari);
$nepi = strtotime($sampai);

?>

<!-- Script JavaScript yang digunakan untuk menghitung 
jumlah kamar yang dipilih dan mengupdate nilai pada elemen dengan id "update" saat checkbox diubah. -->
<script language="JavaScript">
	function checkChoice(whichbox) {
		with(whichbox.form) {
			if (whichbox.checked == false)
				hiddentotal.value = eval(hiddentotal.value) - 1;
			else
				hiddentotal.value = eval(hiddentotal.value) + 1;
			document.getElementById('update').innerHTML = hiddentotal.value;
			return (hiddentotal.value);
		}
	}
</script>


<!-- Script JavaScript yang digunakan untuk mengatur keadaan tombol "Pilih Kamar" berdasarkan apakah ada kamar yang dipilih atau tidak. -->
<script type="text/javascript">
	function isChecked(checkbox, sub1) {
		var button = document.getElementById(sub1);

		if (checkbox.checked === true) {
			button.disabled = "";
		} else {
			button.disabled = "disabled";
		}
	}
</script>
<div class="main-content">
	<div class="container-fluid">
		<h3><a href="?p=home">Beranda </a><i class="fa fa-angle-right"></i> <a href="?p=data_reservasi">Data Reservasi </a><i class="fa fa-angle-right"></i> Transaksi Reservasi</h3>


		<!-- Menampilkan tabel dengan informasi kamar. Data kamar diambil dari database menggunakan query SELECT. -->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel">
					<table class="table table-bordered">
						<tr>
							<td align="center">Menampilkan data kamar tanggal : <strong><?php echo $dr . " s/d " . $sm; ?></strong> </td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="panel">
					<table class="table table-bordered">
						<tr align="center">
							<td><strong>No Kamar</strong></td>
							<td><strong>Kelas</strong></td>
							<td><strong>Harga Per malam</strong></td>
							<td><strong>Status</strong></td>
							<td><strong>Pilih Kamar</strong></td>
						</tr>
						<?php
						$sql = $conn->prepare("SELECT * FROM kamar");
						$sql->execute();

						//  Memulai perulangan untuk setiap data kamar yang diperoleh dari hasil eksekusi query SELECT sebelumnya.
						while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {

							//  Melakukan query SELECT untuk mendapatkan data reservasi dan detail_reservasi yang memiliki status 'Booked' atau 'Checkin'. 
							$sql1 = $conn->prepare("SELECT * FROM reservasi LEFT JOIN detail_reservasi ON reservasi.no_reservasi=detail_reservasi.no_reservasi WHERE status='Booked' OR status='Checkin'");
							$sql1->execute();

							//  Mengambil nilai tanggal check-in dan check-out dari data reservasi yang diperoleh sebelumnya, 
							// kemudian mengonversinya ke dalam format waktu dengan fungsi strtotime.
							$data1 = $sql1->fetch(PDO::FETCH_ASSOC);
							$d = strtotime($data1['tgl_checkin']);
							$s = strtotime($data1['tgl_checkout']);

							// Melakukan pengecekan kondisi untuk menentukan status kamar berdasarkan tanggal yang dipilih. 
							if ($ti < $d && $nepi <= $d or $ti > $s && $nepi > $s) {
								$status = "Kosong";
								$cek = "";
							} elseif ($ti < $d && $nepi > $d && $nepi <= $s or $ti > $d && $nepi > $s) {
								$status = "Terbooking Sebagian Hari";
								$cek = "disabled";
							} elseif ($ti >= $d && $nepi <= $s) {
								$status = "Terbooking";
								$cek = "disabled";
							}

							//Menampilkan baris tabel dengan informasi kamar, termasuk nomor kamar, kelas, harga, status, dan checkbox
							echo "<tr align='center'><td>$data[no_kamar]</td><td>$data[kelas]</td><td>$data[harga]</td><td>$status</td><td ><input type='checkbox' name='cek[]''  id='termsChkbx'  value='$data[no_kamar]' $cek  onClick='this.form.total.value=checkChoice(this)' onChange='isChecked(this, \"sub1\")'></td></tr>";
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>