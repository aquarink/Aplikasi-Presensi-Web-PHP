<?php
include "fungsi.php";

$pesan = '';

if(isset($_GET['kelas'])) {
	if($_GET['kelas'] != '') {

		$kode_kelas = $_GET['kelas'];
		
		if(count(Cek_Data_Kelas($kode_kelas)) > 0) {
			Delete_Data_Kelas($kode_kelas);
			$pesan = "Data kelas sudah dihapus&status=berhasil";
		} else {
			$pesan = "Kelas tidak ditemukan&status=gagal";
		}
	} else {
		$pesan = "Kode kelas tidak ada&status=gagal";
	}
} else {
	$pesan = "Parameter kelas tidak ditemukan&status=gagal";
}

if($pesan != '') {
	header("Location: data_kelas.php?message=".$pesan);
}
?>