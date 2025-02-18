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
<table width="100%" align="center" border="0">
        <tr>
            <td height="50" valign="bottom"><strong>Penyusun dan Validator</strong></td>
        </tr>
</table>
<table width="100%" cellspacing="0" cellpadding="4" align="center" border="1">
        <tr height="40">
            <td align="center" width="50%"><strong>Nama</strong></td>
            <td align="center" width="30%"><strong>Jabatan</strong></td>
            <td align="center" width="20%"><strong>Tanggal dan Tanda Tangan</strong></td>
        </tr>
        <tr height="60">
            <td align="center"></td>
            <td align="center">Penyusun</td>
            <td align="center"></td>
        </tr>
        <tr height="60">
            <td align="center"></td>
            <td align="center">Validator</td>
            <td align="center"></td>
        </tr>
</table>