<?php

include "fungsi.php";

$pesan = '';

if(isset($_POST['kode_kelas'])) {

	if($_POST['kode_kelas'] != '') {

		$kode_kelas = $_POST['kode_kelas'];
		
		if(count(Cek_Data_Kelas($kode_kelas)) > 0) {
			// ADA
			$pesan = "Kode kelas sudah pernah terdaftar&status=gagal";
		} else {
			Simpan_Data_Kelas($kode_kelas);
			$pesan = "Data kelas berhasil ditambah&status=berhasil";
		}
	} else {
		$pesan = "Data tidak boleh kosong&status=gagal";
	}
} else {
	$pesan = "Kamu harus memasukan data&status=gagal";
}

if($pesan != '') {
	header("Location: tambah_kelas.php?message=".$pesan);
}
?>