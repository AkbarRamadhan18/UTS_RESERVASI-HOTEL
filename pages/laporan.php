<?php

// Mengimpor file konfigurasi dan fungsi yang diperlukan serta melakukan inisialisasi koneksi ke database.
require_once("config/config.php");
require_once("config/function.php");


$connection = new Connection();
$conn = $connection->getConnection();


?>
<!-- Mengatur tampilan CSS untuk halaman laporan.Mengatur tampilan CSS untuk halaman laporan. -->
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

<link href="assets/bs/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script>
    function checkAvailability() {
        jQuery.ajax({
            url: "cek_available2.php",
            data: 'nokamar=' + $("#nokamar").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
            },
            error: function() {}
        });
    }
</script>

<!-- Menampilkan form untuk laporan berdasarkan periode tanggal. 
Pengguna dapat memilih tanggal mulai dan tanggal selesai untuk mencetak laporan. -->
<div class="main-content">
    <div class="container-fluid">
        <h3><a href="?p=home">Beranda </a><i class="fa fa-angle-right"></i> Laporan </h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="mb"><strong> Laporan Periode Tanggal</strong></h4>
                    </div>
                    <div class="panel-body">

                        <form method="post" action="pages/cetak_laporan.php" class="form-horizontal" target="_blank">

                            <div class="form-group">
                                <label class="col-sm-4 col-sm-4 control-label text-right">Dari Tanggal :</label>
                                <div class="col-sm-8">
                                    <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" size="16" type="text" name="dari" required="required" oninvalid="this.setCustomValidity('Silahkan Masukan Tanggal !!!')" oninput="setCustomValidity('')" readonly="readonly">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-sm-4 control-label text-right">Sampai Tanggal :</label>
                                <div class="col-sm-8">
                                    <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" size="16" type="text" name="sampai" required="required" oninvalid="this.setCustomValidity('Silahkan Masukan Tanggal !!!')" oninput="setCustomValidity('')" readonly="readonly">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <div class="col-lg-12">
                                    <button class="btn btn-success" type="submit" name="btntanggal"> Cetak</button>
                                </div>
                            </div>
                        </form>
                        <script type="text/javascript" src="assets/bs/jquery-3.2.1.min.js"></script>
                        <script type="text/javascript" src="assets/bs/js/bootstrap.min.js"></script>
                        <script type="text/javascript" src="assets/bs/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
                        <script type="text/javascript" src="assets/bs/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
                        <script type="text/javascript">
                            // Memanggil script JavaScript untuk mengatur tampilan datepicker pada form.
                            $('.form_datetime').datetimepicker({
                                //language:  'fr',
                                weekStart: 1,
                                todayBtn: 1,
                                autoclose: 1,
                                todayHighlight: 1,
                                startView: 2,
                                forceParse: 0,
                                showMeridian: 1
                            });
                            $('.form_date').datetimepicker({
                                language: 'id',
                                weekStart: 1,
                                todayBtn: 1,
                                autoclose: 1,
                                todayHighlight: 1,
                                startView: 2,
                                minView: 2,
                                forceParse: 0
                            });
                            $('.form_time').datetimepicker({
                                language: 'id',
                                weekStart: 1,
                                todayBtn: 1,
                                autoclose: 1,
                                todayHighlight: 1,
                                startView: 1,
                                minView: 0,
                                maxView: 1,
                                forceParse: 0
                            });
                        </script>

                    </div>

                </div>
            </div>
        </div><!-- /row -->
    </div>
</div>