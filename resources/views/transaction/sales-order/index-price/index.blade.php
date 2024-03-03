@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Sales Order</li>
<li class="breadcrumb-item active" aria-current="page">Kalkulator Index Harga</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4 2xl:col-span-4">
            <!-- BEGIN: Horizontal Form -->
            <div class="intro-y box mt-5" id="calc-index">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Kalkulator Index Harga
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <div class="preview">
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-30">Jenis Barang</label>
                            <select data-placeholder="Pilih Jenis Barang" class="tom-select w-full form-control" id="jenis-barang">
                                <option value="">-</option>
                                <option value="sheet">SHEET</option>
                                <option value="box">BOX</option>
                            </select>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Index Tag</label>
                            <select data-placeholder="Pilih Index Tag" class="tom-select w-full form-control"
                                id="index-tag">
                                <option value="">-</option>
                                @foreach($tags as $tag)
                                <option value="{{$tag->tag}}"><?php echo date("d M Y", strtotime($tag->tag)); ?>
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-2" class="form-label sm:w-20">Substance</label>
                            <select data-placeholder="Pilih Substance" class="form-control" id="substance">

                            </select>
                            <input type="hidden" id="ply-type">
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="form-label sm:w-20">Harga Index</label>
                            <input type="text" class="form-control" id="index-price" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="form-label sm:w-20">PPN (11%)</label>
                            <div class="flex flex-col sm:flex-row">
                                <div class="form-check mr-2">
                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag-ppn"
                                        value="0" checked>
                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                </div>
                                <div class="form-check mr-2 sm:mt-0">
                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag-ppn"
                                        value="1">
                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-inline mt-5 pounch">
                            <label for="vertical-form-1" class="form-label sm:w-20">Pounch</label>
                            <div class="flex flex-col sm:flex-row">
                                <div class="form-check mr-2">
                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag-pounch"
                                        value="0" checked>
                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                </div>
                                <div class="form-check mr-2 sm:mt-0">
                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag-pounch"
                                        value="1">
                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-inline mt-5" id="form-lem">
                            <label for="vertical-form-1" class="form-label sm:w-20">Lem</label>
                            <div class="flex flex-col sm:flex-row">
                                <div class="form-check mr-2">
                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag-lem"
                                        value="0" checked>
                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                </div>
                                <div class="form-check mr-2 sm:mt-0">
                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag-lem"
                                        value="1">
                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-inline mt-5 add-price">
                            <label for="vertical-form-1" class="form-label sm:w-20">Jumlah Pesanan</label>
                            <input type="number" class="form-control" id="order-qty">
                        </div>
                        <div class="form-inline mt-5 add-price">
                            <label for="vertical-form-1" class="form-label sm:w-20">Harga (Pisau & Karet)</label>
                            <input type="number" class="form-control" id="knife-price">
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Satuan</label>
                            <select data-placeholder="Pilih Satuan Ukuran" class="tom-select w-full form-control"
                                name="satuan-ukuran">
                                <option value="">-</option>
                                <option value="INCH">INCH</option>
                                <option value="MM">MM</option>
                                <option value="CM">CM</option>
                            </select>
                        </div>
                        <div class="form-inline mt-5 form-box">
                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="text" class="form-control col-span-4" placeholder="P" id="length">
                                <input type="text" class="form-control col-span-4" placeholder="L" id="width">
                                <input type="text" class="form-control col-span-4" placeholder="T" id="height">
                            </div>
                        </div>
                        <div class="form-inline mt-5 form-sheet">
                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="text" class="form-control col-span-6" placeholder="P" id="length">
                                <input type="text" class="form-control col-span-6" placeholder="L" id="width">
                            </div>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="form-label sm:w-20">Harga (Rp)</label>
                            <input type="text" class="form-control" id="harga-hpp" readonly>
                        </div>
                    </div>
                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                        <button type="button" id="calculate-hpp"
                            class="btn py-3 btn-primary w-full md:w-52">Hitung</button>
                    </div>
                </div>
            </div>
            <!-- END: Horizontal Form -->
        </div>
        <div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary flex items-center mr-auto text-white"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Index 
                    </a>
                    <div class="w-56 relative text-slate-500 flex items-center ml-auto">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </div>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap">PLY TYPE</th>
                                <th class="whitespace-nowrap text-center">FLUTE TYPE</th>
                                <th class="whitespace-nowrap">SUBSTANCE</th>
                                <th class="whitespace-nowrap">HARGA</th>
                                <th class="whitespace-nowrap">INDEX TAG</th>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->ply_type}}</td>
                                <td class="text-center">{{$item->flute_type}}</td>
                                <td>{{$item->substance}}</td>
                                <td>{{$item->price}}</td>
                                <td><?php echo date("d M Y", strtotime($item->tag)); ?></td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-primary"
                                            href="{{route('index-price.edit', ['id' => $item->id])}}"> <i
                                                data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger"
                                            href="{{route('index-price.delete', ['id' => $item->id])}}"> <i
                                                data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambah Index Harga
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('index-price.save')}}">
                                            @csrf
                                            <div id="horizontal-form" class="p-5">
                                                <div class="preview">
                                                    <div class="form-inline">
                                                        <label for="horizontal-form-2" class="form-label sm:w-20">Jenis Ply</label>
                                                        <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="ply_type">
                                                            <option value=" ">-</option>
                                                            <option value="SF">Single Face</option>
                                                            <option value="SW">Single Wall</option>
                                                            <option value="DW">Double Wall</option>
                                                            <option value="TW">Triple Wall</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-inline mt-5">
                                                        <label for="horizontal-form-2" class="form-label sm:w-20">Jenis Flute</label>
                                                        <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="flute_type">
                                                            <option value=" ">-</option>
                                                            <option value="B">BF</option>
                                                            <option value="C">CF</option>
                                                            <option value="B/C">B/CF</option>
                                                            <option value="E">EF</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-inline mt-5">
                                                        <label for="vertical-form-2" class="form-label sm:w-20">Substance</label>
                                                        <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="substance">
                                                            @foreach($substances as $substance)
                                                            <option value="{{$substance->id}}">{{$substance->substance}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-inline mt-5">
                                                        <label for="vertical-form-1" class="form-label sm:w-20">Harga (Rp)</label>
                                                        <input type="text" class="form-control" name="index_price">
                                                    </div>
                                                    <div class="form-inline mt-5">
                                                        <label for="vertical-form-1" class="form-label sm:w-20">Index Tag</label>
                                                        <input type="date" class="form-control" name="index_tag">
                                                    </div>
                                                </div>
                                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END: Horizontal Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        @if ($data->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true"><i class="w-4 h-4"
                                    data-lucide="chevrons-left"></i></span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev"><i class="w-4 h-4"
                                    data-lucide="chevron-left"></i></a>
                        </li>
                        @endif

                        @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                        <li class="page-item @if($page == $data->currentPage()) active @endif">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        @if ($data->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next"><i class="w-4 h-4"
                                    data-lucide="chevron-right"></i></a>
                        </li>
                        @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true"><i class="w-4 h-4"
                                    data-lucide="chevrons-right"></i></span>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(function() {

    // Form Calkulator Index Price
    $(".form-sheet").hide();
    $(".form-box").hide();
    $(".pounch").hide();
    $("#form-lem").hide();

    $("#jenis-barang").change(function() {
        if ($(this).val() === "sheet") {
            $(".form-sheet").show();
            $(".form-box").hide();
            $(".pounch").show();
        } else {
            $(".form-box").show();
            $(".form-sheet").hide();
            $(".pounch").hide();
            $(".add-price").hide();
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

        $.ajax({
            url: '/get-index-substance/' + tag, // Replace with your API endpoint
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var selectBox = $('#substance');

                // Clear existing options
                selectBox.empty();

                // Populate select box with new options
                selectBox.append('<option value="">-</option>');
                data.forEach(function(item) {
                    selectBox.append('<option value="' + item.id + '">' + item
                        .ply_type + ' ' + item.flute_type + 'F ' + item
                        .substance_name + '</option>');
                });

                $(".loader").hide();
            },
            error: function(error) {
                console.error('Error fetching data:', error);
                $(".loader").hide();
            }
        });
    });


    $("#substance").change(function() {
        var substance = $(this).val();
        $.ajax({
            url: "/get-index-price/" + substance,
            method: "GET",
            success: function(response) {
                console.log(response);
                $("#index-price").val(response.price);
                var ply_type = $("#substance option:selected").text().split(" ");
                $("#ply-type").val(ply_type[0]);

                if(ply_type[0] === "SF" && $("#jenis-barang").val() === "sheet") {
                    $("#form-lem").show();
                } else {
                    $("#form-lem").hide();
                }
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
                    var length = parseFloat($(".form-sheet #length").val()) * 25.4;
                    var width = parseFloat($(".form-sheet #width").val()) * 25.4;
                    break;
                case "MM":
                    var length = parseFloat($(".form-sheet #length").val()) / 10;
                    var width = parseFloat($(".form-sheet #width").val()) / 10;
                    break;
                default:
                    var length = parseFloat($(".form-sheet #length").val());
                    var width = parseFloat($(".form-sheet #width").val());
                    break;
            }



            var index_price = parseFloat($("#index-price").val());

            console.log(index_price);
            console.log("jenis ply : " + jenis_fly);

            if ($('input[name=flag-ppn]:checked').val() === "1" || $('input[name=flag-ppn]:checked').val() === 1) {
                index_price = (index_price * 0.11) + index_price;
            } 

            if ($('input[name=flag-pounch]:checked').val() === "1" || $('input[name=flag-pounch]:checked').val() === 1) {
                var order_qty = parseFloat($("#order-qty").val());
                var knife_price = parseFloat($("#knife-price").val());

                var additional_price = knife_price / order_qty;
                var index_price = index_price + additional_price;

                console.log("Index Price After tambah pounch : " + index_price)
            }
            
            if ($('input[name=flag-lem]:checked').val() === "1" || $('input[name=flag-lem]:checked').val() === 1) {

                var index_price = index_price + 500;

                console.log("Index Price After tambah lem : " + index_price)
            }
            
            var hpp = (length * width * index_price) / 10000;

            console.log("hpp: " + hpp)


            $("#harga-hpp").val(formatNumberWithCommas(Math.ceil(hpp)));
        } else {
            switch (measure_unit) {
                case "INCH":
                    var length = parseFloat($(".form-box #length").val()) * 25.4;
                    var width = parseFloat($(".form-box #width").val()) * 25.4;
                    var height = parseFloat($(".form-box #height").val()) * 25.4;
                    break;
                case "MM":
                    var length = parseFloat($(".form-box #length").val()) / 10;
                    var width = parseFloat($(".form-box #width").val()) / 10;
                    var height = parseFloat($(".form-box #height").val()) / 10;
                    break;
                default:
                    var length = parseFloat($(".form-box #length").val());
                    var width = parseFloat($(".form-box #width").val());
                    var height = parseFloat($(".form-box #height").val());
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

            $("#harga-hpp").val(formatNumberWithCommas(Math.ceil(hpp)));
        }
    });

    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
});
</script>
@endsection