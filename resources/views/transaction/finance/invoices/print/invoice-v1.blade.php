<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$invoice->invoice_no}}</title>
    <style>
    /* Container */
    .container {
        width: 100%;
        max-width: 1200px;
        font-size: 13px;
        font-weight: bold;
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

    /* table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid black;
    } */
    </style>
</head>

<body>
    <div class="containe" style="margin: 0;">
        <div style="margin: 0;">
            <div class="row" style="border-bottom: 2px solid black;margin: 0;">
                <div class="col col-3">

                </div>
                <div class="col col-6">
                    <h1 style="text-align: center">PT. BIMETA KARNUSA</h1>
                </div>
                <div class="col col-3">
                </div>
            </div>
            <div class="row">
                <div class="col col-4">

                </div>
                <div class="col col-4">
                    <h3 style="text-align: center">FAKTUR PENJUALAN</h3>
                </div>
                <div class="col col-4">
                    <p>Nomor Faktur : {{$invoice->invoice_no}}</p>
                    <p>Nomor P.O : {{$invoice->ref_po_customer}}</p>
                    <p>Tanggal : <?php echo date("d/m/Y", strtotime($invoice->date)) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="border: 1px solid black;">
        <div style="margin: 10px;">
            <div class="row">
                <div class="col col-4">
                    <p id="text">PEMBELI / PENERIMA</p>
                    <p>Nama : {{$invoice->customer_name}}</p>
                    <p>Alamat : {{$invoice->address}}</p>
                </div>
                <div class="col col-4">

                </div>
                <div class="col col-4">

                </div>
            </div>
        </div>
        <table style="width: 100%;border: 1px solid black;border-collapse: collapse;border: 1px solid black;">
            <thead>
                <tr style="padding: 8px;">
                    <th style="border: 1px solid black; padding: 5px;">No.</th>
                    <th style="border: 1px solid black; text-align: center;">Nama Barang / Jasa Kenaikan Pajak</th>
                    <th style="border: 1px solid black; text-align: center">Qty</th>
                    <th style="border: 1px solid black; text-align: center">Harga Satuan Rp.</th>
                    <th style="border: 1px solid black; text-align: center;">Harga Jual Rp.</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach($detailInvoice as $detail)
                <tr>
                    <td style="border: 1px solid black; padding: 5px;text-align: center"><?php echo $no++; ?>.</td>
                    <td style="border: 1px solid black; text-align: center; padding: 10px;">{{$detail->goods_name}} UK : {{$detail->measure}}</td>
                    <td style="border: 1px solid black; text-align: center; padding: 10px;" class="quantity">{{$detail->quantity}}</td>
                    <td style="border: 1px solid black; text-align: right; padding: 10px;" class="price">{{$detail->price}}</td>
                    <td style="border: 1px solid black; text-align: right; padding: 10px;" class="total-price">{{$detail->total_price}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="border-bottom: 1px dotted black; padding: 5px;">Jumlah Harga jual /
                        Penggantian uang muka</td>
                    <td style="border-bottom: 1px dotted black;border-left: 1px solid black; text-align: right; padding:10px;">{{$sub_total}}</td>
                </tr>
                <tr>
                    <td colspan="4" style="border-bottom: 1px dotted black; padding: 5px;">Dikurangi Potongan Harga /
                        Uang Muka Yang Telah diterima</td>
                    <td style="border-bottom: 1px dotted black;border-left: 1px solid black; text-align: right; padding:10px;">0,00</td>
                </tr>
                <tr>
                    <td colspan="4" style="border-bottom: 1px dotted black; padding: 5px;">Dasar Pengenaan Pajak</td>
                    <td style="border-bottom: 1px dotted black;border-left: 1px solid black; text-align: right; padding:10px;">0,00</td>
                </tr>
                <tr>
                    <td colspan="4" style="border-bottom: 1px dotted black; padding: 5px;">PPN X 11% X Dasar Pengenaan
                        Pajak</td>
                    <td style="border-bottom: 1px dotted black;border-left: 1px solid black; text-align: right; padding:10px;">{{$tax}}</td>
                </tr>
                <tr>
                    <td colspan="4" style="border: 1px solid black; padding: 5px;text-align: right">TOTAL Rp.</td>
                    <td style="border: 1px solid black; text-align: right; padding:10px;">{{$total_amount}},00</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div style="margin: 5px;font-weight: bold;">
        <div class="row">
            <div class="col col-4">
                <p id="text">Terbilang</p>
            </div>
            <div class="col col-4">

            </div>
            <div class="col col-4">
                <p style="text-align: center;">Bandung, 17/03/2024</p>
                <p style="text-align: center;margin-top: 80px;">(---------------------------------)</p>
            </div>
        </div>
    </div>
    <div style="margin: 5px;font-weight: bold;">
        <div class="row">
            <div class="col col-4">
                <p style="margin: 2px;">Pembayaran di Transfer</p>
                <p style="margin: 2px;">Nama Bank</p>
                <p style="margin: 2px;">Alamat Bank</p>
                <p style="margin: 2px;">No Rekening</p>
                <p style="margin: 2px;">Atas Nama</p>
            </div>
            <div class="col col-4">

            </div>
            <div class="col col-4">
                
            </div>
        </div>
    </div>
</body>

</html>