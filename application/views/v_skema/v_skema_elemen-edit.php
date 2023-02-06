<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Edit Data Elemen</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('skema/edt_elemen_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">Nomor Urut</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $dataelemen['id'] ?>">
                            <input type="number" class="form-control" name="urutan" value="<?= $dataelemen['urutan'] ?>" require autofocus>
                            <span class="fa fa-graduation-cap form-control-feedback"></span>
                            <span class="help-block">Masuk Nomor Urut</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Elemen*</label>
                            <input type="text" class="form-control" name="elemen" value="<?= $dataelemen['elemen'] ?>" required>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Masukkan Judul Unit</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('skema/elemen/' . $dataelemen['id_unit']) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data Elemen
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