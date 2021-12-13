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
        .title {
            font-weight: bold;
            font-size: 14pt;
        }

        .td-padding {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .centered {
            text-align: center;
            padding-bottom: 10px;
            page-break-inside: avoid;

        }

        body {
            width: 100%;
            height: 100%;
            font: 12pt "Tahoma";
            margin: 0;
            padding: 0;
        }

        /* table {
            page-break-inside: auto;
        } */

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        thead {
            display: table-header-group;
        }

        @page {
            size: 105mm 297mm;
            margin: 7mm;

        }

        table {
            page-break-inside: avoid;
        }

        thead {
            display: table-header-group;
        }
    </style>
</head>

<body>
    <table id="mainTable">
        <tbody>
            <tr >
                <td>
                    <?php foreach ($mold as $det) : ?>
                        <?php if($det->outermold_barcode !=""): ?>
                            <table style="border: 1px solid black; ">
                                <tr>
                                    <td colspan="3" class="centered title">
                                        Outer Mold
                                    </td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td class="td-padding">
                                        BUYER
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->buyer; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        ORC NO
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->orc; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        COLOR
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->color; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        STYLE
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->style; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        SIZE
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->size; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        BUN
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $det->no_bundle; ?>
                                    </td>
                                </tr>
                                <tr class="barcode">
                                    <td colspan="3" style="text-align: center">
                                        <p class="kode"><?php echo $det->outermold_barcode; ?></p>
                                    </td>
                                </tr>
                                <br/>
                            </table>
                        <?php endif?>

                        <?php if($det->midmold_barcode !=""): ?>
                            <table style="border: 1px solid black; ">
                                <tr>
                                    <td colspan="3" class="centered title">
                                        Mid Mold
                                    </td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td class="td-padding">
                                        BUYER
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->buyer; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        ORC NO
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->orc; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        COLOR
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->color; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        STYLE
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->style; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        SIZE
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->size; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        BUN
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $det->no_bundle; ?>
                                    </td>
                                </tr>
                                <tr class="barcode">
                                    <td colspan="3" style="font-size: 10px; width: 380px">
                                        <p class="kode"><?php echo $det->midmold_barcode; ?></p>
                                    </td>
                                </tr>
                                <br/>
                            </table>
                        <?php endif?>

                        <?php if($det->linningmold_barcode !=""): ?>
                            <table style="border: 1px solid black; ">
                                <tr>
                                    <td colspan="3" class="centered title">
                                        Linning Mold
                                    </td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td class="td-padding">
                                        BUYER
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->buyer; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        ORC NO
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->orc; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        COLOR
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->color; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        STYLE
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->style; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        SIZE
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td class="td-padding">
                                        <?php echo $det->size; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-padding">
                                        BUN
                                    </td>
                                    <td class="td-padding">
                                        :
                                    </td>
                                    <td>
                                        <?php echo $det->no_bundle; ?>
                                    </td>
                                </tr>
                                <tr class="barcode">
                                    <td colspan="3" style="text-align: center">
                                        <p class="kode"><?php echo $det->linningmold_barcode; ?></p>
                                    </td>
                                </tr>
                                <br/>
                            </table>
                        <?php endif?>                        
                    <?php endforeach ?>
                    
                </td>
            </tr>
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
                    height: 80,
                });
            });

        });
    </script>
</body>

</html>