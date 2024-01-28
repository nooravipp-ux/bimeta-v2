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
        /* Customize the max width as needed */
        margin: 0 auto;
        /* padding-right: 15px;
        padding-left: 15px; */
        padding: 0 15px;
        font-size: 14px;
        box-sizing: border-box;
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

    table th {
        border: 1px solid #ddd;
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
    <div class="container">
        <div class="row">
            <div class="col col-8">
                <div class="row">
                    <div class="col col-12">
                        
                    </div>
                </div>
            </div>
            <div class="col col-4">
                <div class="row">
                    <div class="col col-12">
                        <p>Bandung,  {{$deliveryOrder->delivery_date}}</p>
                        <p>{{$deliveryOrder->customer_name}}</p>
                        <p>{{$deliveryOrder->shipping_address}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th class="text-center">QTY</th>
                        <th>JENIS BARANG / UKURAN</th>
                        <th>KETERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($detailDeliveryOrder as $do)
                    <tr>
                        <td class="text-center">{{$do->quantity}}</td>
                        <td>
                            <div>{{$do->goods_name}}</div>
                            <div>UK : {{$do->measure}}</div>
                        </td>
                        <td>{{$do->specification}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>