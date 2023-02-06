<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.IA.01. CEKLIS OBSERVASI AKTIVITAS DI TEMPAT KERJA ATAU TEMPAT KERJA SIMULASI
                </h2>
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
                    <li class="active">FR.IA.01</li>
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
                                <table width="100%" border='1' cellpadding="4" cellspacing="4">
                                    <tr>
                                        <td rowspan="2">Unit Kompetensi<br></td>
                                        <td>Kode Unit</td>
                                        <td>:</td>
                                        <td><?= $dataunit["kode_unit"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Judul Unit</td>
                                        <td>:</td>
                                        <td><?= $dataunit["judul_unit"] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <a href="<?= base_url('fria01/index/' . $dataskema['id'])  ?>" class="btn btn-warning mb-20">
                                <i class="fa fa-arrow-left text-white"></i>
                                Kembali
                            </a>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Elemen</th>
                                        <th>Kriteria Unjuk Kerja</th>
                                        <th>Benchmark(SOP/spesifikasi produk industri)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $No     = 1;
                                    foreach ($dataelemen as $de) :
                                        $datakuk = $this->Mskema->getkuk($de->id);
                                        $dataia01 = $this->Mfria01->getfria01($de->id);
                                        $jmlcountkuk = $this->Mskema->cekKUK($de->id);
                                        $nokuk = 0;
                                        foreach ($datakuk as $dk) :
                                            $nokuk++;
                                            if ($nokuk == 1) {
                                    ?>
                                                <tr>
                                                    <td rowspan="<?= $jmlcountkuk ?>"><?= $No ?></td>
                                                    <td rowspan="<?= $jmlcountkuk ?>"><?= $de->urutan ?>. <?= $de->elemen ?></td>
                                                    <td><?= $de->urutan ?>.<?= $dk->urutan ?>. <?= $dk->kuk ?></td>
                                                    <td rowspan="<?= $jmlcountkuk ?>"><?php if ($dataia01) {
                                                                                            echo $dataia01->sop;
                                                                                        } ?></td>
                                                    <td rowspan="<?= $jmlcountkuk ?>"><a href="<?= base_url('fria01/edit_sop/' . $de->id) ?>" data-toggle="tooltip" title="Edit SOP" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                                                </tr>
                                            <?php
                                            } else {
                                            ?>
                                                <tr>
                                                    <td><?= $de->urutan ?>.<?= $dk->urutan ?>. <?= $dk->kuk ?></td>
                                                </tr>
                                    <?php
                                            }
                                        endforeach;
                                        $No++;
                                    endforeach;

                                    ?>
                                    </tfoot>
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