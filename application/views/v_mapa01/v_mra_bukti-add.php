<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Tambah Data Bukti</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('mapa01/add_mra_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">KUK</label>
                            <input type="text" class="form-control" name="kuk_aktif" value="<?= $datakuk["kuk_aktif"] ?>" disabled>
                            <span class="fa fa-list form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="username5">Bukti</label>
                            <input type="text" class="form-control" name="bukti" placeholder="Misal : Hasil Observasi <?= $datakuk["kuk_aktif"] ?>" autofocus required>
                            <input type="hidden" class="form-control" name="id_kuk" value="<?= $datakuk['id'] ?>">
                            <input type="hidden" class="form-control" name="id_unit" value="<?= $dataelemen['id_unit'] ?>">
                            <span class="fa fa-list form-control-feedback"></span>
                            <span class="help-block">Masukan Bukti</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Jenis Bukti*</label>
                            <select name="jenis_bukti" class="form-control">
                                <option value="L">Langsung</option>
                                <option value="TL">Tidak Langsung</option>
                                <option value="T">Tambahan</option>
                            </select>
                            <span class="help-block">Pilih Jenis Bukti</span>
                        </div>
                        Metode Pengumpulan Bukti
                        <div class="form-group has-feedback">
                            <label for="name5">Metode yang Dipilih*</label>
                            <select name="metode" class="form-control">
                                <option value="observasi_langsung">Observasi Langsung</option>
                                <option value="kegiatan_terstruktur">Kegiatan Terstruktur</option>
                                <option value="tanya_jawab">Tanya Jawab</option>
                                <option value="verifikasi_portofolio">Verifikasi Portofolio</option>
                                <option value="review_produk">Review Produk</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                            <span class="help-block">Pilih Jenis Metode</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="username5">Perangkat Asesmen*</label>
                            <input type="text" class="form-control" name="perangkat_asesmen" placeholder="Mis. CL/DIT/DPL/DPT/VP/CUP/PW" required>
                            <span class="fa fa-list form-control-feedback"></span>
                            <span class="help-block">Masuk Perangkat Asesmen yang digunakan</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('mapa01/list_mra/' . $dataelemen['id_unit']) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-success btn-labeled">
                                <i class="fa fa-plus"></i> Tambah Data Bukti
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