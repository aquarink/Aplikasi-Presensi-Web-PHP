<?php

include "fungsi.php";

$pesan = '';

if(
	isset($_POST['nim_lama']) && 
	isset($_POST['nim_baru']) && 
	isset($_POST['nama']) && 
	isset($_POST['kelas'])
) {

	if(
		$_POST['nim_lama'] != '' && 
		$_POST['nim_baru'] != '' && 
		$_POST['nama'] != '' && 
		$_POST['kelas'] != ''
	) {

		$nim_lama 	= $_POST['nim_lama'];
		$nim_baru 	= $_POST['nim_baru'];
		$nama 		= $_POST['nama'];
		$kelas 		= $_POST['kelas'];
		
		if(count(Cek_Data_Mahasiswa($nim_lama)) > 0) {
			// ADA
			Update_Data_Mahasiswa($nim_lama, $nim_baru, $nama, $kelas);
			$pesan = "Data mahasiswa berhasil diupdate&status=berhasil";
		} else {
			$pesan = "Data mahasiswa tidak ditemukan&status=gagal";
		}
	} else {
		$pesan = "Data tidak boleh kosong&status=gagal";
	}
} else {
	$pesan = "Kamu harus memasukan data&status=gagal";
}

if($pesan != '') {
	header("Location: data_mahasiswa.php?message=".$pesan);
}
?>