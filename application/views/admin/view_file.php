<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Profil -'.$siswa->namaLengkap.'.pdf');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
// create some HTML content

// draw jpeg image
$pdf->SetAlpha(0.8);
$pdf->Image('assets/upload/FORMULIR-01.png', 7, 0, 0, 0, '', 'http://www.saistudioalam.sch.id', '', true, 72);
// echo 'assets/upload/'.explode('/', $siswa->pasFoto)[count(explode('/', $siswa->pasFoto))-1];die();
// print_r(explode('/', $siswa->pasFoto));die();
$pdf->Image('assets/upload/pasFoto/'.explode('/', $siswa->pasFoto)[count(explode('/', $siswa->pasFoto))-1], 150, 40, 40, 50, '', 'http://www.saistudioalam.sch.id', '', true, 72);

$html = '<style></style>
	<h2>FORMULIR PENDAFTARAN CALON SISWA<br/>
	SEKOLAH ALAM INDONESIA<br/>TAHUN AJARAN 2019/2020</h2>
<h3>DATA CALON SISWA&nbsp;</h3>
<p>A. DATA PRIBADI&nbsp;&nbsp; &nbsp;</p>
<ol>
   <li>Nama lengkap :&nbsp; <b>'.$siswa->namaLengkap.'</b></li>
   <li>Nama panggilan : <b>'.$siswa->namaPanggilan.'</b></li>
   
   <li>Jenis kelamin :  <b>'.$siswa->jenisKelamin.'</b></li>
   <li>Golongan Darah :  <b>'.$siswa->golonganDarah.'</b></li>
   <li>Anak ke :  <b>'.$siswa->anakKe.'</b>. dari  <b>'.$siswa->dariKe.'</b> bersaudara</li>
   <li>Tempat / Tanggal lahir : <b>'.$siswa->tempatLahir.'/'.date('d-m-Y',strtotime($siswa->tanggalLahir)).'</b></li>
   <li>Agama :  <b>'.$siswa->agama.'</b></li>
   <li>Alamat :&nbsp; <b>'.$siswa->alamat1.'/'.$siswa->pos1.'/'.$siswa->telpon1.'</b></li>
   <li>Kewarganegaraan :  <b>'.$siswa->kewarganegaraan.'</b></li>
   <li>Suku :  <b>'.$siswa->suku.'</b></li>
   <li>Asal Sekolah :  <b>'.$siswa->asalSekolah.'</b></li>
   <li>Bakat yang tampak :  <b>'.$siswa->bakat.'</b></li>
   <li>Hobby :  <b>'.$siswa->hobi.'</b></li>
</ol>
';
// set alpha to semi-transparency

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('Profil-'.$siswa->namaLengkap.'.pdf', 'I');
?>