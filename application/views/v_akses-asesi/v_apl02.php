<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.APL-02. ASESMEN MANDIRI</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <?php
                                $data_skema = $this->Mskema->getskemadetail($skema['id_skema']);
                                $hcdapl = $this->db->query("SELECT status_ajuan, ttd_asesi, catatan from tb_approve_apl02 where id_asesi='$idasesi'")->row_array();
                                ?>
                                <table width="100%" border='1' cellpadding="4" cellspacing="4">
                                    <tr>
                                        <td rowspan="2">Skema Sertifikasi<br>
                                            ( <?= $data_skema["jenis_skema"] ?> )</td>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td><?= $data_skema["judul_skema"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>:</td>
                                        <td><?= $data_skema["nomor_skema"] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">PANDUAN ASESMEN MANDIRI</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><b>Instruksi:</b>
                                            <p>
                                            <ul>
                                                <li>Baca setiap pertanyaan di kolom sebelah kiri</li>
                                                <li>Beri tanda centang (<i class="fa fa-check-circle"></i>) pada kotak jika Anda yakin dapat melakukan tugas yang dijelaskan.</li>
                                                <li>Isi kolom di sebelah kanan dengan mendaftar bukti yang Anda miliki untuk menunjukkan bahwa Anda melakukan tugas-tugas ini.</li>
                                            </ul>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <?php if ($hcdapl) {
                                    if ($hcdapl['status_ajuan'] == 1) {
                                ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="fa fa-exclamation-triangle"></i> Status Data!</h5>
                                            Anda telah mengisi Formulir APL-02, dan sedang dilakukan pemeriksaan oleh Asesor Kompetensi!
                                        </div>
                                    <?php } else if ($hcdapl['status_ajuan'] == 2) {
                                    ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="fa fa-check"></i> Status Data!</h5>
                                            Formulir APL-02 Anda telah diterima, anda dapat melanjutkan ke tahap berikutnya!<br>
                                            Catatan Asesor: <?= $hcdapl['catatan'] ?>
                                        </div>
                                    <?php } else if ($hcdapl['status_ajuan'] == 3) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="fa fa-ban"></i> Status Data!</h5>
                                            Data Anda ditolak, silahkan perbaiki data Anda!<br>
                                            Catatan Asesor: <?= $hcdapl['catatan'] ?>
                                        </div>
                                <?php }
                                } ?>
                                Daftar Unit Kompetensi sesuai kemasan :
                                <br>
                                <table id="dataSiswaIndex" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Unit</th>
                                            <th>Judul Unit</th>
                                            <th>Keterangan</th>
                                            <th>Isi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $No     = 1;
                                        $data_unit = $this->Mskema->getunit($skema['id_skema']);
                                        $success = 1;
                                        foreach ($data_unit as $du) {
                                        ?>
                                            <tr>
                                                <td><?php echo $No . '. '; ?></td>
                                                <td><?= $du->kode_unit ?></td>
                                                <td><?= $du->judul_unit ?></td>
                                                <td><?php
                                                    $JK1 = $this->db->query("SELECT * FROM tb_elemen where id_unit='" . $du->id . "'")->num_rows();
                                                    $JK2 = $this->db->query("SELECT * FROM tb_apl_02 where id_asesi='$idasesi' and id_unit='" . $du->id . "'")->num_rows();
                                                    if ($JK2 == $JK1) {
                                                        $alert = "success";
                                                        $success++;
                                                    } else {
                                                        $alert = "warning";
                                                    }
                                                    ?>
                                                    <div class="alert alert-<?= $alert ?> alert-dismissible">
                                                        Tersedia : <?= $JK1 ?> Elemen<br>Telah diisi : <?= $JK2 ?> Elemen
                                                    </div>
                                                </td>
                                                <td><a href="<?= base_url('aksesasesi/form_apl02/' . $du->id) ?>" class="btn btn-info"><i class="icon fa fa-edit"></i></a></td>
                                            </tr> <?php
                                                    $No++;
                                                }

                                                    ?>
                                        </tfoot>
                                </table>
                                <?php
                                if ($No == $success) {
                                    if ($hcdapl) {
                                        if ($hcdapl['status_ajuan'] == 1 or $hcdapl['status_ajuan'] == 2) {
                                            $disabled = "disabled";
                                        } else {
                                            $disabled = "";
                                        }
                                    } else {
                                        $disabled = "";
                                    }
                                ?>

                                    <form action="<?= base_url('aksesasesi/apl02_process') ?>" method="POST">
                                        <div class="form-group">
                                            <label>Tanda Tangan</label>
                                            <?php
                                            if ($disabled == "disabled") {
                                            ?>
                                                <img src='data:<?= $hcdapl['ttd_asesi'] ?>' width="100%" />
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
                                        </div>
                                    <?php } ?>
                                    <h5><input class="blue-style" type="checkbox" name="persetujuan" value="Ya" <?php if ($disabled == "disabled") {
                                                                                                                    echo "checked";
                                                                                                                } ?> <?= $disabled ?> required>
                                        Saya telah memeriksa semua unit kompetensi</h5><br>

                                    <input type="submit" name="ajukan_apl" class="btn btn-primary" value="Ajukan" <?= $disabled ?>>
                                    </form>
                                <?php
                                }

                                ?>
                            </div><!-- /.card-header -->
                        </div>
                        <!-- /.nav-tabs-custom -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.row -->
    </div>
</div>