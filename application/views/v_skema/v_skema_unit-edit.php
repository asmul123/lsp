<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Edit Data Unit</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('skema/edt_unit_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">Kode Unit</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $dataunit['id'] ?>">
                            <input type="text" class="form-control" name="kode_unit" value="<?= $dataunit['kode_unit'] ?>" require autofocus>
                            <span class="fa fa-graduation-cap form-control-feedback"></span>
                            <span class="help-block">Masuk Kode Unit</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Judul Unit*</label>
                            <input type="text" class="form-control" name="judul_unit" value="<?= $dataunit['judul_unit'] ?>" required>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Masukkan Judul Unit</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Jenis Standar*</label>
                            <select name="jenis_standar" class="form-control">
                                <option value="SKKNI" <?php if ($dataunit['jenis_standar'] == "SKKNI") {
                                                            echo "selected";
                                                        } ?>>SKKNI</option>
                                <option value="Standar Khusus" <?php if ($dataunit['jenis_standar'] == "Standar Khusus") {
                                                                    echo "selected";
                                                                } ?>>Standar Khusus</option>
                                <option value="Standar Internasional" <?php if ($dataunit['jenis_standar'] == "Standar Internasional") {
                                                                            echo "selected";
                                                                        } ?>>Standar Internasional</option>
                            </select>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Pilih Jenis Standar</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('skema/unit/' . $dataunit['id_skema']) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data Unit
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