<table width="100%">
    <tr>
        <td align="left">
            <h3 class="card-title"><b>FR.IA.02. TUGAS PRAKTIK DEMONSTRASI</b></h3>
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
foreach ($datafria02 as $data) {
    $daftarunit = explode('#', $data->daftar_unit);
?>
    <strong>Tugas Ke - <?= $No ?></strong>
    <table width="100%" border='1' cellpadding="4" cellspacing="0">
        <tr>
            <td><b>Judul Tugas</b></td>
            <td colspan="2"><?= $data->judul_tugas ?></td>
        </tr>
        <tr>
            <td><b>Alokasi Waktu</b></td>
            <td colspan="2"><?= $data->alokasi_waktu ?></td>
        </tr>
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
    <div class="card-body pad">
        <div class="mb-3">
            <b>A. Petunjuk</b>
            <p>
                <?= $data->petunjuk ?>
            </p>
        </div>
        <div class="mb-3">
            <b>B. Skenario</b>
            <p><?= $data->sekenario ?></p>
        </div>
        <div class="mb-3">
            <b>C. Langkah Kerja</b>
            <p><?= $data->langkah_kerja ?></p>
        </div>
    </div>
    <p style="page-break-after: always;">&nbsp;</p>
<?php
    $No++;
}
?>