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
        <title>Data Kelas</title>
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
                        <li class="active">
                            <a href="data_kelas.php">Kelas</a>
                        </li>
                        <li>
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
                <div class="col-md-12">
                    <div class="col-md-4"></div>

                    <?php if(isset($_GET['message'])) { ?>
                    <?php if($_GET['message'] != '') { ?>

                    <div class="col-md-4">
                        <?php if($_GET['status'] == 'berhasil') { ?>
                        <div class="alert alert-success" role="alert"><?php echo $_GET['message']; ?></div>
                        <?php } else { ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_GET['message']; ?></div>
                        <?php } ?>
                    </div>

                    <?php } ?>
                    <?php } ?>

                    <div class="col-md-4"></div>
                </div>

                <div class="col-md-12">
                    <p>
                        <a class="btn btn-primary" href="tambah_kelas.php" role="button">Tambah Kelas</a>
                    </p>

                    <div class="panel panel-default">
                        <div class="panel-heading">Data Kelas</div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode Kelas</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(count(Baca_Data_Kelas()) > 0) {
                                        foreach(Baca_Data_Kelas() as $kls) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $kls['kode_kelas']; ?></th>
                                        <td scope="row">
                                            <a class="btn btn-warning" href="edit_kelas.php?kelas=<?php echo $kls['kode_kelas']; ?>">Edit</a>

                                            <a class="btn btn-danger" href="hapus_kelas.php?kelas=<?php echo $kls['kode_kelas']; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php } // ini tutup while ?>
                                    <?php } else { // ini dari if else ?>
                                    <tr>
                                        <td colspan="2">Data kelas kosong!</td>
                                    </tr>
                                    <?php } // ini tutup else ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-distjs/bootstrap.min.js"></script>
    </body>
</html>