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
                                <h5>Daftar Asesi Uji Kompetensi</h5>
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
                            <a href="<?= base_url('aksesasesor')  ?>" class="btn btn-warning mb-20">
                                <i class="fa fa-arrow-left text-white"></i>
                                Kembali
                            </a>
                            <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Asesi</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">APL-01</th>
                                        <th class="text-center">APL-02</th>
                                        <th class="text-center">AK-01</th>
                                        <th class="text-center">FR.IA.01</th>
                                        <th class="text-center">FR.IA.03</th>
                                        <th class="text-center">FR.IA.05</th>
                                        <th class="text-center">FR.IA.06</th>
                                        <th class="text-center">FR.IA.07</th>
                                        <th class="text-center">Rekomendasi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($daftarasesi as $data) : ?>

                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['kelas']; ?></td>
                                            <td>
                                                <?php
                                                $dataapl01 = $this->Maksesasesi->getApl01Asesi($data['idasesi']);
                                                if ($dataapl01) {
                                                    if ($dataapl01['status'] == 1) {
                                                ?>
                                                        <button class="btn btn-warning btn-rounded icon-only" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Menunggu Persetujuan"><i class="fa fa-exchange"></i></button>
                                                    <?php
                                                    } elseif ($dataapl01['status'] == 2) {
                                                    ?>
                                                        <button class="btn btn-success btn-rounded icon-only"><i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Telah Disetujui"></i></button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button class="btn btn-danger btn-rounded icon-only"><i class="fa fa-ban" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Ajuan Ditolak"></i></button>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <button class="btn btn-info btn-rounded icon-only"><i class="fa fa-close" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Belum Mengajukan"></i></button>
                                                <?php }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $dataapl02 = $this->Maksesasesi->getApl02Asesi($data['idasesi']);
                                                if ($dataapl02) {
                                                    if ($dataapl02['status_ajuan'] == 1) {
                                                ?>
                                                        <button class="btn btn-warning btn-rounded icon-only" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Menunggu Persetujuan"><i class="fa fa-exchange"></i></button>
                                                    <?php
                                                    } elseif ($dataapl02['status_ajuan'] == 2) {
                                                    ?>
                                                        <button class="btn btn-success btn-rounded icon-only"><i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Telah Disetujui"></i></button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button class="btn btn-danger btn-rounded icon-only" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Ajuan Ditolak"><i class="fa fa-ban"></i></button>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <button class="btn btn-info btn-rounded icon-only"><i class="fa fa-close" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Belum Mengajukan"></i></button>
                                                <?php }
                                                ?>
                                            </td>
                                            </td>
                                            <td>
                                                <?php
                                                $dataak01 = $this->Maksesasesi->getAk01Asesi($data['idasesi']);
                                                if ($dataak01) {
                                                    if ($dataak01['ttd_asesor'] == "") {
                                                ?>
                                                        <button class="btn btn-warning btn-rounded icon-only"><i class="fa fa-exchange" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Menunggu Persetujuan"></i></button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button class="btn btn-success btn-rounded icon-only"><i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Telah Disetujui"></i></button>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <button class="btn btn-info btn-rounded icon-only"><i class="fa fa-close" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Belum Mengajukan"></i></button>
                                                <?php }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('aksesasesor/fria01/') . $data['idasesi'] ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Ceklis Observasi"><i class="fa fa-pencil"></i>isi FR.IA.01</a>
                                                <hr>
                                                <?php
                                                $jiakK = $this->Maksesasesor->getCountKompIa01('K', $data['idasesi']);
                                                $jiakBK = $this->Maksesasesor->getCountKompIa01('BK', $data['idasesi']);
                                                $jkuk = $this->Mmapa01->getcoutkuk($ujikomdetail["idskema"]);
                                                echo $jiakK . " K<br>";
                                                echo $jiakBK . " BK<br>";
                                                echo "dari " . $jkuk . " KUK<br>";
                                                $belum = $jkuk - ($jiakK + $jiakBK);
                                                echo $belum . " KUK belum ditentukan";
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('aksesasesor/fria03/') . $data['idasesi'] ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Pertanyaan Pendukung Observasi"><i class="fa fa-pencil"></i>isi FR.IA.03</a>
                                                <hr>
                                                <?php
                                                $jiakK = $this->Maksesasesor->getCountKompIa03('K', $data['idasesi']);
                                                $jiakBK = $this->Maksesasesor->getCountKompIa03('BK', $data['idasesi']);
                                                $jper = $this->Maksesasesor->getCountIa03($ujikomdetail["idskema"]);
                                                echo $jiakK . " K<br>";
                                                echo $jiakBK . " BK<br>";
                                                echo "dari " . $jper . " Pertanyaan<br>";
                                                $belum = $jper - ($jiakK + $jiakBK);
                                                echo $belum . " Pertanyaan belum ditentukan";
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('aksesasesor/fria05/') . $data['idasesi'] ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Pertanyaan Tulis Pilihan Ganda"><i class="fa fa-pencil"></i>isi FR.IA.05</a>
                                                <hr>
                                                <?php
                                                $jiakK = $this->Maksesasesor->getCountKompIa05('K', $data['idasesi']);
                                                $jiakBK = $this->Maksesasesor->getCountKompIa05('BK', $data['idasesi']);
                                                $jper = $this->Maksesasesor->getCountIa05($ujikomdetail["idskema"]);
                                                echo $jiakK . " K<br>";
                                                echo $jiakBK . " BK<br>";
                                                echo "dari " . $jper . " Pertanyaan<br>";
                                                $belum = $jper - ($jiakK + $jiakBK);
                                                echo $belum . " Pertanyaan belum ditentukan";
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('aksesasesor/fria06/') . $data['idasesi'] ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Pertanyaan Tulis Essay"><i class="fa fa-pencil"></i>isi FR.IA.06</a>
                                                <hr>
                                                <?php
                                                $jiakK = $this->Maksesasesor->getCountKompIa06('K', $data['idasesi']);
                                                $jiakBK = $this->Maksesasesor->getCountKompIa06('BK', $data['idasesi']);
                                                $jper = $this->Maksesasesor->getCountIa06($ujikomdetail["idskema"]);
                                                echo $jiakK . " K<br>";
                                                echo $jiakBK . " BK<br>";
                                                echo "dari " . $jper . " Pertanyaan<br>";
                                                $belum = $jper - ($jiakK + $jiakBK);
                                                echo $belum . " Pertanyaan belum ditentukan";
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('aksesasesor/fria07/') . $data['idasesi'] ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-sm btn-rounded" title="Pertanyaan Lisan"><i class="fa fa-pencil"></i>isi FR.IA.07</a>
                                                <hr>
                                                <?php
                                                $jiakK = $this->Maksesasesor->getCountKompIa07('K', $data['idasesi']);
                                                $jiakBK = $this->Maksesasesor->getCountKompIa07('BK', $data['idasesi']);
                                                $jper = $this->Maksesasesor->getCountIa07($ujikomdetail["idskema"]);
                                                echo $jiakK . " K<br>";
                                                echo $jiakBK . " BK<br>";
                                                echo "dari " . $jper . " Pertanyaan<br>";
                                                $belum = $jper - ($jiakK + $jiakBK);
                                                echo $belum . " Pertanyaan belum ditentukan";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $hakom = $this->db->query("SELECT kompetensi from fr_ak_02 where id_asesi='" . $data['idasesi'] . "'")->row_array();
                                                if ($hakom) {
                                                    $kompetensi = $hakom['kompetensi'];
                                                    if ($kompetensi == "K") {
                                                        $status = "Kompeten";
                                                        $btn = "success";
                                                    } else if ($kompetensi == "BK") {
                                                        $status = "Belum Kompeten";
                                                        $btn = "danger";
                                                    }
                                                } else {
                                                    $status = "Belum ditentukan";
                                                    $btn = "warning";
                                                }
                                                ?>
                                                <button class="btn btn-<?= $btn ?>"><?= $status ?></button>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('aksesasesor/proses/') . $data['idasesi'] ?> " class="btn btn-info"><i class="fa fa-edit"></i>Proses</a>
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