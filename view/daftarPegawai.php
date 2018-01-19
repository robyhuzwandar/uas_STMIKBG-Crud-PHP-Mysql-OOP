<?php $title = "Daftar Pegawai";
include "../inc/header.php"; ?>


<div class="container">
    <div class="box-header">
        <div class="alert alert-info" role="alert">
            <strong>List Pegawai</strong>
        </div>
    </div>
    <div class="box-body">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Foto</th>
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
                        <td width="10%"><img width="60%" src="../admin/<?php echo $result['foto'] ?>"></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
        <br>
    </div>
</div>
<?php include '../inc/footer.php'; ?>