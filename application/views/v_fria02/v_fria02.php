<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.IA.02. TUGAS PRAKTIK DEMONSTRASI</h2>
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
                    <li class="active">FR.IA.02</li>
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
                            <a href="<?= base_url('skema/detail/' . $dataskema['id'])  ?>" class="btn btn-warning mb-20">
                                <i class="fa fa-arrow-left text-white"></i>
                                Kembali
                            </a>
                            <a href="<?= base_url('fria02/tambah/' . $dataskema['id'])  ?>" class="btn btn-primary mb-20">
                                <i class="fa fa-plus text-white"></i>
                                Tambah Tugas Praktik
                            </a>
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jumlah Unit</th>
                                        <th class="text-center">Judul Tugas</th>
                                        <th class="text-center">Alokasi Waktu</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($datafria02 as $data) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center">
                                                <?php $jmlunit = explode("#", $data->daftar_unit); ?>
                                                <button class="btn btn-primary"><?= count($jmlunit) - 1 ?> unit</button>
                                            </td>
                                            <td><?= $data->judul_tugas; ?></td>
                                            <td><?= $data->alokasi_waktu; ?></td>
                                            <td style="min-width: 175px, tex-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('fria02/detail/') . $data->id;  ?>" class="btn btn-success"><i class="fa fa-list"></i></a>
                                                    <a href="<?= base_url('fria02/ubah/') . $data->id;  ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?= base_url('fria02/hapus/') . $data->id . '/' . $dataskema['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')"><i class="fa fa-trash"></i></a>
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