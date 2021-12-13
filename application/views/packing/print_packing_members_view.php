<?php

// if (!defined('BASEPATH')) exit('No direct script access allowed');

// $this->load->library('Pdf');
$html = "";

$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Yudhi Prasetya');
$pdf->SetTitle('Daftar Barcode Packing Member');

// set default header data
$pdf->SetHeaderData('', 0, "Daftar Barcode Packing Member", "");

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(3.5, PDF_MARGIN_TOP, 3.5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->AddPage();


$html .= '<style>
					th {
						padding: 0 2px 5px;
						line-hight: 15px;
						border-top: 1px solid black;
						border-bottom: 3px solid black;
					}
					td {
						border-bottom: 1px dotted black;
					}

				</style>
					
				<body>
					<table cellpadding="2" cellspacing="2">
						<thead>
							<tr>
								<th width="85" align="left"><strong>NIK</strong></th>
								<th width="175" align="left"><strong>Nama Lengkap</strong></th>
								<th width="120" align="left"><strong>No.HP</strong></th>
								<th width="50" align="center"><strong>Shift</strong></th>
								<th width="150" align="left"><strong>Barcode</strong></th>
							</tr>
						</thead>';

foreach ($packingMembers as $pm) {
	// var_dump($params);
	$html .= '<tr>
						<td width="85">' . $pm['nik'] . '</td>
						<td width="175">' . $pm['nama_lengkap'] . '</td>
						<td width="120">' . $pm['no_hp'] . '</td>
						<td width="50">' . $pm['shift'] . '</td>';

	$params = $pdf->serializeTCPDFtagParameters(array($pm['barcode'], 'C128', '', '', 40, 15, 0.4, array('position' => 'S', 'border' => TRUE, 'padding' => 1.5, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
	$html .= '<td width="150"><tcpdf method="write1DBarcode" params="' . $params . '" /></td></tr>';
}
$html .= '</table></body>';
// var_dump($html);
// print_r($html);

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
// $pdf->lastPage();


// ---------------------------------------------------------
// ob_end_clean();

//Close and output PDF document
$pdf->Output('PackingMembers.pdf', 'I');
