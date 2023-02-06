<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.MAPA.01. MERENCANAKAN AKTIVITAS DAN PROSES ASESMEN</h2>
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
                    <li class="active">FR.MAPA.01</li>
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
                                <table width="100%" class="display table table-bordered" cellpadding="4" cellspacing="4">
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
                            <a href="<?= base_url('skema/detail/' . $dataskema['id'])  ?>" class="btn btn-warning mb-20">
                                <i class="fa fa-arrow-left text-white"></i>
                                Kembali
                            </a>
                            <table class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jenis Dokumen</th>
                                        <th class="text-center">Status Isian</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Menentukan Pendekatan Asesmen</td>
                                        <td class="text-center">
                                            <?php
                                            if ($jmlmapa011 == 0) { ?>
                                                <button class="btn btn-warning">Belum Diisi</button>
                                            <?php
                                            } else { ?>
                                                <button class="btn btn-success">Sudah Diisi</button>
                                            <?php } ?>
                                        </td>
                                        <td style="min-width: 175px;">
                                            <center>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('mapa01/edit_mpa/') . $dataskema['id'];  ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?= base_url('mapa01/print_mpa/') . $dataskema['id']; ?>" class="btn btn-success"><i class="fa fa-print"></i></a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Mempersiapkan Rencana Asesmen</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-success"><?= $jmlkuk ?> KUK</button><button class="btn btn-primary"><?= $jmlbukti ?> Bukti</button>
                                            </div>
                                        </td>
                                        <td style="min-width: 175px;">
                                            <center>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('mapa01/edit_mra/') . $dataskema['id'];  ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?= base_url('mapa01/print_mra/') . $dataskema['id']; ?>" class="btn btn-success"><i class="fa fa-print"></i></a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>Mengidentifikasi Persyaratan Modifikasi dan Kontekstualisasi</td>
                                        <td class="text-center">
                                            <?php
                                            if ($jmlmapa013 == 0) { ?>
                                                <button class="btn btn-warning">Belum Diisi</button>
                                            <?php
                                            } else { ?>
                                                <button class="btn btn-success">Sudah Diisi</button>
                                            <?php } ?>
                                        </td>
                                        <td style="min-width: 175px;">
                                            <center>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('mapa01/edit_mpmk/') . $dataskema['id'];  ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?= base_url('mapa01/print_mpmk/') . $dataskema['id']; ?>" class="btn btn-success"><i class="fa fa-print"></i></a>
                                                </div>
                                            </center>
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