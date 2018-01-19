<?php $title="Daftar Staf"; include "../inc/header.php"; ?>


<div class="container">
    <div class="box-header">
        <div class="alert alert-info" role="alert">
            <strong>List Staf</strong>
        </div>
    </div>
    <div class="box-body">
        <?php
        if (isset($delS)) {
            echo $delS;
        }
        ?>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Email</th>
                <th>Bidang</th>
                <th>Gender</th>
                <th>Foto</th>
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
                        <td width="10%"><img width="40%" src="../admin/<?php echo $result['foto'] ?>"></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
        <br>
    </div>
</div>
<?php include '../inc/footer.php'; ?>