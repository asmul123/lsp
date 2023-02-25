<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Dashboard</h2>
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
                    <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Dashboard</li>
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
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-info" href="<?php echo base_url('skema') ?>">
                        <span class="number counter"><?= $this->db->get_where('tb_askem', array('id_asesor' => $id_asesor))->num_rows() ?>
                        </span>
                        <span class="name"><strong>Jumlah Skema</strong></span>
                        <span class="bg-icon"><i class="fa fa-users"></i></span>
                    </a>
                </div>
                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-info" href="<?php echo base_url('aksesasesor') ?>">
                        <span class="number counter"><?php
                                                        $this->db->select('*, count(id_asesi) as jmlasesi');
                                                        $this->db->join('tb_paket', 'tb_paket.id = tb_sertifikasi.id_paket');
                                                        $this->db->where('id_asesor', $id_asesor);
                                                        $this->db->group_by('id_paket');
                                                        $query = $this->db->get('tb_sertifikasi');
                                                        echo $query->num_rows();
                                                        ?></span>
                        <span class="name"><strong>Jumlah Paket</strong></span>
                        <span class="bg-icon"><i class="fa fa-users"></i></span>
                    </a>
                </div>
                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-info" href="<?php echo base_url('aksesasesor') ?>">
                        <span class="number counter">
                            <?= $this->db->get_where('tb_sertifikasi', array('id_asesor' => $id_asesor))->num_rows() ?>
                        </span>
                        <span class="name"><strong>Jumlah Asesi</strong></span>
                        <span class="bg-icon"><i class="fa fa-list"></i></span>
                    </a>
                    <!-- /.src-code -->
                </div>
                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-info" href="<?php echo base_url('ujikom/asman') ?>">
                        <span class="number counter">
                            <?= $this->db->get_where('tb_approve_apl02', array('id_asesor' => $id_asesor))->num_rows() ?></span>
                        <span class="name"><strong>Ajual APL-02</strong></span>
                        <span class="bg-icon"><i class="fa fa-list"></i></span>
                    </a>
                    <!-- /.src-code -->
                </div>
                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<!-- /.main-page -->
<!-- /.right-sidebar -->

</div>
<!-- /.content-container -->
</div>