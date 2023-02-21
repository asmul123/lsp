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
                                </table>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <div class="btn-group">
                                <a href="<?= base_url('aksesasesor')  ?>" class="btn btn-warning mb-20">
                                    <i class="fa fa-arrow-left text-white"></i>
                                    Kembali
                                </a>
                                <button type="button" class="btn btn-info btn-animated btn-wide" data-toggle="modal" data-target="#modalTambah">
                                    <span class="visible-content">Jadwalkan Test</span>
                                    <span class="hidden-content"><i class="fa fa-plus"></i></span>
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Pilih Jenis Test <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
                                        </div>
                                        <form action="<?= base_url('tambah_test') ?>" method="POST">
                                            <div class="modal-body">
                                                <select name="jenis_test" class="form-control">
                                                    <option value="1">Praktik Demonstrasi</option>
                                                    <option value="2">Soal Pilihan Ganda</option>
                                                    <option value="3">Soal Essay</option>
                                                </select>
                                                <input type="hidden" name="id_paket" value="<?= $ujikomdetail['idpak'] ?>" </div>
                                                <div class="modal-footer">
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Batal</button>
                                                        <button type="submit" class="btn bg-success btn-wide btn-rounded"><i class="fa fa-check"></i>Simpan</button>
                                                    </div>
                                                    <!-- /.btn-group -->
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                            <td style="min-width: 110px">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('aksesasesor/ubah_test/') . $data['id'] ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?= base_url('aksesasesor/hapus_test/') . $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')"><i class="fa fa-trash"></i></a>
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