<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Daftar Test Kompetensi Peserta didik</h2>
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
                    <li>Uji Kompetensi</li>
                    <li class="active">Daftar Test</li>
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
                                <h5>Daftar Test Uji Kompetensi</h5>
                                <table width="100%" cellpadding="4" cellspacing="4" border="1">
                                    <tr>
                                        <td>Nama Paket</td>
                                        <td>:</td>
                                        <td><?= $ujikomdetail["nama_paket"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Judul Skema</td>
                                        <td>:</td>
                                        <td><?= $ujikomdetail["judul_skema"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jadwal Ujikom</td>
                                        <td>:</td>
                                        <td><?= date_indo($ujikomdetail["tgl_sertifikasi"]) ?></td>
                                    </tr>
                                    <tr>
                                        <td>TUK</td>
                                        <td>:</td>
                                        <td><?= $ujikomdetail["nama_tuk"] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jenis Test</th>
                                        <th class="text-center">Durasi</th>
                                        <th class="text-center">Waktu Mulai</th>
                                        <th class="text-center">Waktu Akhir</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($daftartest as $data) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $data['jenis_test'] ?></td>
                                            <td><?= $data['durasi'] ?></td>
                                            <td><?= $data['start_at'] ?></td>
                                            <td><?= $data['finish_at'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                $now = date('Y-m-d H:i:s');
                                                $status_test = $this->Maksesasesi->gettestasesi($idasesi, $data['id'])->row();
                                                if ($status_test) {
                                                    if ($status_test->status_test == 2) {
                                                ?>
                                                        <button class="btn btn-success">Selesai</button>
                                                    <?php } elseif ($status_test->status_test == 1) { ?>
                                                        <a href="<?= base_url('aksesasesi/mulai_test/') . $data['id'] ?>" class="btn btn-warning">Sedang Mengerjakan</a>
                                                    <?php }
                                                } else {
                                                    if ($data['start_at'] <= $now and $data['finish_at'] >= $now) {
                                                    ?>
                                                        <a href="<?= base_url('aksesasesi/mulai_test/') . $data['id'] ?>" class="btn btn-info">Mulai</a>
                                                    <?php } else if ($data['start_at'] >= $now) { ?>
                                                        <button class="btn btn-primary">Belum Mulai</button>
                                                    <?php } else { ?>
                                                        <button class="btn btn-danger">Ditutup</button>
                                                <?php }
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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