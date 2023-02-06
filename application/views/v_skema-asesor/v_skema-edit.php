<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Edit Data Skema</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('skema/edt_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">Nomor Skema</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $dataskema['id'] ?>" autofocus>
                            <input type="hidden" class="form-control" name="file_skema_lama" value="<?= $dataskema['file_skema'] ?>" autofocus>
                            <input type="text" class="form-control" name="nomor_skema" value="<?= $dataskema['nomor_skema'] ?>" autofocus>
                            <span class="fa fa-graduation-cap form-control-feedback"></span>
                            <span class="help-block">Masuk Nomor Skema</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Judul Skema*</label>
                            <input type="text" class="form-control" name="judul_skema" value="<?= $dataskema['judul_skema'] ?>" required>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Masukkan Judul Skema</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Jenis Skema*</label>
                            <select name="jenis_skema" class="form-control">
                                <option value="KKNI" <?php if ($dataskema['jenis_skema'] == "KKNI") {
                                                            echo "selected";
                                                        } ?>>KKNI</option>
                                <option value="Okupasi" <?php if ($dataskema['jenis_skema'] == "Okupasi") {
                                                            echo "selected";
                                                        } ?>>Okupasi</option>
                                <option value="Klaster" <?php if ($dataskema['jenis_skema'] == "Klaster") {
                                                            echo "selected";
                                                        } ?>>Klaster</option>
                            </select>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Pilih Jenis Skema</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="exampleInputPassword5">File Skema</label>
                            <input type="file" class="form-control" name="file_skema">
                            <span class="fa fa-image form-control-feedback"></span>
                            <span class="help-block">Abaikan jika tidak ingin merubah file</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('skema') ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data Skema
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