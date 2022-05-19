<?php

include "fungsi.php";

$pesan = '';

if(isset($_POST['nim']) && isset($_POST['nama']) && isset($_POST['kelas'])) {

	if($_POST['nim'] != '' && $_POST['nama'] != '' && $_POST['kelas'] != '') {

		$nim 	= $_POST['nim'];
		$nama 	= $_POST['nama'];
		$kelas 	= $_POST['kelas'];
		
		if(count(Cek_Data_Mahasiswa($nim)) > 0) {
			// ADA
			$pesan = "NIM sudah pernah terdaftar&status=gagal";
		} else {
			Simpan_Data_Mahasiswa($nim, $nama, $kelas);
			$pesan = "Data mahasiswa berhasil ditambah&status=berhasil";
		}
	} else {
		$pesan = "Data tidak boleh kosong&status=gagal";
	}
} else {
	$pesan = "Kamu harus memasukan data&status=gagal";
}

if($pesan != '') {
	header("Location: tambah_mahasiswa.php?message=".$pesan);
}
?>