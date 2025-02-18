<table width="100%">
    <tr>
        <td align="left">
            <h3 class="card-title"><b>FR.IA.04. PENJELASAN SINGKAT PROYEK TERKAIT PEKERJAAN / KEGIATAN
                    TERSTRUKTUR LAINNYA</b></h3>
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
<?php
$No     = 1;
foreach ($datafria04 as $data) {
    $daftarunit = explode('#', $data->daftar_unit);
?>
    <table width="100%" border='1' cellpadding="4" cellspacing="0">
        <tr>
            <td rowspan="<?= count($daftarunit) ?>"><b>Daftar Unit</b></td>
            <td><b>Kode Unit</b></td>
            <td><b>Judul Unit</b></td>
        </tr>
        <?php
        for ($i = 1; $i < count($daftarunit); $i++) {
            $dataunit = $this->Mskema->getunitdetail($daftarunit[$i]);
        ?>
            <tr>
                <td><?= $dataunit["kode_unit"] . $i . $daftarunit[$i] ?></td>
                <td><?= $dataunit["judul_unit"] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <table width="100%" border='1' cellpadding="4" cellspacing="0">
        <tr>
            <td width="223">Hal yang harus dipersiapkan atau dilakukan atau dihasilkan untuk suatu kegiatan terstruktur:</td>
            <td colspan="2"><?= $data->hasil ?></td>
        </tr>
        <tr>
            <td>Hal yang perlu didemonstrasikan</td>
            <td colspan="2"><?= $data->demonstrasi ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <p>Umpan balik untuk asesi:</p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td valign="top">Tanda Tangan Asesi<p>&nbsp;</p>
            </td>
            <td width="410" valign="top">Tanda Tangan Asesor<p>&nbsp;</p>
            </td>
            <td width="295" valign="top">Nama & Tanda Tangan Supervisor Tempat Kerja<p>&nbsp;</p>
            </td>
        </tr>

    </table>
    <p style="page-break-after: always;">&nbsp;</p>
<?php
    $No++;
}
?>