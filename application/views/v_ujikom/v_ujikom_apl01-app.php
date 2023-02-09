<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h4 class="title">FR.APL-01. PERMOHONAN SERTIFIKASI KOMPETENSI</h4>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        <div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">FR.APL-01</li>
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
                                    <tr>
                                        <th>Tanda Tangan</th>
                                        <td><img src="<?= $dataapl01['ttd'] ?>" width="100%"></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pengajuan</th>
                                        <td><?= $dataapl01['tgl_apl'] ?></td>
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
                            <h5>Keputusan</h5>
                        </div>
                    </div>
                    <form action="<?= base_url('ujikom/apl01_process') ?>" method="POST">
                        <div class="panel-body">
                            <div class="row">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Berdasarkan ketentuan persyaratan dasar, maka pemohon:</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="mb-10">
                                                    <input type="radio" name="status" id="one" class="blue-style" value="2">
                                                    <label for="one" class="radio-label">Diterima</label>
                                                </div>
                                                <div class="mb-10">
                                                    <input type="radio" name="status" id="two" class="red-style" value="3">
                                                    <label for="two" class="radio-label">Tidak diterima</label>
                                                </div>
                                            </td>
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
                                                    <input type='hidden' name="id_asesi" value="<?= $idasesi ?>"><br />
                                                    <input type='hidden' id='output' name="ttd"><br />
                                                    <!-- Preview image -->
                                                    <img src='' id='sign_prev' style='display: none;' />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Catatan:</td>
                                        </tr>
                                        <tr>
                                            <td><textarea class="form-control" name="catatan"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><input style="float: right;" type="submit" class="btn btn-primary" value="Proses"></td>
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
                    <li role="presentation" class="active"><a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">Data Pribadi</a></li>
                    <li role="presentation"><a href="#profile2" aria-controls="profile2" role="tab" data-toggle="tab">Data Sertifikasi</a></li>
                    <li role="presentation"><a href="#messages2" aria-controls="messages2" role="tab" data-toggle="tab">Data Bukti</a></li>
                </ul>
                <div class="tab-content bg-white p-15">
                    <div role="tabpanel" class="tab-pane active" id="home2">
                        <table width="100%" cellpadding="4">
                            <tr>
                                <td colspan="3"><strong>Data Pribadi</strong></td>
                            </tr>
                            <tr>
                                <td width="32%">Nama Lengkap</td>
                                <td width="3%">:</td>
                                <td width="65%"><?= $dataapl01['nama_lengkap'] ?></td>
                            </tr>
                            <tr>
                                <td width="32%">No. KTP/NIK/Paspor</td>
                                <td width="3%">:</td>
                                <td width="65%"><?= $dataapl01['nik'] ?></td>
                            </tr>
                            <tr>
                                <td width="32%">Tempat/tgl.Lahir</td>
                                <td width="3%">:</td>
                                <td width="65%"><?= $dataapl01['tempat_lahir'] ?>, <?= date_indo($dataapl01['tgl_lahir']) ?></td>
                            </tr>
                            <tr>
                                <td width="32%">Jenis Kelamin</td>
                                <td width="3%">:</td>
                                <td width="65%"><?php
                                                if ($dataapl01['jenis_kelamin'] == "L") {
                                                    echo "Laki-laki";
                                                } else {
                                                    echo "Perempuan";
                                                } ?></td>
                            </tr>
                            <tr>
                                <td width="32%">Kebangsaan</td>
                                <td width="3%">:</td>
                                <td width="65%"><?= $dataapl01['kebangsaan'] ?></td>
                            </tr>
                            <tr>
                                <td width="32%">Alamat rumah</td>
                                <td width="3%">:</td>
                                <td width="65%"><?= $dataapl01['alamat_rumah'] ?></td>
                            </tr>
                            <tr>
                                <td width="32%">Kode Pos</td>
                                <td width="3%">:</td>
                                <td width="65%"><?= $dataapl01['kode_pos'] ?></td>
                            </tr>
                            <tr>
                                <td width="32%">No.Telepon/HP</td>
                                <td width="3%">:</td>
                                <td width="65%"><?= $dataapl01['telp'] ?></td>
                            </tr>
                            <tr>
                                <td width="32%">Email</td>
                                <td width="3%">:</td>
                                <td width="65%"><?= $dataapl01['email'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile2">
                        <?php
                        $data_skema = $this->Mskema->getskemadetail($skema['id_skema']);
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
                            <tr>
                                <td colspan="2" rowspan="5">Tujuan Asesmen</td>
                                <td>:</td>
                                <td><input type="checkbox" disabled checked> Sertifikasi</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" disabled> Sertifikasi Ulang</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" disabled> Pengakuan Kompetensi Terkini (PKT)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" disabled> Rekognisi Pembelajaran Lampau</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" disabled> Lainnya</td>
                            </tr>
                        </table>
                        <hr>
                        Daftar Unit Kompetensi sesuai kemasan :
                        <hr>
                        <table id="dataSiswaIndex" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Unit</th>
                                    <th>Judul Unit</th>
                                    <th>Jenis Standar (Standar Khusus/Standar Internasional/SKKNI)</th>
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
                                        <td><?= $du->kode_unit ?></td>
                                        <td><?= $du->judul_unit ?></td>
                                        <td><?= $du->jenis_standar ?></td>
                                    </tr> <?php
                                            $No++;
                                        }
                                            ?>
                                </tfoot>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages2">
                        <table width="100%">
                            <tr>
                                <td align="left">
                                    <h3 class="card-title">Daftar Persyaratan</h3>
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Persyaratan</th>
                                    <th>File Persyaratan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $No     = 1;
                                $SQL     = $this->db->query("SELECT tb_bukti_asesi.id as id_bukti_asesi, bukti, file_bukti FROM tb_bukti_asesi left join tb_bukti on (tb_bukti_asesi.id_bukti=tb_bukti.id) where id_asesi='$idasesi'")->result_array();
                                foreach ($SQL as $hSQL) {
                                ?>
                                    <tr>
                                        <td><?php echo $No . '. '; ?></td>
                                        <td><?= $hSQL["bukti"] ?></td>
                                        <td><a href="<?= base_url() ?>assets/bukti/<?= $hSQL["file_bukti"] ?>" target="_blank" class="btn btn-info"><i class="fa fa-download"></i> Download</a></td>
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