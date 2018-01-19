<?php $title="Edit Pegawai"; include "../inc/header.php" ?>
<?php include "../inc/sidebar.php" ?>
<?php
if (!isset($_GET['pId']) || $_GET['pId'] == NULL) {
    echo "<script>window.location='listPegawai.php'</script>";
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['pId']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateP = $p->updatePegawai($_POST, $_FILES, $id);
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
                    if (isset($updateP)) {
                        echo $updateP;
                    }
                    ?>
                    <?php
                    $pegawai = $p->getPegawaiById($id);
                    if ($pegawai) {
                        while ($result = $pegawai->fetch_assoc()) {
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" value="<?php echo $result['nama'] ?>" class="form-control"
                                           name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" value="<?php echo $result['alamat'] ?>" class="form-control"
                                           name="alamat">
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select id="select" class="form-control" name="jk">
                                        <option selected="">Pilih</option>
                                        <option
                                            <?php
                                            if ($result['jk'] == "l") { ?>
                                                selected
                                            <?php }
                                            ?>
                                                value="l">Laki-laki
                                        </option>
                                        <option
                                            <?php
                                            if ($result['jk'] == "p") { ?>
                                                selected
                                            <?php }
                                            ?>
                                                value="p">Perempuan
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nohp</label>
                                    <input value="<?php echo $result['nohp'] ?>" type="text" class="form-control"
                                           name="nohp">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="<?php echo $result['email'] ?>" type="email" class="form-control"
                                           name="email">
                                </div>

                                <div class="form-group">
                                    <label>Foto</label><br>
                                    <img style="padding-bottom: 5px" src="../<?php echo $result['foto'] ?>" width="30%"  alt="">
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                            </form>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php include "../inc/footer.php"; ?>