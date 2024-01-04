@extends('layouts._base')
@section('main-content')
<div class="content-wrapper pb-0">
    <!-- first row starts here -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <form method="POST" action="{{route('sales.detail.save')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">PO Customer (Detail Sales Order)</h3>
                        <hr />
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label"><b>Informasi Barang</b></label>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Nama Barang</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="goods_name" id="name">
                                        <input type="hidden" class="form-control" name="sales_order_id" value="{{$id}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="goods_type" id="jenis-barang">
                                            <option value="">-</option>
                                            <option value="1">Sheet</option>
                                            <option value="2">Box</option>
                                            <option value="3">Box (Badan + Tutup)</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Jumlah</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="quantity" id="jumlah">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Harga</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="price" id="harga-satuan" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 form-non-badan-tutup">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label"><b>Spesifikasi</b></label>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis Ply</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="ply_type" id="jenis-ply">
                                            <option value="">-</option>
                                            <option value="SF">Single Face (SF)</option>
                                            <option value="SW">Single Wall (SW)</option>
                                            <option value="DW">Double Wall (DW)</option>
                                            <option value="TW">Triple Wall (TW)</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis flute</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="flute_type" id="tipe-flute">
                                            <option value="">-</option>
                                            <option value="BF">B/F</option>
                                            <option value="CF">C/F</option>
                                            <option value="EF">E/F</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Substance</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="substance" id="substance">
                                            <option value="">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->id}}">{{$substance->substance}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-3 form-non-badan-tutup">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label"><b>Ukuran</b></label>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Satuan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="measurement_unit" id="satuan-ukuran">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="measurement_type" id="jenis-ukuran">
                                            <option value="">-</option>
                                            <option value="UD">Ukuran Dalam</option>
                                            <option value="UL">Ukuran Luar</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row form-ukuran-box-non-badan-tutup">
                                    <label class="col-sm-1 col-form-label">P</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="length" id="panjang">
                                    </div>
                                    <label class="col-sm-1 col-form-label">L</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="width" id="lebar">
                                    </div>
                                    <label class="col-sm-1 col-form-label">T</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="height" id="tinggi">
                                    </div>
                                </div>
                                <div class="form-group row form-ukuran-sheet-non-badan-tutup">
                                    <label class="col-sm-1 col-form-label">P</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="" id="panjang">
                                    </div>
                                    <label class="col-sm-1 col-form-label">L</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="lebar">
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-3 form-badan-tutup">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label"><b>Spesifikasi (Badan)</b></label>
                                </div>
                                <hr />
                                <div class="form-group row box">
                                    <label class="col-sm-4 col-form-label">Jenis Fly</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="jenis-ply">
                                            <option value="">-</option>
                                            <option value="SF">Single Face (SF)</option>
                                            <option value="SW">Single Wall (SW)</option>
                                            <option value="DW">Double Wall (DW)</option>
                                            <option value="TW">Triple Wall (TW)</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row box">
                                    <label class="col-sm-4 col-form-label">Jenis flute</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="tipe-flute">
                                            <option value="">-</option>
                                            <option value="BF">B/F</option>
                                            <option value="CF">C/F</option>
                                            <option value="EF">E/F</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row box">
                                    <label class="col-sm-4 col-form-label">Substance</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="substance">
                                            <option value="">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->id}}">{{$substance->substance}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row box">
                                    <label class="col-sm-12 col-form-label"><b>Ukuran (Badan)</b></label>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Satuan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="satuan_ukuran">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row box">
                                    <label class="col-sm-1 col-form-label">P</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="panjang">
                                    </div>
                                    <label class="col-sm-1 col-form-label">L</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="lebar">
                                    </div>
                                    <label class="col-sm-1 col-form-label">T</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="tinggi">
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-3 form-badan-tutup">
                                <div class="row">
                                    <label class="col-sm-12 col-form-label"><b>Spesifikasi (Tutup)</b></label>
                                </div>
                                <hr />
                                <div class="form-group row sheet">
                                    <label class="col-sm-4 col-form-label">Jenis ply</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="jenis-ply">
                                            <option value="">-</option>
                                            <option value="SF">Single Face (SF)</option>
                                            <option value="SW">Single Wall (SW)</option>
                                            <option value="DW">Double Wall (DW)</option>
                                            <option value="TW">Triple Wall (TW)</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row sheet">
                                    <label class="col-sm-4 col-form-label">Jenis flute</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="tipe-flute">
                                            <option value="">-</option>
                                            <option value="BF">B/F</option>
                                            <option value="CF">C/F</option>
                                            <option value="EF">E/F</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row sheet">
                                    <label class="col-sm-4 col-form-label">Substance</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="substance">
                                            <option value="">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->id}}">{{$substance->substance}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row sheet">
                                    <label class="col-sm-12 col-form-label"><b>Ukuran (Tutup)</b></label>
                                </div>
                                <hr />
                                <div class="form-group row sheet">
                                    <label class="col-sm-4 col-form-label">Satuan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="satuan_ukuran">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row sheet">
                                    <label class="col-sm-1 col-form-label">P</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="panjang">
                                    </div>
                                    <label class="col-sm-1 col-form-label">L</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="lebar">
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label"><b>Finishing</b></label>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Finishing</label>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag_finishing"
                                                id="inlineRadio1" value="1">Ya
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag_finishing"
                                                id="inlineRadio2" value="0" checked>Tidak
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row form-param-check">
                                    <label class="col-sm-4 col-form-label">Options</label>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline check-param">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Polos</label>
                                        </div>
                                        <div class="form-check form-check-inline check-param">
                                            <input class="form-check-input" type="checkbox" id="" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Print</label>
                                        </div>
                                        <div class="form-check form-check-inline check-param">
                                            <input class="form-check-input" type="checkbox" id="pounch" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Pounch</label>
                                        </div>
                                    </div>
                                    <hr />
                                    <!-- <div class="form-group row form-attachment">
                                        <label class="col-sm-4 col-form-label">Attch</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="inputGroupFile02">
                                        </div>
                                    </div>
                                    <hr class="form-attachment" /> -->
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Remarks</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" name="remarks" id="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="page-header flex-wrap">
                                <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">

                                </div>
                                <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                                    <button type="submit" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text"><i
                                            class="mdi mdi-plus-circle"></i> Confirm & Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- chart row starts here -->
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

    $('input[name=flag_finishing]').change(function() {
        if ($('input[name=flag_finishing]:checked').val() === "1" || $(
                'input[name=flag_finishing]:checked').val() === 1) {
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