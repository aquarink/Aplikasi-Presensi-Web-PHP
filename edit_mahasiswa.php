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
        <title>Edit Data Mahasiswa</title>
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
                        <li class="active">
                            <a href="data_mahasiswa.php">Mahasiswa</a>
                        </li>
                        <li>
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
                    	if(isset($_GET['nim'])) {
            				if($_GET['nim'] != '') {
            					if(count(Cek_Data_Mahasiswa($_GET['nim'])) > 0) {
                					foreach(Cek_Data_Mahasiswa($_GET['nim']) as $mhs) { ?>

			                        <form action="proses_update_mahasiswa.php" method="POST">
			                            <div class="form-group">
			                                <label>NIM</label>
			                                <input required name="nim_baru" type="text" class="form-control" placeholder="Masukan NIM Mahasiswa" value="<?php echo $mhs['nim']; ?>">

			                                <input type="hidden" name="nim_lama" value="<?php echo $mhs['nim']; ?>">
			                            </div>
			                            <div class="form-group">
			                                <label>Nama</label>
			                                <input required name="nama" type="text" class="form-control" placeholder="Masukan Nama Mahasiswa" value="<?php echo $mhs['nama']; ?>">
			                            </div>
			                            <div class="form-group">
			                                <label>Kelas</label>
			                                <select required name="kelas" class="form-control">
			                                    <?php
			                                    if(count(Baca_Data_Kelas()) > 0) {
			                                        foreach(Baca_Data_Kelas() as $kls) { 
			                                        	if($kls['kode_kelas'] == $mhs['kelas']) { ?>
			                                    			<option selected value="<?php echo $kls['kode_kelas']; ?>"><?php echo $kls['kode_kelas']; ?></option>
			                                        	<?php } else {// tutup foreach?>
			                                        		<option value="<?php echo $kls['kode_kelas']; ?>"><?php echo $kls['kode_kelas']; ?></option>
			                                        	<?php } ?>
			                                        <?php } // tutup foreach?>
			                                    <?php } // tutup if ?>
			                                </select>
			                            </div>
			                            <div class="form-group">
			                                <button type="submit" class="btn btn-info">Update</button>
			                                <a class="btn btn-default" href="data_mahasiswa.php">Kembali</a>
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