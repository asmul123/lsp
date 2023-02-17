<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.AK.01. PERSETUJUAN ASESMEN DAN KERAHASIAAN</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <?php
        if ($dataak01) {
            $tl = explode('#', $dataak01["isi"]);
            for ($i = 1; $i <= 5; $i++) {
                ${"tl" . $i} = explode('-', $tl[$i]);
            }
        }
        ?>
        <form method="post" action="<?= base_url('ak01/ak01_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <table width="100%" border='1' cellpadding="4" cellspacing="4">
                            <tr>
                                <td colspan="5">Persetujuan Asesmen ini untuk menjamin bahwa Asesi telah diberi arahan secara rinci tentang
                                    perencanaan dan proses asesmen</td>
                            </tr>
                            <tr>
                                <td rowspan="2">Skema Sertifikasi<br>
                                    ( <?= $dataskema["jenis_skema"] ?> )</td>
                                <td>Judul</td>
                                <td>:</td>
                                <td colspan="2"><?= $dataskema["judul_skema"] ?></td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td colspan="2"><?= $dataskema["nomor_skema"] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">TUK</td>
                                <td>:</td>
                                <td colspan="2">Sewaktu/Tempat Kerja/Mandiri*</td>
                            </tr>
                            <tr>
                                <td colspan="2">Nama Asesor</td>
                                <td>:</td>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2">Nama Asesi</td>
                                <td>:</td>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="2">Bukti yang akan dikumpulkan</td>
                                <td rowspan="2">:</td>
                                <td><input type="checkbox" name="tl1" value="1" <?php if ($dataak01) {
                                                                                    if ($tl1[1] == '1') {
                                                                                        echo "checked";
                                                                                    }
                                                                                } ?>> TL : Verifikasi Portofolio</td>
                                <td><input type="checkbox" name="tl2" value="1" <?php if ($dataak01) {
                                                                                    if ($tl2[1] == '1') {
                                                                                        echo "checked";
                                                                                    }
                                                                                } ?>> L : Observasi Langsung</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tl3" value="1" <?php if ($dataak01) {
                                                                                                if ($tl3[1] == '1') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            } ?>> T : Hasil Tes Tulis<br>
                                    <input type="checkbox" name="tl4" value="1" <?php if ($dataak01) {
                                                                                    if ($tl4[1] == '1') {
                                                                                        echo "checked";
                                                                                    }
                                                                                } ?>> T : Hasil Tes Lisan<br>
                                    <input type="checkbox" name="tl5" value="1" <?php if ($dataak01) {
                                                                                    if ($tl5[1] == '1') {
                                                                                        echo "checked";
                                                                                    }
                                                                                } ?>> T : Hasil Wawancara
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="3">Pelaksanaan asesmen disepakati pada :</td>
                                <td rowspan="3">:</td>
                                <td>Hari/Tanggal :</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Waktu :</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>TUK :</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p><strong>Asesi:</strong></p>
                                    <p>Bahwa Saya Sudah Mendapatkan Penjelasan Hak dan Prosedur Banding oleh Asesor.</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p><strong>Asesor:
                                        </strong></p>
                                    <p>Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena penugasan saya sebagai
                                        Asesor dalam pekerjaan Asesmen kepada siapapun atau organisasi apapun selain kepada pihak yang
                                        berwenang sehubungan dengan kewajiban saya sebagai Asesor yang ditugaskan oleh LSP.</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p><strong>Asesi:
                                        </strong></p>
                                    <p>Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang dikumpulkan hanya digunakan
                                        untuk pengembangan profesional dan hanya dapat diakses oleh orang tertentu saja.</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p>&nbsp;</p>
                                    <p>Tanda tangan Asesor : ......................................................... Tanggal : ..............................................................</p>
                                    <p>&nbsp;</p>
                                    <p>Tanda tangan Asesi : ............................................................ Tanggal : ..............................................................</p>
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group has-feedback">
                            <input type="hidden" name="idskema" value="<?= $idskema ?>">
                            <a href="<?= base_url('skema/detail/' . $idskema) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data AK01
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