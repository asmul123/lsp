<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h2 class="title">FR.APL-02. ASESMEN MANDIRI</h2>
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

                                $hcdapl = $this->db->query("SELECT status_ajuan, ttd_asesi from tb_approve_apl02 where id_asesi='$idasesi'")->row_array();
                                if ($hcdapl) {
                                    if ($hcdapl['status_ajuan'] == 1 or $hcdapl['status_ajuan'] == 2) {
                                        $disabled = "disabled";
                                    } else {
                                        $disabled = "";
                                    }
                                } else {
                                    $disabled = "";
                                }
                                $HAU = $this->db->query("SELECT * FROM tb_unit where id='$id_unit'")->row_array();
                                ?>
                                <table width="100%" border='1' cellpadding="4" cellspacing="4">
                                    <tr>
                                        <td><strong>Unit Kompetensi</strong></td>
                                        <td><strong><?= $HAU["judul_unit"] ?></strong></td>
                                    </tr>
                                </table>
                                <form action="<?= base_url('aksesasesi/kom_process') ?>" method="post" name="form1" id="form1">
                                    <table width="100%" border='1' cellpadding="4" cellspacing="4">
                                        <tr>
                                            <td><strong>Dapatkah Saya ?</strong></td>
                                            <td align="center"><strong>K </strong></td>
                                            <td align="center"><strong>BK</strong></td>
                                            <td align="center"><strong>Bukti yang Relevan</strong></td>
                                        </tr>
                                        <?php
                                        $padel = $this->db->query("SELECT * from tb_elemen where id_unit='$id_unit' order by urutan asc")->result_array();
                                        $noel = 0;
                                        foreach ($padel as $hadel) {
                                            $noel++;
                                            $hapl = $this->db->query("SELECT * from tb_apl_02 where id_asesi='$idasesi' and id_elemen='" . $hadel['id'] . "'")->row_array();
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $noel ?>. Elemen : <?= $hadel['elemen'] ?>
                                                    <br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kriteria Unjuk Kerja :<br>
                                                    <?php
                                                    $paduk = $this->db->query("SELECT * FROM tb_kuk where id_elemen='" . $hadel['id'] . "'")->result_array();
                                                    $noku = 0;
                                                    foreach ($paduk as $haduk) {
                                                        $noku++;
                                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $noel . "." . $noku . ". " . $haduk['kuk_aktif'] . "<br>";
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center">
                                                    <input type="radio" id="radioPrimary1" class="blue-style" name="kom<?= $hadel['id'] ?>" value="K" <?php if ($hapl) {
                                                                                                                                                            if ($hapl['kompetensi'] == "K") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            }
                                                                                                                                                        } ?> <?= $disabled ?>>
                                                </td>
                                                <td align="center">
                                                    <input type="radio" id="radioPrimary1" class="red-style" name="kom<?= $hadel['id'] ?>" value="BK" <?php if ($hapl) {
                                                                                                                                                            if ($hapl['kompetensi'] == "BK") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            }
                                                                                                                                                        } ?> <?= $disabled ?>>
                                                </td>
                                                <td align="center">
                                                    <div class="form-group">
                                                        <select class="form-control" name="bukti<?= $hadel['id'] ?>" <?= $disabled ?>>
                                                            <?php
                                                            $pabk = $this->db->query("SELECT tb_bukti_asesi.id as id_bukti_asesi, tb_bukti.bukti from tb_bukti_asesi left join tb_bukti on (tb_bukti_asesi.id_bukti=tb_bukti.id) where id_asesi='$idasesi'")->result_array();
                                                            foreach ($pabk as $habk) {

                                                            ?>
                                                                <option value="<?= $habk['id_bukti_asesi'] ?>" <?php
                                                                                                                if ($hapl) {
                                                                                                                    if ($hapl['id_bukti'] == $habk['id_bukti_asesi']) {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                }
                                                                                                                ?>><?= $habk['bukti'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <div class="card-footer">
                                        <a href="<?= base_url('aksesasesi/apl02') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <input type="hidden" name="id_unit" value=<?= $id_unit ?>>
                                        <button type="submit" name="input_apl" value="add" class="btn btn-primary" <?= $disabled ?>><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </form>
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