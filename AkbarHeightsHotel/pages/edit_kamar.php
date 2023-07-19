<?php

// memasukkan file konfigurasi dan file fungsi 
require_once("config/config.php");
require_once("config/function.php");

// membuat objek koneksi ke database menggunakan kelas Connection.
$connection = new Connection();
$conn = $connection->getConnection();

// mengambil nilai dari form untuk nomor kamar, kelas, dan harga.
if (isset($_POST['simpan'])) {
    $nk = $_POST['no_kamar'];
    $kelas = $_POST['kelas'];
    $harga = $_POST['harga'];

    // memperbarui data kamar di database sesuai dengan nilai yang diinputkan.
    $sql = "UPDATE kamar SET kelas='$kelas', harga='$harga'";
    $conn->exec($sql);


    echo "<script>alert(\"Data berhasil disimpan !\") ; window.location.href='?p=kamar' ;</script>";
}

// mengambil ID kamar yang dikirim melalui parameter GET.
$id = $_GET['id'];

// mengambil data kamar yang akan diedit berdasarkan ID.
$query3 = $conn->prepare("SELECT * FROM kamar WHERE no_kamar='$id'");
$query3->execute();
$data = $query3->fetch(PDO::FETCH_ASSOC);

?>

<!-- mendefinisikan gaya CSS untuk tampilan form. -->
<style>
    #frmCheckUsername {
        border-top: #F0F0F0 2px solid;
        background: #FAF8F8;
        padding: 10px;
    }

    .demoInputBox {
        padding: 7px;
        border: #F0F0F0 1px solid;
        border-radius: 4px;
    }

    .status-available {
        color: #2FC332;
    }

    .status-not-available {
        color: #D60202;
    }

    .dropdown-menu a {
        text-decoration: none;
        display: block;
        text-align: left;
    }

    #nou {
        text-decoration: none;
    }
</style>

<!-- mendefinisikan fungsi JavaScript untuk memeriksa ketersediaan nomor kamar menggunakan AJAX. Fungsi ini akan mengirim permintaan ke "cek_available2.php"
 dengan data nomor kamar yang diinputkan oleh pengguna, dan menampilkan hasilnya di elemen dengan ID "user-availability-status". -->
<script>
    function checkAvailability() {
        jQuery.ajax({
            url: "cek_available2.php",
            data: 'no_kamar=' + $("#no_kamar").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
            },
            error: function() {}
        });
    }
</script>
<div class="main-content">
    <div class="container-fluid">
        <h3><a href="?p=home">Beranda </a><i class="fa fa-angle-right"></i> <a href="?p=tamu">Data Kamar</a> <i class="fa fa-angle-right"></i> Edit Kamar</h3>

        <!-- Tampilan Form Edit kamar -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="mb"><strong> Edit Kamar</strong></h4>
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return confirm('Anda yakin akan menyimpan data ?')">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label text-right">No.Kamar</label>
                                <div class="col-sm-10">
                                    <input type="text" name="no_kamar" id="no_kamar" value="<?php echo $data['no_kamar']; ?>" class="form-control" placeholder="Masukan No Kamar" readonly="readonly" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label text-right">Kelas</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kelas" required>
                                        <option value="">Silahkan Pilih</option>
                                        <option value="Deluxe Room">Deluxe Room</option>
                                        <option value="Superior Room">Superior Room</option>
                                        <option value="Suite Room">Suite Room</option>
                                        <option value="Standard Room">Standard Room</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label text-right">Harga Per Malam</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" value="<?php echo $data['harga']; ?>" class="form-control" placeholder="Masukan Harga" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-warning" type="reset" name="reset">Atur Ulang</button>
                                    <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>