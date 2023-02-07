    <table width="100%">
        <tr>
            <td align="left">
                <h3 class="card-title"><b>FR.MAPA.01. MERENCANAKAN AKTIVITAS DAN PROSES ASESMEN</b></h3>
            </td>
            <td align="right"></td>

        </tr>
    </table>
    <table width="100%" border='1' cellpadding="4" cellspacing="0" align="center">
        <tr>
            <td rowspan="2" width="20%">Skema Sertifikasi<br>
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
    <br>
    <?php
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
    ?>
    <table width="100%" cellspacing="0" cellpadding="4" align="center" border="1">
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
                <?= $v_text_1['1'] ?>
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
                Lainnya: <?= $v_text_2['1'] ?>
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
                Standar Kompetensi: <?= $v_text_3['1'] ?>
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
                <?= $v_text_4['1'] ?>
            </td>
        </tr>
        <tr height="20">
            <td colspan="3" height="20"> <input name="checkbox26" type="checkbox" id="checkbox26" value="1" <?php
                                                                                                            if ($v_isi_26['1'] == "1") {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?> />
                Spesifikasi Produk:
                <?= $v_text_5['1'] ?>
            </td>
        </tr>
        <tr height="20">
            <td height="20" colspan="3"> <input name="checkbox27" type="checkbox" id="checkbox27" value="1" <?php
                                                                                                            if ($v_isi_27['1'] == "1") {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?> />
                Pedoman khusus:
                <?= $v_text_6['1'] ?>
            </td>
        </tr>
    </table>
    <p style="page-break-before: always;">&nbsp;</p>
    <table width="100%" border='1' cellpadding="4" cellspacing="0" align="center">
        <tr>
            <td>2. Mempersiapkan Rencana Asesmen</td>
        </tr>
    </table>
    <?php
    foreach ($dataunit as $du) {
    ?>
        <br>
        <table width="100%" border='1' cellpadding="4" cellspacing="0">
            <tr>
                <td rowspan="2">Unit Kompetensi<br></td>
                <td>Kode Unit</td>
                <td>:</td>
                <td><?= $du->kode_unit ?></td>
            </tr>
            <tr>
                <td>Judul Unit</td>
                <td>:</td>
                <td><?= $du->judul_unit ?></td>
            </tr>
        </table>
        <br>
        <table width="100%" border='1' cellpadding="4" cellspacing="0">
            <tr>
                <td rowspan="2" align="center">Kriteria Unjuk Kerja</td>
                <td rowspan="2" align="center">Bukti-Bukti (Kinerja, Produk, Portofolio, dan / atau Hafalan) diidentifikasi berdasarkan Kriteria Unjuk Kerja dan Pendekatan Asesmen.</td>
                <td colspan="3" align="center">Jenis Bukti</td>
                <td colspan="6" align="center">Metode dan Perangkat Asesmen CL (Ceklis Observasi/ Lembar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan), DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), PW (Pertanyaan Wawancara)</td>
            </tr>
            <tr>
                <td align="center">&nbsp;L&nbsp;</td>
                <td align="center">TL</th>
                <td align="center">&nbsp;T&nbsp;</td>
                <td align="center">Obsevasi langsung</td>
                <td align="center">Kegiatan Terstruktur</td>
                <td align="center">Tanya Jawab</td>
                <td align="center">Verifikasi Portfolio</td>
                <td align="center">Review produk</td>
                <td align="center">Lainnya</td>
            </tr>
            <tbody>
                <?php
                $no = 0;
                $dataelemen = $this->Mskema->getelemen($du->id);
                foreach ($dataelemen as $de) {
                ?>
                    <tr>
                        <td colspan="12">Elemen: <?= $de->urutan ?>. <?= $de->elemen ?></td>
                    </tr>
                    <?php
                    $datakuk = $this->Mskema->getkuk($de->id);
                    foreach ($datakuk as $dk) {
                    ?>
                        <tr>
                            <?php
                            $jmp2     = $this->Mmapa01->getcoutmapa012($dk->id);
                            ?>

                            <td <?php if ($jmp2 > 1) {
                                    echo "rowspan=\"$jmp2\"";
                                } ?>><?= $de->urutan ?>.<?= $dk->urutan ?>. <?= $dk->kuk ?></td>
                            <?php
                            $datamapa012 = $this->Mmapa01->getmapa012($dk->id);
                            foreach ($datamapa012 as $dm) {
                                $no++;
                            ?>
                                <td><?= $dm["bukti"] ?></td>
                                <td align="center"><?php if ($dm["jenis_bukti"] == "L") {
                                                        echo "L";
                                                    } ?></td>
                                <td align="center"><?php if ($dm["jenis_bukti"] == "TL") {
                                                        echo "TL";
                                                    } ?></td>
                                <td align="center"><?php if ($dm["jenis_bukti"] == "T") {
                                                        echo "T";
                                                    } ?></td>
                                <td align="center"><?= $dm["observasi_langsung"] ?></td>
                                <td><?= $dm["kegiatan_terstruktur"] ?></td>
                                <td align="center"><?= $dm["tanya_jawab"] ?></td>
                                <td align="center"><?= $dm["verifikasi_portofolio"] ?></td>
                                <td align="center"><?= $dm["review_produk"] ?></td>
                                <td align="center"><?= $dm["lainnya"] ?></td>
                                <?php if ($jmp2 > 1 and $jmp2 != $no) {
                                ?>
                        </tr>
                        <tr>
                        <?php
                                }
                            }

                            if ($jmp2 == 0) {
                        ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php
                            }

                    ?>
                        </tr>
                    <?php
                    }
                    ?>
                    </tr> <?php
                        }

                            ?>
                </tfoot>
        </table>
    <?php
    }
    ?>
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
    <p style="page-break-after: always;">&nbsp;</p>
    <table width="100%" cellspacing="0" cellpadding="4" align="center" border="1">
        <tr height="20">
            <td colspan="2" height="20">3. Mengidentifikasi Persyaratan Modifikasi dan Kontekstualisasi:</td>
        </tr>
        <tr height="20">
            <td width="40%">
                <div class="row">
                    <div class="col-2">
                        3.1.
                    </div>
                    <div class="col-1">
                        a.
                    </div>
                    <div class="col-9">
                        Karakteristik Kandidat:
                    </div>
                </div>
            </td>
            <td width="60%"><?php
                            if ($v_list_1['1'] == "tidak ada") {
                                echo "Tidak ada";
                            } else {
                                echo "Ada";
                            }
                            ?>
                karakteristik khusus Kandidat<br>
                jika ada tuliskan : <?= $v_text_1['1'] ?></td>
        </tr>
        <tr height="20">
            <td>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-1">
                        b.
                    </div>
                    <div class="col-9">
                        Kebutuhan kontekstualisasi
                        terkait tempat kerja:
                    </div>
                </div>
            </td>
            <td> <?php
                    if ($v_list_2['1'] == "tidak ada") {
                        echo "Tidak ada";
                    } else {
                        echo "Ada";
                    }
                    ?>
                kebutuhan kontekstualisasi<br>
                jika ada tuliskan : <?= $v_text_2['1'] ?></td>
        </tr>
        <tr height="20">
            <td>
                <div class="row">
                    <div class="col-2">3.2.
                    </div>
                    <div class="col-10">
                        Saran yang diberikan oleh paket pelatihan atau pengembang pelatihan
                    </div>
                </div>
            </td>
            <td><?php
                if ($v_list_3['1'] == "tidak ada") {
                    echo "Tidak ada";
                } else {
                    echo "Ada";
                }
                ?>
                saran
                <br>
                jika ada tuliskan : <?= $v_text_3['1'] ?>
            </td>
        </tr>
        <tr height="20">
            <td>
                <div class="row">
                    <div class="col-2">3.3.
                    </div>
                    <div class="col-10">
                        Penyesuaian perangkat asesmen terkait kebutuhan kontekstualisasi
                    </div>
                </div>
            </td>
            <td><?php
                if ($v_list_4['1'] == "tidak ada") {
                    echo "Tidak ada";
                } else {
                    echo "Ada";
                }
                ?>
                penyesuaian perangkat<br>
                jika ada tuliskan : <?= $v_text_4['1'] ?></td>
        </tr>
        <tr height="20">
            <td>
                <div class="row">
                    <div class="col-2">3.4.
                    </div>
                    <div class="col-10">
                        Peluang untuk kegiatan asesmen terintegrasi dan mencatat setiap perubahan yang diperlukan untuk alat asesmen
                    </div>
                </div>
            </td>
            <td><?php
                if ($v_list_5['1'] == "ada") {
                    echo "Ada";
                } else {
                    echo "Tidak ada";
                }
                ?>
                penyesuaian perangkat<br>
                jika ada tuliskan : <?= $v_text_5['1'] ?></td>
        </tr>
    </table>
    <table width="100%" align="center" border="0">
        <tr>
            <td height="50" valign="bottom"><strong>Konfirmasi dengan orang yang relevan</strong></td>
        </tr>
    </table>
    <table width="100%" cellspacing="0" cellpadding="4" align="center" border="1">
        <tr height="40">
            <td align="center"><strong>Orang yang Relevan</strong></td>
            <td align="center"><strong>Tanda Tangan</strong></td>
        </tr>
        <tr height="40">
            <td><span style="border:0">
                    <input name="input1" type="checkbox" value="1" <?php
                                                                    if ($v_cek_1['1'] == "1") {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                </span>Manajer sertifikasi</td>
            <td></td>
        </tr>
        <tr height="40">
            <td><span style="border:0">
                    <input name="input2" type="checkbox" value="1" <?php
                                                                    if ($v_cek_2['1'] == "1") {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                </span>LSP Master Asesor / Master Trainer / Lead Asesor/ Asesor Utama Kompetensi</td>
            <td></td>
        </tr>
        <tr height="40">
            <td><span style="border:0">
                    <input name="input3" type="checkbox" value="1" <?php
                                                                    if ($v_cek_3['1'] == "1") {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                </span>Manajer pelatihan</td>
            <td></td>
        </tr>
        <tr height="40">
            <td><span style="border:0">
                    <input name="input4" type="checkbox" value="1" <?php
                                                                    if ($v_cek_4['1'] == "1") {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                </span>Lembaga Training terakreditasi / Lembaga Training terdaftar </td>
            <td></td>
        </tr>
        <tr height="40">
            <td><span style="border:0">
                    <input name="input5" type="checkbox" value="1" <?php
                                                                    if ($v_cek_5['1'] == "1") {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                </span>Lainnya: <?= $v_text_6['1'] ?></td>
            <td></td>
        </tr>
    </table>
    <table width="100%" align="center" border="0">
        <tr>
            <td height="50" valign="bottom"><strong>Penyusun dan Validator</strong></td>
        </tr>
    </table>
    <table width="100%" cellspacing="0" cellpadding="4" align="center" border="1">
        <tr height="40">
            <td align="center" width="50%"><strong>Nama</strong></td>
            <td align="center" width="30%"><strong>Jabatan</strong></td>
            <td align="center" width="20%"><strong>Tanggal dan Tanda Tangan</strong></td>
        </tr>
        <tr height="60">
            <td align="center"></td>
            <td align="center">Penyusun</td>
            <td align="center"></td>
        </tr>
        <tr height="60">
            <td align="center"></td>
            <td align="center">Validator</td>
            <td align="center"></td>
        </tr>
    </table>