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
                            <input type="text" class="form-control" name="bukti" value="<?= $datamapa012['bukti'] ?>" placeholder="Misal : Hasil Observasi <?= $datakuk["kuk_aktif"] ?>" autofocus required>
                            <input type="hidden" class="form-control" name="id_bukti" value="<?= $datamapa012['id'] ?>">
                            <input type="hidden" class="form-control" name="id_unit" value="<?= $dataelemen['id_unit'] ?>">
                            <span class="fa fa-list form-control-feedback"></span>
                            <span class="help-block">Masukan Bukti</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name5">Jenis Bukti*</label>
                            <select name="jenis_bukti" class="form-control">
                                <option value="L" <?php if ($datamapa012['jenis_bukti'] == "L") {
                                                        echo "selected";
                                                    } ?>>Langsung</option>
                                <option value="TL" <?php if ($datamapa012['jenis_bukti'] == "TL") {
                                                        echo "selected";
                                                    } ?>>Tidak Langsung</option>
                                <option value="T" <?php if ($datamapa012['jenis_bukti'] == "T") {
                                                        echo "selected";
                                                    } ?>>Tambahan</option>
                            </select>
                            <span class="help-block">Pilih Jenis Bukti</span>
                        </div>
                        Metode Pengumpulan Bukti
                        <div class="form-group has-feedback">
                            <label for="name5">Metode yang Dipilih*</label>
                            <select name="metode" class="form-control">
                                <option value="observasi_langsung" <?php if ($datamapa012['observasi_langsung'] != "") {
                                                                        echo "selected";
                                                                    } ?>>Observasi Langsung</option>
                                <option value="kegiatan_terstruktur" <?php if ($datamapa012['kegiatan_terstruktur'] != "") {
                                                                            echo "selected";
                                                                        } ?>>Kegiatan Terstruktur</option>
                                <option value="tanya_jawab" <?php if ($datamapa012['tanya_jawab'] != "") {
                                                                echo "selected";
                                                            } ?>>Tanya Jawab</option>
                                <option value="verifikasi_portofolio" <?php if ($datamapa012['verifikasi_portofolio'] != "") {
                                                                            echo "selected";
                                                                        } ?>>Verifikasi Portofolio</option>
                                <option value="review_produk" <?php if ($datamapa012['review_produk'] != "") {
                                                                    echo "selected";
                                                                } ?>>Review Produk</option>
                                <option value="lainnya" <?php if ($datamapa012['lainnya'] != "") {
                                                            echo "selected";
                                                        } ?>>Lainnya</option>
                            </select>
                            <span class="help-block">Pilih Jenis Metode</span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="username5">Perangkat Asesmen*</label>
                            <?php
                            if ($datamapa012['observasi_langsung'] != "") {
                            ?>
                                <input type="hidden" class="form-control" name="metode_lama" value="observasi_langsung">
                                <input type="text" class="form-control" name="perangkat_asesmen" value="<?= $datamapa012['observasi_langsung'] ?>" placeholder="Mis. CL/DIT/DPL/DPT/VP/CUP/PW" required>
                            <?php
                            } else
                            if ($datamapa012['kegiatan_terstruktur'] != "") {
                            ?>
                                <input type="hidden" class="form-control" name="metode_lama" value="kegiatan_terstruktur">
                                <input type="text" class="form-control" name="perangkat_asesmen" value="<?= $datamapa012['kegiatan_terstruktur'] ?>" placeholder="Mis. CL/DIT/DPL/DPT/VP/CUP/PW" required>
                            <?php
                            } else
                            if ($datamapa012['tanya_jawab'] != "") {
                            ?>
                                <input type="hidden" class="form-control" name="metode_lama" value="tanya_jawab">
                                <input type="text" class="form-control" name="perangkat_asesmen" value="<?= $datamapa012['tanya_jawab'] ?>" placeholder="Mis. CL/DIT/DPL/DPT/VP/CUP/PW" required>
                            <?php
                            } else
                            if ($datamapa012['verifikasi_portofolio'] != "") {
                            ?>
                                <input type="hidden" class="form-control" name="metode_lama" value="verifikasi_portofolio">
                                <input type="text" class="form-control" name="perangkat_asesmen" value="<?= $datamapa012['verifikasi_portofolio'] ?>" placeholder="Mis. CL/DIT/DPL/DPT/VP/CUP/PW" required>
                            <?php
                            } else
                            if ($datamapa012['review_produk'] != "") {
                            ?>
                                <input type="hidden" class="form-control" name="metode_lama" value="review_produk">
                                <input type="text" class="form-control" name="perangkat_asesmen" value="<?= $datamapa012['review_produk'] ?>" placeholder="Mis. CL/DIT/DPL/DPT/VP/CUP/PW" required>
                            <?php
                            } else
                            if ($datamapa012['lainnya'] != "") {
                            ?>
                                <input type="hidden" class="form-control" name="metode_lama" value="lainnya">
                                <input type="text" class="form-control" name="perangkat_asesmen" value="<?= $datamapa012['lainnya'] ?>" placeholder="Mis. CL/DIT/DPL/DPT/VP/CUP/PW" required>
                            <?php
                            }
                            ?>
                            <span class="fa fa-list form-control-feedback"></span>
                            <span class="help-block">Masuk Perangkat Asesmen yang digunakan</span>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('mapa01/list_mra/' . $dataelemen['id_unit']) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data Bukti
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