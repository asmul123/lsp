<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.IA.02. TUGAS PRAKTIK DEMONSTRASI</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
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
                    <div class="form-group has-feedback">
                        <ol>

                            <?php
                            $daftar_unit = explode("#", $datafr['daftar_unit']);
                            foreach ($dataunit as $du) :
                                if ((in_array($du->id, $daftar_unit, true))) {
                                    echo "<li>" . $du->kode_unit . " : " . $du->judul_unit . "</li>";
                                }
                            endforeach;
                            ?>
                        </ol>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="username5">Judul Tugas*</label>
                        <input type="text" name="judul_tugas" class="form-control" value="<?= $datafr['judul_tugas'] ?>" disabled>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="username5">Alokasi Waktu*</label>
                        <input type="text" name="alokasi_waktu" class="form-control" value="<?= $datafr['alokasi_waktu'] ?>" disabled>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="username5">Petunjuk Soal</label>
                        <?= $datafr['petunjuk'] ?>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="username5">Sekenario</label>
                        <?= $datafr['sekenario'] ?>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="username5">Langkah Kerja</label>
                        <?= $datafr['langkah_kerja'] ?>
                    </div>
                    <div class="form-group has-feedback">
                        <a href="<?= base_url('fria02/index/' . $dataskema['id']) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>