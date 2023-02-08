<table width="100%">
    <tr>
        <td align="left">
            <h3 class="card-title"><b>FR.IA.05.B. LEMBAR JAWABAN PERTANYAAN TERTULIS PILIHAN GANDA</b></h3>
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
<?php
$No     = 1;
?>
<table width="100%" border='1' cellpadding="4" cellspacing="0">
    <tr>
        <td rowspan="<?= count($dataunit) + 1 ?>"><b>Daftar Unit</b></td>
        <td><b>Kode Unit</b></td>
        <td><b>Judul Unit</b></td>
    </tr>
    <?php
    foreach ($dataunit as $du) {
    ?>
        <tr>
            <td><?= $du->kode_unit ?></td>
            <td><?= $du->judul_unit ?></td>
        </tr>
    <?php
    }
    ?>
</table>
<br>
<table width="50%" border='1' cellpadding="4" cellspacing="0">
    <tr>
        <td colspan="6" rowspan="2" align="center">Jawaban</td>
        <td colspan="2" align="center">Rekomendasi</td>
    </tr>
    <tr>
        <td width="9%" align="center">K</td>
        <td width="9%" align="center">BK</td>
    </tr>
    <?php
    foreach ($datafria05 as $data) {

    ?>
        <tr>
            <td width="6%" align="center"><?= $No ?>.</td>
            <td width="6%" align="center">A</td>
            <td width="6%" align="center">B</td>
            <td width="6%" align="center">C</td>
            <td width="6%" align="center">D</td>
            <td width="6%" align="center">E</td>
            <td align="center"><input type="checkbox"></td>
            <td align="center"><input type="checkbox"></td>
        </tr>
    <?php
        $No++;
    }
    ?>

</table>
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