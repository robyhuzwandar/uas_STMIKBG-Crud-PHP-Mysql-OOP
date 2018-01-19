<?php $title="Profil"; include "../inc/header.php" ?>
<?php include "../inc/sidebar.php" ?>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Profil</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                        <img class="img-circle" height="150px"
                             src="../<?php echo Session::get('foto') ?>"
                             alt="User Pic">
                    </div>
                    <div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                        <img class="img-circle" height="40px"
                             src="{{ asset('fotoStaf/'. Auth::user()->foto) }}"
                             alt="User Pic">
                    </div>
                    <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                        <strong>Profil</strong><br>
                        <dl>
                            <dt>Nama</dt>
                            <dd><?php echo Session::get('nama') ?></dd>
                            <dt>Alamat</dt>
                            <dd><?php echo Session::get('alamat') ?></dd>
                            <dt>Email</dt>
                            <dd><?php echo Session::get('email') ?></dd>
                            <dt>No Hp</dt>
                            <dd><?php echo Session::get('nohp') ?></dd>
                        </dl>
                    </div>
                    <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                        <strong>Tentang</strong><br>
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>Nama</td>
                                <td><?php echo Session::get('nama') ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?php echo Session::get('alamat') ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo Session::get('email') ?></td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td><?php echo Session::get('nohp') ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="../index.php" class="btn btn-sm btn-primary" type="button"
                   data-toggle="tooltip"
                   data-original-title="Send message to user"><i class="glyphicon glyphicon-arrow-left"></i></a>
                <span class="pull-right">
                    <a href="editStaf.php?sId=<?php echo Session::get('id') ?>" class="btn btn-sm btn-warning" type="button"
                       data-toggle="tooltip"
                       data-original-title="Edit this user"><i
                                class="glyphicon glyphicon-edit"></i></a>
                </span>
            </div>
        </div>
    </div>
<?php include "../inc/footer.php"; ?>