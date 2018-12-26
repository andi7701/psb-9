<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Invoice-'.$siswa->namaLengkap.'.pdf');
// $pdf->SetHeaderMargin(30);
// $pdf->SetTopMargin(20);
// $pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Sekolah Alam Indonesia - Studio ALam');
// $pdf->SetDisplayMode('real', 'default');
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage('P', 'A4');
// set alpha to semi-transparency
// $pdf->SetAlpha(1);
// draw jpeg image
$pdf->Image('assets/upload/FORMULIR-01.png',10, 0, 0, 0, '', '', '', true, 72);
// output the HTML content
// create some HTML content
// $html = '
// <h1>Kuitansi Pembayaran PPSB SAI-Studio Alam </h1>
// <p>Telah Diterima Dari : '.$siswa->namaLengkap.' ('.$siswa->ayah_namaLengkap.'/'.$siswa->ibu_namaLengkap.')</p>
// <p>Banyak Uang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. 350.000,- (<i>Tiga Ratus Lima Puluh Ribu Rupiah</i>)</p>
// <p>Untuk Pembayaran : <b><i>Pendaftaran Penerimaan Siswa Baru SAI-Studio Alam 2019/2020</i></b></p>
// <p>Kode Akses &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>'.$siswa->sys_code.'</b></p>
// ';
$html = '<h1><strong>Lembar Pernyataan </strong></h1>
<h2><strong>Orang Tua / Wali Calon Siswa</strong></h2>
<p><strong>Kami orang tua dari :</strong></p>
<p><strong>&nbsp; &nbsp; Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : '.$siswa->namaLengkap.'</strong></p>
<p><strong>&nbsp; &nbsp; Jenjang/ Tingkat : '.$siswa->jenjangPendidikan.'/ '.$siswa->tingkat.'</strong></p>
<p><strong>bertanda tangan di bawah ini untuk menyatakan bahwa :</strong></p>
<ol>
   <li>Semua isian yang ada dalam Formulir Pendaftaran Calon Siswa Sekolah Alam INDONESIA Tahun</li>
   <li>Pelajaran 2019-2020 ini kami isi dengan penuh kesadaran dan kejujuran untuk dijadikan sebagai bahan rujukan.</li>
   <li>Mengisi formulir pendaftaran pada situs psb.saistudioalam.sch.id untuk digunakan oleh Panitia Penerimaan Siswa Baru (PPSB) Sekolah Alam INDONESIA (dan seterusnya menjadi milik PPSB) sebagai syarat mengikuti proses selanjutnya.</li>
   <li>Menerima semua keputusan PPSB Sekolah Alam INDONESIA terkait semua proses penerimaan siswa baru.</li>
   <li>Keputusan PPSB bersifat mutlak dan tidak dapat diganggu gugat.</li>
</ol>
<p style="text-align: center;">Depok, '.date('d-M-Y').'</p>
<p style="text-align: center;">Yang Menyatakan,</p>
<p style="text-align: center;">Orang Tua / Wali Siswa</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">Materai 6000&nbsp;</p>
<p style="text-align: center;">'.$siswa->ayah_namaLengkap.' ____ '.$siswa->ibu_namaLengkap.'</p>
<p style="text-align: left;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ayah/wali&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ibu/wali</p>';

// Print text using writeHTMLCell()
// $pdf->writeHTML($html, true, false, true, false, '');
$pdf->writeHTMLCell(0, 50, '', '', $html, 0, 1, 0, true, '', true);


$pdf->Output('Invoice-'.$siswa->namaLengkap.'.pdf', 'I');
?>