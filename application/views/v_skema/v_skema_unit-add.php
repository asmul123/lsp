<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Tambah Data Unit</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('skema/add_unit_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">Skema</label>
                            <input type="text" class="form-control" name="skema" value="<?= $dataskema['judul_skema'] ?>" disabled>
                            <input type="hidden" class="form-control" name="id_skema" value="<?= $dataskema['id'] ?>">
                            <span class="fa fa-graduation-cap form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="username5">Kode Unit</label>
                            <input type="text" class="form-control" name="kode_unit" require autofocus>
                            <span class="fa fa-graduation-cap form-control-feedback"></span>
                            <span class="help-block">Masuk Kode Unit</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Judul Unit*</label>
                            <input type="text" class="form-control" name="judul_unit" required>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Masukkan Judul Unit</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Jenis Standar*</label>
                            <select name="jenis_standar" class="form-control">
                                <option value="SKKNI">SKKNI</option>
                                <option value="Standar Khusus">Standar Khusus</option>
                                <option value="Standar Internasional">Standar Internasional</option>
                            </select>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Pilih Jenis Standar</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('skema/unit/' . $dataskema['id']) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-success btn-labeled">
                                <i class="fa fa-plus"></i> Tambah Data Unit
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