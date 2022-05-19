<?php

include "fungsi.php";

$pesan = '';

if(isset($_POST['nim'])) {
	if($_POST['nim'] != '') {

		$nim = $_POST['nim'];

		// CARI DATA MAHASISWA BERDASARKAN NIM
		
		if(count(Cari_Nim_Mahasiswa($nim)) > 0) {
			// ADA
			foreach(Cari_Nim_Mahasiswa($nim) as $mhs) {
				$status_absen = "masuk";

				if(count(Cari_Nim_Catatan($nim)) > 0) {
					// ADA DATA MAHASISWA DI TABEL CATAT
					foreach(Cari_Nim_Catatan($nim) as $data_catat) {
						if($data_catat['status_absen'] == 'masuk') {
							if(Update_Catatan($nim)) {
								$pesan = "Kamu berhasil presensi keluar tanggal ".date('d-m-Y')." jam ".date('H:i:s')."&status=berhasil";
							} else {
								$pesan = "Kamu gagal presensi keluar tanggal ".date('d-m-Y')." jam ".date('H:i:s')."&status=gagal";
							}

						} else {
							$pesan = "Kamu sudah pernah melakukan presensi pada tanggal ".date('d-m-Y', strtotime($data_catat['tanggal']))." jam ".date('H:i:s', strtotime($data_catat['jam keluar']))."&status=berhasil";

						}
					}
				} else {
					if(Tulis_Catatan($nim)) {
						$pesan = "Kamu berhasil presensi masuk tanggal ".date('d-m-Y')." jam ".date('H:i:s')."&status=berhasil";
					} else {
						$pesan = "Kamu gagal presensi masuk tanggal ".date('d-m-Y')." jam ".date('H:i:s')."&status=gagal";
					}
				}
			}
		} else {
			$pesan = "NIM tidak ditemukan&status=gagal";
		}
	} else {
		$pesan = "NIM tidak boleh kosong&status=gagal";
	}
} else {
	$pesan = "Kamu harus memasukan NIM&status=gagal";
}

if($pesan != '') {
	header("Location: index.php?message=".$pesan);
}
?>