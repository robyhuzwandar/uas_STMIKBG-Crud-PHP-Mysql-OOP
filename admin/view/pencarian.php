<?php
$title = "Pencarian";
include "../inc/header.php" ?>
<?php
//$menu = "pegawai";
//$submenu = "listpegawai";
include "../inc/sidebar.php" ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../../classes/Pegawai.php');
include_once($filepath . '/../../classes/Staf.php');
$s = new Staf();
$p = new Pegawai();

if (!isset($_GET['pencarian']) || $_GET['pencarian'] == NULL) {
    echo "<h1>Tidak Di temukan</h1>";
} else {
    $key = $_GET['pencarian'];
}

if (isset($_GET['delPid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delPid']);
    $delP = $p->delPegawaiById($id);
}

if (isset($_GET['delSid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delSid']);
    $delS = $s->delStafById($id);
}
?>
    <div class="alert alert-info" role="alert"> Hasil Pencarian ... </div>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Pegawai</h3>
        </div>
        <div class="box-body">
            <?php
            if (isset($delP)) {
                echo $delP;
            }
            ?>
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                   aria-describedby="example1_info">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Foto</th>
                    <?php if (Session::get('role') == 0) { ?>
                        <th>Action</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $data = $p->pencarian($key);
                if ($data) {
                    while ($result = $data->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i . "."; ?></td>
                            <td width="16%"><?php echo $result['nama']; ?></td>
                            <td width="13%"><?php echo $result['alamat']; ?></td>
                            <td width="13%"><?php echo $result['nohp']; ?></td>
                            <td width="13%"><?php echo $result['email']; ?></td>
                            <td>
                                <?php if ($result['jk'] == "l") { ?>
                                    laki - laki
                                <?php } else { ?>
                                    Perempuan
                                <?php } ?>
                            </td>
                            <td width="10%"><img width="40%" src="../<?php echo $result['foto'] ?>"></td>
                            <?php if (Session::get('role') == 0) { ?>
                                <td width="16%">
                                    <a href="editPegawai.php?pId=<?php echo $result['id']; ?>"
                                       class="btn-primary btn-sm">Edit</a>
                                    <a onclick="return confirm('Yakin untuk Hapus Data ?')"
                                       href="listPegawai.php?delPid=<?php echo $result['id']; ?>"
                                       class="btn-danger btn-sm">Hapus</a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Staf</h3>
        </div>
        <div class="box-body">
            <?php
            if (isset($delS)) {
                echo $delS;
            }
            ?>
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                   aria-describedby="example1_info">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Bidang</th>
                    <th>Jenis Kelamin</th>
                    <th>Foto</th>
                    <?php if (Session::get('role') == 0) { ?>
                        <th>Action</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $data = $s->pencarian($key);
                if ($data) {
                    while ($result = $data->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i . "."; ?></td>
                            <td width="16%"><?php echo $result['nama']; ?></td>
                            <td width="13%"><?php echo $result['alamat']; ?></td>
                            <td width="13%"><?php echo $result['nohp']; ?></td>
                            <td width="13%"><?php echo $result['email']; ?></td>
                            <td width="13%">
                                <?php if ($result['role'] == "0") { ?>
                                    Kepala Staf
                                <?php } else { ?>
                                    Staf
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($result['jk'] == "l") { ?>
                                    L
                                <?php } else { ?>
                                    P
                                <?php } ?>
                            </td>
                            <td width="10%"><img width="40%" src="../<?php echo $result['foto'] ?>"></td>
                            <?php if (Session::get('role') == 0) { ?>
                                <td width="16%">
                                    <a href="editStaf.php?sId=<?php echo $result['id']; ?>"
                                       class="btn-primary btn-sm">Edit</a>
                                    <a onclick="return confirm('Yakin untuk Hapus Data ?')"
                                       href="listStaf.php?delSid=<?php echo $result['id']; ?>"
                                       class="btn-danger btn-sm">Hapus</a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include "../inc/footer.php"; ?>