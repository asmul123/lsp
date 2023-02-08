<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.APL-01. PERMOHONAN SERTIFIKASI KOMPETENSI</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <?php
                                $HAD = $this->Maksesasesi->getApl01Asesi($idasesi);
                                if ($HAD) {
                                    if ($HAD['status'] == 1 or $HAD['status'] == 2) {
                                        $disabled = "disabled";
                                    }
                                } else {
                                    $disabled = "";
                                }
                                ?>
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#data1" data-toggle="tab">Formulir APL-01</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#data2" data-toggle="tab">Data Sertifikasi</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#data3" data-toggle="tab">Data Bukti</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="data1">
                                        <?php if ($HAD) {
                                            if ($HAD['status'] == 1) {
                                        ?>
                                                <div class="alert alert-warning alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h5><i class="icon fas fa-exclamation-triangle"></i> Status Data!</h5>
                                                    Anda telah mengisi Formulir APL-01, dan sedang dilakukan pemeriksaan oleh Maneger Sertifikasi!
                                                </div>
                                            <?php } else if ($HAD['status'] == 2) {
                                            ?>
                                                <div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h5><i class="icon fas fa-check"></i> Status Data!</h5>
                                                    Formulir APL-01 Anda telah diterima, anda bisa melanjutkan mengisi formulir APL-02!
                                                </div>
                                            <?php } else if ($HAD['status'] == 3) {
                                            ?>
                                                <div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h5><i class="icon fas fa-ban"></i> Status Data!</h5>
                                                    Data Anda ditolak, silahkan perbaiki data Anda!<br>
                                                    Catatan : <?= $HAD['catatan'] ?>
                                                </div>
                                        <?php }
                                        } ?>
                                        <form action="<?= base_url('aksesasesi/apl01_process') ?>" method="POST">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Data Pribadi</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="panel-body">

                                                        <div class="form-group left-icon">
                                                            <label for="name2">Nama Lengkap</label>
                                                            <span class="fa fa-user form-left-icon"></span>
                                                            <input type="text" class="form-control" id="name" name="nama_lengkap" readonly value="<?= $this->session->userdata('nama') ?>">
                                                        </div>

                                                        <div class="form-group left-icon">
                                                            <label for="nik">No. KTP/NIK/Paspor</label>
                                                            <span class="fa fa-pencil form-left-icon"></span>
                                                            <input type="text" class="form-control" id="name" name="nik" placeholder="NIK" <?= $disabled ?> value="<?php if ($HAD) {
                                                                                                                                                                        echo $HAD['nik'];
                                                                                                                                                                    } ?>">
                                                        </div>

                                                        <div class="form-group left-icon">
                                                            <label for="tempat_lahir">Tempat Lahir</label>
                                                            <span class="fa fa-map form-left-icon"></span>
                                                            <input type="text" class="form-control" id="name" name="tempat_lahir" placeholder="Tempat Lahir" <?= $disabled ?> value="<?php if ($HAD) {
                                                                                                                                                                                            echo $HAD['tempat_lahir'];
                                                                                                                                                                                        } ?>">
                                                        </div>

                                                        <!-- /.form group -->
                                                        <div class="form-group left-icon">
                                                            <label>Tanggal Lahir</label>
                                                            <span class="fa fa-calendar form-left-icon"></span>
                                                            <input type="date" class="form-control datepicker" name="tgl_lahir" <?= $disabled ?> value="<?php if ($HAD) {
                                                                                                                                                            echo $HAD['tgl_lahir'];
                                                                                                                                                        } ?>">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label>Jemis Kelamin</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <input type="radio" name="jk" value="L" <?= $disabled ?> <?php if ($HAD) {
                                                                                                                                        if ($HAD['jenis_kelamin'] == "L") {
                                                                                                                                            echo "checked";
                                                                                                                                        }
                                                                                                                                    } ?>>
                                                                    </span>
                                                                    <input type="text" class="form-control" value="Laki-laki" disabled>
                                                                </div>
                                                                <!-- /input-group -->
                                                            </div>
                                                            <!-- /.col-lg-6 -->
                                                            <div class="col-lg-3">
                                                                <label>&nbsp;</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <input type="radio" name="jk" value="P" <?= $disabled ?> <?php if ($HAD) {
                                                                                                                                        if ($HAD['jenis_kelamin'] == "P") {
                                                                                                                                            echo "checked";
                                                                                                                                        }
                                                                                                                                    } ?>>
                                                                    </span>
                                                                    <input type="text" class="form-control" value="Perempuan" disabled>
                                                                </div>
                                                                <!-- /input-group -->
                                                            </div>
                                                            <!-- /.col-lg-6 -->
                                                        </div>

                                                        <div class="form-group left-icon">
                                                            <label for="kebangsaan">Kebangsaan</label>
                                                            <span class="fa fa-pencil form-left-icon"></span>
                                                            <input type="text" class="form-control" id="name" name="kebangsaan" placeholder="Kebangsaan" <?= $disabled ?> value="<?php if ($HAD) {
                                                                                                                                                                                        $HAD['kebangsaan'];
                                                                                                                                                                                    } ?>">
                                                        </div>

                                                        <div class="form-group left-icon">
                                                            <label for="tempat_lahir">Alamat Rumah</label>
                                                            <span class="fa fa-map form-left-icon"></span>
                                                            <textarea class="form-control" name="alamat_rumah" rows="3" placeholder="Alamat Rumah" <?= $disabled ?>><?php if ($HAD) {
                                                                                                                                                                        echo $HAD['alamat_rumah'];
                                                                                                                                                                    } ?></textarea>
                                                        </div>

                                                        <div class="form-group left-icon">
                                                            <label for="kodepos">Kode Pos</label>
                                                            <span class="fa fa-home form-left-icon"></span>
                                                            <input type="number" class="form-control" id="name" name="kode_pos" placeholder="Kode Pos" <?= $disabled ?> value="<?php if ($HAD) {
                                                                                                                                                                                    echo $HAD['kode_pos'];
                                                                                                                                                                                } ?>">
                                                        </div>

                                                        <div class="form-group left-icon">
                                                            <label for="telp">No.Telp/HP</label>
                                                            <span class="fa fa-book form-left-icon"></span>
                                                            <input type="text" class="form-control" id="name" name="telp" placeholder="No. Telp/HP" <?= $disabled ?> value="<?php if ($HAD) {
                                                                                                                                                                                echo $HAD['telp'];
                                                                                                                                                                            } ?>">
                                                        </div>

                                                        <div class="form-group left-icon">
                                                            <label for="telp">Email</label>
                                                            <span class="fa fa-envelope form-left-icon"></span>
                                                            <input type="email" class="form-control" id="name" name="mail" placeholder="Email Aktif" <?= $disabled ?> value="<?php if ($HAD) {
                                                                                                                                                                                    echo $HAD['email'];
                                                                                                                                                                                } ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanda Tangan</label>
                                                            <table border="1">
                                                                <tr>
                                                                    <td>
                                                                        <div id="bcPaint"></div>
                                                                        <script type="text/javascript">
                                                                            $('#bcPaint').bcPaint();
                                                                        </script>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            <div class="input-group">
                                                                <?php if ($HAD) {
                                                                    if ($HAD['status'] == 1 or $HAD['status'] == 2) {
                                                                ?>
                                                                        <img src='data:<?= $HAD['ttd'] ?>' />
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <div id="signature"></div>
                                                                    <input type='button' id='click' value='Set TTD' class="btn btn-info"><br>
                                                                    <input type="hidden" id='output' name="ttd"><br />

                                                                    <!-- Preview image -->
                                                                    <img src='' id='sign_prev' style='display: none;' />
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Persetujuan</label>
                                                            <div class="input-group">
                                                                <input type="checkbox" class="icheck-primary d-inline" name="persetujuan" value="Ya" <?= $disabled ?> <?php if ($disabled != "") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>&nbsp;&nbsp;Saya telah memeriksa formulir ini, dan telah memastikan data yang diinputkan sudah benar!
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="submit" class="btn btn-primary" name="simpan_apl01" value="Ajukan" <?= $disabled ?>>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="data2">
                                        <?php
                                        $PAS = mysqli_query($conn, "SELECT id_asesor, id_skema from tbl_sertifikasi left join tbl_paket on (tbl_sertifikasi.id_paket=tbl_paket.id) where id_asesi='$id_asesi'");
                                        $HAS = mysqli_fetch_assoc($PAS);
                                        $sql_skema = mysqli_query($conn, "SELECT * FROM tbl_skema WHERE id='" . $HAS['id_skema'] . "'");
                                        $rs_skema = mysqli_fetch_assoc($sql_skema);
                                        ?>
                                        <table width="100%" border='1' cellpadding="4" cellspacing="4">
                                            <tr>
                                                <td rowspan="2">Skema Sertifikasi<br>
                                                    ( <?= $rs_skema["jenis_skema"] ?> )</td>
                                                <td>Judul</td>
                                                <td>:</td>
                                                <td><?= $rs_skema["judul_skema"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor</td>
                                                <td>:</td>
                                                <td><?= $rs_skema["nomor_skema"] ?></td>
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
                                        <table id="example1" class="table table-bordered table-striped">
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
                                                $SQL     = "SELECT * FROM tbl_unit where id_skema = '" . $HAS['id_skema'] . "'";
                                                $nSQL     = mysqli_query($conn, $SQL);
                                                while ($hSQL = mysqli_fetch_assoc($nSQL)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $No . '. '; ?></td>
                                                        <td><?= $hSQL["kode_unit"] ?></td>
                                                        <td><?= $hSQL["judul_unit"] ?></td>
                                                        <td><?= $hSQL["jenis_standar"] ?></td>
                                                    </tr> <?php
                                                            $No++;
                                                        }
                                                            ?>
                                                </tfoot>
                                        </table>
                                    </div>

                                    <div class="tab-pane" id="data3">
                                        <div class="card-header">
                                            <table width="100%">
                                                <tr>
                                                    <td align="left">
                                                        <h3 class="card-title">Daftar Bukti</h3>
                                                    </td>
                                                    <td align="right"><a href="index.php?idx=APL01&aksi=tambah_bukti"><button class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> Tambah</button></a></td>

                                                </tr>
                                            </table><br><?= $Pesan ?>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Bukti</th>
                                                    <th>File Bukti</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $No     = 1;
                                                $SQL     = "SELECT tbl_bukti_asesi.id as id_bukti_asesi, bukti, file_bukti FROM tbl_bukti_asesi left join tbl_bukti on (tbl_bukti_asesi.id_bukti=tbl_bukti.id) where id_asesi='$id_asesi'";
                                                $nSQL     = mysqli_query($conn, $SQL);
                                                while ($hSQL = mysqli_fetch_assoc($nSQL)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $No . '. '; ?></td>
                                                        <td><?= $hSQL["bukti"] ?></td>
                                                        <td><a href="file_bukti/<?= $hSQL["file_bukti"] ?>" target="_blank"><i class="nav-icon fas fa-download"></i>Download</a></td>
                                                        <td><a href="index.php?idx=APL01&aksi=hapus_bukti&id_bukti=<?= $hSQL["id_bukti_asesi"] ?>"><i class="nav-icon fas fa-trash"></i></a> </td>
                                                    </tr> <?php
                                                            $No++;
                                                        }
                                                            ?>
                                                </tfoot>
                                        </table>
                                    </div>

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.row -->
    </div>
</div>