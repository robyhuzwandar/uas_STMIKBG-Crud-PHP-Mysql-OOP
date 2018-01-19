<?php $title="List Staf"; include "../inc/header.php" ?>
<?php
$menu="staf";
$submenu="liststaf";
include "../inc/sidebar.php" ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../../classes/Pegawai.php');
include_once($filepath . '/../../classes/Staf.php');
$p = new Pegawai();
$s = new Staf();


if (isset($_GET['delSid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delSid']);
    $delS = $s->delStafById($id);
}
?>

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
                $data = $s->getAllStaf();
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