<?php
session_start(); // memulai session
session_unset(); // menghapus session
session_destroy(); // menghapus session
header("location: halaman_utama.php"); // mengambalikan ke form_login.php
