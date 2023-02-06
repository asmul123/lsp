<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Asesor</h2>
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
                    <li class="active">Asesor</li>
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
                                <h5>Data Asesor</h5>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <?php if ($akses['add'] == 1) { ?>
                                <?php if ($akses['add'] == 1) { ?>
                                    <a href="<?= base_url('asesor/tambah')  ?>" class="btn btn-primary mb-20">
                                        <i class="fa fa-plus text-white"></i>
                                        Tambah Data Asesor
                                    </a>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opsi Data <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right mt-5" style="box-shadow: 0 0 5px 0px #000;">
                                            <li><a href="<?= base_url('asesor/export')  ?>">Export Data Asesor</a></li>
                                            <li><a href="<?= base_url('asesor/import')  ?>">Import Data Asesor</a></li>
                                        </ul>
                                    </div>
                                <?php  } ?>
                            <?php  } ?>
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Nama Lengkap</th>
                                        <th class="text-center">No MET</th>
                                        <th class="text-center">Akun</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dataasesor as $data) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center"><img src="<?= base_url() ?>assets/img/asesor/<?= $data->foto; ?>" width="100px"></td>
                                            <td><?= $data->nama; ?></td>
                                            <td><?= $data->no_met; ?></td>
                                            <td>
                                                <?php
                                                $cekakun = $this->Masesor->cekAkun($data->id_user);
                                                if ($cekakun == "kosong") {
                                                ?>
                                                    <a href="<?= base_url() ?>asesor/akun/<?= $data->id; ?>" class="btn btn-danger">Tidak Aktif</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-success">Aktif</button>
                                                <?php } ?>
                                            </td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <div class="btn-group">
                                                        <?php if ($akses['view'] == 1) { ?>
                                                            <a href="<?= base_url('asesor/detail/') . $data->id;  ?>" class="btn btn-success"><i class="fa fa-search"></i></a>
                                                        <?php  } ?>
                                                        <?php if ($akses['edit'] == 1) { ?>
                                                            <a href="<?= base_url('asesor/ubah/') . $data->id;  ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                        <?php  } ?>
                                                        <?php if ($akses['delete'] == 1) { ?>
                                                            <a href="<?= base_url('asesor/hapus/') . $data->id . '/' . $data->id_user;  ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')"><i class="fa fa-trash"></i></a>
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