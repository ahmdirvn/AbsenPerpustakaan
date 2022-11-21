<?php
include('config.php');
$koneksi = new database();
$koneksi->edit_data_peminjam($_POST['kode_peminjam'],$_POST['nama_peminjam'],$_POST['jenis_kelamin'],$_POST['tanggal_lahir'],$_POST['alamat'],$_POST['pekerjaan']);
header('location:tampilkan_data_peminjam.php');
?>