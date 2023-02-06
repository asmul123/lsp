<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.MAPA.01. MERENCANAKAN AKTIVITAS DAN PROSES ASESMEN</h2>
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
                    <li class="active">FR.MAPA.01</li>
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
                            <a href="<?= base_url('mapa01/edit_mra/' . $dataunit['id_skema'])  ?>" class="btn btn-warning mb-20">
                                <i class="fa fa-arrow-left text-white"></i>
                                Kembali
                            </a>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center">Kriteria Unjuk Kerja</th>
                                        <th rowspan="2" class="text-center">Bukti-Bukti (Kinerja, Produk, Portofolio, dan / atau Hafalan) diidentifikasi berdasarkan Kriteria Unjuk Kerja dan Pendekatan Asesmen.</th>
                                        <th colspan="3" class="text-center">Jenis Bukti</th>
                                        <th colspan="6" class="text-center">Metode dan Perangkat Asesmen CL (Ceklis Observasi/ Lembar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan), DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), PW (Pertanyaan Wawancara)</th>
                                        <th rowspan="2" class="text-center">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">L</th>
                                        <th class="text-center">TL</th>
                                        <th class="text-center">T</th>
                                        <th class="text-center">Obsevasi langsung</th>
                                        <th class="text-center">Kegiatan Terstruktur</th>
                                        <th class="text-center">Tanya Jawab</th>
                                        <th class="text-center">Verifikasi Portfolio</th>
                                        <th class="text-center">Review produk</th>
                                        <th class="text-center">Lainnya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $No = 0;
                                    foreach ($dataelemen as $de) :
                                    ?>
                                        <tr>
                                            <td colspan="12">Elemen: <?= $de->urutan ?>. <?= $de->elemen ?></td>
                                        </tr>
                                        <?php
                                        $datakuk     = $this->Mskema->getkuk($de->id);
                                        foreach ($datakuk as $dk) :
                                        ?>
                                            <tr>
                                                <?php
                                                $jmp2     = $this->Mmapa01->getcoutmapa012($dk->id);
                                                ?>

                                                <td <?php if ($jmp2 > 1) {
                                                        echo "rowspan=\"$jmp2\"";
                                                    } ?>><?= $de->urutan ?>.<?= $dk->urutan ?>. <?= $dk->kuk ?>
                                                    <br>
                                                    <a href="<?= base_url('mapa01/tambah_bukti_mra/' . $dk->id) ?>" data-toggle="tooltip" title="Tambah Bukti" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                                                </td>
                                                <?php
                                                $datamapa012 = $this->Mmapa01->getmapa012($dk->id);
                                                foreach ($datamapa012 as $dm) :
                                                    $no++;
                                                ?>
                                                    <td><?= $dm['bukti'] ?></td>
                                                    <td class="text-center"><?php if ($dm['jenis_bukti'] == 'L') {
                                                                                echo 'L';
                                                                            } ?></td>
                                                    <td class="text-center"><?php if ($dm['jenis_bukti'] == 'TL') {
                                                                                echo 'TL';
                                                                            } ?></td>
                                                    <td class="text-center"><?php if ($dm['jenis_bukti'] == 'T') {
                                                                                echo 'T';
                                                                            } ?></td>
                                                    <td class="text-center"><?= $dm['observasi_langsung'] ?></td>
                                                    <td class="text-center"><?= $dm['kegiatan_terstruktur'] ?></td>
                                                    <td class="text-center"><?= $dm['tanya_jawab'] ?></td>
                                                    <td class="text-center"><?= $dm['verifikasi_portofolio'] ?></td>
                                                    <td class="text-center"><?= $dm['review_produk'] ?></td>
                                                    <td class="text-center"><?= $dm['lainnya'] ?></td>
                                                    <td class="text-center" style="min-width: 110px;">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('mapa01/edit_bukti_mra/' . $dm['id']) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                            <a href="<?= base_url('mapa01/hapus_bukti_mra/' . $dm['id'] . '/' . $dataunit["id"]) ?>" class="btn btn-warning" onclick="return confirm('Yakin untuk menghapus?')"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                    <?php if ($jmp2 > 1 and $jmp2 != $no) {
                                                        echo "</tr>
            <tr>";
                                                    }
                                                endforeach;

                                                if ($jmp2 == 0) {
                                                    ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                <?php
                                                }

                                                ?>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                        </tr> <?php
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