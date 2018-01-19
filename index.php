<?php
spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});
$s = new Staf();
$p = new Pegawai();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Beranda
    </title>
    <!-- css -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.css">
    <!-- js -->
    <script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <img src="assets/img/logopc.png" width="35px" height="35px"/><a class="navbar-brand" href="index.php">&nbspPT.
            Suffah</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view/daftarPegawai.php">Daftar Pegawai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftarpinjam.php">Daftar Staf</a>
                </li>
            </ul>
            <form action="view/pencarian.php" method="get" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"
                       name="pencarian">
                <input class="btn btn-outline-default my-2 my-sm-0" type="submit" value="Search"/>
            </form>
        </div>
    </div>
</nav>
<div class="jumbotron jumbotron-fluid" style="height: 230px; background: #343a40 !important">
    <div class="container" style="color:white !important;">
        <h1 style="font-size: 40px !important" class="display-3">PT. Suffah</h1>
        <p class="lead">Sebuah Perusahaan Terkemuka yang Bergerak di Bidang Pendidikan</p>
    </div>
</div>

<div class="container">
    <div class="alert alert-success" role="alert">
        <strong>Beranda</strong>
    </div>
    <div class="card">

        <div class="row" style="margin:1px;">
            <?php
            $per_page = 8;
            if (isset($_GET["page"])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $star_from = ($page - 1) * $per_page;
            ?>
            <?php
            $data = $p->pagination($star_from, $per_page);
            if ($data) {
                while ($result = $data->fetch_assoc()) { ?>
                    <div class="col" style="padding: 10px;">
                        <div class="card" style="width: 15.9rem;">
                            <img class="card-img-top" src="admin/<?php echo $result['foto'] ?>" height="200px"
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
            } ?>
        </div>
    </div>
    <br>
    <?php
    $data = $p->getAllPegawai();
    $total_rows = mysqli_num_rows($data);
    $total_pages = ceil($total_rows / $per_page);
    ?>
    <div class="row">
        <div class="col flex-unordered">
        </div>
        <div class="col flex-last">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $per_page; $i++) { ?>
                        <li class="page-item"><a class="page-link"
                                                 href='index.php?page= <?php echo $i; ?>'><?php echo $i; ?></a></li>
                        <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col flex-first">

        </div>
    </div>

    <?php include 'inc/footer.php'; ?>
