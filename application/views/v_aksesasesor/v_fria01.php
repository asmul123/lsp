<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Uji Kompetensi</h2>
                <p class="sub-title">LSP P1 SMK NEGERI 4 GARUT</p>
            </div>
        </div>
        <!-- /.row -->
        <div class="row breadcrumb-div">
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Ujikompetensi</li>
                    <li class="active">Pelaksanaan</li>
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
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="row ">

                <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h5>FR.IA.01. CEKLIS OBSERVASI AKTIVITAS DI TEMPAT KERJA ATAU TEMPAT KERJA SIMULASI</h5>
                                <hr>
                                <table width="100%" border='1' cellpadding="4" cellspacing="4">
                                    <tr>
                                        <td rowspan="2">Skema Sertifikasi<br>
                                            ( <?= $ujikomdetail["jenis_skema"] ?> )</td>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td><?= $ujikomdetail["judul_skema"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>:</td>
                                        <td><?= $ujikomdetail["nomor_skema"] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">TUK</td>
                                        <td>:</td>
                                        <td><?= $ujikomdetail["nama_tuk"] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Nama Asesor</td>
                                        <td>:</td>
                                        <td><?= $dataasesor['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Nama Asesi</td>
                                        <td>:</td>
                                        <td><?= $dataasesi['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Tanggal</td>
                                        <td>:</td>
                                        <td><?= date_indo($ujikomdetail["tgl_sertifikasi"]) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <div class="btn-group">
                                <a href="<?= base_url('aksesasesor/daftar_asesi/') . $ujikomdetail["idpak"]  ?>" class="btn btn-warning mb-20">
                                    <i class="fa fa-arrow-left text-white"></i>
                                    Kembali
                                </a>
                                <a href="<?= base_url('aksesasesor/ia01set/') . $dataasesi['idas']  ?>" class="btn btn-info mb-20" onclick="return confirm('Yakin untuk mengubah kompetensi asesi di semua unit?')">
                                    <i class="fa fa-check text-white"></i>
                                    Kompetenkan semua Unit
                                </a>
                            </div>
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Unit</th>
                                        <th class="text-center">Judul Unit</th>
                                        <th class="text-center" width="160px">Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataunit as $data) : ?>

                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $data->kode_unit; ?></td>
                                            <td><?= $data->judul_unit; ?></td>
                                            <td>
                                                <?php
                                                $jisiaK = $this->Maksesasesor->getCountUnitIa01($dataasesi['idas'], $data->id, 'K');
                                                $jisiaBK = $this->Maksesasesor->getCountUnitIa01($dataasesi['idas'], $data->id, 'BK');
                                                $jisia = $jisiaK + $jisiaBK;
                                                echo $jisiaK . " K, " . $jisiaBK . " BK<br>";
                                                $jkuk = $this->Mskema->cekKUKUnit($data->id);
                                                echo $jisia . " dinilai dari " . $jkuk . " KUK";
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('aksesasesor/ia01proses/') . $dataasesi['idas'] . '/' . $data->id ?>" class="btn btn-info icon-only"><i class="fa fa-edit"></i></a>
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
<!-- /.main-page -->
<!-- /.right-sidebar -->

</div>
<!-- /.content-container -->
</div>