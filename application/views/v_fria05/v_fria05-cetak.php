<table width="100%">
    <tr>
        <td align="left">
            <h3 class="card-title"><b>FR.IA.05. PERTANYAAN TERTULIS PILIHAN GANDA</b></h3>
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
Jawab semua pertanyaan berikut:<br>
<table width="100%" border='1' cellpadding="4" cellspacing="0">
    <?php
    foreach ($datafria05 as $data) : ?>
        <tr>
            <td width="85%">
                <?= $No ?>. <?= $data->pertanyaan ?><br>
                <ol type="a">
                    <?php
                    $jawaban = $data->jawaban;

                    $op = explode("#", $jawaban);
                    for ($i = 1; $i <= 5; $i++) {
                        $isiop = explode("_", $op[$i]);
                        echo "<li>" . $isiop['1'] . "</li>";
                    } ?>
                </ol>
            </td>
        </tr>
    <?php
        $No++;
    endforeach;
    ?>

</table>
<br>
Catatan:<br>
<ul>
    <li>Pertanyaan bisa dalam bentuk benar dan salah, pilihan ganda, dan menjodohkan</li>
    <li>Daftar pertanyaan dapat berisi pertanyaan dari semua dimensi kompetensi. Jika ada pertanyaan yang tidak dijawab, maka dapat dieksplorasi dari menilai melalui pertanyaan verbal.</li>
    <li>Pertanyaan juga dapat difokuskan pada akurasi dan presisi yang dapat membantu memberikan
        rekomendasi tindak lanjut untuk menilai. Pertanyaan presisi jika tidak dapat dijawab, penilai disarankan untuk menambahkan lebih banyak latihan / bekerja di bawah pengawasan, sedangkan jika pertanyaan akurasi dilewatkan maka penilai
        direkomendasikan untuk pelatihan ulang</li>
</ul>
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