<?php $title = "Pencarian";
include "../inc/header.php"; ?>
<?php
if (!isset($_GET['pencarian']) || $_GET['pencarian'] == NULL) {
    echo "<h1>Tidak Di temukan</h1>";
} else {
    $key = $_GET['pencarian'];
}
?>

<div class="container">
    <div class="box-header">
        <div class="alert alert-info" role="alert">
            <strong>Hasil pencarian</strong>
        </div>
    </div>
    <div class="card">

        <div class="row" style="margin:1px;">
            <?php
            $data = $p->pencarian($key);
            if ($data) {
                while ($result = $data->fetch_assoc()) { ?>
                    <div class="col" style="padding: 10px;">
                        <div class="card" style="width: 15.9rem;">
                            <img class="card-img-top" src="../admin/<?php echo $result['foto'] ?>" height="200px"
                                 width="20px" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $result['nama']; ?></h5>
                                <p class="card-text">
                                <hr>
                                <?php echo $result['email']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <h1>Tidak ada Hasil</h1>
            <?php } ?>
        </div>
    </div>
    <br>
</div>
</div>
<?php include '../inc/footer.php'; ?>