<?php $title="List Pegawai"; include "../inc/header.php" ?>
<?php
$menu="pegawai";
$submenu="listpegawai";
include "../inc/sidebar.php" ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../../classes/Pegawai.php');
$p = new Pegawai();


if (isset($_GET['delPid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delPid']);
    $delP = $p->delPegawaiById($id);
}
?>

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
                $data = $p->getAllPegawai();
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
<?php include "../inc/footer.php"; ?>