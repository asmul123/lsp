<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Tambah Data TUK</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('tuk/edt_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">Nama TUK*</label>
                            <input type="hidden" class="form-control" name="id_tuk" value="<?= $datatuk['id'] ?>">
                            <input type="hidden" class="form-control" name="foto_lama" value="<?= $datatuk['foto'] ?>">
                            <input type="text" class="form-control" name="nama_tuk" value="<?= $datatuk['nama_tuk'] ?>" required autofocus>
                            <span class="fa fa-graduation-cap form-control-feedback"></span>
                            <span class="help-block">Masuk Nama TUK</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Jenis TUK*</label>
                            <select name="jenis_tuk" class="form-control">
                                <option value="Sewaktu" <?php if ($datatuk['jenis_tuk'] == "Sewaktu") {
                                                            echo "selected";
                                                        } ?>>Sewaktu</option>
                                <option value="Mandiri" <?php if ($datatuk['jenis_tuk'] == "Mandiri") {
                                                            echo "selected";
                                                        } ?>>Mandiri</option>
                                <option value="Tempat Kerja" <?php if ($datatuk['jenis_tuk'] == "Tempat Kerja") {
                                                                    echo "selected";
                                                                } ?>>Tempat Kerja</option>
                            </select>
                            <span class="fa fa-home form-control-feedback"></span>
                            <span class="help-block">Pilih Jenis TUK</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control"><?= $datatuk['deskripsi'] ?></textarea>
                            <span class="help-block">Deskripsi TUK</span>
                        </div>
                        <div class="form-group has-feedback">
                            <img src="<?= base_url() ?>assets/img/tuk/<?= $datatuk['foto'] ?>" width="200px">
                            <label for="exampleInputPassword5">Foto</label>
                            <input type="file" class="form-control" name="foto">
                            <span class="fa fa-image form-control-feedback"></span>
                            <span class="help-block">Kosongkan jika tidak ingin mengganti</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('tuk') ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data TUK
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