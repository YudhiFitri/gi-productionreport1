<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Print Bundle Barcode</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .title {
            font-weight: bold;
            font-size: 14pt;
        }

        .td-padding {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .centered {
            text-align: center;
            padding-bottom: 10px;
            page-break-inside: avoid;

        }

        body {
            width: 100%;
            height: 100%;
            font: 10pt "Tahoma";
            margin: 0;
            padding: 0;
        }

        /* table {
            page-break-inside: auto;
        } */

        tr {
            page-break-inside: avoid;
            /* page-break-after: auto; */
        }

        thead {
            display: table-header-group;
        }

        @page {
            size: 105mm 297mm;
            margin: 5mm;

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
    <!-- <table id="mainTable" class="borderless">
        <tr>
            <td>
                <//?php foreach ($cutting as $det) : ?>
                    <//?php $x = 0 ?>
                    <//?php while ($x <= 3) : ?>
                        <table style="border: 1px solid black;">
                            <tr>
                                <td colspan="3" class="centered title">
                                    <//?php switch ($x) {
                                                case 0:
                                                    echo "CENTER PANEL";
                                                    break;
                                                case 1:
                                                    echo "BACK WINGS";
                                                    break;
                                                case 2:
                                                    echo "CUPS";
                                                    break;
                                                case 3:
                                                    echo "ASSEMBLY";
                                                    break;
                                            } ?>

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
                                    <//?php echo $det->buyer ?>
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
                                    <//?php echo $det->orc ?>
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
                                    <//?php echo $det->color ?>
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
                                    <//?php echo $det->style ?>
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
                                    <//?php echo $det->size ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-padding">
                                    BUN
                                </td>
                                <td class="td-padding">
                                    :
                                </td>
                                <td class="td-padding">
                                    <//?php echo $det->no_bundle ?>
                                </td>
                            </tr>
                            <tr class="barcode">
                                <td colspan="3" style="text-align: center">
                                    <p class="kode" style="font-size: 10px; width: 380px">
                                        <//?php switch ($x) {
                                                    case 0:
                                                        echo "cp_" . $det->kode_barcode;
                                                        break;
                                                    case 1:
                                                        echo "bw_" . $det->kode_barcode;
                                                        break;
                                                    case 2:
                                                        echo "cu_" . $det->kode_barcode;
                                                        break;
                                                    case 3:
                                                        echo "as_" . $det->kode_barcode;
                                                        break;
                                                } ?>
                                    </p>
                                </td>
                            </tr>
                            <br>
                        </table>
                        <//?php $x++ ?>
                    <//?php endwhile ?>
                <//?php endforeach ?>

            </td>
        </tr>
    </table> -->


    <table id="mainTable">
        <tr>
            <td id="data"></td>
        </tr>
    </table>

    <!-- jQuery -->
    <?php $this->load->view('_partials/js.php'); ?>
    <script src="<?php echo base_url('plugins/JSBarcode/JsBarcode.all.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            
            var dataPrint = JSON.parse(localStorage.getItem('printBarcodeCutting'));

            console.log('dataPrint: ', dataPrint);

            var mold = "";
            var prefix = "";
            
            $.each(dataPrint, function(i, item) {
                var x = 0;
                while (x <= 3) {
                    var theData = "";
                    switch (x) {
                        case 0:
                            mold = "CENTER PANEL";
                            prefix = "cp_";
                            break;
                        case 1:
                            mold = "BACK WINGS";
                            prefix = "bw_";
                            break;
                        case 2:
                            mold = "CUPS";
                            prefix = "cu_";
                            break;
                        case 3:
                            mold = "ASSEMBLY";
                            prefix = "as_";
                            break;
                    }
                    theData += '<table style="border: 1px solid black;" >';
                    theData += '<tr>';
                    theData += '<td colspan="3" class="centered title">';
                    theData +=  mold + '</td></tr>';

                    theData += '<thead><tr><th></th><th></th><th></th></tr></thead>';

                    theData += '<tr>';
                    theData += '<td class="td-padding">BUYER</td>';
                    theData += '<td class="td-padding">:</td>';
                    theData += '<td class="td-padding">' + item.buyer.toString() + '</td>';
                    theData += '</tr>'; 

                    theData += '<tr>';
                    theData += '<td class="td-padding">ORC NO</td>';
                    theData += '<td class="td-padding">:</td>';
                    theData += '<td class="td-padding">' + item.orc.toString() + '</td>';
                    theData += '</tr>';

                    theData += '<tr>';
                    theData += '<td class="td-padding">COLOR</td>';
                    theData += '<td class="td-padding">:</td>';
                    theData += '<td class="td-padding">' + item.color.toString() + '</td>';
                    theData += '</tr>';

                    theData += '<tr>';
                    theData += '<td class="td-padding">STYLE</td>';
                    theData += '<td class="td-padding">:</td>';
                    theData += '<td class="td-padding">' + item.style.toString() + '</td>';
                    theData += '</tr>';  

                    theData += '<tr>';
                    theData += '<td class="td-padding">SIZE</td>';
                    theData += '<td class="td-padding">:</td>';
                    theData += '<td class="td-padding">' + item.size.toString() + '</td>';
                    theData += '</tr>';

                    theData += '<tr>';
                    theData += '<td class="td-padding">BUN</strong></td>';
                    theData += '<td class="td-padding">:</td>';
                    theData += '<td class="td-padding">' + item.no_bundle.toString() + '</td>';
                    theData += '</tr>';

                    theData += '<tr class="barcode">';
                    theData += '<td colspan="3"><p class="kode">' + prefix + item.kode_barcode + '</p></td>';

                    theData += '</tr><br/></table>';
                    x++;
                    $('#data').append(theData);
                }
            });            

            $('.barcode > td').each(function() {
                var text = $(this).text().trim();

                $('.kode').hide();

                var bars = $('<div class="thebars"><br/><svg class="barcode text-center"></svg></div>').appendTo(this);
                bars.find('.barcode').JsBarcode(text, {
                    displayValue: true,
                    format: "code128",
                    height: 80,
                });
            });

            // const $btnPrint = document.querySelector('#btnPrint');
            // $btnPrint.addEventListener("click", ()=>{
            //     window.print();
            // })

        });
    </script>
</body>

</html>