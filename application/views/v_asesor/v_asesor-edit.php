<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Edit Data Asesor</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('asesor/edt_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">No MET*</label>
                            <input type="hidden" name="id" value="<?= $id_asesor ?>">
                            <input type="hidden" name="id_user" value="<?= $dataasesor['id_user'] ?>">
                            <input type="hidden" name="foto_lama" value="<?= $dataasesor['foto'] ?>">
                            <input type="text" class="form-control" name="no_met" value="<?= $dataasesor['no_met'] ?>" required autofocus>
                            <span class="fa fa-graduation-cap form-control-feedback"></span>
                            <span class="help-block">Masuk Nomor MET</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Nama Lengkap*</label>
                            <input type="text" class="form-control" name="nama" value="<?= $dataasesor['nama'] ?>" required>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Masukkan nama Asesor</span>
                        </div>
                        <div class="form-group has-feedback">
                            <img src="<?= base_url() ?>assets/img/asesor/<?= $dataasesor['foto'] ?>" width="100px">
                            <label for="exampleInputPassword5">Foto</label>
                            <input type="file" class="form-control" name="foto">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="help-block">Kosongkan jika tidak ingin merubah foto</span>
                        </div>
                        Akun Asesor
                        <div class="form-group has-feedback">
                            <label for="name5">Nama Pengguna*</label>
                            <input type="text" class="form-control" name="username" value="<?= $dataasesor['username'] ?>" required>
                            <span class="fa fa-user form-control-feedback"></span>
                            <span class="help-block">Masukan Nama Pengguna</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Kata Sandi</label>
                            <input type="password" class="form-control" name="password">
                            <span class="fa fa-key form-control-feedback"></span>
                            <span class="help-block">Kosongkan jika tidak ingin merubah kata sandi</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" name="password2">
                            <span class="fa fa-key form-control-feedback"></span>
                            <span class="help-block">Masukan Lagi Kata Sandi</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('asesor') ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Ubah Data Asesor
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.row -->
    </div>
</div>
<!-- /.main-page -->
<!-- /.right-sidebar -->
</div>
<!-- /.content-container -->
</div>