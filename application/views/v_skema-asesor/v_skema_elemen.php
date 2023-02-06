<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Elemen Unit Skema </h2>
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
                    <li class="active">Skema - Unit - Elemen</li>
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
                                <h5>Data Elemen pada Unit <?= $dataunit['judul_unit'] ?></h5>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <?php if ($akses['add'] == 1) { ?>
                                <?php if ($akses['add'] == 1) { ?>
                                    <a href="<?= base_url('skema/unit/' . $dataunit['id_skema'])  ?>" class="btn btn-warning mb-20">
                                        <i class="fa fa-arrow-left text-white"></i>
                                        Kembali
                                    </a>
                                    <a href="<?= base_url('skema/tambah_elemen/' . $dataunit['id'])  ?>" class="btn btn-primary mb-20">
                                        <i class="fa fa-plus text-white"></i>
                                        Tambah Data Elemen
                                    </a>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opsi Data <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right mt-5" style="box-shadow: 0 0 5px 0px #000;">
                                            <li><a href="<?= base_url('skema/elemen_export')  ?>">Export Data Elemen</a></li>
                                            <li><a href="<?= base_url('skema/elemen_import')  ?>">Import Data Elemen</a></li>
                                        </ul>
                                    </div>
                                <?php  } ?>
                            <?php  } ?>
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Judul Elemen</th>
                                        <th class="text-center">Kriteria Unjuk Kerja</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dataelemen as $data) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $data->elemen ?></td>
                                            <td>
                                                <ol>
                                                    <?php
                                                    $cekakun = $this->Mskema->cekKUK($data->id);
                                                    if ($cekakun == "") {
                                                    ?>
                                                        <a href="<?= base_url() ?>skema/tambah_kuk/<?= $data->id ?>" class="btn btn-warning">Tambah KUK</a>
                                                        <?php
                                                    } else {
                                                        $datakuk = $this->Mskema->getkuk($data->id);
                                                        foreach ($datakuk as $dk) :
                                                        ?>
                                                            <li>
                                                                Aktif : <?= $dk->kuk_aktif ?><br>
                                                                Pasif : <?= $dk->kuk ?><br>
                                                                <div class="btn-group">
                                                                    <a href="<?= base_url() ?>skema/ubah_kuk/<?= $dk->id ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                                    <a href="<?= base_url() ?>skema/hapus_kuk/<?= $dk->id ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                                <hr>
                                                            </li>
                                                    <?php
                                                        endforeach;
                                                    } ?>
                                                </ol>
                                            </td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url() ?>skema/tambah_kuk/<?= $data->id ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                        <?php if ($akses['edit'] == 1) { ?>
                                                            <a href="<?= base_url('skema/ubah_elemen/') . $data->id;  ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                        <?php  } ?>
                                                        <?php if ($akses['delete'] == 1) { ?>
                                                            <a href="<?= base_url('skema/hapus_elemen/') . $data->id ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')"><i class="fa fa-trash"></i></a>
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