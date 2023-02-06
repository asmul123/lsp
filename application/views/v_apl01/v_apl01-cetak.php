<?php
$datakop = $this->M_Setting->getkop();
?>
<table width="100%" cellspacing="0" cellpadding="0">
    <tr>
        <td align="left" width="20%">
            <h3 class="card-title"><img src="<?= base_url() ?>assets/img/kop/<?= $datakop->logo_kiri ?>" width="130"></h3>
        </td>
        <td align="center" width="60%">
            <?= $datakop->isi ?>
        </td>
        <td align="right" width="20%"><img src="<?= base_url() ?>assets/img/kop/<?= $datakop->logo_kanan ?>" width="100"></td>
    </tr>
</table>
<hr>
<table>
    <tr>
        <td colspan="3"><b>FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI</b>
        </td>
    </tr>
    <tr>
        <td colspan="3"><br><b>Bagian 1 : Rincian Data Pemohon Sertifikasi</b>
            <br>
            Pada bagian ini, cantumlan data pribadi, data pendidikan formal serta data pekerjaan anda pada
            saat ini.
        </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tbody>
        <tr>
            <td colspan="6"><strong>a. Data Pribadi</strong></td>
        </tr>
        <tr>
            <td width="25%">Nama Lengkap</td>
            <td width="1%">:</td>
            <td colspan="4" style="border-bottom:1pt"></td>
        </tr>
        <tr>
            <td>No. KTP/NIK/Paspor</td>
            <td>:</td>
            <td colspan="4" style="border-bottom:1pt"></td>
        </tr>
        <tr>
            <td>Tempat / tgl. Lahir</td>
            <td>:</td>
            <td colspan="4" style="border-bottom:1pt"></td>
        </tr>
        <tr>
            <td>Jenis kelamin</td>
            <td>:</td>
            <td colspan="4">Laki-laki / Wanita *)</td>
        </tr>
        <tr>
            <td>Kebangsaan</td>
            <td>:</td>
            <td colspan="4" style="border-bottom:1pt"></td>
        </tr>
        <tr>
            <td>Alamat rumah</td>
            <td>:</td>
            <td colspan="4" style="border-bottom:1pt"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>:</td>
            <td colspan="2" style="border-bottom:1pt"></td>
            <td width="12%">Kode Pos </td>
            <td style="border-bottom:1pt">:</td>
        </tr>
        <tr>
            <td>No. Telepon/E-mail</td>
            <td>:</td>
            <td width="5%">Rumah</td>
            <td width="27%" style="border-bottom:1pt">:</td>
            <td>Kantor</td>
            <td style="border-bottom:1pt">:</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>HP</td>
            <td style="border-bottom:1pt">:</td>
            <td>E-mail</td>
            <td style="border-bottom:1pt">:</td>
        </tr>
        <tr>
            <td>Kualifikasi Pendidikan </td>
            <td>:</td>
            <td colspan="4" style="border-bottom:1pt">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6">*Coret yang tidak perlu
            </td>
        </tr>
        <tr>
            <td colspan="6"><strong>b. Data Pekerjaan Sekarang</strong></td>
        </tr>
        <tr>
            <td>Nama Institusi / Perusahaan </td>
            <td>:</td>
            <td colspan="4" style="border-bottom:1pt">&nbsp;</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td colspan="4" style="border-bottom:1pt">&nbsp;</td>
        </tr>
        <tr>
            <td>Alamat Kantor</td>
            <td>:</td>
            <td colspan="4" style="border-bottom:1pt">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2" style="border-bottom:1pt">&nbsp;</td>
            <td>Kode Pos</td>
            <td style="border-bottom:1pt">:</td>
        </tr>
        <tr>
            <td>No. Telp/Fax/E-mail</td>
            <td>:</td>
            <td>Telp. </td>
            <td style="border-bottom:1pt">:</td>
            <td>Fax</td>
            <td style="border-bottom:1pt">:</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>E-mail</td>
            <td colspan="3" style="border-bottom:1pt">:</td>
        </tr>
    </tbody>
</table>
<table>
    <tr>
        <td colspan="3"><b>Bagian 2 : Data Sertifikasi</b>
            <br>
            Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan berikut Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
        </td>
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
        <td colspan="2" rowspan="5" valign="top">Tujuan Asesmen</td>
        <td>:</td>
        <td><input type="checkbox" disabled> Sertifikasi</td>
    </tr>
    <tr>
        <td></td>
        <td><input type="checkbox" disabled> Sertifikasi Ulang</td>
    </tr>
    <tr>
        <td></td>
        <td><input type="checkbox" disabled> Pengakuan Kompetensi Terkini (PKT)</td>
    </tr>
    <tr>
        <td></td>
        <td><input type="checkbox" disabled> Rekognisi Pembelajaran Lampau</td>
    </tr>
    <tr>
        <td></td>
        <td><input type="checkbox" disabled> Lainnya</td>
    </tr>
</table>
<p><b>Daftar Unit Kompetensi sesuai kemasan :</b></p>
<table width="100%" border='1' cellpadding="4" cellspacing="0">
    <thead>
        <tr>
            <th align="center">No</th>
            <th align="center">Kode Unit</th>
            <th align="center">Judul Unit</th>
            <th align="center">Jenis Standar (Standar<br>Khusus/Standar<br>Internasional/SKKNI)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $No = 1;
        foreach ($dataunit as $du) {
        ?>
            <tr>
                <td align="center"><?php echo $No . '. '; ?></td>
                <td><?= $du->kode_unit ?></td>
                <td><?= $du->judul_unit ?></td>
                <td align="center"><?= $du->jenis_standar ?></td>
            </tr> <?php
                    $No++;
                }
                    ?>
        </tfoot>
</table>
<p style="page-break-after: always;">&nbsp;</p>
<table>
    <tr>
        <td colspan="3"><b>Bagian 3 : Bukti Kelengkapan Pemohon
                <br>
                Bukti Persyaratan Dasar Pemohon</b>
        </td>
    </tr>
</table>
<table width="100%" border='1' cellpadding="4" cellspacing="0">
    <thead>
        <tr>
            <td rowspan="2" align="center" width="5%"><b>No</b></td>
            <td rowspan="2" align="center" width="60%"><b>Bukti Persyaratan Dasar</b></td>
            <td colspan="2" align="center" width="20%"><b>Ada</b></td>
            <td rowspan="2" align="center" width="15%"><b>Tidak Ada</b></td>
        </tr>
        <tr>
            <td align="center"><b>Memenuhi Syarat</b></td>
            <td align="center"><b>Tidak Memenuhi Syarat</b></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center">1.</td>
            <td>Foto copy kartu pelajar/Surat keterangan siswa aktif</td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
        </tr>
        <tr>
            <td align="center">2.</td>
            <td>Foto copy sertifikat prakerin</td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
        </tr>
        <tr>
            <td align="center">3.</td>
            <td>Foto copy rapor semester 1 – semester 5, di legalisir</td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
        </tr>
        <tr>
            <td align="center">4.</td>
            <td></td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
        </tr>
        <tr>
            <td align="center">5.</td>
            <td></td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
            <td align="center"><input type="checkbox" disabled> </td>
        </tr>
        </tfoot>
</table>
<br>
<table border="1" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td width="55%" rowspan="3" valign="top"><strong>&nbsp;Rekomendasi (diisi oleh LSP):</strong><br>
            &nbsp;Berdasarkan ketentuan persyaratan dasar, maka pemohon: <br>
            <strong>&nbsp;Diterima</strong><strong>/ Tidak diterima</strong> *) sebagai peserta sertifikasi<br>
            &nbsp;* coret yang tidak sesuai
        </td>
        <td width="45%" colspan="2"><strong>&nbsp;Pemohon</strong><strong>/ Kandidat</strong><strong> :</strong></td>
    </tr>
    <tr>
        <td width="20%">&nbsp;Nama</td>
        <td width="25%" valign="top"></td>
    </tr>
    <tr>
        <td height="80px" valign="top">&nbsp;Tanda tangan/<br>
            &nbsp;Tanggal</td>
        <td valign="top"></td>
    </tr>
    <tr>
        <td rowspan="4" valign="top"><strong>&nbsp;Catatan :</strong></td>
        <td colspan="2"><strong>&nbsp;Admin LSP</strong><strong>:</strong></td>
    </tr>
    <tr>
        <td>&nbsp;Nama </td>
        <td valign="top"></td>
    </tr>
    <tr>
        <td>&nbsp;No. Reg</td>
        <td valign="top"></td>
    </tr>
    <tr>
        <td height="80px" valign="top">&nbsp;Tanda tangan/<br>
            &nbsp;Tanggal</td>
        <td valign="top"></td>
    </tr>
</table>