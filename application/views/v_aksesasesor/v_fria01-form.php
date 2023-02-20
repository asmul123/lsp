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
                            <table width="100%" border='1' cellpadding="4" celspacing="4">
                                <tr>
                                    <td>
                                        <strong>PANDUAN BAGI ASESOR</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>Lengkapi nama unit kompetensi, elemen, dan kriteria unjuk kerja sesuai kolom dalam tabel.</li>
                                            <li>Istilah Acuan Pembanding dengan SOP/spesifikasi produk dari industri/organisasi dari tempat kerja atau simulasi tempat kerja</li>
                                            <li>Beri tanda centang (<i class="icon far fa-dot-circle"></i>) pada kolom K jika Anda yakin asesi dapat melakukan/mendemonstrasikan tugas sesuai KUK, atau centang (<i class="icon far fa-dot-circle"></i>) pada kolom BK bila sebaliknya.</li>
                                            <li>Penilaian Lanjut diisi bila hasil belum dapat disimpulkan, untuk itu gunakan metode lain sehingga keputusan dapat dibuat.</li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                            <hr>
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
                            <hr>
                            <form action="<?= base_url('aksesasesor/ia01save') ?>" method="POST">
                                <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center">No</th>
                                            <th rowspan="2" class="text-center">Elemen</th>
                                            <th rowspan="2" class="text-center">Kriteria Unjuk Kerja</th>
                                            <th rowspan="2" class="text-center">Benchmark(SOP/spesifikasi produk industri)</th>
                                            <th colspan="2" class="text-center">Rekomendasi</th>
                                            <th rowspan="2" class="text-center">Penilaian Lanjut</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">K</th>
                                            <th class="text-center">BK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $No     = 1;
                                        $SQL     = $this->db->query("SELECT * FROM tb_elemen where id_unit = '" . $dataunit["id"] . "' order by urutan asc")->result_array();
                                        foreach ($SQL as $hSQL) {
                                            $id_elemen = $hSQL["id"];
                                            $kukSQL     = $this->db->query("SELECT * FROM tb_kuk where id_elemen = '$id_elemen' order by urutan asc");
                                            $hSQLia = $this->db->query("SELECT * FROM tb_ia_01 where id_elemen='$id_elemen'")->row_array();
                                            $sop = $hSQLia['sop'];
                                            $nkukSQL     = $kukSQL->result_array();
                                            $jkukSQL = $kukSQL->num_rows();
                                            $nokuk = 0;
                                            foreach ($nkukSQL as $ikukSQL) {
                                                $nokuk++;
                                                $pafr = $this->db->query("SELECT * FROM fr_ia_01 where id_asesi='" . $dataasesi['idas'] . "' and id_kuk='" . $ikukSQL['id'] . "'");
                                                $hafr = $pafr->row_array();
                                                if ($nokuk == 1) {
                                        ?>
                                                    <tr>
                                                        <td rowspan="<?= $jkukSQL ?>"><?= $No ?></td>
                                                        <td rowspan="<?= $jkukSQL ?>"><?= $hSQL["urutan"] ?>. <?= $hSQL["elemen"] ?></td>
                                                        <td><?= $hSQL["urutan"] ?>.<?= $ikukSQL["urutan"] ?>. <?= $ikukSQL["kuk_aktif"] ?></td>
                                                        <td rowspan="<?= $jkukSQL ?>"><?= $sop ?></td>
                                                        <td class="text-center"><input type="radio" id="one" class="blue-style" name="kom<?= $ikukSQL["id"] ?>" value="K" <?php if ($hafr) {
                                                                                                                                                                                if ($hafr['kompetensi'] == "K") {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                }
                                                                                                                                                                            } ?>></td>
                                                        <td class="text-center"><input type="radio" id="two" class="red-style" name="kom<?= $ikukSQL["id"] ?>" value="BK" <?php if ($hafr) {
                                                                                                                                                                                if ($hafr['kompetensi'] == "BK") {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                }
                                                                                                                                                                            } ?>></td>
                                                        <td class="text-center"><input class="form-control" type="text" name="nilai<?= $ikukSQL["id"] ?>" Placeholder="Nilai" size="3" value="<?php if ($hafr) {
                                                                                                                                                                                                    echo $hafr['nilai'];
                                                                                                                                                                                                } ?>"></td>
                                                    </tr>
                                                <?php
                                                } else {
                                                ?>
                                                    <tr>
                                                        <td><?= $hSQL["urutan"] ?>.<?= $ikukSQL["urutan"] ?>. <?= $ikukSQL["kuk_aktif"] ?></td>
                                                        <td class="text-center"><input type="radio" id="one" class="blue-style" name="kom<?= $ikukSQL["id"] ?>" value="K" <?php if ($hafr) {
                                                                                                                                                                                if ($hafr['kompetensi'] == "K") {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                }
                                                                                                                                                                            } ?>></td>
                                                        <td class="text-center"><input type="radio" id="two" class="red-style" name="kom<?= $ikukSQL["id"] ?>" value="BK" <?php if ($hafr) {
                                                                                                                                                                                if ($hafr['kompetensi'] == "BK") {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                }
                                                                                                                                                                            } ?>></td>
                                                        <td class="text-center"><input type="text" class="form-control" name="nilai<?= $ikukSQL["id"] ?>" Placeholder="Nilai" size="3" value="<?php if ($hafr) {
                                                                                                                                                                                                    echo $hafr['nilai'];
                                                                                                                                                                                                } ?>"></td>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                            $No++;
                                        }

                                        ?>
                                        </tfoot>
                                </table>
                                <input type="hidden" name="id_asesi" value="<?= $dataasesi['idas'] ?>">
                                <input type="hidden" name="id_unit" value="<?= $dataunit['id'] ?>">
                                <div class="btn-group">
                                    <a href="<?= base_url('aksesasesor/fria01/') . $dataasesi["idas"]  ?>" class="btn btn-warning mb-20">
                                        <i class="fa fa-arrow-left text-white"></i>
                                        Kembali
                                    </a>
                                    <button type="submit" name="save_ia" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </form>

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