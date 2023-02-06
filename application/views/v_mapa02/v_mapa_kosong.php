<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.MAPA.02. PETA INSTRUMEN ASESSMEN HASIL PENDEKATAN ASESMEN DAN PERENCANAAN ASESMEN</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('mapa02/mapa_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <table width="100%" cellpadding="4" cellspacing="4" border="1">
                            <tr>
                                <td rowspan="2">Skema Sertifikasi<br>
                                    ( <?= $dataskema["jenis_skema"] ?> )</td>
                                <td>Judul</td>
                                <td>:</td>
                                <td><?= $dataskema["judul_skema"] ?></td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td><?= $dataskema["nomor_skema"] ?></td>
                            </tr>
                        </table>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center">No</th>
                                    <th rowspan="2" class="text-center">MUK</th>
                                    <th colspan="6" class="text-center">Potensi Asesi ***</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Tidak ada</th>
                                    <th class="text-center">1</th>
                                    <th class="text-center">2</th>
                                    <th class="text-center">3</th>
                                    <th class="text-center">4</th>
                                    <th class="text-center">5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $No     = 1;
                                $refmapa02     = $this->Mmapa02->getrefmapa02();
                                foreach ($refmapa02 as $rm) :
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $No ?></td>
                                        <td><?= $rm["muk"] ?></td>
                                        <?php
                                        for ($i = 0; $i <= 5; $i++) {
                                        ?>
                                            <td class="text-center"><input type="radio" name="radio<?= $No ?>" id="radio" value="<?= $i ?>"></td>
                                        <?php } ?>
                                    </tr>
                                <?php
                                    $No++;
                                endforeach;

                                ?>
                                </tfoot>
                        </table>
                        <div class="form-group has-feedback">
                            <input type="hidden" name="idskema" value="<?= $idskema ?>">
                            <a href="<?= base_url('skema/detail/' . $idskema) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data MAPA 02
                            </button>
                        </div>
                        <hr>
                        *) diisi berdasarkan hasil penentuan pendekatan asesmen dan perencanaan asesmen<br>
                        **) Keterangan:<br>
                        <ol>
                            <li>
                                Hasil pelatihan dan / atau pendidikan, dimana Kurikulum dan fasilitas praktek mampu telusur terhadap standar kompetensi.
                            </li>
                            <li>
                                Hasil pelatihan dan / atau pendidikan, dimana kurikulum belum berbasis kompetensi.
                            </li>
                            <li>
                                Pekerja berpengalaman, dimana berasal dari industri/tempat kerja yang dalam operasionalnya mampu telusur dengan standar kompetensi.
                            </li>
                            <li>
                                Pekerja berpengalaman, dimana berasal dari industri/tempat kerja yang dalam operasionalnya belum berbasis kompetensi.
                            </li>
                            <li>
                                Pelatihan / belajar mandiri atau otodidak.
                            </li>
                        </ol>
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