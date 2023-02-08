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
        <td>Sewaktu/Tempat Kerja/Mandiri*</td>
    </tr>
    <tr>
        <td colspan="2">Nama Asesor</td>
        <td>:</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">Nama Asesi</td>
        <td>:</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">Tanggal</td>
        <td>:</td>
        <td>&nbsp;</td>
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
        ?>
            <tr>
                <td width="6%" align="center"><?= $No ?>.</td>
                <td width="61%">(<?= $dataunit['kode_unit'] ?>) <?= $data->pertanyaan ?></td>
                <td align="center"><input type="checkbox"></td>
                <td align="center"><input type="checkbox"></td>
            </tr>
            <tr>
                <td colspan="2">
                    Tanggapan:
                    <p>&nbsp;</p>
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
                <p>&nbsp;</p>
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
            <p>&nbsp;</p>
        </td>
        <td width="15%" valign="top">
            <p>Asesor:</p>
            <p>&nbsp;</p>
        </td>
    </tr>

    <tr>
        <td valign="top"><strong>Tanda Tangan dan Tanggal</strong>
            <p><strong></strong></p>
            <p>&nbsp;</p>
        </td>
        <td valign="top">
            <p>&nbsp;</p>
        </td>
        <td valign="top">
            <p>&nbsp;</p>
        </td>
    </tr>
</table>