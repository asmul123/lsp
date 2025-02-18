<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.IA.05. PERTANYAAN TERTULIS PILIHAN GANDA</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <!-- /.col-sm-6 -->
            <!-- <div class="col-sm-6 right-side">
                <a class="btn bg-black toggle-code-handle tour-four" role="button">Toggle Code!</a>
            </div> -->
            <!-- /.col-sm-6 text-right -->
        </div>
        <!-- /.row -->
        <div class="row breadcrumb-div">
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('/') ?>"><i class="fa fa-home"></i>Beranda</a></li>
                    <li>Referensi</li>
                    <li class="active">FR.IA.05</li>
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
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
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
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-warning mb-20">
                                <i class="fa fa-arrow-left text-white"></i>
                                Kembali
                            </a>
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jenis Dokumen</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>FR.IA. 05. Pertanyaan Tertulis Pilihan Ganda
                                        </td>
                                        <td class="text-center" style="max-width: 30px">
                                            <a href="<?= base_url('fria05/cetaksoal/') . $dataskema['id'];  ?><?php if($idasesi != null ){ echo "/$idasesi"; } ?>" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>FR.IA.5A. Kunci Jawaban
                                        </td>
                                        <td class="text-center" style="max-width: 30px">
                                            <a href="<?= base_url('fria05/cetakkunci/') . $dataskema['id'];  ?><?php if($idasesi != null ){ echo "/$idasesi"; } ?>" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>FR.IA.5B. Lembar Jawaban
                                        </td>
                                        <td class="text-center" style="max-width: 30px">
                                            <a href="<?= base_url('fria05/cetakjawaban/') . $dataskema['id'];  ?><?php if($idasesi != null ){ echo "/$idasesi"; } ?>" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
</div>
</div>