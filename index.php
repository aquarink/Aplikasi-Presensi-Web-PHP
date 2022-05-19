<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Silahkan Lakukan Presensi</title>
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
                    <a class="navbar-brand" href="">Presensi Mahasiswa</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="admin.php">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="col-md-12" style="margin-top: 20px;">
                <div class="col-md-3"></div>

                <?php if(isset($_GET['message'])) { ?>
                <?php if($_GET['message'] != '') { ?>

                <div class="col-md-6" style="text-align: center;">
                    <?php if($_GET['status'] == 'berhasil') { ?>
                    <div class="alert alert-success" role="alert"><?php echo $_GET['message']; ?></div>
                    <?php } else { ?>
                    <div class="alert alert-danger" role="alert"><?php echo $_GET['message']; ?></div>
                    <?php } ?>
                </div>

                <?php } ?>
                <?php } ?>

                <div class="col-md-3"></div>
            </div>
            <div class="col-md-12">
                <form class="form-signin" action="proses_presensi.php" method="POST">
                    <div style="text-align: center;">
                        <h3 class="form-signin-heading">Presensi</h3>
                    </div>
                    <label for="inputNim" class="sr-only">Masukan NIM</label>
                    <input name="nim" type="text" id="inputNim" class="form-control" placeholder="Masukan NIM" required autofocus>
                    <br>
                    <button class="btn btn btn-info btn-block" type="submit">Masuk</button>
                </form>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-distjs/bootstrap.min.js"></script>
    </body>
</html>