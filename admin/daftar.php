<?php
include "../classes/Staf.php";
$s = new Staf();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertS = $s->insertStafOut($_POST, $_FILES);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>PT. </b>Suffah</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Register account</p>
        <?php
        if (isset($insertS)) {
            echo $insertS;
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat">
            </div>

            <div class="form-group">
                <label>Nohp</label>
                <input type="text" class="form-control" name="nohp">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <select id="select" class="form-control" name="jk">
                    <option selected="">Pilih</option>
                    <option value="l">Laki-laki</option>
                    <option value="p">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label>Level</label>
                <select id="select" class="form-control" name="role">
                    <option selected="">Pilih</option>
                    <option value="0">Kepala Staf</option>
                    <option value="1">Staf</option>
                </select>
            </div>


            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
