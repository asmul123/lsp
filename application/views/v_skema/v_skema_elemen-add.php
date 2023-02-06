<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Tambah Data Elemen</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('skema/add_elemen_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">Unit</label>
                            <input type="text" class="form-control" name="unit" value="<?= $dataunit['judul_unit'] ?>" disabled>
                            <input type="hidden" class="form-control" name="id_unit" value="<?= $dataunit['id'] ?>">
                            <span class="fa fa-graduation-cap form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="username5">Nomor Urut</label>
                            <input type="number" class="form-control" name="urutan" require autofocus>
                            <span class="fa fa-graduation-cap form-control-feedback"></span>
                            <span class="help-block">Masuk Nomor Urut</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Elemen*</label>
                            <input type="text" class="form-control" name="elemen" required>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Masukkan Judul Unit</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('skema/elemen/' . $dataunit['id']) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-success btn-labeled">
                                <i class="fa fa-plus"></i> Tambah Data Elemen
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