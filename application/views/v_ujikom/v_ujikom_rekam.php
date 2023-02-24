<?php date_default_timezone_set("Asia/Jakarta");  ?>
<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Jadwal Uji Kompetensi</h2>
                <p class="sub-title">LSP P1 SMK NEGERI 4 GARUT</p>
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
                    <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Uji Kompetensi</li>
                    <li class="active">Jadwal</li>
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

                <div class="col-lg-12">

                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h5>Tambah Jadwal Uji Kompetensi</h5>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <form action="<?= base_url('ujikom/prosesrekam') ?>" method="POST">
                                <div class="row panel">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <i>( * ) Wajib di Isi</i>
                                            <div class="form-group has-feedback">
                                                <label for="username5">Nama Paket</label>
                                                <input type="hidden" class="form-control" name="id_paket" value="<?= $idjadwal ?>">
                                                <input type="text" class="form-control" value="<?= $datajadwal['nama_paket'] ?>" disabled>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Skema</label>
                                                <input type="text" class="form-control" value="<?= $datajadwal['judul_skema'] ?>" disabled>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Tanggal Ujikom</label>
                                                <input type="text" class="form-control" value="<?= $datajadwal['tgl_sertifikasi'] ?>" disabled>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">TUK</label>
                                                <input type="text" class="form-control" value="<?= $datajadwal['nama_tuk'] ?>" disabled>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Pembiayaan</label>
                                                <input type="text" class="form-control" value="<?= $datajadwal['pembiayaan'] ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="js-states">Pilih Asesor</label>
                                                <select name="id_asesor" class="js-states form-control" id="js-states">
                                                    <?php
                                                    foreach ($dataasesor as $dor) :
                                                        $cek_asesor = $this->db->query("SELECT id_asesor from tb_askem where id_skema='" . $datajadwal['id_skema'] . "' and id_asesor='" . $dor->id . "'")->num_rows();
                                                        if ($cek_asesor >= 1) {
                                                    ?>
                                                            <option value="<?= $dor->id ?>"><?= $dor->nama ?></option>
                                                    <?php
                                                        }
                                                    endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="js-states-mul">Pilih Asesi</label>
                                                <select name="id_asesi[]" class="js-states form-control" id="js-states-mul" multiple="multiple">
                                                    <?php
                                                    foreach ($dataasesi as $di) :
                                                        $cek_asesi = $this->db->query("SELECT id_asesi from tb_sertifikasi where id_paket='" . $datajadwal['idpak'] . "' and id_asesi='" . $di->id . "'")->num_rows();
                                                        if ($cek_asesi == 0) {
                                                    ?>
                                                            <option value="<?= $di->id ?>"><?= $di->no_peserta . " | " . $di->nama . " | " . $di->kelas . " | " . $di->tahun_aktif ?></option>
                                                    <?php
                                                        }
                                                    endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <a href="<?= base_url('ujikom') ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                                                <button type="Submit" class="btn btn-success btn-labeled">
                                                    <i class="fa fa-save"></i> Simpan Data Jadwal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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