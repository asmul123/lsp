<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.IA.01. CEKLIS OBSERVASI AKTIVITAS DI TEMPAT KERJA ATAU TEMPAT KERJA SIMULASI</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('fria01/sop_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        Tambahkan Acuan Pembanding untuk Elemen <?= $dataelemen['elemen'] ?><br>
                        Daftar KUK
                        <ol>
                            <?php
                            foreach ($datakuk as $dk) :
                            ?>
                                <li><?= $dk->kuk ?></li>
                            <?php endforeach; ?>
                        </ol>
                        <i>( * ) Wajib di Isi</i>
                        <div class="form-group has-feedback">
                            <label for="username5">Benchmark(SOP/spesifikasi produk industri)</label>
                            <input type="hidden" name="idelemen" value="<?= $dataelemen['id'] ?>">
                            <textarea class="textarea" name="sop" placeholder="Silahkan tuliskan SOP disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" autofocus>
                            <?php
                            if ($datafria01) {
                                echo $datafria01->sop;
                            } ?></textarea>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?= base_url('fria01/list_sop/' . $dataelemen['id_unit']) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data SOP
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.row -->
    </div>
</div>