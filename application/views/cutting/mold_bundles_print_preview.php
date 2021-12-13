<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .title {
            font-weight: bold;
            font-size: 18pt;
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

        .lefted {
            text-align: left;
            padding-bottom: 5px;
            page-break-inside: avoid;            
        }        

        body {
            width: 100%;
            height: 100%;
            font: 12pt "Tahoma";
            margin: 0;
            padding: 0;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        thead {
            display: table-header-group;
        }

        @page {
            /* size: 105mm 297mm; */
            size: 210mm 297mm;
            /* margin: 7mm; */
        }

        /* table {
            page-break-inside: avoid;
        } */

        thead {
            display: table-header-group;
        }

        /* @media all{
            .page-break { display: none}
        }

        @media print{
            .pg-break {
                display: block;
                page-break-before: always;
            }

        } */

        .force-pb {
            clear: both;
            page-break-before: always;
        }
    </style>

</head>

<body>
    <!-- <table id="theTable">
        <tr>
            <td id="data"></td>
        </tr>
    </table> -->

    <table id="mainTable" cellspacing="10" class="mainTable">
        <thead>
            <th id="headerGanjil" width="48%"></th>
            <th id="headerGenap" width="48%"></th>
        </thead>
    </table>

    <?php $this->load->view('_partials/js.php'); ?>
    <script src="<?php echo base_url('plugins/JSBarcode/JsBarcode.all.min.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            var dataPrint = JSON.parse(localStorage.getItem("selectedMoldRows"));
            console.log('dataPrint: ', dataPrint);
            var mold = "";
            var barcode = "";
            var evenOdd;

            $.each(dataPrint, function(i, item) {
                var theData="";
                evenOdd = i + 1;
                console.log('outer: ', item.outermold_barcode);
                console.log('mid: ', item.midmold_barcode);
                console.log('linning: ', item.linningmold_barcode);

                if(evenOdd % 2 == 1){
                    // showBarcodeMoldOdd(item);
                    if(item.outermold_barcode !=""){
                        mold = "Outer Mold";
                        barcode = item.outermold_barcode;
                        theData = "";

                        theData += '<table style="border: 1px solid black; page-break-inside: avoid" >';
                        theData += '<tr>';
                        theData += '<td colspan="3" class="centered title">';
                        theData += mold + '</td></tr>';

                        theData += '<thead><tr><th></th><th></th><th></th></tr></thead>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUYER</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.buyer.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">ORC NO</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.orc.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">COLOR</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.color.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">STYLE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.style.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">SIZE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.size.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUN</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.no_bundle.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr class="barcode">';
                        theData += '<td colspan="3" style="text-align: center"><p class="kode">' + barcode + '</p></td>';

                        theData += '</tr><br/></table>';
                        $('#headerGanjil').append(theData);                    
                    }else{
                        theData += '<div class="force-pb"></div>';                        
                    }

                    if(item.midmold_barcode !=""){
                        mold = "Middle Mold";
                        barcode = item.midmold_barcode;
                        theData = "";                    

                        theData += '<table style="border: 1px solid black; page-break-inside: avoid" >';
                        theData += '<tr>';
                        theData += '<td colspan="3" class="centered title">';
                        theData += mold + '</td></tr>';

                        theData += '<thead><tr><th></th><th></th><th></th></tr></thead>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUYER</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.buyer.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">ORC NO</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.orc.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">COLOR</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.color.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">STYLE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.style.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">SIZE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.size.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUN</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.no_bundle.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr class="barcode">';
                        theData += '<td colspan="3" style="text-align: center"><p class="kode">' + barcode + '</p></td>';

                        theData += '</tr><br/></table>';
                        $('#headerGanjil').append(theData);                                        
                    }else{
                        theData += '<div class="force-pb"></div>';
                    }

                    if(item.linningmold_barcode !=""){
                        mold = "Linning Mold";
                        theData = "";
                        barcode = item.linningmold_barcode;

                        theData += '<table style="border: 1px solid black; page-break-inside: avoid" >';
                        theData += '<tr>';
                        theData += '<td colspan="3" class="centered title">';
                        theData += mold + '</td></tr>';

                        theData += '<thead><tr><th></th><th></th><th></th></tr></thead>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUYER</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding">' + item.buyer.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">ORC NO</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.orc.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">COLOR</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.color.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">STYLE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.style.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">SIZE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.size.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUN</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.no_bundle.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr class="barcode">';
                        theData += '<td colspan="3" style="text-align: center"><p class="kode">' + barcode + '</p></td>';

                        theData += '</tr><br/></table>';
                        $('#headerGanjil').append(theData);                                        
                    }else{
                        theData += '<div class="force-pb"></div>';
                    } 
                }else if(evenOdd % 2 == 0){
                    if(item.outermold_barcode !=""){
                        mold = "Outer Mold";
                        barcode = item.outermold_barcode;
                        theData = "";

                        theData += '<table style="border: 1px solid black; page-break-inside: avoid" >';
                        theData += '<tr>';
                        theData += '<td colspan="3" class="centered title">';
                        theData += mold + '</td></tr>';

                        theData += '<thead><tr><th></th><th></th><th></th></tr></thead>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUYER</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.buyer.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">ORC NO</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.orc.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">COLOR</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.color.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">STYLE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.style.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">SIZE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.size.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUN</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.no_bundle.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr class="barcode">';
                        theData += '<td colspan="3" style="text-align: center"><p class="kode">' + barcode + '</p></td>';

                        theData += '</tr><br/></table>';
                        $('#headerGenap').append(theData);                    
                    }else{
                        theData += '<div class="force-pb"></div>';
                    }

                    if(item.midmold_barcode !=""){
                        mold = "Middle Mold";
                        barcode = item.midmold_barcode;
                        theData = "";                    

                        theData += '<table style="border: 1px solid black; page-break-inside: avoid" >';
                        theData += '<tr>';
                        theData += '<td colspan="3" class="centered title">';
                        theData += mold + '</td></tr>';

                        theData += '<thead><tr><th></th><th></th><th></th></tr></thead>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUYER</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.buyer.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">ORC NO</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.orc.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">COLOR</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.color.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">STYLE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.style.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">SIZE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.size.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUN</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.no_bundle.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr class="barcode">';
                        theData += '<td colspan="3" style="text-align: center"><p class="kode">' + barcode + '</p></td>';

                        theData += '</tr><br/></table>';
                        $('#headerGenap').append(theData);                                        
                    }else{
                        theData += '<div class="force-pb"></div>';                        
                    }

                    if(item.linningmold_barcode !=""){
                        mold = "Linning Mold";
                        theData = "";
                        barcode = item.linningmold_barcode;

                        theData += '<table style="border: 1px solid black; page-break-inside: avoid" >';
                        theData += '<tr>';
                        theData += '<td colspan="3" class="centered title">';
                        theData += mold + '</td></tr>';

                        theData += '<thead><tr><th></th><th></th><th></th></tr></thead>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUYER</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.buyer.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">ORC NO</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.orc.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">COLOR</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.color.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">STYLE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.style.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">SIZE</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.size.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr>';
                        theData += '<td class="td-padding lefted">BUN</td>';
                        theData += '<td class="td-padding lefted">:</td>';
                        theData += '<td class="td-padding lefted">' + item.no_bundle.toString() + '</td>';
                        theData += '</tr>';

                        theData += '<tr class="barcode">';
                        theData += '<td colspan="3" style="text-align: center"><p class="kode">' + barcode + '</p></td>';

                        theData += '</tr><br/></table>';
                        $('#headerGenap').append(theData);                                        
                    }else{
                        theData += '<div class="force-pb"></div>';                        
                    }
                }
            });

            $('.barcode > td').each(function() {
                var text = $(this).text().trim();

                $('.kode').hide();

                var bars = $('<div class="thebars"><svg class="barcode text-center"></svg></div>').appendTo(this);
                bars.find('.barcode').JsBarcode(text, {
                    displayValue: true,
                    format: "code128",
                    height: 80
                });
            });
            
            function showBarcodeMoldOdd(item){

            }
        });
    </script>
</body>

</html>