<?php date_default_timezone_set("Asia/Jakarta");  ?>
<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Data Bukti</h2>
                <p class="sub-title">LSP P1 SMK NEGERI 4 GARUT</p>
            </div>
            <!-- /.col-sm-6 -->
            <!-- <div class="col-sm-6 right-side">
                <a class="btn bg-black toggle-code-handle tour-four" role="button">Toggle Code!</a>
            </div> -->
            <!-- /.col-sm-6 text-right -->
        </div>
        <!-- /.row -->
        <div class="row breadcrumb-div">
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Data Bukti</li>
                    <li class="active">Jadwal</li>
                </ul>
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="row ">

                <div class="col-lg-12">

                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h5>Tambah Bukti untuk Skema <?= $dataskema['judul_skema'] ?></h5>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <form action="<?= base_url('apl01/prosesdata') ?>" method="POST">
                                <div class="row panel">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <i>( * ) Wajib di Isi</i>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Bukti Persyaratan*</label>
                                                <input type="hidden" class="form-control" name="idskema" value="<?= $dataskema['id'] ?>">
                                                <input type="hidden" class="form-control" name="id" value="<?php if ($idbukti) {
                                                                                                                echo $idbukti;
                                                                                                            } ?>">
                                                <input type="text" class="form-control" name="bukti" value="<?php if ($idbukti) {
                                                                                                                echo $databukti['bukti'];
                                                                                                            } ?>" required>
                                                <span class="help-block">Tuliskan Nama Persyaratan</span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Ukuran Berkas*</label>
                                                <input type="text" class="form-control" name="max_size" value="<?php if ($idbukti) {
                                                                                                                    echo $databukti['max_size'];
                                                                                                                } ?>" required>
                                                <span class="help-block">Tuliskan Maksimal Berkas Persyaratan dalam satuan Byte</span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Jenis Berkas*</label>
                                                <?php
                                                if ($idbukti) {
                                                    $file_type = $databukti['file_type'];
                                                    $ft = explode(',', $file_type);
                                                } ?>
                                                <select name="file_type[]" class="js-states form-control" id="js-states" multiple>
                                                    <option value="gambar" <?php if ($idbukti) {
                                                                                if (in_array('gambar', $ft)) {
                                                                                    echo "selected";
                                                                                }
                                                                            } ?>>Gambar</option>
                                                    <option value="dokumen" <?php if ($idbukti) {
                                                                                if (in_array('dokumen', $ft)) {
                                                                                    echo "selected";
                                                                                }
                                                                            } ?>>Dokumen</option>
                                                </select>
                                                <span class="help-block">Pilih Jenis File yang diperbolehkan</span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <a href="<?= base_url('apl01/index/' . $dataskema['id']) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                                                <button type="Submit" class="btn btn-success btn-labeled">
                                                    <i class="fa fa-save"></i> Simpan Data Persyaratan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.section -->
</div>
<!-- /.main-page -->
<!-- /.right-sidebar -->

</div>
<!-- /.content-container -->
</div>