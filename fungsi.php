<?php

// BUKA SESSION
session_start();

// KONEKSI DATABASE
$db = mysqli_connect('localhost', 'root', '', 'absensi_db');

if (mysqli_connect_errno()) {
    echo "Gagal terhubung dengan database absensi_db : " . mysqli_connect_error();
    exit();
}

// FUNGSI FUNGSI
function Baca_Data_Mahasiswa() {
    global $db;
    $sql        = "SELECT * FROM mahasiswa";
    $data       = mysqli_query($db, $sql);
    $jumlah     = mysqli_num_rows($data);

    $data_baru = array();
    $no = 0;
    while ($baris = mysqli_fetch_array($data)) {
        $data_baru[$no] = $baris;
        $no++;
    }

    if($jumlah > 0) {
        return $data_baru;
    } else {
        return array();
    }
}

function Cek_Data_Mahasiswa($nim) {
    global $db;
    $sql        = "SELECT * FROM mahasiswa WHERE nim = '".$nim."' LIMIT 1";
    $data       = mysqli_query($db, $sql);
    $jumlah     = mysqli_num_rows($data);

    $data_baru = array();
    $no = 0;
    while ($baris = mysqli_fetch_array($data)) {
        $data_baru[$no] = $baris;
        $no++;
    }

    if($jumlah > 0) {
        return $data_baru;
    } else {
        return array();
    }
}

function Simpan_Data_Mahasiswa($nim, $nama, $kelas) {
    global $db;
    $sql    = "INSERT INTO mahasiswa(nim, nama, kelas)";
    $sql    .= "VALUES('".$nim."', '".$nama."', '".$kelas."')";
    $data   = mysqli_query($db, $sql);

    if($data) {
        return true;
    } else {
        return false;
    }
}

function Update_Data_Mahasiswa($nim_lama, $nim_baru, $nama, $kelas) {
    global $db;
    $sql    = "UPDATE mahasiswa SET nim = '".$nim_baru."', nama = '".$nama."', kelas = '".$kelas."' WHERE nim = '".$nim_lama."'";
    $data   = mysqli_query($db, $sql);

    if($data) {
        return true;
    } else {
        return false;
    }
}

function Delete_Data_Mahasiswa($nim) {
    global $db;
    $sql    = "DELETE FROM mahasiswa WHERE nim = '".$nim."'";
    $data   = mysqli_query($db, $sql);

    if($data) {
        return true;
    } else {
        return false;
    }
}

function Baca_Data_Kelas() {
    global $db;
    $sql        = "SELECT * FROM kelas";
    $data       = mysqli_query($db, $sql);
    $jumlah     = mysqli_num_rows($data);

    $data_baru = array();
    $no = 0;
    while ($baris = mysqli_fetch_array($data)) {
        $data_baru[$no] = $baris;
        $no++;
    }

    if($jumlah > 0) {
        return $data_baru;
    } else {
        return array();
    }
}

function Cek_Data_Kelas($kode_kelas) {
    global $db;
    $sql        = "SELECT * FROM kelas WHERE kode_kelas = '".$kode_kelas."' LIMIT 1";
    $data       = mysqli_query($db, $sql);
    $jumlah     = mysqli_num_rows($data);

    $data_baru = array();
    $no = 0;
    while ($baris = mysqli_fetch_array($data)) {
        $data_baru[$no] = $baris;
        $no++;
    }

    if($jumlah > 0) {
        return $data_baru;
    } else {
        return array();
    }
}

function Simpan_Data_Kelas($kode_kelas) {
    global $db;
    $sql    = "INSERT INTO kelas(kode_kelas)";
    $sql    .= "VALUES('".$kode_kelas."')";
    $data   = mysqli_query($db, $sql);

    if($data) {
        return true;
    } else {
        return false;
    }
}

function Update_Data_Kelas($kode_kelas_baru, $kode_kelas_lama) {
    global $db;
    $sql    = "UPDATE kelas SET kode_kelas = '".$kode_kelas_baru."' WHERE kode_kelas = '".$kode_kelas_lama."'";
    $data   = mysqli_query($db, $sql);

    if($data) {
        return true;
    } else {
        return false;
    }
}

function Delete_Data_Kelas($kode_kelas) {
    global $db;
    $sql    = "DELETE FROM kelas WHERE kode_kelas = '".$kode_kelas."'";
    $data   = mysqli_query($db, $sql);

    if($data) {
        return true;
    } else {
        return false;
    }
}

function Baca_Data_Catatan() {
    global $db;
    $sql        = "SELECT m.nim, m.nama, c.status_absen, c.tanggal, c.jam_masuk, c.jam_keluar FROM catatan c LEFT JOIN mahasiswa m ON m.nim = c.nim LEFT JOIN kelas k ON k.kode_kelas = m.kelas;";
    $data       = mysqli_query($db, $sql);
    $jumlah     = mysqli_num_rows($data);

    $data_baru = array();
    $no = 0;
    while ($baris = mysqli_fetch_array($data)) {
        $data_baru[$no] = $baris;
        $no++;
    }

    if($jumlah > 0) {
        return $data_baru;
    } else {
        return array();
    }
}

function Cari_Nim_Mahasiswa($nim) {
    global $db;
    $sql        = "SELECT * FROM mahasiswa WHERE nim = '".$nim."'";
    $data       = mysqli_query($db, $sql);
    $jumlah     = mysqli_num_rows($data);

    $data_baru = array();
    $no = 0;
    while ($baris = mysqli_fetch_array($data)) {
        $data_baru[$no] = $baris;
        $no++;
    }

    if($jumlah > 0) {
        return $data_baru;
    } else {
        return array();
    }
}

function Cari_Nim_Mahasiswa_Admin($nim) {
    global $db;
    $sql        = "SELECT * FROM mahasiswa WHERE nim = '".$nim."' AND peran = 'admin'";
    $data       = mysqli_query($db, $sql);
    $jumlah     = mysqli_num_rows($data);

    $data_baru = array();
    $no = 0;
    while ($baris = mysqli_fetch_array($data)) {
        $data_baru[$no] = $baris;
        $no++;
    }

    if($jumlah > 0) {
        return $data_baru;
    } else {
        return array();
    }
}

function Cari_Nim_Catatan($nim) {
    global $db;
    $sql        = "SELECT * FROM catatan WHERE nim = '".$nim."' AND tanggal = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
    $data       = mysqli_query($db, $sql);
    $jumlah     = mysqli_num_rows($data);

    $data_baru = array();
    $no = 0;
    while ($baris = mysqli_fetch_array($data)) {
        $data_baru[$no] = $baris;
        $no++;
    }

    if($jumlah > 0) {
        return $data_baru;
    } else {
        return array();
    }
}

function Tulis_Catatan($nim) {
    global $db;
    $sql    = "INSERT INTO catatan(nim, status_absen, tanggal, jam_masuk)";
    $sql    .= "VALUES('".$nim."', 'masuk', '".date('Y-m-d')."', '".date('H:i:s')."')";
    $data   = mysqli_query($db, $sql);

    if($data) {
        return true;
    } else {
        return false;
    }
}

function Update_Catatan($nim) {
    global $db;
    $sql    = "UPDATE catatan SET status_absen = 'keluar', jam_keluar = '".date('H:i:s')."' WHERE nim = '".$nim."' AND tanggal = '".date('Y-m-d')."' ";
    $data   = mysqli_query($db, $sql);

    if($data) {
        return true;
    } else {
        return false;
    }
}
?>