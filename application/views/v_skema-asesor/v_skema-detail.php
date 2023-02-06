<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">MUK Skema</h2>
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
                    <li class="active">MUK Skema</li>
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
                                <h5>Data MUK <?= $dataskema['judul_skema'] ?></h5>
                            </div>
                        </div>
                        <div class="panel-body p-20">

                            <a href="<?= base_url('skema')  ?>" class="btn btn-warning mb-20">
                                <i class="fa fa-arrow-left text-white"></i>
                                Kembali
                            </a>
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Dokumen</th>
                                        <th class="text-center">Nama Dokumen</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $kategori = $this->Mskema->getkategoridokumen();
                                    foreach ($kategori as $kat) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $kat->abjad ?></td>
                                            <td colspan="4"><?= $kat->jenis_dokumen ?></td>
                                        </tr>
                                        <?php
                                        $dokumen = $this->Mskema->getdokumen($kat->id);
                                        foreach ($dokumen as $dok) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td class="text-center"><?= $dok->kode_dokumen ?></td>
                                                <td><?= $dok->nama_dokumen ?></td>
                                                <td><button class="btn btn-warning">Blangko</button></td>
                                                <td style="min-width: 175px;">
                                                    <center>
                                                        <div class="btn-group">
                                                            <?php if ($dok->harus_konfig != "") { ?>
                                                                <a href="<?= base_url($dok->harus_konfig) . $dataskema['id'];  ?>" class="btn btn-success"><i class="fa fa-list"></i></a>
                                                            <?php  } ?>
                                                            <?php if ($dok->bisa_cetak != "") { ?>
                                                                <a href="<?= base_url($dok->bisa_cetak) . $dataskema['id'];  ?>" class="btn btn-warning"><i class="fa fa-print"></i></a>
                                                            <?php  } ?>
                                                        </div>
                                                    </center>
                                                </td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    endforeach;
                                    ?>
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