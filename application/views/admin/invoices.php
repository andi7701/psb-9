<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Invoice.pdf');
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
$x = 0;
foreach ($siswa->result() as $key) {
	$pdf->Image('assets/upload/INVOICE-01-01-01-01.png',10, 0, 0, 0, '', 'http://www.saistudioalam.sch.id', '', true, 72);
		// output the HTML content
		// create some HTML content
		$html = '
		<h1>Kuitansi Pembayaran PPSB SAI-Studio Alam </h1>
		<p>Telah Diterima Dari : '.$key->namaLengkap.' ('.$key->ayah_namaLengkap.'/'.$key->ibu_namaLengkap.')</p>
		<p>Banyak Uang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. 350.000,- (<i>Tiga Ratus Lima Puluh Ribu Rupiah</i>)</p>
		<p>Untuk Pembayaran : <b><i>Pendaftaran Penerimaan Siswa Baru SAI-Studio Alam 2019/2020</i></b></p>
		<p>Kode Akses &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>'.$key->sys_code.'</b></p>
		';

		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 30, '', '', $html, 0, 1, 0, true, '', true);
		$html = '
		<span style="text-align:right;">
			<p>Depok, 22 Desember 2018</p>
			<p>Panitia</p>
			<p> </p>
			<p>___________________</p>

		</span>';
		$pdf->writeHTMLCell(0, 95, '', '', $html, 0, 1, 0, true, '', true);
		// $pdf->writeHTML($html, true, false, true, false, '');
		$html = '
		<h1>Kuitansi Pembayaran PPSB SAI-Studio Alam </h1>
		<p>Telah Diterima Dari : '.$key->namaLengkap.' ('.$key->ayah_namaLengkap.'/'.$key->ibu_namaLengkap.')</p>
		<p>Banyak Uang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. 350.000,- (<i>Tiga Ratus Lima Puluh Ribu Rupiah</i>)</p>
		<p>Untuk Pembayaran : <b><i>Pendaftaran Penerimaan Siswa Baru SAI-Studio Alam 2019/2020</i></b></p>
		<p>Kode Akses &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>'.$key->sys_code.'</b></p>
		';

		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 50, '', '', $html, 0, 1, 0, true, '', true);
		$html = '
		<span style="text-align:right;">
			<p>Depok, 22 Desember 2018</p>
			<p>Orang Tua/Wali</p>
			<p> </p>
			<p>___________________</p>

		</span>';

		$pdf->writeHTML($html, true, false, true, false, '');
		if ($x != $siswa->num_rows()-1) {
			$pdf->AddPage();
		}
		$x++;
}
// $pdf->Output('Invoice-.pdf', 'F');
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="Invoice-.pdf"');
// header('Content-Type: application/json');
return $pdf->Output('Invoice-.pdf', 'I');
?>