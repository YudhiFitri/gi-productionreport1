<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Print Bundle Barcode</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('_partials/css.php'); ?>
    <link rel="stylesheet" href="<?php echo base_url('plugins/print-preview/src/css/print-preview.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/print-preview/src/css/screen.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/print-preview/src/css/print.css'); ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url('plugins/paper/paper.css'); ?>"> -->
    <style>
        tr.noBorder td {
            border: 0 !important;
            zoom: 1
        }

        tr.okBorder td {
            border: 1px solid black;
        }

        @media all {
            .page-break {
                display: none;
            }
        }

        /* @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }

            table,
            td,
            tbody {
                page-break-inside: avoid;
            }

            .embuh {
                page-break-inside: avoid;
            }
        } */
    </style>
</head>

<body>
    <table id="mainTable" style="border: none; margin-top: 1px;">
        <tbody>
            <tr>
                <td>
                    <?php for ($x = 0; $x <= 3;) : ?>
                        <?php foreach ($detail as $det) : ?>
                            <table style="border: 1px solid black">
                                <tr class="embuh">
                                    <td colspan="3">
                                        <p class="text-center align-center" style="margin: 2px; font-size: 15px;"><strong>PT. GLOBALINDO INTIMATES</strong></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->buyer; ?>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                    </td>

                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->color; ?>
                                    </td>
                                </tr>
            </tr>
            <tr class="noBorder">
                <td>
                    <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                </td>
                <td style="width: 2%; padding: 2px; margin: 0px">
                    :
                </td>
                <td>
                    <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                </td>
            </tr>
            <tr class="noBorder">
                <td>
                    <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                </td>
                <td style="width: 2%; padding: 2px; margin: 0px">
                    :
                </td>
                <td>
                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->size; ?></p>
                </td>

            </tr>
            <tr>
                <td>
                    <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                </td>
                <td style="width: 2%; padding: 2px;">
                    :
                </td>
                <td>
                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->no_bundle; ?></p>
                </td>
            </tr>
            <tr class="barcode okBorder">
                <td colspan="6" class="text-center">
                    <p class="kode"><?php echo $det->kode_barcode; ?></p>
                </td>
            </tr>
    </table>
<?php endforeach ?>
<?php endfor ?>
</td>
</tr>


<!-- <?php $x = 2;
        $y = 2;
        $z = 2;
        $l = 2 ?>
            <tr>
                <td>
                    <table style="border: 1px solid black">
                        <tbody>

                            <tr class="embuh">

                                <td colspan="6">
                                    <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES</strong></p>
                                </td>

                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <?php echo $cutting->buyer; ?>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <?php echo $cutting->color; ?>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px; margin: 0px">
                                    :
                                </td>
                                <td>
                                    <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->qty_pcs; ?></p>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px; margin: 0px">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->size; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->no_bundle; ?></p>
                                </td>
                            </tr>
                            <tr class="barcode okBorder">
                                <td colspan="6" class="text-center">
                                    <p class="kode"><?php echo $detail[0]->kode_barcode; ?></p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
                <td>
                    <table style="border: 1px solid black">
                        <tbody>

                            <tr class="embuh">

                                <td colspan="6">
                                    <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES</strong></p>
                                </td>

                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <?php echo $cutting->buyer; ?>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <?php echo $cutting->color; ?>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px; margin: 0px">
                                    :
                                </td>
                                <td>
                                    <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->qty_pcs; ?></p>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px; margin: 0px">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->size; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->no_bundle; ?></p>
                                </td>
                            </tr>
                            <tr class="barcode okBorder">
                                <td colspan="6" class="text-center">
                                    <p class="kode"><?php echo $detail[1]->kode_barcode; ?></p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <?php while ($x < count($detail) - 1) : ?>
            <tr>
                <td>
                    <?php if ($x % 2 == 0) : ?>
                    <table style="border: 1px solid black">
                        <tbody>

                            <tr class="embuh">

                                <td colspan="6">
                                    <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES</strong></p>
                                </td>

                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <?php echo $cutting->buyer; ?>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <?php echo $cutting->color; ?>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px; margin: 0px">
                                    :
                                </td>
                                <td>
                                    <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$x]->qty_pcs; ?></p>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px; margin: 0px">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$x]->size; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$x]->no_bundle; ?></p>
                                </td>
                            </tr>
                            <tr class="barcode okBorder">
                                <td colspan="6" class="text-center">
                                    <p class="kode"><?php echo $detail[$x]->kode_barcode; ?></p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <?php endif;
                        $x++ ?>

                </td>
                <td>
                    <?php if ($x % 2 != 0) : ?>
                    <table style="border: 1px solid black">
                        <tbody>

                            <tr class="embuh">

                                <td colspan="6">
                                    <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES</strong></p>
                                </td>

                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <?php echo $cutting->buyer; ?>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <?php echo $cutting->color; ?>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px; margin: 0px">
                                    :
                                </td>
                                <td>
                                    <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$x]->qty_pcs; ?></p>
                                </td>
                            </tr>
                            <tr class="noBorder">
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px; margin: 0px">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$x]->size; ?></p>
                                </td>
                                <td>
                                    <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                </td>
                                <td style="width: 2%; padding: 2px;">
                                    :
                                </td>
                                <td>
                                    <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$x]->no_bundle; ?></p>
                                </td>
                            </tr>
                            <tr class="barcode okBorder">
                                <td colspan="6" class="text-center">
                                    <p class="kode"><?php echo $detail[$x]->kode_barcode; ?></p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <?php endif;
                        $x++ ?>
                </td>
            </tr>
            <?php endwhile; ?>

            <?php if ($detail[0]->outermold_barcode != null) : ?>
                <tr>
                    <td>
                        <table style="border: 1px solid black">
                            <tbody>

                                <tr class="embuh">

                                    <td colspan="6">
                                        <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (OUTER MOLD)</strong></p>
                                    </td>

                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->buyer; ?>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->color; ?>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->qty_pcs; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->size; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->no_bundle; ?></p>
                                    </td>
                                </tr>
                                <tr class="barcode okBorder">
                                    <td colspan="6" class="text-center">
                                        <p class="kode"><?php echo $detail[0]->kode_barcode; ?></p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table style="border: 1px solid black">
                            <tbody>

                                <tr class="embuh">

                                    <td colspan="6">
                                        <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (OUTER MOLD)</strong></p>
                                    </td>

                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->buyer; ?>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->color; ?>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->qty_pcs; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->size; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->no_bundle; ?></p>
                                    </td>
                                </tr>
                                <tr class="barcode okBorder">
                                    <td colspan="6" class="text-center">
                                        <p class="kode"><?php echo $detail[1]->kode_barcode; ?></p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>    
                <?php while ($y < count($detail) - 1) : ?>
                    <tr>
                        <td>
                            <?php if ($y % 2 == 0) : ?>
                            <table style="border: 1px solid black">
                                <tbody>

                                    <tr class="embuh">

                                        <td colspan="6">
                                            <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (OUTER MOLD)</strong></p>
                                        </td>

                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->buyer; ?>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->color; ?>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$y]->qty_pcs; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$y]->size; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$y]->no_bundle; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="barcode okBorder">
                                        <td colspan="6" class="text-center">
                                            <p class="kode"><?php echo $detail[$y]->kode_barcode; ?></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <?php endif;
                                    $y++ ?>

                        </td>
                        <td>
                            <?php if ($y % 2 != 0) : ?>
                            <table style="border: 1px solid black">
                                <tbody>

                                    <tr class="embuh">

                                        <td colspan="6">
                                            <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (OUTER MOLD)</strong></p>
                                        </td>

                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->buyer; ?>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->color; ?>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$y]->qty_pcs; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$y]->size; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$y]->no_bundle; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="barcode okBorder">
                                        <td colspan="6" class="text-center">
                                            <p class="kode"><?php echo $detail[$y]->kode_barcode; ?></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <?php endif;
                                    $y++ ?>
                        </td>
                    </tr>
                <?php endwhile ?>    
            <?php endif ?>                            

            <?php if ($detail[0]->midmold_barcode != null) : ?>
                <tr>
                    <td>
                        <table style="border: 1px solid black">
                            <tbody>

                                <tr class="embuh">

                                    <td colspan="6">
                                        <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (MID MOLD)</strong></p>
                                    </td>

                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->buyer; ?>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->color; ?>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->qty_pcs; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->size; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->no_bundle; ?></p>
                                    </td>
                                </tr>
                                <tr class="barcode okBorder">
                                    <td colspan="6" class="text-center">
                                        <p class="kode"><?php echo $detail[0]->kode_barcode; ?></p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table style="border: 1px solid black">
                            <tbody>

                                <tr class="embuh">

                                    <td colspan="6">
                                        <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (MID MOLD)</strong></p>
                                    </td>

                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->buyer; ?>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->color; ?>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->qty_pcs; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->size; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->no_bundle; ?></p>
                                    </td>
                                </tr>
                                <tr class="barcode okBorder">
                                    <td colspan="6" class="text-center">
                                        <p class="kode"><?php echo $detail[1]->kode_barcode; ?></p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>    
                <?php while ($z < count($detail) - 1) : ?>
                    <tr>
                        <td>
                            <?php if ($z % 2 == 0) : ?>
                            <table style="border: 1px solid black">
                                <tbody>

                                    <tr class="embuh">

                                        <td colspan="6">
                                            <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (MID MOLD)</strong></p>
                                        </td>

                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->buyer; ?>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->color; ?>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$z]->qty_pcs; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$z]->size; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$z]->no_bundle; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="barcode okBorder">
                                        <td colspan="6" class="text-center">
                                            <p class="kode"><?php echo $detail[$z]->kode_barcode; ?></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <?php endif;
                                    $z++ ?>

                        </td>
                        <td>
                            <?php if ($z % 2 != 0) : ?>
                            <table style="border: 1px solid black">
                                <tbody>

                                    <tr class="embuh">

                                        <td colspan="6">
                                            <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (MID MOLD)</strong></p>
                                        </td>

                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->buyer; ?>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->color; ?>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$z]->qty_pcs; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$z]->size; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$z]->no_bundle; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="barcode okBorder">
                                        <td colspan="6" class="text-center">
                                            <p class="kode"><?php echo $detail[$z]->kode_barcode; ?></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <?php endif;
                                    $z++ ?>
                        </td>
                    </tr>
                <?php endwhile ?>    
            <?php endif ?>

            <?php if ($detail[0]->linningmold_barcode != null) : ?>
                <tr>
                    <td>
                        <table style="border: 1px solid black">
                            <tbody>

                                <tr class="embuh">

                                    <td colspan="6">
                                        <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (LINNING MOLD)</strong></p>
                                    </td>

                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->buyer; ?>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->color; ?>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->qty_pcs; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->size; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[0]->no_bundle; ?></p>
                                    </td>
                                </tr>
                                <tr class="barcode okBorder">
                                    <td colspan="6" class="text-center">
                                        <p class="kode"><?php echo $detail[0]->kode_barcode; ?></p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table style="border: 1px solid black">
                            <tbody>

                                <tr class="embuh">

                                    <td colspan="6">
                                        <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (LINNING MOLD)</strong></p>
                                    </td>

                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->buyer; ?>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $cutting->color; ?>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->qty_pcs; ?></p>
                                    </td>
                                </tr>
                                <tr class="noBorder">
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px; margin: 0px">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->size; ?></p>
                                    </td>
                                    <td>
                                        <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                    </td>
                                    <td style="width: 2%; padding: 2px;">
                                        :
                                    </td>
                                    <td>
                                        <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[1]->no_bundle; ?></p>
                                    </td>
                                </tr>
                                <tr class="barcode okBorder">
                                    <td colspan="6" class="text-center">
                                        <p class="kode"><?php echo $detail[1]->kode_barcode; ?></p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>    
                <?php while ($l < count($detail) - 1) : ?>
                    <tr>
                        <td>
                            <?php if ($l % 2 == 0) : ?>
                            <table style="border: 1px solid black">
                                <tbody>

                                    <tr class="embuh">

                                        <td colspan="6">
                                            <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (LINNING MOLD)</strong></p>
                                        </td>

                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->buyer; ?>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->color; ?>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$l]->qty_pcs; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$l]->size; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$l]->no_bundle; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="barcode okBorder">
                                        <td colspan="6" class="text-center">
                                            <p class="kode"><?php echo $detail[$l]->kode_barcode; ?></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <?php endif;
                                    $l++ ?>

                        </td>
                        <td>
                            <?php if ($l % 2 != 0) : ?>
                            <table style="border: 1px solid black">
                                <tbody>

                                    <tr class="embuh">

                                        <td colspan="6">
                                            <p class="text-center align-center" style="margin: 2px; font-size: 20px;"><strong>PT. GLOBALINDO INTIMATES (LINNING MOLD)</strong></p>
                                        </td>

                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; width: 10%; margin: 0px"><strong>BUYER</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->buyer; ?>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COMM</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0; font-family: 'Arial'; font-size: 16px;"><?php echo $cutting->comm; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px;"><strong>ORC NO</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->orc; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>COLOR</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <?php echo $cutting->color; ?>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>STYLE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding:4px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $cutting->style; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>QTY</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$l]->qty_pcs; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>SIZE</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px; margin: 0px">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$l]->size; ?></p>
                                        </td>
                                        <td>
                                            <p style="padding: 2px; margin: 0px"><strong>BUN</strong></p>
                                        </td>
                                        <td style="width: 2%; padding: 2px;">
                                            :
                                        </td>
                                        <td>
                                            <p style="padding: 2px; font-family:'Arial'; font-size: 16px; margin: 0px"><?php echo $detail[$l]->no_bundle; ?></p>
                                        </td>
                                    </tr>
                                    <tr class="barcode okBorder">
                                        <td colspan="6" class="text-center">
                                            <p class="kode"><?php echo $detail[$l]->kode_barcode; ?></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <?php endif;
                                    $l++ ?>
                        </td>
                    </tr>
                <?php endwhile ?>    
            <?php endif ?>             -->
</tbody>
</table>

<!-- jQuery -->
<?php $this->load->view('_partials/js.php'); ?>
<script src="<?php echo base_url('plugins/JSBarcode/JsBarcode.all.min.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('.barcode > td').each(function() {
            var text = $(this).text().trim();
            // var text = $('.brc').text();
            $('.kode').hide();
            var bars = $('<div class="thebars"><br/><svg class="barcodes text-center"></svg></div>').appendTo(this);
            bars.find('.barcodes').JsBarcode(text, {
                displayValue: true,
                format: "code128",
                height: 60
            });
        });

    });
</script>
</body>

</html>