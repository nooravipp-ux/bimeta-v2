@extends('layouts._base')
@section('css')
<style>
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 9999;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
@endsection
@section('main-content')
<div class="content-wrapper pb-0">
    <!-- first row starts here -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="page-header flex-wrap">
                        <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title">PO Customer (Sales Order)</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title">{{$salesOrder->transaction_no}}</h4>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ref. PO Customer</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="ref_po_customer" value="{{$salesOrder->ref_po_customer}}">
                                    <input type="hidden" class="form-control" name="id" value="{{$salesOrder->id}}">
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="customer_id">
                                        @foreach($customers as $customer)
                                        <option value="{{$customer->id}}" <?php echo ($customer->id == $salesOrder->customer_id) ? 'selected': '';?> >{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Order Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="order_date"
                                        value="{{$salesOrder->order_date}}">
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Delivery Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="delivery_date"
                                        value="{{$salesOrder->delivery_date}}">
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tax Type</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="jenis_pajak">
                                        <option value="v0" <?php echo ($salesOrder->tax_type == 'v0') ? 'selected': '';?>>V0</option>
                                        <option value="v1" <?php echo ($salesOrder->tax_type == 'v1') ? 'selected': '';?>>V1</option>
                                        <option value="v2" <?php echo ($salesOrder->tax_type == 'v2') ? 'selected': '';?>>V2</option>
                                    </select>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Assign To</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="pic">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" <?php echo ($salesOrder->assign_to == $user->id) ? 'selected': '';?>>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Attachment</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="attachment">
                                    <!-- <small class="form-text text-muted"><a href="javascript:encodeBase64Pdf('{{$salesOrder->attachment}}')">Click to open the file</a></small> -->
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Remarks</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="remarks"
                                        value="{{$salesOrder->remarks}}">
                                </div>
                            </div>
                            <hr />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- chart row starts here -->

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="page-header flex-wrap">
                        <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title">PO Customer (Detail Sales Order)</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <a href="{{route('sales.detail.create', ['id' => $salesOrder->id])}}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                                <i class="mdi mdi-plus-circle"></i> Add Detail</a>
                        </div>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th>Name</th>
                                    <th>Spesification</th>
                                    <th>Mess</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailSalesOrders as $detail)
                                <tr>
                                    <td>{{$detail->goods_name}}</td>
                                    <td>{{$detail->specification}}</td>
                                    <td>{{$detail->measure}}</td>
                                    <td>{{$detail->quantity}}</td>
                                    <td class="text-center"><a href="" title="Edit"><i class="mdi mdi-settings menu-icon"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function() {
    $(".loader").hide();
    $(".form-flag-badan-tutup").hide();
    $(".form-badan-tutup").hide();
    $(".form-ukuran-tutup").hide();
    $(".form-param-check").hide();
    $(".form-ukuran-sheet-non-badan-tutup").hide();

    $('#openModalBtn').click(function() {
        $('#myModal').show();
    });

    $('#closeModalBtn').click(function() {
        $('#myModal').hide();
    });

    $(window).click(function(event) {
        if (event.target == $('#myModal')[0]) {
            $('#myModal').hide();
        }
    });

    $("#jenis-barang").change(function() {
        if ($(this).val() === "sheet") {
            $("#form-tinggi").hide();
            $(".form-flag-badan-tutup").hide();
            $(".form-badan-tutup").hide();
            $(".form-non-badan-tutup").show();
            $(".form-ukuran-sheet-non-badan-tutup").show();
            $(".form-ukuran-box-non-badan-tutup").hide();
        } else {
            $("#form-tinggi").show();
            $(".form-flag-badan-tutup").show();
            $(".form-ukuran-box-non-badan-tutup").show();
            $(".form-ukuran-sheet-non-badan-tutup").hide();
        }
    });

    $(".form-attachment").hide();
    $("#pounch").change(function() {
        if (this.checked) {
            $(".form-attachment").show();
        } else {
            $(".form-attachment").hide();
        }
    });

    $('input[name=flag-badan-tutup]').change(function() {
        if ($('input[name=flag-badan-tutup]:checked').val() === "1" || $(
                'input[name=flag-badan-tutup]:checked').val() === 1) {
            $(".form-badan-tutup").show();
            $(".form-non-badan-tutup").hide();
        } else {
            $(".form-badan-tutup").hide();
            $(".form-non-badan-tutup").show();
        }
    });

    $('input[name=flag-finishing]').change(function() {
        if ($('input[name=flag-finishing]:checked').val() === "1" || $(
                'input[name=flag-finishing]:checked').val() === 1) {
            $(".form-param-check").show();
        } else {
            $(".form-param-check").hide();
        }
    });

    $("#add-detail").click(function() {

        // Infromasi Barang
        var name = $("#name").val();
        var goods_type = $("#jenis-barang").val();
        var quantity = $("#jumlah").val();
        var price = $("#harga-satuan").val();

        if ($('input[name=flag-badan-tutup]:checked').val() === "1" || $(
                'input[name=flag-badan-tutup]:checked').val() === 1) {
            // Spesifikasi box (Badan Tutup)
            var box_ply_type = $(".form-badan-tutup .box #jenis-ply").val();
            var box_flute_type = $(".form-badan-tutup .box #tipe-flute").val();
            var box_substance = $(".form-badan-tutup .box #substance").val();

            var box_measure_unit = $(".form-badan-tutup .box #satuan-ukuran").val();
            // var box_measure_type = $(".form-badan-tutup .box #jenis-ukuran").val();

            // Spesifikasi sheet (Badan Tutup)
            var sheet_ply_type = $(".form-badan-tutup .sheet #jenis-ply").val();
            var sheet_flute_type = $(".form-badan-tutup .sheet #tipe-flute").val();
            var sheet_substance = $(".form-badan-tutup .sheet #substance").val();

            var sheet_measure_unit = $(".form-badan-tutup .box #satuan-ukuran").val();
            // var sheet_measure_type = $(".form-non-badan-tutup .box #jenis-ukuran").val();

            var box_length = $(".form-badan-tutup .box #panjang").val();
            var box_width = $(".form-badan-tutup .box #lebar").val();
            var box_height = $(".form-badan-tutup .box #tinggi").val();

            var sheet_length = $(".form-badan-tutup .sheet #panjang").val();
            var sheet_width = $(".form-badan-tutup .sheet #lebar").val();

            var string_spesification = "BADAN :" + box_ply_type + " " + box_flute_type + " " +
                box_substance + " <br/> TUTUP : " + sheet_ply_type + " " + sheet_flute_type + " " +
                sheet_substance;
            var string_measure = "BADAN :" + box_length + " X " + box_width + " X " + box_height +
                " <br/>TUTUP : " + sheet_length + " X " + sheet_width;
        } else {
            // Spesifikasi box - sheet (Non Badan Tutup)
            var ply_type = $(".form-non-badan-tutup #jenis-ply").val();
            var flute_type = $(".form-non-badan-tutup #tipe-flute").val();
            var substance = $(".form-non-badan-tutup #substance").val();

            var string_spesification = ply_type + " " + flute_type + " " + substance;

            var measure_unit = $(".form-non-badan-tutup #satuan-ukuran").val();
            var measure_type = $(".form-non-badan-tutup #jenis-ukuran").val();

            if (goods_type === "sheet") {
                // Ukuran sheet (Non Badan Tutup)
                var length = $(".form-non-badan-tutup .form-ukuran-sheet-non-badan-tutup #panjang")
                    .val();
                var width = $(".form-non-badan-tutup .form-ukuran-sheet-non-badan-tutup #lebar").val();
                var string_measure = length + " X " + width;
            } else {
                // Ukuran box (Non Badan Tutup)
                var length = $(".form-non-badan-tutup .form-ukuran-box-non-badan-tutup #panjang").val();
                var width = $(".form-non-badan-tutup .form-ukuran-box-non-badan-tutup #lebar").val();
                var height = $(".form-non-badan-tutup .form-ukuran-box-non-badan-tutup #tinggi").val();
                var string_measure = length + " X " + width + " X " + height;
            }
        }

        var total_price = parseFloat(quantity) * parseFloat(price);

        var rowCount = parseInt($("table tbody tr").length) + 1;

        var tableRow = '<tr id="row-' + parseInt(rowCount) + '">' +
            '<td>' + name + '</td>' +
            '<td>' + string_spesification + '</td>' +
            '<td>' + string_measure + '</td>' +
            '<td>' + price + '</td>' +
            '<td>' + quantity + '</td>' +
            '<td style="text-align: right" class="total-harga">' + parseFloat(total_price) + '</td>' +
            '</tr>';
        $("table tbody").append(tableRow);
        calculate();
        clearForm();
        $('#myModal').hide();
    });

    $('.delete-row').on('click', function() {
        // Find the closest <tr> ancestor and remove it
        $(this).closest('tr').remove();
    });

    $("#confirm-save").click(function() {
        var jsonData = [];

        $('table tbody tr').each(function() {
            var rowData = {};

            rowData.kode_barang = $(this).find('td:eq(1)').text(); // Kolom 1
            rowData.spesifikasi = $(this).find('td:eq(3)').text(); // Kolom 2
            rowData.ukuran = $(this).find('td:eq(4)').text(); // Kolom 1
            rowData.harga_satuan = parseInt($(this).find('td:eq(5)').text()); // Kolom 2
            rowData.jumlah = parseInt($(this).find('td:eq(6)').text()); // Kolom 2
            jsonData.push(rowData);
        });

        var jsonString = JSON.stringify(jsonData);

        console.log(jsonString);
    });

    function calculate() {
        var totalHarga = 0;
        $('table tbody tr .total-harga').each(function() {
            totalHarga += parseInt($(this).text()) || 0;
        });
        $("#sub-total").text(totalHarga);
        $("#pajak").text(parseFloat(totalHarga * 11 / 100));
        $("#grand-total").text(totalHarga + parseFloat(totalHarga * 11 / 100));
    }

    function clearForm() {
        // Infromasi Barang
        $("#name").val("");
        $("#jenis-barang").val("");
        $("#jumlah").val("");
        $("#harga-satuan").val("");

        // Spesifikasi
        $("#jenis-bahan").val("");
        $("#tipe-flute").val("");
        $("#spec-kraft").val("");
        $("#spec-medium").val("");

        //Ukuran
        $("#panjang").val("");
        $("#lebar").val("");
        $("#tinggi").val("");
    }

    function encodeBase64Pdf(base64EncodedData) {
        // Decode Base64
        var binaryData = atob(base64EncodedData);

        // Convert binary data to Uint8Array
        var uint8Array = new Uint8Array(binaryData.length);
        for (var i = 0; i < binaryData.length; i++) {
            uint8Array[i] = binaryData.charCodeAt(i);
        }

        // Create a Blob from Uint8Array
        var blob = new Blob([uint8Array], {
            type: 'application/pdf'
        });

        // Create a data URL from the Blob
        var dataUrl = URL.createObjectURL(blob);

        // Open the PDF in a new tab or window
        window.open(dataUrl, '_blank');
    }
});
</script>
@endsection