<table width="100%">
    <tr>
        <td align="left">
            <h3 class="card-title"><b>FR.IA.03. PERTANYAAN UNTUK MENDUKUNG OBSERVASI</b></h3>
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
                <li>Formulir ini diisi pada saat asesor akan melakukan asesmen dengan metode observasi
                    demonstrasi</li>
                <li>Pertanyaan dibuat dengan tujuan untuk menggali, dapat berisi pertanyaan yang berkaitan
                    dengan dimensi kompetensi, batasan variabel dan aspek kritis.</li>
                <li>Tanggapan asesi dapat ditulis oleh asesor dikolom tanggapan, dan apabila tanggapan sesuai
                    maka beri tanda centrang pada kolom (K) dan apabila belum sesuai beri tanda centrang
                    pada kolom (BK)</li>
            </ul>
        </td>
    </tr>
</table>
<br>
<?php
if ($datafria03) {
?>
    <table width="100%" border='1' cellpadding="4" cellspacing="0">
        <tr>
            <td colspan="2" rowspan="2" align="center">Pertanyaan</td>
            <td colspan="2" align="center">Rekomendasi</td>
        </tr>
        <tr>
            <td width="9%" align="center">K</td>
            <td width="9%" align="center">BK</td>
        </tr>
        <?php
        $No     = 1;
        foreach ($datafria03 as $data) {
            $dataunit = $this->Mskema->getunitdetail($data->id_unit);
            if($idasesi != null){
                $dataia = $this->Maksesasesor->getRefIa03($data->id, $idasesi);
            }
        ?>
            <tr>
                <td width="6%" align="center"><?= $No ?>.</td>
                <td width="61%">(<?= $dataunit['kode_unit'] ?>) <?= $data->pertanyaan ?></td>
                <td align="center"><input type="checkbox" <?php if ($idasesi != null) {
                                                                                                                                                    if ($dataia['kompetensi'] == "K") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                } ?>></td>
                <td align="center"><input type="checkbox" <?php if ($idasesi != null) {
                                                                                                                                                    if ($dataia['kompetensi'] == "BK") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                } ?>></td>
            </tr>
            <tr>
                <td colspan="2">
                    Tanggapan:
                    <p>
                    <?php if ($idasesi != null) {
                        echo $dataia['jawaban'];
                                                                                                                                                } ?>
                    </p>
                </td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
        <?php
            $No++;
        }
        ?>
        <tr>
            <td colspan="4">
                Umpan balik untuk asesi:
                <p><?php if ($idasesi != null) {
                        echo $dataia['umpan_balik'];                                                                                                                                                } ?>
                    </p>
            </td>
        </tr>
    </table>
<?php
}
?>
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