<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">Edit Data Menentukan Pendekatan Asesmen</h2>
                <p class="sub-title">LSP P1 - SMK NEGERI 4 GARUT</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('mapa01/mpmk_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <?php
                        $list = explode('#', $datamapa013["list"]);
                        for ($i = 1; $i <= 5; $i++) {
                            ${"v_list_" . $i} = explode('-', $list[$i]);
                        }
                        $text = explode('#', $datamapa013["text"]);
                        for ($i = 1; $i <= 6; $i++) {
                            ${"v_text_" . $i} = explode('_', $text[$i]);
                        }
                        $cek = explode('#', $datamapa013["cek"]);
                        for ($i = 1; $i <= 5; $i++) {
                            ${"v_cek_" . $i} = explode('-', $cek[$i]);
                        }
                        ?>
                        <table width="100%" cellpadding="4" cellspacing="4" border="1">
                            <tr>
                                <td rowspan="2">Skema Sertifikasi<br>
                                    ( <?= $dataskema["jenis_skema"] ?> )</td>
                                <td>Judul</td>
                                <td>:</td>
                                <td><?= $dataskema["judul_skema"] ?></td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td><?= $dataskema["nomor_skema"] ?></td>
                            </tr>
                        </table>
                        <table width="90%" cellspacing="4" cellpadding="4" align="center" border="1">
                            <tr height="20">
                                <td colspan="2" height="20">3. Mengidentifikasi Persyaratan Modifikasi dan Kontekstualisasi:</td>
                            </tr>
                            <tr height="20">
                                <td>3.1. a. Karakteristik Kandidat:</td>
                                <td>
                                    <select name="select1" id="select1" class="form-control">
                                        <option value="ada">Ada</option>
                                        <option value="tidak ada" <?php
                                                                    if ($v_list_1['1'] == "tidak ada") {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>tidak ada</option>
                                    </select>
                                    karakteristik khusus Kandidat<br>
                                    jika ada tuliskan
                                    <input type="text" class="form-control" name="textfield1" id="textfield" value="<?= $v_text_1['1'] ?>">
                                </td>
                            </tr>
                            <tr height="20">
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Kebutuhan kontekstualisasi
                                    terkait tempat kerja:</td>
                                <td> <select name="select2" id="select2" class="form-control">
                                        <option value="ada">Ada</option>
                                        <option value="tidak ada" <?php
                                                                    if ($v_list_2['1'] == "tidak ada") {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>tidak ada</option>
                                    </select>
                                    kebutuhan kontekstualisasi<br>
                                    jika ada tuliskan
                                    <input type="text" class="form-control" name="textfield2" id="textfield2" value="<?= $v_text_2['1'] ?>">
                                </td>
                            </tr>
                            <tr height="20">
                                <td>3.2. Saran yang diberikan oleh paket pelatihan atau pengembang pelatihan</td>
                                <td><select name="select3" id="select3" class="form-control">
                                        <option value="ada">Ada</option>
                                        <option value="tidak ada" <?php
                                                                    if ($v_list_3['1'] == "tidak ada") {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>tidak ada</option>
                                    </select>
                                    saran
                                    <br>
                                    jika ada tuliskan
                                    <input type="text" class="form-control" name="textfield3" id="textfield3" value="<?= $v_text_3['1'] ?>">
                                </td>
                            </tr>
                            <tr height="20">
                                <td>3.3. Penyesuaian perangkat asesmen terkait kebutuhan kontekstualisasi</td>
                                <td><select name="select4" id="select4" class="form-control">
                                        <option value="ada">Ada</option>
                                        <option value="tidak ada" <?php
                                                                    if ($v_list_4['1'] == "tidak ada") {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>tidak ada</option>
                                    </select>
                                    penyesuaian perangkat<br>
                                    jika ada tuliskan
                                    <input type="text" class="form-control" name="textfield4" id="textfield4" value="<?= $v_text_4['1'] ?>">
                                </td>
                            </tr>
                            <tr height="20">
                                <td>3.4. Peluang untuk kegiatan asesmen terintegrasi dan mencatat setiap perubahan yang diperlukan untuk alat asesmen</td>
                                <td><select name="select5" id="select5" class="form-control">
                                        <option value="ada" <?php
                                                            if ($v_list_5['1'] == "ada") {
                                                                echo "selected";
                                                            }
                                                            ?>>Ada</option>
                                        <option value="tidak ada" <?php
                                                                    if ($v_list_5['1'] == "tidak ada") {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>tidak ada</option>
                                    </select>
                                    penyesuaian perangkat<br>
                                    jika ada tuliskan
                                    <input type="text" class="form-control" name="textfield5" id="textfield5" value="<?= $v_text_5['1'] ?>">
                                </td>
                            </tr>
                        </table>
                        <table width="90%" align="center" border="0">
                            <tr>
                                <td>Konfirmasi dengan orang yang relevan</td>
                            </tr>
                        </table>
                        <table width="90%" cellspacing="4" cellpadding="4" align="center" border="1">
                            <tr height="20">
                                <td align="center"><span style="border:0">
                                    </span>Orang yang Relevan</td>
                            </tr>
                            <tr height="20">
                                <td><span style="border:0">
                                        <input name="input1" type="checkbox" value="1" <?php
                                                                                        if ($v_cek_1['1'] == "1") {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>>
                                    </span>Manajer sertifikasi</td>
                            </tr>
                            <tr height="20">
                                <td><span style="border:0">
                                        <input name="input2" type="checkbox" value="1" <?php
                                                                                        if ($v_cek_2['1'] == "1") {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>>
                                    </span>LSP Master Asesor / Master Trainer / Lead Asesor/ Asesor Utama Kompetensi</td>
                            </tr>
                            <tr height="20">
                                <td><span style="border:0">
                                        <input name="input3" type="checkbox" value="1" <?php
                                                                                        if ($v_cek_3['1'] == "1") {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>>
                                    </span>Manajer pelatihan</td>
                            </tr>
                            <tr height="20">
                                <td><span style="border:0">
                                        <input name="input4" type="checkbox" value="1" <?php
                                                                                        if ($v_cek_4['1'] == "1") {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>>
                                    </span>Lembaga Training terakreditasi / Lembaga Training terdaftar </td>
                            </tr>
                            <tr height="20">
                                <td><span style="border:0">
                                        <input name="input5" type="checkbox" value="1" <?php
                                                                                        if ($v_cek_5['1'] == "1") {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>>
                                    </span>Lainnya:
                                    <input type="text" class="form-control" name="textfield6" id="textfield6" value="<?= $v_text_6['1'] ?>">
                                </td>
                            </tr>
                        </table>
                        <div class="form-group has-feedback">
                            <input type="hidden" name="idskema" value="<?= $idskema ?>">
                            <a href="<?= base_url('mapa01/index/' . $idskema) ?>" class="btn btn-primary btn-labeled"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="Submit" class="btn btn-warning btn-labeled">
                                <i class="fa fa-save"></i> Simpan Data MPA
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.row -->
    </div>
</div>
<!-- /.main-page -->
<!-- /.right-sidebar -->
</div>
<!-- /.content-container -->
</div>