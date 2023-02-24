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
                    <li>Referensi</li>
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
                                    <tr>
                                        <td>Jenis Test</td>
                                        <td>:</td>
                                        <td><?= $datatest["jenis_test"] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <a href="<?= base_url('aksesasesor/daftar_test/' . $ujikomdetail["idpak"])  ?>" class="btn btn-warning mb-20">
                                <i class="fa fa-arrow-left text-white"></i>
                                Kembali
                            </a>
                            <div class="btn-group" style="float: right;">
                                <button class="btn btn-info btn-animated btn-wide">
                                    <span class="visible-content">Token : <?= $token ?></span>
                                    <span class="hidden-content"><?= $token ?></span>
                                </button>
                                <a href="<?= base_url('aksesasesor/release_token/' . $idtest) ?>" class="btn btn-danger mb-20">
                                    <i class="fa fa-refresh text-white"></i> Release Token
                                </a>

                            </div>
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nomor Peserta</th>
                                        <th class="text-center">Nama Peserta</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Status Pengerjaan</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($daftarasesi as $data) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $data['no_peserta'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['kelas'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                $status_test = $this->Maksesasesi->gettestasesi($data['id'], $idtest)->row();
                                                if ($status_test) {
                                                    if ($status_test->status_test == 2) {
                                                ?>
                                                        <button class="btn btn-success">Selesai</button>
                                                    <?php } elseif ($status_test->status_test == 1) { ?>
                                                        <button class="btn btn-warning">Sedang Mengerjakan</button>
                                                    <?php }
                                                } else {
                                                    ?>
                                                    <button class="btn btn-info">Belum Mengerjakan</button>
                                                <?php } ?>
                                            </td>
                                            <td><?php if ($status_test) {
                                                    echo number_format($status_test->nilai, 2);
                                                } ?></td>
                                            <td style="min-width: 100px" class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('aksesasesor/list_test_asesi/') . $data['id'] ?>" class="btn btn-success"><i class="fa fa-list"></i></a>
                                                    <a href="<?= base_url('aksesasesor/hapus_test_asesi/') . $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')"><i class="fa fa-trash"></i></a>
                                                </div>
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