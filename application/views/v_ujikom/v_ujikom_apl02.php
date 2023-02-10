<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.APL-02. ASESMEN MANDIRI ASESI</h2>
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
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#mengajukan" aria-controls="mengajukan" role="tab" data-toggle="tab">Mengajukan <span class="badge badge-info">
                                                <?php
                                                echo $this->Mujikom->getAjuanapl02('1', $idasesor)->num_rows(); ?>
                                            </span>
                                        </a></li>
                                    <li role="presentation"><a href="#diterima" aria-controls="diterima" role="tab" data-toggle="tab">Diterima <span class="badge badge-success">
                                                <?php
                                                echo $this->Mujikom->getAjuanapl02('2', $idasesor)->num_rows(); ?>
                                            </span></a></li>
                                    <li role="presentation"><a href="#ditolak" aria-controls="ditolak" role="tab" data-toggle="tab">Ditolak <span class="badge badge-danger">
                                                <?php
                                                echo $this->Mujikom->getAjuanapl02('3', $idasesor)->num_rows(); ?>
                                            </span></a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content bg-white p-15">
                                    <div role="tabpanel" class="tab-pane active" id="mengajukan">
                                        <table id="dataSiswaIndex" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Asesi</th>
                                                    <th class="text-center">Nama Paket</th>
                                                    <th class="text-center">Judul Skema</th>
                                                    <th class="text-center">Tanggal Asesmen</th>
                                                    <th width="200px" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $dataditerima = $this->Mujikom->getAjuanapl02('1', $idasesor)->result_array();
                                                foreach ($dataditerima as $data) :
                                                    $datapaket = $this->Mujikom->getDetail($data['id_paket']);

                                                ?>

                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td><?= $data['nama']; ?></td>
                                                        <td><?= $datapaket['nama_paket'] ?></td>
                                                        <td><?= $datapaket['judul_skema'] ?></td>
                                                        <td><?= $datapaket['tgl_sertifikasi'] ?></td>
                                                        <td class="text-center">
                                                            <center>
                                                                <div class="btn btn-group">
                                                                    <a href="<?= base_url('ujikom/proses_apl02/') . $data['id_asesi'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Proses</a>
                                                                </div>
                                                            </center>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="diterima">
                                        <table id="dataSiswaIndex2" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Asesi</th>
                                                    <th class="text-center">Nama Paket</th>
                                                    <th class="text-center">Judul Skema</th>
                                                    <th class="text-center">Tanggal Asesmen</th>
                                                    <th width="200px" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $dataditerima = $this->Mujikom->getAjuanapl02('2', $idasesor)->result_array();
                                                foreach ($dataditerima as $data) :
                                                    $datapaket = $this->Mujikom->getDetail($data['id_paket']);

                                                ?>

                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td><?= $data['nama']; ?></td>
                                                        <td><?= $datapaket['nama_paket'] ?></td>
                                                        <td><?= $datapaket['judul_skema'] ?></td>
                                                        <td><?= $datapaket['tgl_sertifikasi'] ?></td>
                                                        <td class="text-center">
                                                            <center>
                                                                <div class="btn btn-group">
                                                                    <a href="<?= base_url('ujikom/proses_apl02/') . $data['id_asesi'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Proses</a>
                                                                </div>
                                                            </center>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="ditolak">
                                        <table id="dataSiswaIndex2" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Asesi</th>
                                                    <th class="text-center">Nama Paket</th>
                                                    <th class="text-center">Judul Skema</th>
                                                    <th class="text-center">Tanggal Asesmen</th>
                                                    <th width="200px" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $dataditerima = $this->Mujikom->getAjuanapl02('3', $idasesor)->result_array();
                                                foreach ($dataditerima as $data) :
                                                    $datapaket = $this->Mujikom->getDetail($data['id_paket']);

                                                ?>

                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td><?= $data['nama']; ?></td>
                                                        <td><?= $datapaket['nama_paket'] ?></td>
                                                        <td><?= $datapaket['judul_skema'] ?></td>
                                                        <td><?= $datapaket['tgl_sertifikasi'] ?></td>
                                                        <td class="text-center">
                                                            <center>
                                                                <div class="btn btn-group">
                                                                    <a href="<?= base_url('ujikom/proses_apl02/') . $data['id_asesi'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Proses</a>
                                                                </div>
                                                            </center>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-header -->
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