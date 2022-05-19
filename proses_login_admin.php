<?php

include "fungsi.php";

$pesan = '';

if(isset($_POST['nim_admin'])) {
	if($_POST['nim_admin'] != '') {

		$nim = $_POST['nim_admin'];
		
		if(count(Cari_Nim_Mahasiswa_Admin($nim)) > 0) {
			// ADA
			$_SESSION["nim"] = $nim;
			header("Location: data_mahasiswa.php");
		} else {
			$pesan = "NIM admin tidak ditemukan&status=gagal";
		}
	} else {
		$pesan = "NIM tidak boleh kosong&status=gagal";
	}
} else {
	$pesan = "Kamu harus memasukan NIM&status=gagal";
}

if($pesan != '') {
	header("Location: admin.php?message=".$pesan);
}
?>