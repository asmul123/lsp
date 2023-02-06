<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Skema</h2>
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
                    <li class="active">Skema</li>
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
                                <h5>Data Skema</h5>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <?php if ($akses['add'] == 1) { ?>
                                <?php if ($akses['add'] == 1) { ?>
                                    <a href="<?= base_url('skema/tambah')  ?>" class="btn btn-primary mb-20">
                                        <i class="fa fa-plus text-white"></i>
                                        Tambah Data Skema
                                    </a>
                                <?php  } ?>
                            <?php  } ?>
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nomor Skema</th>
                                        <th class="text-center">Judul Skema</th>
                                        <th class="text-center">Jenis Skema</th>
                                        <th class="text-center">File Skema</th>
                                        <th class="text-center">Jumlah Unit</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dataskema as $data) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center"><?= $data->nomor_skema ?></td>
                                            <td><?= $data->judul_skema; ?></td>
                                            <td><?= $data->jenis_skema; ?></td>
                                            <td><?php
                                                if ($data->file_skema == "") {
                                                ?>
                                                    <a href="<?= base_url() ?>skema/ubah/<?= $data->id; ?>" class="btn btn-warning"><i class="fa fa-upload"></i>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <a href="<?= base_url() ?>assets/skema/<?= $data->file_skema; ?>" class="btn btn-success" target="_blank"><i class="fa fa-download"></i>
                                                        <?php } ?>
                                            </td>
                                            <td>
                                                <?php
                                                $cekakun = $this->Mskema->cekUnit($data->id);
                                                if ($cekakun == "") {
                                                ?>
                                                    <a href="<?= base_url() ?>skema/tambah_unit/<?= $data->id ?>" class="btn btn-warning">Tambah Unit</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?= base_url() ?>skema/unit/<?= $data->id ?>" class="btn btn-success"><?= $cekakun ?> Unit</a>
                                                <?php } ?>
                                            </td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <div class="btn-group">
                                                        <?php if ($akses['view'] == 1) { ?>
                                                            <a href="<?= base_url('skema/detail/') . $data->id;  ?>" class="btn btn-success"><i class="fa fa-list"></i></a>
                                                        <?php  } ?>
                                                        <?php if ($akses['edit'] == 1) { ?>
                                                            <a href="<?= base_url('skema/ubah/') . $data->id;  ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                        <?php  } ?>
                                                        <?php if ($akses['delete'] == 1) { ?>
                                                            <a href="<?= base_url('skema/hapus/') . $data->id ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')"><i class="fa fa-trash"></i></a>
                                                        <?php  } ?>
                                                    </div>
                                                </center>
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