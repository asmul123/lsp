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
                    <li class="active">Pengaturan</li>
                    <li class="active">Skema Asesor</li>
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
                                <h5>Data Asesor Skema</h5>
                            </div>
                            <a href="<?= base_url('askem/form') ?>" class="btn btn-primary ml-15"><i class="fa fa-plus"></i> Tambah Tugas</a>
                        </div>
                        <div class="panel-body p-20">
                            <table id="tb_tahunakademik" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Asesor Kompetensi</th>
                                        <th class="text-center">Skema Sertifikasi</th>
                                        <th width="200px" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($askem as $data) : ?>

                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['judul_skema'] ?></td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <div class="btn btn-group">
                                                        <a href="<?= base_url('askem/form/') . $data['idas'] ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                        <a href="<?= base_url('askem/hapus/') . $data['idas'] ?> " class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus ?')"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </center>
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