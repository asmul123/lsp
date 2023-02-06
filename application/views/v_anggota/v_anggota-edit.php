<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Edit Data Anggota</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('anggota/edt_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">Urutan*</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $dataanggota['id'] ?>" required autofocus>
                            <input type="hidden" class="form-control" name="foto_lama" value="<?= $dataanggota['foto'] ?>" required autofocus>
                            <input type="number" class="form-control" name="urutan" value="<?= $dataanggota['urutan'] ?>" required autofocus>
                            <span class="fa fa-list-ol form-control-feedback"></span>
                            <span class="help-block">Masuk Nomor Urut dalam Struktur</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Nama Lengkap*</label>
                            <input type="text" class="form-control" name="nama" value="<?= $dataanggota['nama'] ?>" required>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Masukkan nama Anggota</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Jabatan*</label>
                            <input type="text" class="form-control" name="jabatan" value="<?= $dataanggota['jabatan'] ?>" required>
                            <span class="fa fa-pencil form-control-feedback"></span>
                            <span class="help-block">Masukkan Jabatan Anggota</span>
                        </div>
                        <div class="form-group has-feedback">
                            <img src="<?= base_url() ?>assets/img/anggota/<?= $dataanggota['foto'] ?>" width="150px">
                            <label for="exampleInputPassword5">Foto</label>
                            <input type="file" class="form-control" name="foto">
                            <span class="fa fa-image form-control-feedback"></span>
                            <span class="help-block">Abaikan jika tidak ingin merubah Foto</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('anggota') ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data Anggota
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