@extends('layouts._base')
@section('css')
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
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
        <div class="collapse-form-index-calculator">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>Calculator Index Harga</h4>
                            <hr />
                            <div class="col-sm-12 col-md-6">
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
                                    <label class="col-sm-2 col-form-label">Index Tag</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="index-tag">
                                            <option value="">-</option>
                                            @foreach($tags as $tag)
                                            <option value="{{$tag->tag}}">{{$tag->tag}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Substance</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select-form" id="substance">
                                        </select>
                                        <input type="hidden" id="ply-type">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Harga Index</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="index-price" readonly>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PPN (11%)</label>
                                    <div class="col-sm-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-ppn"
                                                id="inlineRadio2" value="0" checked>
                                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flag-ppn"
                                                id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row pounch">
                                    <label class="col-sm-2 col-form-label">Pounch ?</label>
                                    <div class="col-sm-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-pounch"
                                                id="inlineRadio2" value="0" checked>
                                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-pounch"
                                                id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="pounch" />
                                <div class="form-group row add-price">
                                    <label class="col-sm-2 col-form-label">Jumlah</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="order-qty">
                                        <small id="emailHelp" class="form-text text-danger">* Jumlah Pesanan</small>
                                    </div>
                                </div>
                                <hr class="add-price" />
                                <div class="form-group row add-price">
                                    <label class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="knife-price">
                                        <small id="emailHelp" class="form-text text-danger">* Harga tambahan untuk pisau &
                                            karet.</small>
                                    </div>
                                </div>
                                <hr class="add-price" />
                                <div class="form-group row lem">
                                    <label class="col-sm-2 col-form-label">Tambah Lem ?</label>
                                    <div class="col-sm-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag-lem" value="0"
                                                checked>
                                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flag-lem" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="lem" />
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
                                <hr class="box" />
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
                                <hr class="sheet" />
                                <div class="form-group row sheet">
                                    <label class="col-sm-2 col-form-label">Ukuran</label>
                                    <label class="col-sm-1 col-form-label">L</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="lebar">
                                    </div>
                                    <label class="col-sm-1 col-form-label">P</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="panjang">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row m-3">
                                    <h1 id="hpp" style="font-size: 60px;">HPP = Rp.0</h1>
                                </div>
                                <div class="form-group row">
                                    <button class="btn btn-sm btn-primary" id="calculate-hpp">Hitung Index Harga</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="collapse-form-index">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>Form Index Harga</h4>
                            <hr />
                            <div class="col-md-6">
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
                                        <label class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="index_price">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Index Tag</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="index_tag">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form>
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
                    <h4 class="card-title">Master List Index Harga</h4>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped" id="index-price-table">
                            <thead class="table-primary">
                                <tr>
                                    <th>Ply Type</th>
                                    <th>Flute type</th>
                                    <th>Substance</th>
                                    <th>Price</th>
                                    <th>Index Tag</th>
                                    <th class="text-canter">Action</th>
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
                                    <td class="text-canter">
                                        <a href="{{route('index-price.edit', ['id' => $data->id])}}"><i class="mdi mdi-settings menu-icon" style="font-size: 24px;"></i></a>
                                        <a href="{{route('index-price.delete', ['id' => $data->id])}}"><i class="mdi mdi-delete menu-icon" style="font-size: 24px;"></i></a>
                                    </td>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script>
$(function() {
    // $(".select-form").select2();
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
            $(".lem").hide();
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

    $("#index-tag").change(function() {
        var tag = $(this).val();
        $("#index-price").val("");
        $(".loader").show();
        $.ajax({
            url: '/get-index-substance/' + tag, // Replace with your API endpoint
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var selectBox = $('#substance');
                // Clear existing options
                selectBox.empty();
                // Populate select box with new options
                data.forEach(function(item) {
                    selectBox.append('<option value="' + item.id + '">' + item.ply_type +' '+ item.flute_type +' '+ item.substance_name +'</option>');
                });
                $(".loader").hide();
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    });

    $("#substance").change(function() {
        var substance = $(this).val();
        $(".loader").show();
        $.ajax({
            url: "/get-index-price/" + substance,
            method: "GET",
            success: function(response) {
                console.log(response);
                $("#index-price").val(response.price);
                var ply_type = $("#substance option:selected").text().split(" ");
                
                if($("#jenis-barang").val() === 'sheet' && ply_type[0] === "SF") {
                    $("#ply-type").val(ply_type[0]);
                    $(".lem").show();
                }else{
                    $(".lem").hide();
                }
                
                $(".loader").hide();
            },
            error: function(error) {
                // Handle errors here
                console.error("Error:", error);
            }
        });
    });

    $("#calculate-hpp").click(function() {
        var measure_unit = $("#satuan-ukuran").val();
        var jenis_fly = $("#ply-type").val();
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

            if ($('input[name=flag-pounch]:checked').val() === "1" || $('input[name=flag-pounch]:checked').val() === 1) {
                var order_qty = parseFloat($("#order-qty").val());
                var knife_price = parseFloat($("#knife-price").val());

                var additional_price = knife_price / order_qty;
                var index_price = index_price + additional_price;
            } 

            if (jenis_fly === "SF" && flag_lem === "1") {
                var index_price = index_price + 2500;

                console.log("Index Price After + 2500 : " + index_price)
            }

            if ($('input[name=flag-ppn]:checked').val() === "1" || $('input[name=flag-ppn]:checked').val() === 1) {
                var hpp_before_ppn = (length * width * index_price) / 10000;
                var hpp = ((hpp_before_ppn / 100) * 11) + hpp_before_ppn;
            } else {
                var hpp = (length * width * index_price) / 10000;
            }

            $("#hpp").text("HPP = Rp." + formatNumberWithCommas(Math.ceil(hpp)));
        } else {
            $(".lem").hide();
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

            if ($('input[name=flag-ppn]:checked').val() === "1" || $('input[name=flag-ppn]:checked').val() === 1) {
                var hpp_before_ppn = (A * B * index_price) / 10000;
                var hpp = ((hpp_before_ppn / 100) * 11) + hpp_before_ppn;
            } else {
                var hpp = (A * B * index_price) / 10000;
            }

            $("#hpp").text("HPP = Rp." + formatNumberWithCommas(Math.ceil(hpp)));
        }
    });

    function formatNumberWithCommas(number) {
      return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
});

$("#add").click(function() {
    $(".collapse-form-index").slideToggle("slow");
});

$("#calc-index-price").click(function() {
    $(".collapse-form-index-calculator").slideToggle("slow");
});
</script>
@endsection