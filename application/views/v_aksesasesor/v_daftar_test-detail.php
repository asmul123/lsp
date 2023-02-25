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
                                    <?php
                                    if ($datatest['id_jenis'] == 1) {
                                    ?>
                                        <tr>
                                            <td>Upload File</td>
                                            <td>:</td>
                                            <td><?php if ($datatest["upload_file"] == 1) {
                                                    echo "Ya";
                                                } else {
                                                    echo "Tidak";
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran Max File</td>
                                            <td>:</td>
                                            <td><?= $datatest["max_file"] ?> Byte</td>
                                        </tr>
                                        <tr>
                                            <td>Link File</td>
                                            <td>:</td>
                                            <td><?php if ($datatest["link_file"] == 1) {
                                                    echo "Ya";
                                                } else {
                                                    echo "Tidak";
                                                } ?></td>
                                        </tr>
                                    <?php
                                    } else if ($datatest['id_jenis'] == 2) {
                                    ?>
                                        <tr>
                                            <td>Random Soal</td>
                                            <td>:</td>
                                            <td><?php if ($datatest["random_soal"] == 1) {
                                                    echo "Ya";
                                                } else {
                                                    echo "Tidak";
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>Random Jawaban</td>
                                            <td>:</td>
                                            <td><?php if ($datatest["random_jawaban"] == 1) {
                                                    echo "Ya";
                                                } else {
                                                    echo "Tidak";
                                                } ?></td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td>Random Soal</td>
                                            <td>:</td>
                                            <td><?php if ($datatest["random_soal"] == 1) {
                                                    echo "Ya";
                                                } else {
                                                    echo "Tidak";
                                                } ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <div class="btn-group">
                                <a href="<?= base_url('aksesasesor/daftar_test/' . $ujikomdetail["idpak"])  ?>" class="btn btn-warning mb-20">
                                    <i class="fa fa-arrow-left text-white"></i>
                                    Kembali
                                </a>
                                <a href="<?= base_url('aksesasesor/ubah_test/' . $idtest)  ?>" class="btn btn-info mb-20">
                                    <i class="fa fa-edit text-white"></i>
                                    Ubah
                                </a>
                            </div>
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
                                        <th class="text-center">Hasil</th>
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
                                            <td>
                                                <?php
                                                if ($datatest['id_jenis'] == 1) {
                                                ?>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $data['no_peserta'] ?>">Periksa</button>
                                                    <div class="modal fade" id="modal<?= $data['no_peserta'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">File Tugas<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
                                                                </div>
                                                                <form action="<?= base_url('aksesasesor/proses_demonstrasi_test') ?>" method="POST">
                                                                    <div class="modal-body">
                                                                        <?php if ($status_test) { ?>
                                                                            <table class="table table-striped table-bordered">
                                                                                <tr>
                                                                                    <th class="text-center">NO</th>
                                                                                    <th class="text-center">File</th>
                                                                                </tr>
                                                                                <?php
                                                                                $nofile = 1;
                                                                                $daftar_file = $this->db->get_where('tb_tugas_demonstrasi', array('id_status_test' => $status_test->id))->result();
                                                                                foreach ($daftar_file as $dl) {
                                                                                ?>
                                                                                    <tr>
                                                                                        <td class="text-center"><?= $nofile++ ?></td>
                                                                                        <td>
                                                                                            <?php
                                                                                            if ($dl->jenis == 1) {
                                                                                                $target = base_url('assets/assesment/demonstrasi/' . $dl->target);
                                                                                            } else {
                                                                                                $target = $dl->target;
                                                                                            }
                                                                                            ?>
                                                                                            <a href="<?= $target ?>" class="btn btn-default" target="_blank"><i class="fa fa-download"></i> <?= $dl->judul ?></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                                <tr>
                                                                                    <td class="text-center">Nilai</td>
                                                                                    <td>
                                                                                        <input type="number" name="nilai" class="form-control">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-center">
                                                                                        <input type="checkbox" name="kompetensi" class="blue-style" value="1">
                                                                                        <input type="hidden" name="id_status_test" value="<?= $status_test->id ?>">
                                                                                    </td>
                                                                                    <td>Kompetenkan seluruh unit yang terkait</td>
                                                                                </tr>
                                                                            </table>
                                                                            <a href="<?= base_url('aksesasesor/fria01/' . $data['id']) ?>" class="btn btn-primary">Lihat Isian FR.IA.01</a>
                                                                        <?php } else {
                                                                            echo "Asesi belum mengumpulkan tugas !";
                                                                        } ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Batal</button>
                                                                            <button type="submit" class="btn bg-success btn-wide btn-rounded" name="tambah" value="tambah"><i class="fa fa-check"></i>Simpan</button>
                                                                        </div>
                                                                        <!-- /.btn-group -->
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } elseif ($datatest['id_jenis'] == 2) {
                                                ?>
                                                    <a href="<?= base_url('aksesasesor/fria05/' . $data['id']) ?>" class="btn btn-primary">Lihat</a>
                                                <?php
                                                } elseif ($datatest['id_jenis'] == 3) {
                                                ?>
                                                    <a href="<?= base_url('aksesasesor/fria06/' . $data['id']) ?>" class="btn btn-primary">Lihat</a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?php if ($status_test) {
                                                    echo number_format($status_test->nilai, 2);
                                                } ?></td>
                                            <td style="min-width: 100px" class="text-center">
                                                <div class="btn-group">
                                                    <?php if ($status_test) { ?>
                                                        <a href="<?= base_url('aksesasesor/reset_test_asesi/') . $idtest . '/' . $status_test->id ?>" class="btn btn-warning"><i class="fa fa-refresh"></i></a>
                                                        <a href="<?= base_url('aksesasesor/hapus_test_asesi/') . $idtest . '/' . $status_test->id ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus jawaban asesi?')"><i class="fa fa-trash"></i></a>
                                                        <a href="<?= base_url('aksesasesor/selesai_test_asesi/') . $idtest . '/' . $status_test->id ?>" class="btn btn-success" onclick="return confirm('Yakin untuk menyelesaikan test ini?')"><i class="fa fa-check"></i></a>
                                                    <?php } ?>
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