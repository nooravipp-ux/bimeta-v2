<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data->spk_no}}</title>
    <style>
    /* Container */
    .container {
        width: 100%;
        max-width: 1200px;
        font-size: 12px;
    }

    /* Row */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Columns */
    .col {
        box-sizing: border-box;
        float: left;
    }

    /* Example classes for different column sizes */
    .col-1 {
        width: 8.33%;
    }

    .col-2 {
        width: 16.66%;
    }

    .col-3 {
        width: 25%;
    }

    .col-4 {
        width: 33.33%;
    }

    .col-5 {
        width: 41.66%;
    }

    .col-6 {
        width: 50%;
    }

    .col-7 {
        width: 58.33%;
    }

    .col-8 {
        width: 66.66%;
    }

    .col-9 {
        width: 75%;
    }

    .col-10 {
        width: 83.33%;
    }

    .col-11 {
        width: 91.66%;
    }

    .col-12 {
        width: 100%;
    }

    .text-center {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid #ddd;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="container" style="border: 1px solid black;">
        <div style="margin: 10px;">
            <div class="row">
                <div class="col col-4">
                    <p>PT. BIMETA KARNUSA BANDUNG</p>
                    <p>NO. SPK : {{$data->spk_no}}</p>
                </div>
                <div class="col col-4"></div>
                <div class="col col-4">
                    <p>NO.SO : {{$data->transaction_no}} </p>
                </div>
            </div>

            <div class="row">
                <div class="col col-8">
                    <p>KONSUMEN : {{$data->customer_name}}</p>
                    <p>NAMA BARANG : {{$data->name}}</p>
                </div>
                <div class="col col-4">
                    <p>NO. PO : {{$data->ref_po_customer}}</p>
                    <p>TANGGAL PENGIRIMAN : <?php echo date("d/m/Y", strtotime($data->delivery_date)); ?></p>
                </div>
            </div>

            <div class="row">
                <div class="col col-3 text-center" style="border: 1px solid black; height: 30px; padding-top: 10px;">
                    <span>BANYAK SHEET</span>
                </div>
                <div class="col col-3 text-center" style="border: 1px solid black; height: 30px; padding-top: 10px;">
                    <span>KUANTITAS ORDER</span>
                </div>
                <div class="col col-6 text-center" style="border: 1px solid black; height: 30px; padding-top: 10px;">
                    <span>UKURAN</span>
                </div>
            </div>

            <div class="row">
                <div class="col col-3 text-center" style="border: 1px solid black; height: 40px; padding-top: 30px;">
                    <span>750</span>
                </div>
                <div class="col col-3 text-center" style="border: 1px solid black; height: 40px; padding-top: 30px;">
                    <span>750</span>
                </div>
                <div class="col col-6 text-center" style="border: 1px solid black; height: 40px; padding-top: 30px;">
                    <span>UK : 17 X 27.5 X 17</span>
                </div>
            </div>

            <div class="row">
                <div class="col col-6 text-center" style="border: 1px solid black; height: 30px; padding-top: 10px;">
                    <span>KUALITAS</span>
                </div>
                <div class="col col-6 text-center" style="border: 1px solid black; height: 30px; padding-top: 10px;">
                    <span>UKURAN SHEET</span>
                </div>
            </div>

            <div class="row">
                <div class="col col-6 text-center" style="border: 1px solid black; height: 40px; padding-top: 30px;">
                    <span>DW 125K/M4</span>
                </div>
                <div class="col col-3 text-center" style="border: 1px solid black; height: 40px; padding-top: 30px;">
                    <span>712 X 1049</span>
                </div>
                <div class="col col-3 text-center" style="border: 1px solid black; height: 40px; padding-top: 30px;">
                    <span>1500 X 1070</span>
                </div>
            </div>
            <div class="row">
                <div class="col col-8 text-center" style="border: 1px solid black; height: 180px; padding-top: 30px;">
                    
                </div>
                <div class="col col-4 text-center" style="border: 1px solid black; height: 30px; padding-top: 10px;">
                    <span>CETAKAN</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>