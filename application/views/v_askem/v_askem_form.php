<?php date_default_timezone_set("Asia/Jakarta");  ?>
<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Asesor Skema</h2>
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
                    <li class="active">Asesor Skema</li>
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
                                <h5>Tambah Tugas Asesor</h5>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <form action="<?= base_url('askem/prosesdata') ?>" method="POST">
                                <div class="row panel">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <i>( * ) Wajib di Isi</i>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Asesor Skema*</label>
                                                <input type="hidden" class="form-control" name="id" value="<?= $idaskem ?>">
                                                <select name="id_asesor" class="js-states form-control" id="js-states">
                                                    <?php foreach ($dataasesor as $da) : ?>
                                                        <option value="<?= $da->id ?>" <?php if ($idaskem) {
                                                                                            if ($dataaskem['id_asesor'] == $da->id) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>><?= $da->nama; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block">Pilih Nama Asesor</span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name5">Skema*</label>
                                                <select name="id_skema" class="js-states form-control" id="js-states">
                                                    <?php foreach ($dataskema as $ds) : ?>
                                                        <option value="<?= $ds->id ?>" <?php if ($idaskem) {
                                                                                            if ($dataaskem['id_skema'] == $ds->id) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>><?= $ds->judul_skema; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block">Pilih Judul Skema</span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <a href="<?= base_url('askem') ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                                                <button type="Submit" class="btn btn-success btn-labeled">
                                                    <i class="fa fa-save"></i> Simpan Data Tugas
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