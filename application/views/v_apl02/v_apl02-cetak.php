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
                $dataapl02 = $this->Mapl02->getApl02Asesi($idasesi, $de->id);
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
                    <td align="center"><input type="checkbox" disabled <?php if($idasesi!=null){ if ($dataapl02->kompetensi == "K"){ echo "checked"; }} ?>></td>
                    <td align="center"><input type="checkbox" disabled <?php if($idasesi!=null){ if ($dataapl02->kompetensi == "BK"){ echo "checked"; }} ?>></td>
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
                <p><?php if ($idasesi!=null) {
                                            echo $appapl02->namaasesi;
                                        } ?>
                                        </p>
            </td>
            <td width="15%" valign="top">
                <p>Tanggal:</p>
                <p><?php if ($idasesi!=null) {
                                            echo date_indo($appapl02->tgl_ajuan);
                                        } ?>
                                        </p></p>
            </td>
            <td width="15%" valign="top">
                <p>Tanda Tangan Asesi:</p>
                <p>
                <?php if ($idasesi!=null && $appapl02->ttd_asesi != "") { ?>
                    <img src='<?= $ttd_asesi ?>' width="100px" />
                <?php } ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="3"><strong>Ditinjau oleh Asesor:</strong></td>
        </tr>
        <tr>
            <td valign="top">
                <p><strong>Nama Asesor:</strong></p>
                <p>
                <?php if ($idasesi!=null) {
                                            echo $appapl02->namaasesor;
                                        } ?></p>
            </td>
            <td valign="top">
                <p><strong>Rekomendasi:</strong><br />
                <?php if ($idasesi!=null) {
                                            echo $appapl02->catatan;
                                        } ?>
                </p>
            </td>
            <td valign="top">
                <p><strong>Tanda Tangan dan Tanggal:</strong></p>
                <?php if ($idasesi!=null && $appapl02->ttd_asesor != "") { ?>
                <p>
                    <img src='<?= $ttd_asesor ?>' width="100px" />
                </p>
                <p><?=date_indo($appapl02->tgl_terima)?></p>
                <?php } ?>
            </td>
        </tr>
    </table>