<table width="100%">
    <tr>
        <td align="left">
            <h3 class="card-title"><b>FR.IA.05.A. LEMBAR KUNCI JAWABAN PERTANYAAN TERTULIS PILIHAN GANDA</b></h3>
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
<table width="40%" border='1' cellpadding="4" cellspacing="0">
    <tr>
        <td align="center">Nomor</td>
        <td align="center" colspan="5">Jawaban</td>
    </tr>
    <?php
    foreach ($datafria05 as $data) : ?>
        <tr>
            <td align="center"><?= $No ?></td>
            <td width="85%">
                <?php
                $jawaban = $data->jawaban;
                $letter = "A";
                $op = explode("#", $jawaban);
                for ($i = 1; $i <= 5; $i++) {
                    $isiop = explode("_", $op[$i]);
                    if ($data->kunci == $i) {
                        echo $letter . ". " . $isiop[1];
                    }
                    $letter++;
                } ?>
            </td>
        </tr>
    <?php
        $No++;
    endforeach;
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