<table width="100%">
    <tr>
        <td align="left">
            <h3 class="card-title"><b>FR.IA.01. CEKLIS OBSERVASI AKTIVITAS DI TEMPAT KERJA ATAU TEMPAT KERJA SIMULASI</b></h3>
        </td>
        <td align="right"></td>

    </tr>
</table>
<table width="100%" border='1' cellpadding="4" cellspacing="0">
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
    <tr>
        <td colspan="2">TUK</td>
        <td>:</td>
        <td>
        <?php
                                    if($idasesi != null){
                                        if($datathisser['jenis_tuk']=="Sewaktu"){
                                            echo "Sewaktu/<s>Tempat Kerja/Mandiri</s>*";
                                        } elseif($datathisser['jenis_tuk']=="Tempat Kerja"){
                                            echo "<s>Sewaktu</s>/Tempat Kerja/<s>Mandiri</s>*";
                                        } elseif($datathisser['jenis_tuk']=="Mandiri"){
                                            echo "<s>Sewaktu/Tempat Kerja</s>/Mandiri*";
                                        } else {
                                            echo "Sewaktu/Tempat Kerja/Mandiri*";
                                        }
                                    } else {
                                        echo "Sewaktu/Tempat Kerja/Mandiri*";
                                    }
                                    
                                    ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Nama Asesor</td>
        <td>:</td>
        <td>
        <?php
                                    if($idasesi != null) { echo $datathisser['namaasesor'];}
                                    ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Nama Asesi</td>
        <td>:</td>
        <td>
        <?php
                                    if($idasesi != null) { echo $datathisser['namaasesi'];}
                                    ?>
                                </td>
        </td>
    </tr>
    <tr>
        <td colspan="2">Tanggal</td>
        <td>:</td>
        <td>
        <?php
                                    if($idasesi != null) { echo date_indo($datathisser['tgl_sertifikasi']);}
                                    ?>
        </td>
    </tr>
</table>
<br>
<table width="100%" border='1' cellpadding="4" cellspacing="0">
    <tr>
        <td>PANDUAN BAGI ASESOR</td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>Lengkapi nama unit kompetensi, elemen, dan kriteria unjuk kerja sesuai kolom dalam tabel.</li>
                <li>Istilah Acuan Pembanding dengan SOP/spesifikasi produk dari industri/organisasi dari tempat kerja atau simulasi tempat kerja</li>
                <li>Beri tanda centang (<input type="checkbox" checked="checked" disabled>) pada kolom K jika Anda yakin asesi dapat melakukan/ mendemonstrasikan tugas sesuai KUK, atau centang (<input type="checkbox" checked="checked" disabled>) pada kolom BK bila sebaliknya.</li>
                <li>Penilaian Lanjut diisi bila hasil belum dapat disimpulkan, untuk itu gunakan metode lain sehingga keputusan dapat dibuat.</li>
            </ul>
        </td>
    </tr>
</table>
<br>
<?php
$No     = 1;
foreach ($dataunit as $du) {
?>
    <table width="100%" border='1' cellpadding="4" cellspacing="0">
        <tr>
            <td width="19%" rowspan="2"><strong>Unit Kompetensi: <?= $No ?></strong></td>
            <td colspan="2"><b>Kode Unit</b></td>
            <td>:</td>
            <td><?= $du->kode_unit ?></td>
        </tr>
        <tr>
            <td colspan="2">Judul Unit</td>
            <td>:</td>
            <td><?= $du->judul_unit ?></td>
        </tr>
    </table>
    <br>
    <table width="100%" border='1' cellpadding="4" cellspacing="0">
        <tr>
            <td rowspan="2" align="center">No</td>
            <td rowspan="2" align="center">Elemen</td>
            <td rowspan="2" align="center">Kriteria Unjuk Kerja</td>
            <td rowspan="2" align="center">Benchmark(SOP/spesifikasi produk industri)</td>
            <td colspan="2" align="center">Rekomendasi</td>
            <td rowspan="2" align="center">Penilaian Lanjut</td>
        </tr>
        <tr>
            <td align="center">K</td>
            <td align="center">BK</td>
        </tr>
        <?php
        $No     = 1;
        $dataelemen = $this->Mskema->getelemen($du->id);
        foreach ($dataelemen as $de) {
            $datakuk = $this->Mskema->getkuk($de->id);
            $dataia01 = $this->Mfria01->getfria01($de->id);
            $jmlcountkuk = $this->Mskema->cekKUK($de->id);
            $nokuk = 0;
            foreach ($datakuk as $dk) {
                if($idasesi != null){
                    $komia01asesi = $this->Mfria01->getkomia01asesi($idasesi, $dk->id);

                }
                $nokuk++;
                if ($nokuk == 1) {
        ?>
                    <tr>
                        <td rowspan="<?= $jmlcountkuk ?>"><?= $No ?></td>
                        <td rowspan="<?= $jmlcountkuk ?>"><?= $de->elemen ?></td>
                        <td><?= $de->urutan ?>.<?= $dk->urutan ?>. <?= $dk->kuk_aktif ?></td>
                        <td rowspan="<?= $jmlcountkuk ?>"><?php if ($dataia01) {
                                                                echo $dataia01->sop;
                                                            } ?></td>
                        <td align="center"><input type="checkbox" <?php if($idasesi != null and $komia01asesi == "K") { echo "checked"; } ?> ></td>
                        <td align="center"><input type="checkbox" <?php if($idasesi != null and $komia01asesi == "BK") { echo "checked"; } ?> ></td>
                        <td></td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td><?= $de->urutan ?>.<?= $dk->urutan ?>. <?= $dk->kuk_aktif ?></td>
                        <td align="center"><input type="checkbox" <?php if($idasesi != null and $komia01asesi == "K") { echo "checked"; } ?>></td>
                        <td align="center"><input type="checkbox" <?php if($idasesi != null and $komia01asesi == "BK") { echo "checked"; } ?> ></td>
                        <td></td>
                    </tr>
        <?php
                }
            }
            $No++;
        }

        ?>
    </table>
    <br>
<?php
    $No++;
}
?>
<table width="100%" border='1' cellpadding="4" cellspacing="0">
    <tr>
        <td width="25%"> Umpan Balik untuk<br />Asesi : </td>
        <td width="75%"></td>
    </tr>
</table>
<br>
<table width="100%" border='1' cellpadding="4" cellspacing="0">
    <tr>
        <td width="19%" valign="top">
            <p>Nama:</p>
        </td>
        <td width="15%" valign="top">
            <p>Asesi:</p>
            <p>
            <?php
                                    if($idasesi != null) { echo $datathisser['namaasesi'];}
                                    ?>
                                </td>
            </p>
        </td>
        <td width="15%" valign="top">
            <p>Asesor:</p>
            <p>
            <?php
                                    if($idasesi != null) { echo $datathisser['namaasesor'];}
                                    ?>
                                </td>
            </p>
        </td>
    </tr>

    <tr>
        <td valign="top"><strong>Tanda Tangan dan Tanggal</strong>
            <p><strong></strong></p>
            <p>&nbsp;</p>
        </td>
        <td valign="top">
            <p><?php if ($idasesi!=null && $ak01asesi->ttd_asesi != "") { ?>                
                    <img src='<?= $ttd_asesi ?>' width="150px" /><br>
                    <?=date_indo($datathisser['tgl_sertifikasi'])?>
                <?php }?></p>

        </td>
        <td valign="top">
            <p><?php if ($idasesi!=null && $ak01asesi->ttd_asesor != "") { ?>                
                    <img src='<?= $ttd_asesor ?>' width="150px" /><br>
                    <?=date_indo($datathisser['tgl_sertifikasi'])?>
                <?php }?></p>
        </td>
    </tr>
</table>