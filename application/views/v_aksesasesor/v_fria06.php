<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Uji Kompetensi</h2>
                <p class="sub-title">LSP P1 SMK NEGERI 4 GARUT</p>
            </div>
        </div>
        <!-- /.row -->
        <div class="row breadcrumb-div">
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Ujikompetensi</li>
                    <li class="active">Pelaksanaan</li>
                </ul>
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="row ">

                <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h5>FR.IA.06.B. LEMBAR JAWABAN PERTANYAAN TERTULIS ESAI</h5>
                                <hr>
                                <table width="100%" border='1' cellpadding="4" cellspacing="4">
                                    <tr>
                                        <td rowspan="2">Skema Sertifikasi<br>
                                            ( <?= $ujikomdetail["jenis_skema"] ?> )</td>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td><?= $ujikomdetail["judul_skema"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>:</td>
                                        <td><?= $ujikomdetail["nomor_skema"] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">TUK</td>
                                        <td>:</td>
                                        <td><?= $ujikomdetail["nama_tuk"] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Nama Asesor</td>
                                        <td>:</td>
                                        <td><?= $dataasesor['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Nama Asesi</td>
                                        <td>:</td>
                                        <td><?= $dataasesi['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Tanggal</td>
                                        <td>:</td>
                                        <td><?= date_indo($ujikomdetail["tgl_sertifikasi"]) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <table width="100%" border='1' cellpadding="4" celspacing="4">
                                <tr>
                                    <td>
                                        <strong>PANDUAN BAGI ASESOR</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>Formulir ini diisi pada saat asesor akan melakukan asesmen dengan metode observasi
                                                demonstrasi</li>
                                            <li>Pertanyaan dibuat dengan tujuan untuk menggali, dapat berisi pertanyaan yang berkaitan
                                                dengan dimensi kompetensi, batasan variabel dan aspek kritis.</li>
                                            <li>Tanggapan asesi dapat ditulis oleh asesor dikolom tanggapan, dan apabila tanggapan sesuai
                                                maka beri tanda centrang pada kolom (K) dan apabila belum sesuai beri tanda centrang
                                                pada kolom (BK)</li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <form action="<?= base_url('aksesasesor/ia06save') ?>" method="POST">
                                <table class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center">No</th>
                                            <th rowspan="2" class="text-center">Jawaban</th>
                                            <th colspan="2" class="text-center">Rekomendasi</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">K</th>
                                            <th class="text-center">BK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $No     = 1;
                                        foreach ($datafria06 as $data) {
                                            $dataia = $this->Maksesasesor->getRefIa06($data->id, $dataasesi['idas']);
                                        ?>
                                            <tr>
                                                <td width="6%" align="center"><?= $No ?>.</td>
                                                <td width="81%"><textarea name="jawaban<?= $data->id ?>" class="form-control"><?php if ($dataia) {
                                                                                                                                    echo $dataia['jawaban'];
                                                                                                                                } ?></textarea></td>
                                                <td align="center"><input type="radio" class="blue-style" name="kom<?= $data->id ?>" value="K" <?php if ($dataia) {
                                                                                                                                                    if ($dataia['kompetensi'] == "K") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                } ?>></td>
                                                <td align="center"><input type="radio" class="red-style" name="kom<?= $data->id ?>" value="BK" <?php if ($dataia) {
                                                                                                                                                    if ($dataia['kompetensi'] == "BK") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                } ?>></td>
                                            </tr>
                                        <?php
                                            $No++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <input type="hidden" name="id_asesi" value="<?= $dataasesi['idas'] ?>">
                                <input type="hidden" name="id_skema" value="<?= $ujikomdetail["id_skema"] ?>">
                                <div class="btn-group">
                                    <a href="<?= base_url('aksesasesor/daftar_asesi/') . $ujikomdetail["idpak"]  ?>" class="btn btn-warning mb-20">
                                        <i class="fa fa-arrow-left text-white"></i>
                                        Kembali
                                    </a>
                                    <button type="submit" name="save_ia" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.section -->
</div>
<!-- /.main-page -->
<!-- /.right-sidebar -->

</div>
<!-- /.content-container -->
</div>