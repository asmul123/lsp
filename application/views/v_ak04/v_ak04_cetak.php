
<div class="main-page">
    <div class="container-fluid bg-white">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h3 class="title">FR.AK.04. BANDING ASESMEN</h3>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?= $this->session->flashdata('alert'); ?>
                </div>
            </div>
        </div>
        <!-- <?php
        if ($dataak04) {
            $tl = explode('#', $dataak04["isi"]);
            for ($i = 1; $i <= 5; $i++) {
                ${"tl" . $i} = explode('-', $tl[$i]);
            }
        }
        ?> -->
        <form method="post" action="<?= base_url('ak01/ak01_process')  ?>" enctype="multipart/form-data">
            <div class="row panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <table width="100%" border='1' cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="3">Nama Asesi :</td>
                            </tr>
                            <tr>
                                <td colspan="3">Nama Asesor :</td>
                            </tr>
                            <tr>
                                <td colspan="3">Tanggal Asesmen :</td>
                            </tr>
                            <tr>
                                <td>Jawablah dengan Ya atau Tidak pertanyaan-pertanyaan berikut ini :</td>
                                <td align="center">Ya</td>
                                <td align="center">Tidak</td>
                            </tr>
                            <tr>
                                <td>Apakah Proses Banding telah dijelaskan kepada Anda? </td>
                                <td align="center"><input type="checkbox" name="tl1"></td>
                                <td align="center"><input type="checkbox" name="tl2"></td>
                            </tr>
                            <tr>
                                <td>Apakah Anda telah mendiskusikan Banding dengan Asesor? </td>
                                <td align="center"><input type="checkbox" name="tl3"></td>
                                <td align="center"><input type="checkbox" name="tl4"></td>
                            </tr>
                            <tr>
                                <td>Apakah Anda mau melibatkan "orang lain" membantu Anda dalam Proses Banding?  </td>
                                <td align="center"><input type="checkbox" name="tl5"></td>
                                <td align="center"><input type="checkbox" name="tl6"></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>Banding ini diajukan atas Keputusan Asesmen yang dibuat terhadap Skema Sertifikasi (Kualifikasi/Klaster/Okupasi) berikut :</p>
                                    <p>Skema Sertifikasi : <?=$dataskema["judul_skema"]?><br>
                                    No. Skema Sertifikasi : <?=$dataskema["nomor_skema"]?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>Banding ini diajukan atas alasan sebagai berikut :</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>Anda mempunyai hak mengajukan banding jika Anda menilai proses asesmen tidak sesuai SOP dan tidak memenuhi Prinsip Asesmen.</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>&nbsp;</p>
                                    <p>Tanda tangan Asesi : ............................................................ Tanggal : ..............................................................</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.row -->
    </div>
</div>
<!-- /.main-page -->
<!-- /.right-sidebar -->
</div>
<!-- /.content-container -->
</div>