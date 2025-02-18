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
        $dataia = $this->Maksesasesor->getRefIa05($data->id, $idasesi);
        $soal = $this->db->get_where('tb_ia_05',  array('id' => $dataia['id_ia']))->row();
         $kunci = $soal->kunci;
    ?>
        <tr>
            <td width="6%" align="center"><?= $No ?>.</td>
            <td width="6%" align="center" <?php if($kunci == 1 && $dataia["jawaban"] == 1){ echo "bgcolor=\"green\""; } else if($kunci == 1){ echo "bgcolor=\"#ccc\""; } else if($dataia["jawaban"] == 1){ echo "bgcolor=\"red\""; } ?>>A</td>
            <td width="6%" align="center" <?php if($kunci == 2 && $dataia["jawaban"] == 2){ echo "bgcolor=\"green\""; } else if($kunci == 2){ echo "bgcolor=\"#ccc\""; } else if($dataia["jawaban"] == 2){ echo "bgcolor=\"red\""; } ?>>B</td>
            <td width="6%" align="center" <?php if($kunci == 3 && $dataia["jawaban"] == 3){ echo "bgcolor=\"green\""; } else if($kunci == 3){ echo "bgcolor=\"#ccc\""; } else if($dataia["jawaban"] == 3){ echo "bgcolor=\"red\""; } ?>>C</td>
            <td width="6%" align="center" <?php if($kunci == 4 && $dataia["jawaban"] == 4){ echo "bgcolor=\"green\""; } else if($kunci == 4){ echo "bgcolor=\"#ccc\""; } else if($dataia["jawaban"] == 4){ echo "bgcolor=\"red\""; } ?>>D</td>
            <td width="6%" align="center" <?php if($kunci == 5 && $dataia["jawaban"] == 5){ echo "bgcolor=\"green\""; } else if($kunci == 5){ echo "bgcolor=\"#ccc\""; } else if($dataia["jawaban"] == 5){ echo "bgcolor=\"red\""; } ?>>E</td>
            <td align="center"><input type="checkbox" <?php if ($dataia['kompetensi'] == "K") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>></td>
            <td align="center"><input type="checkbox" <?php if ($dataia['kompetensi'] == "BK") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>></td>
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
            <p>
            <?php
                                    if($idasesi != null) { echo $datathisser['namaasesi'];}
                                    ?>
                                </td>
            </p>
        </td>
        <td width="15%" valign="top">
            <p>Asesor:</p>
            <p>
            <?php
                                    if($idasesi != null) { echo $datathisser['namaasesor'];}
                                    ?>
                                </td>
            </p>
        </td>
    </tr>

    <tr>
        <td valign="top"><strong>Tanda Tangan dan Tanggal</strong>
            <p><strong></strong></p>
            <p>&nbsp;</p>
        </td>
        <td valign="top">
            <p><?php if ($idasesi!=null && $ak01asesi->ttd_asesi != "") { ?>                
                    <img src='<?= $ttd_asesi ?>' width="150px" /><br>
                    <?=date_indo($datathisser['tgl_sertifikasi'])?>
                <?php }?></p>

        </td>
        <td valign="top">
            <p><?php if ($idasesi!=null && $ak01asesi->ttd_asesor != "") { ?>                
                    <img src='<?= $ttd_asesor ?>' width="150px" /><br>
                    <?=date_indo($datathisser['tgl_sertifikasi'])?>
                <?php }?></p>
        </td>
    </tr>
</table>