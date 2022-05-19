<?php
include "fungsi.php";
if(isset($_SESSION["nim"])) {
    if($_SESSION["nim"] == '') {
        header("Location: admin.php?message=Sessi login kosong&status=gagal");
    }
} else {
    header("Location: admin.php?message=Sessi login tidak ada&status=gagal");
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Catatan Presensi</title>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body {
              padding-top: 40px;
              padding-bottom: 40px;
              background-color: #eee;
            }

            .form-signin {
              max-width: 330px;
              padding: 15px;
              margin: 0 auto;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
              margin-bottom: 10px;
            }
            .form-signin .checkbox {
              font-weight: normal;
            }
            .form-signin .form-control {
              position: relative;
              height: auto;
              -webkit-box-sizing: border-box;
                 -moz-box-sizing: border-box;
                      box-sizing: border-box;
              padding: 10px;
              font-size: 16px;
            }
            .form-signin .form-control:focus {
              z-index: 2;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">Halaman Admin</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="data_mahasiswa.php">Mahasiswa</a>
                        </li>
                        <li>
                            <a href="data_kelas.php">Kelas</a>
                        </li>
                        <li class="active">
                            <a href="data_catatan.php">Catatan Absensi</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="keluar.php">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron">
                <div class="panel panel-default">
                    <div class="panel-heading">Data Histori Prsensi</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count(Baca_Data_Catatan()) > 0) {
                                    foreach(Baca_Data_Catatan() as $catat) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $catat['nim']; ?></th>
                                    <td><?php echo $catat['nama']; ?></td>
                                    <td><?php echo $catat['status_absen']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($catat['tanggal'])); ?></td>
                                    <td><?php echo $catat['jam_keluar']; ?></td>
                                    <td><?php echo $catat['jam_keluar']; ?></td>
                                </tr>
                                <?php } // ini tutup while ?>
                                <?php } else { // ini dari if else ?>
                                <tr>
                                    <td colspan="5">Histori presensi kosong!</td>
                                </tr>
                                <?php } // ini tutup else ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-distjs/bootstrap.min.js"></script>
    </body>
</html>