<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h4 class="title">FR.AK-02. FORMULIR REKAMAN ASESMEN KOMPETENSI</h4>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        <div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">FR.AK-02</li>
                </ul>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->

        <div class="row mt-30">
            <div class="col-md-4">
                <div class="panel border-primary no-border border-3-top">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <img src="<?= base_url() ?>assets/img/asesi/<?= $dataasesi['foto'] ?>" alt="User Avatar" class="img-responsive">
                                <div class="text-center">
                                    <b><?= $dataasesi['nama'] ?></b><br>
                                    <?= $dataasesi['kelas'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.panel -->

                <div class="panel border-primary no-border border-3-top">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h5>Data Peserta</h5>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Nomor Peserta</th>
                                        <td><?= $dataasesi['no_peserta'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Aktif</th>
                                        <td><?= $dataasesi['tahun_aktif'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.panel -->

                <div class="panel border-primary no-border border-3-top">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h5>Rekomendasi</h5>
                        </div>
                    </div>
                    <form action="<?= base_url('aksesasesor/ak02_process') ?>" method="POST">
                        <div class="panel-body">
                            <div class="row">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Rekomendasi hasil Asesesmen :</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="mb-10">
                                                    <input type="radio" name="kompetensi" id="one" class="blue-style" value="K">
                                                    <label for="one" class="radio-label">Kompeten</label>
                                                </div>
                                                <div class="mb-10">
                                                    <input type="radio" name="kompetensi" id="two" class="red-style" value="BK">
                                                    <label for="two" class="radio-label">Belum Kompeten</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tindak lanjut yang dibutuhkan<br>(Masukkan pekerjaan tambahan dan asesmen yang diperlukan untuk mencapai kompetensi) :</td>
                                        </tr>
                                        <tr>
                                            <td><textarea class="form-control" name="tindakan"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Komentar/ Observasi oleh asesor :</td>
                                        </tr>
                                        <tr>
                                            <td><textarea class="form-control" name="catatan"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Tanda tangan:</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="card-body">
                                                    <!-- canvas tanda tangan  -->
                                                    <canvas id="signature-pad" class="signature-pad"></canvas>

                                                    <!-- tombol submit  -->
                                                    <div style="float: left;">
                                                        <button type="button" id="btn-submit" class="btn btn-primary">
                                                            Set Tanda Tangan
                                                        </button>
                                                        <button type="button" class="btn btn-success" id="change-color">
                                                            Ganti Warna
                                                        </button>
                                                    </div>
                                                    <hr>
                                                    <div style="float: left;">
                                                        <!-- tombol ganti warna  -->

                                                        <!-- tombol undo  -->
                                                        <button type="button" class="btn btn-dark" id="undo">
                                                            <span class="fa fa-undo"></span>
                                                            Batal
                                                        </button>

                                                        <!-- tombol hapus tanda tangan  -->
                                                        <button type="button" class="btn btn-danger" id="clear">
                                                            <span class="fa fa-eraser"></span>
                                                            Hapus
                                                        </button>

                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <input type='hidden' name="id_asesi" value="<?= $dataasesi['idas'] ?>"><br />
                                                    <input type='hidden' id='output' name="ttd"><br />
                                                    <!-- Preview image -->
                                                    <img src='' id='sign_prev' style='display: none;' />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="btn-group" style="float: right;">
                                                    <a href="<?= base_url('aksesasesor')  ?>" class="btn btn-warning mb-20">
                                                        <i class="fa fa-arrow-left text-white"></i>
                                                        Kembali
                                                    </a>
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Proses</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.panel -->

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-8">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#profile2" aria-controls="profile2" role="tab" data-toggle="tab">Data Sertifikasi</a></li>
                </ul>
                <div class="tab-content bg-white p-15">
                    <div role="tabpanel" class="tab-pane active" id="profile2">
                        <?php
                        $data_skema = $this->Mskema->getskemadetail($ujikomdetail['id_skema']);
                        ?>
                        <table width="100%" border='1' cellpadding="4" cellspacing="0">
                            <tr>
                                <td rowspan="2">Skema Sertifikasi<br>
                                    ( <?= $data_skema["jenis_skema"] ?> )</td>
                                <td>Judul</td>
                                <td>:</td>
                                <td><?= $data_skema["judul_skema"] ?></td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td><?= $data_skema["nomor_skema"] ?></td>
                            </tr>
                        </table>
                        <hr>
                        Daftar Capaian Kompetensi per Unit :
                        <hr>
                        <table id="dataSiswaIndex" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Unit Kompetensi</th>
                                    <th>IA01</th>
                                    <th>IA03</th>
                                    <th>IA05</th>
                                    <th>IA06</th>
                                    <th>IA07</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $No     = 1;
                                $data_unit = $this->Mskema->getunit($data_skema['id']);
                                foreach ($data_unit as $du) {
                                ?>
                                    <tr>
                                        <td><?php echo $No . '. '; ?></td>
                                        <td><?= $du->judul_unit ?></td>
                                        <td>
                                            <?php
                                            $jiakK = $this->Maksesasesor->getCountUnitIa01($dataasesi['idas'], $du->id, 'K');
                                            $jiakBK = $this->Maksesasesor->getCountUnitIa01($dataasesi['idas'], $du->id, 'BK');
                                            $jkuk = $this->Mskema->cekKUKUnit($du->id);
                                            echo $jiakK . " K<br>";
                                            echo $jiakBK . " BK<br>";
                                            echo "dari " . $jkuk . " KUK<br>";
                                            $belum = $jkuk - ($jiakK + $jiakBK);
                                            echo $belum . " KUK belum ditentukan";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $jiakK = $this->Maksesasesor->getCountUnitIa03($dataasesi['idas'], $du->id, 'K');
                                            $jiakBK = $this->Maksesasesor->getCountUnitIa03($dataasesi['idas'], $du->id, 'BK');
                                            $jkuk = $this->Maksesasesor->getCountIa03Unit($du->id);
                                            echo $jiakK . " K<br>";
                                            echo $jiakBK . " BK<br>";
                                            echo "dari " . $jkuk . " Pertanyaan<br>";
                                            $belum = $jkuk - ($jiakK + $jiakBK);
                                            echo $belum . " Pertanyaan belum ditentukan";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $jiakK = $this->Maksesasesor->getCountUnitIa05($dataasesi['idas'], $du->id, 'K');
                                            $jiakBK = $this->Maksesasesor->getCountUnitIa05($dataasesi['idas'], $du->id, 'BK');
                                            $jkuk = $this->Maksesasesor->getCountIa05Unit($du->id);
                                            echo $jiakK . " K<br>";
                                            echo $jiakBK . " BK<br>";
                                            echo "dari " . $jkuk . " Pertanyaan<br>";
                                            $belum = $jkuk - ($jiakK + $jiakBK);
                                            echo $belum . " Pertanyaan belum ditentukan";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $jiakK = $this->Maksesasesor->getCountUnitIa06($dataasesi['idas'], $du->id, 'K');
                                            $jiakBK = $this->Maksesasesor->getCountUnitIa06($dataasesi['idas'], $du->id, 'BK');
                                            $jkuk = $this->Maksesasesor->getCountIa06Unit($du->id);
                                            echo $jiakK . " K<br>";
                                            echo $jiakBK . " BK<br>";
                                            echo "dari " . $jkuk . " Pertanyaan<br>";
                                            $belum = $jkuk - ($jiakK + $jiakBK);
                                            echo $belum . " Pertanyaan belum ditentukan";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $jiakK = $this->Maksesasesor->getCountUnitIa07($dataasesi['idas'], $du->id, 'K');
                                            $jiakBK = $this->Maksesasesor->getCountUnitIa07($dataasesi['idas'], $du->id, 'BK');
                                            $jkuk = $this->Maksesasesor->getCountIa07Unit($du->id);
                                            echo $jiakK . " K<br>";
                                            echo $jiakBK . " BK<br>";
                                            echo "dari " . $jkuk . " Pertanyaan<br>";
                                            $belum = $jkuk - ($jiakK + $jiakBK);
                                            echo $belum . " Pertanyaan belum ditentukan";
                                            ?>
                                        </td>
                                    </tr> <?php
                                            $No++;
                                        }
                                            ?>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->


</div>
<!-- /.main-page -->