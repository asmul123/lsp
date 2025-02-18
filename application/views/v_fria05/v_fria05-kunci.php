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