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
        <form method="post" action="<?= base_url('mapa01/mpa_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
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
                        <?php
                        if ($datamapa011) {
                            $isi = explode('#', $datamapa011["isi"]);
                            for ($i = 1; $i <= 27; $i++) {
                                ${"v_isi_" . $i} = explode('-', $isi[$i]);
                            }
                            $text = explode('#', $datamapa011["text"]);
                            for ($i = 1; $i <= 6; $i++) {
                                ${"v_text_" . $i} = explode('_', $text[$i]);
                            }
                            $radio = explode('#', $datamapa011["radio"]);
                            for ($i = 1; $i <= 3; $i++) {
                                ${"v_radio_" . $i} = explode('-', $radio[$i]);
                            }
                        }
                        ?>
                        <table width="100%" cellspacing="4" cellpadding="4" align="center" border="1">
                            <tr height="20">
                                <td colspan="5" height="20">1. Menentukan Pendekatan Asesmen</td>
                            </tr>
                            <tr height="20">
                                <td width="26" height="400" rowspan="20" valign="top">1.1</td>
                                <td rowspan="3" valign="top">Kandidat</td>
                                <td colspan="3"> <input name="checkbox1" type="checkbox" id="checkbox1" value="1" <?php
                                                                                                                    if ($v_isi_1['1'] == "1") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> />
                                    Hasil pelatihan dan / atau pendidikan:
                                    <input class="form-control" type="text" name="textfield1" id="textfield1" value="<?= $v_text_1['1'] ?>">
                                </td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox2" type="checkbox" id="checkbox2" value="1" <?php
                                                                                                                                if ($v_isi_2['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Pekerja berpengalaman</td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox3" type="checkbox" id="checkbox3" value="1" <?php
                                                                                                                                if ($v_isi_3['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Pelatihan / belajar mandiri</td>
                            </tr>
                            <tr height="20">
                                <td width="126" height="100" rowspan="5" valign="top">Tujuan Asesmen</td>
                                <td colspan="3"> <input name="checkbox4" type="checkbox" id="checkbox4" value="1" <?php
                                                                                                                    if ($v_isi_4['1'] == "1") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> />
                                    Sertifikasi</td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox5" type="checkbox" id="checkbox5" value="1" <?php
                                                                                                                                if ($v_isi_5['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Sertifikasi Ulang</td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox6" type="checkbox" id="checkbox6" value="1" <?php
                                                                                                                                if ($v_isi_6['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Pengakuan Kompetensi Terkini (PKT)</td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox7" type="checkbox" id="checkbox7" value="1" <?php
                                                                                                                                if ($v_isi_7['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Rekognisi Pembelajaran Lampau</td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox8" type="checkbox" id="checkbox8" value="1" <?php
                                                                                                                                if ($v_isi_8['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Lainnya</td>
                            </tr>
                            <tr height="20">
                                <td rowspan="8" valign="top">Konteks Asesmen:</td>
                                <td width="355" height="20">Lingkungan</td>
                                <td width="228"> <input name="checkbox9" type="checkbox" id="checkbox9" value="1" <?php
                                                                                                                    if ($v_isi_9['1'] == "1") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> />
                                    Tempat kerja nyata</td>
                                <td width="214"> <input name="checkbox10" type="checkbox" id="checkbox10" value="1" <?php
                                                                                                                    if ($v_isi_10['1'] == "1") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> />
                                    Tempat kerja simulasi</td>
                            </tr>
                            <tr height="20">
                                <td height="20">Peluang untuk mengumpulkan bukti dalam sejumlah situasi</td>
                                <td> <input name="checkbox11" type="checkbox" id="checkbox11" value="1" <?php
                                                                                                        if ($v_isi_11['1'] == "1") {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?> />
                                    Tersedia</td>
                                <td> <input name="checkbox12" type="checkbox" id="checkbox12" value="1" <?php
                                                                                                        if ($v_isi_12['1'] == "1") {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?> />
                                    Terbatas</td>
                            </tr>
                            <tr height="20">
                                <td rowspan="3">Hubungan antara standar kompetensi dan:</td>
                                <td height="20" colspan="2"> <input name="checkbox13" type="checkbox" id="checkbox13" value="1" <?php
                                                                                                                                if ($v_isi_13['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Bukti untuk mendukung asesmen / RPL:
                                    <input type="radio" name="radio1" id="radio" value="1" <?php
                                                                                            if ($v_radio_1['1'] == "1") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>😊
                                    <input type="radio" name="radio1" id="radio2" value="2" <?php
                                                                                            if ($v_radio_1['1'] == "2") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>😐
                                    <input type="radio" name="radio1" id="radio3" value="3" <?php
                                                                                            if ($v_radio_1['1'] == "3") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>☹️
                                </td>
                            </tr>
                            <tr height="20">
                                <td height="20" colspan="2"> <input name="checkbox14" type="checkbox" id="checkbox14" value="1" <?php
                                                                                                                                if ($v_isi_14['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Aktivitas kerja di tempat kerja Asesi:
                                    <input type="radio" name="radio2" id="radio4" value="1" <?php
                                                                                            if ($v_radio_2['1'] == "1") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>😊
                                    <input type="radio" name="radio2" id="radio5" value="2" <?php
                                                                                            if ($v_radio_2['1'] == "2") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>😐
                                    <input type="radio" name="radio2" id="radio6" value="3" <?php
                                                                                            if ($v_radio_2['1'] == "3") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>☹️
                                </td>
                            </tr>
                            <tr height="20">
                                <td height="20" colspan="2"> <input name="checkbox15" type="checkbox" id="checkbox15" value="1" <?php
                                                                                                                                if ($v_isi_15['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Kegiatan Pembelajaran:
                                    <input type="radio" name="radio3" id="radio7" value="1" <?php
                                                                                            if ($v_radio_3['1'] == "1") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>😊
                                    <input type="radio" name="radio3" id="radio8" value="2" <?php
                                                                                            if ($v_radio_3['1'] == "2") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>😐
                                    <input type="radio" name="radio3" id="radio9" value="3" <?php
                                                                                            if ($v_radio_3['1'] == "3") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>☹️
                                </td>
                            </tr>
                            <tr height="20">
                                <td rowspan="3"> Siapa yang melakukan asesmen / RPL </td>
                                <td height="20" colspan="2"> <input name="checkbox16" type="checkbox" id="checkbox16" value="1" <?php
                                                                                                                                if ($v_isi_16['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Lembaga Sertifikasi </td>
                            </tr>
                            <tr height="20">
                                <td height="20" colspan="2"> <input name="checkbox17" type="checkbox" id="checkbox17" value="1" <?php
                                                                                                                                if ($v_isi_17['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Organisasi Pelatihan</td>
                            </tr>
                            <tr height="20">
                                <td height="20" colspan="2"> <input name="checkbox18" type="checkbox" id="checkbox18" value="1" <?php
                                                                                                                                if ($v_isi_18['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Asesor Perusahaan</td>
                            </tr>
                            <tr height="20">
                                <td height="80" rowspan="4" valign="top">Konfirmasi dengan orang yang relevan</td>
                                <td colspan="3"> <input name="checkbox19" type="checkbox" id="checkbox19" value="1" <?php
                                                                                                                    if ($v_isi_19['1'] == "1") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> />
                                    Manajer sertifikasi LSP </td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox20" type="checkbox" id="checkbox20" value="1" <?php
                                                                                                                                if ($v_isi_20['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Master Asesor / Master Trainer / Asesor Utama Kompetensi</td>
                            </tr>
                            <tr height="20">
                                <td colspan="3"> <input name="checkbox21" type="checkbox" id="checkbox21" value="1" <?php
                                                                                                                    if ($v_isi_21['1'] == "1") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> />
                                    Manajer Pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"><input name="checkbox22" type="checkbox" id="checkbox22" value="1" <?php
                                                                                                                                if ($v_isi_22['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Lainnya:
                                    <input type="text" class="form-control" name="textfield2" id="textfield2" value="<?= $v_text_2['1'] ?>">
                                </td>
                            </tr>
                            <tr height="20">
                                <td height="100" rowspan="5" valign="top">2.1</td>
                                <td rowspan="5" valign="top">Tolok Ukur Asesmen</td>
                                <td colspan="3"> <input name="checkbox23" type="checkbox" id="checkbox23" value="1" <?php
                                                                                                                    if ($v_isi_23['1'] == "1") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> />
                                    Standar Kompetensi:
                                    <input type="text" class="form-control" name="textfield3" id="textfield3" value="<?= $v_text_3['1'] ?>">
                                </td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox24" type="checkbox" id="checkbox24" value="1" <?php
                                                                                                                                if ($v_isi_24['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Kriteria asesmen dari kurikulum pelatihan</td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox25" type="checkbox" id="checkbox25" value="1" <?php
                                                                                                                                if ($v_isi_25['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Spesifikasi kinerja suatu perusahaan atau industri:
                                    <input type="text" class="form-control" name="textfield4" id="textfield4" value="<?= $v_text_4['1'] ?>">
                                </td>
                            </tr>
                            <tr height="20">
                                <td colspan="3" height="20"> <input name="checkbox26" type="checkbox" id="checkbox26" value="1" <?php
                                                                                                                                if ($v_isi_26['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Spesifikasi Produk:
                                    <input type="text" class="form-control" name="textfield5" id="textfield5" value="<?= $v_text_5['1'] ?>">
                                </td>
                            </tr>
                            <tr height="20">
                                <td height="20" colspan="3"> <input name="checkbox27" type="checkbox" id="checkbox27" value="1" <?php
                                                                                                                                if ($v_isi_27['1'] == "1") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> />
                                    Pedoman khusus:
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