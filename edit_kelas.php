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
        <title>Edit Data Kelas</title>
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
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    	<?php
                    	if(isset($_GET['kelas'])) {
            				if($_GET['kelas'] != '') {
            					if(count(Cek_Data_Kelas($_GET['kelas'])) > 0) {
                					foreach(Cek_Data_Kelas($_GET['kelas']) as $kelas) { ?>

			                        <form action="proses_update_kelas.php" method="POST">
			                            <div class="form-group">
			                                <label>Kode Kelas</label>
			                                <input name="kode_kelas_baru" type="text" class="form-control" placeholder="Masukan Kode Kelas" value="<?php echo $kelas['kode_kelas']; ?>">

			                                <input type="hidden" name="kode_kelas_lama" value="<?php echo $kelas['kode_kelas']; ?>">
			                            </div>
			                            <div class="form-group">
			                                <button type="submit" class="btn btn-info">Update</button>
			                                <a class="btn btn-default" href="data_kelas.php">Kembali</a>
			                            </div>
			                        </form>

                        			<?php } // ini tutup foreach ?>
                        		<?php } else { // ini tutup if 3 ?>
                        			<h3>Data tidak ditemukan</h3>
                        		<?php } ?>
                        	<?php } else { // ini tutup if 2 ?>
                        		<h3>Kode kelas kosong</h3>
                        	<?php } ?>
                        <?php } else { // ini tutup if 1 ?>
                        	<h3>Kode kelas tidak ditemukan</h3>
                    	<?php } ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-distjs/bootstrap.min.js"></script>
    </body>
</html>