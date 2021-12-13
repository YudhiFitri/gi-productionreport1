<?php

$html = "";
$totQtySize = 0;
$totJmlBox = 0;
$totQtyEachBox = 0;
// $noBox = 0;
// $totBox = 0;

$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Yudhi Prasetya');
$pdf->SetTitle('Solid Packing List');

// set default header data
$pdf->SetHeaderData('', 0, "Solid Packing List", "");

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
				margin-top: 2px;
				margin-bottom: 2px;
			}
		</style>
		<body>';
$html .= 'ORC: <strong>' . $packingList[0]['orc'] . '</strong><br>';
$html .= 'Color: <strong>' . $packingList[0]['color']  . '</strong><br>';
$html .= 'Style: <strong>' . $packingList[0]['style']  . '</strong><br>';
$html .= '<hr/>';
$html .= '<table cellpadding="2" cellspacing="2">
				<thead>
					<tr>
						<th width="20%" align="left"><strong>Size</strong></th>
						<th width="20%" align="left"><strong>Kapasitas</strong></th>
						<th width="20%" align="center"><strong>Qty</strong></th>
						<th width="20%" align="center"><strong>Jml Box</strong></th>
						<th width="20%" align="right"><strong>No. Box</strong></th>
					</tr>
				</thead>';

// foreach ($packingList as $pl) {
// 	$totQtySize += $pl['qty'];
// 	// $totQtyEachBox += $pl['qty_detail'];
// 	$html .= '<tr>
// 						<td width="25%" align="left">' . $pl['size'] . '</td>
// 						<td width="25%" align="left">' . $pl['box_capacity'] . '</td>
// 						<td width="25%" align="right">' . $pl['qty'] . '</td>
// 						<td width="25%" align="right">1 - ' . $pl['total_box'] . '</td></tr>';
// }

for ($x = 0; $x <= count($packingList) - 1; $x++) {
	// print_r($packingList[$x]['qty']);
	$totQtySize += $packingList[$x]['qty'];
	$totJmlBox += $packingList[$x]['total_box'];
	// print_r($packingList[$x - 1]['total_box'] + 1 . " ");
	$html .= '<tr>
						<td width="20%" align="left">' . $packingList[$x]['size'] . '</td>
						<td width="20%" align="left">' . $packingList[$x]['box_capacity'] . ' pcs</td>
						<td width="20%" align="center">' . $packingList[$x]['qty'] . '</td>
						<td width="20%" align="center">' . $packingList[$x]['total_box'] . '</td>';
	// $noBox = 0;
	if ($x == 0) {
		$html .= '<td width="20%" align="right">1 - ' . strval($packingList[$x]['total_box']) . '</td></tr>';
	} elseif ($x > 0) {
		$totBox = 0;
		$noBox = 0;
		for ($y = 0; $y <= $x; $y++) {
			$totBox += $packingList[$y]['total_box'];
			if ($y > 0) {
				$noBox += $packingList[$y - 1]['total_box'];
			}
		}
		$html .= '<td width="20%" align="right">' . strval($noBox + 1) . " - " . $totBox . '</td></tr>';
		// $noBox += $packingList[$x - 1]['total_box'] + 1;
	}
	// <td width="25%" align="right">1 - ' . $packingList[$x]['total_box'] . '</td></tr>';
}
$html .= '<tr style="border-top: double; border-bottom: double">
			<td width="20%"><strong>Total :</strong></td>
			<td width="20%"></td>
			<td width="20%" align="center"><strong>' . $totQtySize . '</strong></td>
			<td width="20%" align="center"><strong>' . $totJmlBox . '</strong></td>
			<td width="20%" align="center"></td></tr>';
$html .= '</table></body>';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
// $pdf->lastPage();


// ---------------------------------------------------------
// ob_end_clean();

//Close and output PDF document
$pdf->Output('PackingList.pdf', 'I');
