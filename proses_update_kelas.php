<?php

include "fungsi.php";

$pesan = '';

if(isset($_POST['kode_kelas_baru']) && isset($_POST['kode_kelas_lama'])) {

	if($_POST['kode_kelas_baru'] != '' && $_POST['kode_kelas_lama'] != '') {

		$kode_kelas_baru = $_POST['kode_kelas_baru'];
		$kode_kelas_lama = $_POST['kode_kelas_lama'];
		
		if(count(Cek_Data_Kelas($kode_kelas_lama)) > 0) {
			// ADA
			Update_Data_Kelas($kode_kelas_baru, $kode_kelas_lama);
			$pesan = "Data kelas berhasil diupdate&status=berhasil";
		} else {
			$pesan = "Data kelas tidak ditemukan&status=gagal";
		}
	} else {
		$pesan = "Data tidak boleh kosong&status=gagal";
	}
} else {
	$pesan = "Kamu harus memasukan data&status=gagal";
}

if($pesan != '') {
	header("Location: data_kelas.php?message=".$pesan);
}
?>