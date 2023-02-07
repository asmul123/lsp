<table width="100%">
    <tr>
        <td align="left">
            <h3 class="card-title"><b>FR.MAPA.02. PETA INSTRUMEN ASESSMEN HASIL PENDEKATAN ASESMEN DAN PERENCANAAN ASESMEN</b></h3>
        </td>
        <td align="right"></td>

    </tr>
</table>
<table width="100%" border='1' cellpadding="4" cellspacing="0" align="center">
    <tr>
        <td rowspan="2" width="20%">Skema Sertifikasi<br>
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
    <thead>
        <tr>
            <td rowspan="2" align="center"><b>No</b></td>
            <td rowspan="2" align="center"><b>MUK</b></td>
            <td colspan="5" align="center"><b>Potensi Asesi ***</b></td>
        </tr>
        <tr>
            <td align="center"><b>1</b></td>
            <td align="center"><b>2</b></td>
            <td align="center"><b>3</b></td>
            <td align="center"><b>4</b></td>
            <td align="center"><b>5</b></td>
        </tr>
    </thead>
    <tbody>
        <?php
        $No     = 1;
        $refmapa02     = $this->Mmapa02->getrefmapa02();
        $isi = explode('#', $datamapa02['isi']);
        foreach ($refmapa02 as $rm) {
            ${"v_isi_" . $No} = explode('-', $isi[$No]);
        ?>
            <tr>
                <td align="center"><?= $No ?></td>
                <td><?= $rm["muk"] ?></td>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                ?>
                    <td align="center"><input type="checkbox" name="radio<?= $No ?>" id="radio" value="<?= $i ?>" <?php
                                                                                                                    if (${"v_isi_" . $No}['1'] == "$i") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?>></td>
                <?php } ?>
            </tr>
        <?php
            $No++;
        }

        ?>
        </tfoot>
</table>
<br>
*) diisi berdasarkan hasil penentuan pendekatan asesmen dan perencanaan asesmen<br>
**) Keterangan:<br>
<ol>
    <li>
        Hasil pelatihan dan / atau pendidikan, dimana Kurikulum dan fasilitas praktek mampu telusur terhadap standar kompetensi.
    </li>
    <li>
        Hasil pelatihan dan / atau pendidikan, dimana kurikulum belum berbasis kompetensi.
    </li>
    <li>
        Pekerja berpengalaman, dimana berasal dari industri/tempat kerja yang dalam operasionalnya mampu telusur dengan standar kompetensi.
    </li>
    <li>
        Pekerja berpengalaman, dimana berasal dari industri/tempat kerja yang dalam operasionalnya belum berbasis kompetensi.
    </li>
    <li>
        Pelatihan / belajar mandiri atau otodidak.
    </li>
</ol>