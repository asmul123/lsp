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
                            <form action="<?= base_url('ujikom/prosesdata') ?>" method="POST">
                                <div class="row panel">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <i>( * ) Wajib di Isi</i>
                                            <div class="form-group has-feedback">
                                                <label for="username5">Nama Paket*</label>
                                                <input type="hidden" class="form-control" name="id" value="<?= $idjadwal ?>">
                                                <input type="text" class="form-control" name="nama_paket" value="<?php if ($idjadwal) {
                                                                                                                        echo $datajadwal['nama_paket'];
                                                                                                                    } ?>" placeholder="Mis. Paket 1" require autofocus>
                                                <span class="fa fa-edit form-control-feedback"></span>
                                                <span class="help-block">Masuk Nama Paket</span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Skema*</label>
                                                <select name="id_skema" class="form-control">
                                                    <?php foreach ($dataskema as $ds) : ?>
                                                        <option value="<?= $ds->id ?>" <?php if ($idjadwal) {
                                                                                            if ($datajadwal['id_skema'] == $ds->id) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>><?= $ds->judul_skema; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block">Pilih Judul Skema</span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Tanggal Ujikom*</label>
                                                <input type="date" class="form-control" name="tgl_sertifikasi" value="<?php if ($idjadwal) {
                                                                                                                            echo $datajadwal['tgl_sertifikasi'];
                                                                                                                        } ?>" required>
                                                <span class="help-block">Masukkan Tanggal Sertifikasi</span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">TUK*</label>
                                                <select name="id_tuk" class="form-control">
                                                    <?php foreach ($datatuk as $dt) : ?>
                                                        <option value="<?= $dt->id ?>" <?php if ($idjadwal) {
                                                                                            if ($datajadwal['id_tuk'] == $dt->id) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>><?= $dt->nama_tuk; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block">Pilih Nama TUK</span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Pembiayaan*</label>
                                                <select name="pembiayaan" class="form-control">
                                                    <option value="BNSP" <?php if ($idjadwal) {
                                                                                if ($datajadwal['pembiayaan'] == "BNSP") {
                                                                                    echo "selected";
                                                                                }
                                                                            } ?>>BNSP</option>
                                                    <option value="MANDIRI" <?php if ($idjadwal) {
                                                                                if ($datajadwal['pembiayaan'] == "MANDIRI") {
                                                                                    echo "selected";
                                                                                }
                                                                            } ?>>MANDIRI</option>
                                                </select>
                                                <span class="help-block">Pilih Jenis Pembiayaan</span>
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