<?php $title = "Tambah Pegawai";
include "../inc/header.php" ?>
<?php
$submenu = "addpegawai";
$menu = "pegawai";
include "../inc/sidebar.php" ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertP = $p->insertPegawai($_POST, $_FILES);
}
?>

    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Tambah Pegawai</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if (isset($insertP)) {
                        echo $insertP;
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
                            <label>Gender</label>
                            <select id="select" class="form-control" name="jk">
                                <option selected="">Pilih</option>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nohp</label>
                            <input type="text" class="form-control" name="nohp">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "../inc/footer.php"; ?>