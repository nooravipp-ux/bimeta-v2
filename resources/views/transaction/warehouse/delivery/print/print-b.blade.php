<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$deliveryOrder->travel_permit_no}}</title>
    <style>
    /* Container */
    .container {
        width: 100%;
        max-width: 1200px;
        font-size: 14px;
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
        border: 1px solid black;
        font-weight: bold;
    }

    table th {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    table td {
        padding: 8px;
        text-align: left;
    }

    /* Responsive Columns */
    @media screen and (max-width: 768px) {
        .col {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="container" style="border: 1px solid black;">
        <div style="margin: 10px;">
            <div class="row text-center">
                <h3>SURAT JALAN</h3>
            </div>
            <div class="row">
                <div class="col col-4">
                    <div class="row">
                        <div class="col col-12">
                            <p>PT. BIMETA KARNUSA BANDUNG</p>
                        </div>
                    </div>
                </div>
                <div class="col col-4">

                </div>
                <div class="col col-4">
                    <div class="row">
                        <div class="col col-12">
                            <p>NO. {{$deliveryOrder->travel_permit_no}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-8">
                    <div class="row">
                        <div class="col col-12">
                            <p>DO NO. & Tgl : {{$deliveryOrder->travel_permit_no}} /
                                <?php echo date("d M Y", strtotime($deliveryOrder->delivery_date)); ?></p>
                            <p>PO NO. & Tgl : {{$deliveryOrder->ref_po_customer}}</p>
                        </div>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="row">
                        <div class="col col-12">
                            <p>Kepada Yth : </p>
                            <p>{{$deliveryOrder->customer_name}}</p>
                            <p>{{$deliveryOrder->shipping_address}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-12">
                    <p>Bersama kendaraan dengan Nopol <strong> {{$deliveryOrder->licence_plate}} </strong>, kami kirim barang - barang tersebut dibawah ini :</p>
                </div>
            </div>
            <div class="row">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center">NO.</th>
                            <th>JENIS BARANG / UKURAN</th>
                            <th class="text-center">QTY</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($detailDeliveryOrder as $do)
                        <tr>
                            <td class="text-center"><?php echo $no++.'.'; ?></td>
                            <td>
                                <div>{{$do->goods_name}}</div>
                                <div>UK : {{$do->measure}}</div>
                            </td>
                            <td class="text-center">{{$do->quantity}}</td>
                            <td>{{$do->specification}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <p>Atas nama perusahaan kami telah menerima barang - barang tersebut dengan baik dan benar.</p>
            </div>
            <div class="row" style="border: 1px solid black;">
                <div class="col col-4 text-center">
                    <p>Diterima Tgl ......................</p>

                    <p style="margin-top: 100px;">(---------------------------------)</p>
                    <p>Nama Terang & Stempel Perusahaan</p>
                </div>
                <div class="col col-4 text-center">
                    <p>Pengemudi</p>
                    <p style="margin-top: 100px;">(---------------------------------)</p>
                    <p>Nama Terang</p>
                </div>
                <div class="col col-4 text-center">
                    <p>Dibuat Tgl, <?php echo date("d M Y", strtotime($deliveryOrder->delivery_date)); ?></p>
                    <p style="margin-top: 100px;">(---------------------------------)</p>
                    <p>Nama Terang</p>
                </div>
            </div>
            <div class="row">
                <p>Catatan : Barang - barang yang keluar dari gudang diluar tanggung jawab pengirim. Lembar asli dari
                    surat
                    jalan ini harap dikirim kembali ke pengirim dalam waktu
                    3 (Tiga) hari sejak tanggal penerimaan barang. Hak kepemilikan barang - barang tersebut tetap pada
                    kami.
                </p>
            </div>
        </div>
    </div>
</body>

</html>