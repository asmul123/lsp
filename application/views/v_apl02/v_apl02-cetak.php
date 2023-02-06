<?php
$datakop = $this->M_Setting->getkop();
?>
<table>
    <tr>
        <td colspan="3"><b>FR.APL.02. ASESMEN MANDIRI</b>
        </td>
    </tr>
</table>
<br>
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
</table>
<br>
<table width="100%" border='1' cellpadding="4" cellspacing="0">
    <tr>
        <td>PANDUAN ASESMEN MANDIRI</td>
    </tr>
    <tr>
        <td><b>Instruksi:</b>
            <p>
            <ul>
                <li>Baca setiap pertanyaan di kolom sebelah kiri</li>
                <li>Beri tanda centang (<input type="checkbox" disabled checked>) pada kotak jika Anda yakin dapat melakukan tugas yang dijelaskan.</li>
                <li>Isi kolom di sebelah kanan dengan mendaftar bukti yang Anda miliki untuk menunjukkan bahwa Anda melakukan tugas-tugas ini.</li>
            </ul>
            </p>
        </td>
    </tr>
</table>
<br>
<div class="card-body">
    <?php
    $No     = 1;
    foreach ($dataunit as $du) {
    ?>
        <table width="100%" border='1' cellpadding="4" cellspacing="0">
            <tr>
                <td width="19%"><strong>Unit Kompetensi: <?= $No ?></strong></td>
                <td colspan="4"><b><?= $du->judul_unit ?></b></td>
            </tr>

            <tr>
                <td colspan="2"><b>Dapatkah Saya ............. ?</b></td>
                <td width="3%" align="center"><b>K</b></td>
                <td width="3%" align="center"><b>BK</b></td>
                <td width="24%" align="center"><b>Bukti yang relevan</b></td>
            </tr>
            <?php
            $dataelemen = $this->Mskema->getelemen($du->id);
            foreach ($dataelemen as $de) {
            ?>
                <tr>
                    <td colspan="2"><?= $de->urutan ?>. Elemen: <strong><?= $de->elemen ?></strong>
                        <ul>
                            <li>Kriteria Unjuk Kerja:</li>
                            <?php
                            $datakuk = $this->Mskema->getkuk($de->id);
                            foreach ($datakuk as $dk) {
                            ?>
                                <?= $de->urutan ?>.<?= $dk->urutan ?>. <?= $dk->kuk_aktif ?><br>
                            <?php
                            }
                            ?>
                        </ul>
                    </td>
                    <td align="center"><input type="checkbox" disabled></td>
                    <td align="center"><input type="checkbox" disabled></td>
                    <td>&nbsp;</td>
                </tr>
            <?php } ?>
        </table>
        <br>
    <?php
        $No++;
    }
    ?>
    <table width="100%" border='1' cellpadding="4" cellspacing="0">
        <tr>
            <td width="19%" valign="top">
                <p>Nama Asesi:</p>
            </td>
            <td width="15%" valign="top">
                <p>Tanggal:</p>
                <p>&nbsp;</p>
            </td>
            <td width="15%" valign="top">
                <p>Tanda Tangan Asesi:</p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="3"><strong>Ditinjau oleh Asesor:</strong></td>
        </tr>
        <tr>
            <td valign="top">
                <p><strong>Nama Asesor:</strong></p>
                <p>&nbsp;</p>
            </td>
            <td valign="top">
                <p><strong>Rekomendasi:</strong><br />
                </p>
            </td>
            <td valign="top">
                <p><strong>Tanda Tangan dan Tanggal:</strong></p>
                <p><strong>&nbsp;</strong></p>
                <p><strong>&nbsp;</strong></p>
            </td>
        </tr>
    </table>