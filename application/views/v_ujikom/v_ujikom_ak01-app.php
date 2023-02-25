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
        $data_tuk = $this->Mtuk->gettukdetail($jadwal['id_tuk']);
        $data_asesor = $this->Masesor->getasesordetail($jadwal['id_asesor']);
        $HAD = $this->Maksesasesi->getAk01Asesi($idasesi);
        $data_skema = $this->Mskema->getskemadetail($skema['id_skema']);
        if ($dataak01) {
            $tl = explode('#', $dataak01["isi"]);
            for ($i = 1; $i <= 5; $i++) {
                ${"tl" . $i} = explode('-', $tl[$i]);
            }
        }
        ?>
        <form method="post" action="<?= base_url('ujikom/ak01_process')  ?>">
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
                                    ( <?= $data_skema["jenis_skema"] ?> )</td>
                                <td>Judul</td>
                                <td>:</td>
                                <td colspan="2"><?= $data_skema["judul_skema"] ?></td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td colspan="2"><?= $data_skema["nomor_skema"] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">TUK</td>
                                <td>:</td>
                                <td colspan="2"><?= $data_tuk['jenis_tuk'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">Nama Asesor</td>
                                <td>:</td>
                                <td colspan="2"><?= $data_asesor['nama'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">Nama Asesi</td>
                                <td>:</td>
                                <td colspan="2"><?= $this->session->userdata('nama') ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="2">Bukti yang akan dikumpulkan</td>
                                <td rowspan="2">:</td>
                                <td><input type="checkbox" class="blue-style" name="tl1" value="1" <?php if ($dataak01) {
                                                                                                        if ($tl1[1] == '1') {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                    } ?> disabled> TL : Verifikasi Portofolio</td>
                                <td><input type="checkbox" class="blue-style" name="tl2" value="1" <?php if ($dataak01) {
                                                                                                        if ($tl2[1] == '1') {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                    } ?> disabled> L : Observasi Langsung</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input class="blue-style" type="checkbox" name="tl3" value="1" <?php if ($dataak01) {
                                                                                                                    if ($tl3[1] == '1') {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                } ?> disabled> T : Hasil Tes Tulis<br>
                                    <input type="checkbox" class="blue-style" name="tl4" value="1" <?php if ($dataak01) {
                                                                                                        if ($tl4[1] == '1') {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                    } ?> disabled> T : Hasil Tes Lisan<br>
                                    <input type="checkbox" class="blue-style" name="tl5" value="1" <?php if ($dataak01) {
                                                                                                        if ($tl5[1] == '1') {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                    } ?> disabled> T : Hasil Wawancara
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="3">Pelaksanaan asesmen disepakati pada :</td>
                                <td rowspan="3">:</td>
                                <td>Hari/Tanggal :</td>
                                <td><?= longdate_indo($jadwal['tgl_sertifikasi']) ?></td>
                            </tr>
                            <tr>
                                <td>Waktu :</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>TUK :</td>
                                <td><?= $data_tuk['nama_tuk'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p><strong>Asesi:</strong> <input type="checkbox" class="blue-style" name="persetujuan1" value="1" required <?php if ($HAD) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?> disabled></p>
                                    <p>Bahwa Saya Sudah Mendapatkan Penjelasan Hak dan Prosedur Banding oleh Asesor.</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p><strong>Asesor:
                                        </strong><input type="checkbox" class="blue-style" name="persetujuan2" value="1" required <?php if ($HAD['ttd_asesor'] != '') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>></p>
                                    <p>Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena penugasan saya sebagai
                                        Asesor dalam pekerjaan Asesmen kepada siapapun atau organisasi apapun selain kepada pihak yang
                                        berwenang sehubungan dengan kewajiban saya sebagai Asesor yang ditugaskan oleh LSP.</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p><strong>Asesi:
                                        </strong> <input type="checkbox" class="blue-style" name="persetujuan2" value="1" required <?php if ($HAD) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?> disabled></p>
                                    <p>Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang dikumpulkan hanya digunakan
                                        untuk pengembangan profesional dan hanya dapat diakses oleh orang tertentu saja.</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div class="form-group">
                                        <label>Tanda Tangan</label>
                                        <?php if ($HAD) {
                                            if ($HAD['ttd_asesor'] != "") {
                                        ?>
                                                <img src='data:<?= $HAD['ttd_asesor'] ?>' width="100%" />
                                            <?php
                                            } else {
                                            ?>
                                                <div class="card-body">
                                                    <!-- canvas tanda tangan  -->
                                                    <canvas id="signature-pad" class="signature-pad"></canvas>

                                                    <!-- tombol submit  -->
                                                    <div style="float: left;">
                                                        <button type="button" id="btn-submit" class="btn btn-primary">
                                                            Set Tanda Tangan
                                                        </button>
                                                    </div>

                                                    <div style="float: right;">
                                                        <!-- tombol ganti warna  -->
                                                        <button type="button" class="btn btn-success" id="change-color">
                                                            Ganti Warna
                                                        </button>

                                                        <!-- tombol undo  -->
                                                        <button type="button" class="btn btn-dark" id="undo">
                                                            <span class="fa fa-undo"></span>
                                                            Batal
                                                        </button>

                                                        <!-- tombol hapus tanda tangan  -->
                                                        <button type="button" class="btn btn-danger" id="clear">
                                                            <span class="fa fa-eraser"></span>
                                                            Hapus
                                                        </button>

                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <input type='hidden' id='output' name="ttd"><br />
                                                    <!-- Preview image -->
                                                    <img src='' id='sign_prev' style='display: none;' />
                                                </div>
                                        <?php }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group has-feedback">
                            <input type="hidden" name="id_asesi" value="<?= $idasesi ?>">
                            <a href="<?= base_url() ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data AK01
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>