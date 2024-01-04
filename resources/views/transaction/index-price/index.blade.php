@extends('layouts._base')
@section('css')

@endsection
@section('main-content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <button class="btn btn-primary mb-2 mb-md-0 me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Index Price Calculator" id="calc-index-price"><i class="mdi mdi-calculator"></i> </button>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" id="add"><i
                    class="mdi mdi-plus-circle"></i>
                Add</button>
        </div>
    </div>

    <div class="row">
        <div class="collapse-form-index">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h3>Form Index Price</h3>
                            <hr />
                            <div class="col-md-8">
                                <form method="POST" action="{{route('index-price.save')}}">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Ply</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="ply_type">
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
                                        <label class="col-sm-2 col-form-label">Jenis Flute</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="flute_type">
                                                <option value="">-</option>
                                                <option value="BC">B Flute</option>
                                                <option value="BC">C Flute</option>
                                                <option value="B/C">B/C Flute</option>
                                                <option value="E">E Flute</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Substance</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="substance">
                                                <option value="">-</option>
                                                @foreach($substances as $substance)
                                                <option value="{{$substance->id}}">{{$substance->substance}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Index Harga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="index_price">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Index Year</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="index_tag">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row mb-5">
                                        <button type="submit" class="col-sm-2 btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="collapse-form-index-calculator">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h3>Calculator Index</h3>
                            <hr />
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="jenis-barang">
                                            <option value="">-</option>
                                            <option value="sheet">SHEET</option>
                                            <option value="box">BOX</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Ply</label>
                                    <div class="col-sm-10">
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
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Flute</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="tipe-flute">
                                            <option value="">-</option>
                                            <option value="BC">B Flute</option>
                                            <option value="BC">C Flute</option>
                                            <option value="B/C">B/C Flute</option>
                                            <option value="E">E Flute</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Substance</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="substance">
                                            <option value="">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->id}}">{{$substance->substance}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Index Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="index-price" readonly>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PPN (11%)</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-ppn"
                                                id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-ppn"
                                                id="inlineRadio2" value="0" checked>
                                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group row pounch">
                                    <label class="col-sm-2 col-form-label">Tambah Pounch ?</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-pounch"
                                                id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-pounch"
                                                id="inlineRadio2" value="0" checked>
                                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="pounch"/>
                                <div class="form-group row add-price">
                                    <label class="col-sm-2 col-form-label">Jumlah Pesanan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="qty_order">
                                    </div>
                                </div>
                                <hr class="add-price"/>
                                <div class="form-group row add-price">
                                    <label class="col-sm-2 col-form-label">Harga Tambahan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="additional_price">
                                        <small id="emailHelp" class="form-text text-muted">*Harga tambahan untuk pisau &
                                            karet.</small>
                                    </div>
                                </div>
                                <hr class="add-price"/>
                                <div class="form-group row lem">
                                    <label class="col-sm-2 col-form-label">Tambah Lem ?</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-lem" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-lem" value="0"
                                                checked>
                                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="lem"/>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="satuan-ukuran">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="box"/>
                                <div class="form-group row box">
                                    <label class="col-sm-2 col-form-label">Ukuran</label>
                                    <label class="col-sm-1 col-form-label">P</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="panjang">
                                    </div>
                                    <label class="col-sm-1 col-form-label">L</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="lebar">
                                    </div>
                                    <label class="col-sm-1 col-form-label">T</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="tinggi">
                                    </div>
                                </div>
                                <hr class="sheet"/>
                                <div class="form-group row sheet">
                                    <label class="col-sm-2 col-form-label">Ukuran</label>
                                    <label class="col-sm-1 col-form-label">P</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="panjang">
                                    </div>
                                    <label class="col-sm-1 col-form-label">L</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="lebar">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <h1 id="hpp" style="font-size: 60px;">HPP = Rp.0</h1>
                                </div>
                                <div class="form-group row">
                                    <button class="btn btn-sm btn-primary" id="calculate-hpp">Hitung Index
                                        Harga</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- first row starts here -->
    <div class="row" id="table-content">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Index Price</h4>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th>Ply Type</th>
                                    <th>Flute type</th>
                                    <th>Substance</th>
                                    <th>Price</th>
                                    <th>Index Tag</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$data->ply_type}}</td>
                                    <td>{{$data->flute_type}}</td>
                                    <td>{{$data->substance}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>{{$data->tag}}</td>
                                    <td><i class="mdi mdi-border-color"></i><i class="mdi mdi-delete"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- chart row starts here -->
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(function() {
    $(".collapse-form-index").hide();
    $(".collapse-form-index-calculator").hide();
    $(".loader").hide();

    // Form Calkulator Index Price
    $(".sheet").hide();
    $(".box").hide();
    $(".pounch").hide();
    $(".lem").hide();

    $("#jenis-barang").change(function() {
        if ($(this).val() === "sheet") {
            $(".sheet").show();
            $(".box").hide();
            $(".pounch").show();
        } else {
            $(".box").show();
            $(".sheet").hide();
            $(".pounch").hide();
            $(".add-price").hide();
        }
    });

    $("#jenis-ply").change(function() {
        if ($(this).val() === "SF") {
            $(".lem").show();
        } else {
            $(".lem").hide();
        }
    });

    $(".add-price").hide();

    $('input[name=flag-pounch]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $(".add-price").show();
        } else {
            $(".add-price").hide();
        }
    });

    $("#substance").change(function() {
        var substance = $(this).val();
        var flute_type = $("#tipe-flute").val();
        $.ajax({
            url: "/get-index-price/" + flute_type + "/" + substance,
            method: "GET",
            success: function(response) {
                $("#index-price").val(response.price);
            },
            error: function(error) {
                // Handle errors here
                console.error("Error:", error);
            }
        });
    });

    $("#calculate-hpp").click(function() {
        var measure_unit = $("#satuan-ukuran").val();
        var jenis_fly = $("#jenis-ply").val();
        var flag_lem = $('input[name=flag-lem]:checked').val();
        if ($("#jenis-barang").val() === "sheet") {
            switch (measure_unit) {
                case "INCH":
                    var length = parseFloat($(".sheet #panjang").val()) * 25.4;
                    var width = parseFloat($(".sheet #lebar").val()) * 25.4;
                    break;
                case "MM":
                    var length = parseFloat($(".sheet #panjang").val()) / 10;
                    var width = parseFloat($(".sheet #lebar").val()) / 10;
                    break;
                default:
                    var length = parseFloat($(".sheet #panjang").val());
                    var width = parseFloat($(".sheet #lebar").val());
                    break;
            }

            var index_price = parseFloat($("#index-price").val());

            if (jenis_fly === "SF" && flag_lem === 1) {
                var index_price = index_price + 2500;
            }

            if ($('input[name=flag-ppn]:checked').val() === "1" || $('input[name=flag-ppn]:checked')
                .val() === 1) {
                var hpp_before_ppn = (length * width * index_price) / 10000;
                var hpp = ((hpp_before_ppn / 100) * 11) + hpp_before_ppn;
            } else {
                var hpp = (length * width * index_price) / 10000;
            }

            $("#hpp").text("HPP = Rp." + parseInt(hpp));
        } else {
            switch (measure_unit) {
                case "INCH":
                    var length = parseFloat($(".box #panjang").val()) * 25.4;
                    var width = parseFloat($(".box #lebar").val()) * 25.4;
                    var height = parseFloat($(".box #tinggi").val()) * 25.4;
                    break;
                case "MM":
                    var length = parseFloat($(".box #panjang").val()) / 10;
                    var width = parseFloat($(".box #lebar").val()) / 10;
                    var height = parseFloat($(".box #tinggi").val()) / 10;
                    break;
                default:
                    var length = parseFloat($(".box #panjang").val());
                    var width = parseFloat($(".box #lebar").val());
                    var height = parseFloat($(".box #tinggi").val());
                    break;
            }
            var index_price = parseFloat($("#index-price").val());
            var A = (length + width) * 2 + 8;
            var B = width + height + 4;

            if ($('input[name=flag-ppn]:checked').val() === "1" || $('input[name=flag-ppn]:checked')
                .val() === 1) {
                var hpp_before_ppn = (A * B * index_price) / 10000;
                var hpp = ((hpp_before_ppn / 100) * 11) + hpp_before_ppn;
            } else {
                var hpp = (A * B * index_price) / 10000;
            }

            $("#hpp").text("HPP = Rp." + parseInt(hpp));
        }
    });
});

$("#add").click(function() {
    $(".collapse-form-index").slideToggle("slow");
});

$("#calc-index-price").click(function() {
    $(".collapse-form-index-calculator").slideToggle("slow");
});
</script>
@endsection