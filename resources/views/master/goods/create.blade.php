@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
    <form method="POST" action="{{route('goods.save')}}" class="grid grid-cols-12 gap-6 mt-5">
        @csrf
        <div class="col-span-4 lg:col-span-4">
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Informasi Barang
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <div class="preview">
                        <div class="form-inlin">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Kode Barang</label>
                            <input id="vertical-form-1" type="text" class="form-control" name="code">
                        </div>
                        <div class="form-inlin mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Nama Barang</label>
                            <input id="vertical-form-1" type="text" class="form-control" name="name">
                        </div>
                        <div class="form-inlin mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Barang</label>
                            <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control"
                                name="goods_type" id="goods-type">
                                <option value="">-</option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">AB</option>
                                <option value="4">BB</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply</label>
                            <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control"
                                name="ply_type">
                                <option value="">-</option>
                                <option value="SF">SF</option>
                                <option value="SW">SW</option>
                                <option value="DW">DW</option>
                                <option value="TW">TW</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control"
                                name="flute_type">
                                <option value=" ">-</option>
                                <option value="B">B/F</option>
                                <option value="C">C/F</option>
                                <option value="E">E/F</option>
                                <option value="B/C">B/C</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="vertical-form-1" class="form-label sm:w-40">Substance</label>
                            <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="substance">
                                <option value=" ">-</option>
                                @foreach($substances as $substance)
                                <option value="{{$substance->code}}">{{$substance->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="vertical-form-1" class="form-label sm:w-40">Ukuran</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="text" class="form-control col-span-4" placeholder="P" name="length" id="length">
                                <input type="text" class="form-control col-span-4" placeholder="L" name="width" id="width">
                                <input type="text" class="form-control col-span-4" placeholder="T" name="height" id="height">
                            </div>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control"
                                name="meas_unit">
                                <option value="">-</option>
                                <option value="INCH">INCH</option>
                                <option value="MM">MM</option>
                                <option value="CM">CM</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ukuran</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control"
                                name="meas_type">
                                <option value=" ">-</option>
                                <option value="UD">UD</option>
                                <option value="UL">UL</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Harga Dasar (HPP)</label>
                            <input id="vertical-form-1" type="number" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                        <button type="button"
                            class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Batal</button>
                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 lg:col-span-4">
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Informasi Barang (Tutup)
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <div class="preview">
                        <div class="form-inlin top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply</label>
                            <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control"
                                name="top_ply_type">
                                <option value=" ">-</option>
                                <option value="SF">SF</option>
                                <option value="SW">SW</option>
                                <option value="DW">DW</option>
                                <option value="TW">TW</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control"
                                name="top_flute_type">
                                <option value=" ">-</option>
                                <option value="B">B/F</option>
                                <option value="C">C/F</option>
                                <option value="E">E/F</option>
                                <option value="B/C">B/C</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="vertical-form-1" class="form-label sm:w-40">Substance</label>
                            <select data-placeholder="Pilih Substance" class="tom-select w-full form-control"
                                name="top_substance">
                                <option value="">-</option>
                                @foreach($substances as $substance)
                                <option value="{{$substance->code}}">{{$substance->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="vertical-form-1" class="form-label sm:w-40">Ukuran</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="text" class="form-control col-span-4" placeholder="P" name="top_length" id="top_length">
                                <input type="text" class="form-control col-span-4" placeholder="L" name="top_width" id="top_width">
                                <input type="text" class="form-control col-span-4" placeholder="T" name="top_height" id="top_height">
                            </div>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="top_meas_unit">
                                <option value="">-</option>
                                <option value="INCH">INCH</option>
                                <option value="MM">MM</option>
                                <option value="CM">CM</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 lg:col-span-4">
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Informasi Barang (Badan)
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <div class="preview">
                        <div class="form-inlin top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply</label>
                            <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control"
                                name="bottom_ply_type">
                                <option value="">-</option>
                                <option value="SF">SF</option>
                                <option value="SW">SW</option>
                                <option value="DW">DW</option>
                                <option value="TW">TW</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control"
                                name="bottom_flute_type">
                                <option value=" ">-</option>
                                <option value="B">B/F</option>
                                <option value="C">C/F</option>
                                <option value="E">E/F</option>
                                <option value="B/C">B/C</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="vertical-form-1" class="form-label sm:w-40">Substance</label>
                            <select data-placeholder="Pilih Substance" class="tom-select w-full form-control"
                                name="bottom_substance">
                                <option value="">-</option>
                                @foreach($substances as $substance)
                                <option value="{{$substance->code}}">{{$substance->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="vertical-form-1" class="form-label sm:w-40">Ukuran</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="text" class="form-control col-span-4" placeholder="P" name="bottom_length"
                                    id="top_length">
                                <input type="text" class="form-control col-span-4" placeholder="L" name="bottom_width"
                                    id="top_width">
                                <input type="text" class="form-control col-span-4" placeholder="T" name="bottom_height"
                                    id="top_height">
                            </div>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control"
                                name="bottom_meas_unit">
                                <option value="">-</option>
                                <option value="INCH">INCH</option>
                                <option value="MM">MM</option>
                                <option value="CM">CM</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(function() {
    $(".top-bottom").hide();
    var goods_type = $("#goods-type").val();

    $("#goods-type").change(function() {
        if ($(this).val() === "3" || $(this).val() === "4") {
            $(".top-bottom").show();
            $(".standard-type").hide();
        } else {
            if($(this).val() === "1") {
                $("#height").hide();
            } else {
                $("#height").show();
            }

            $(".top-bottom").hide();
            $(".standard-type").show();
        }
    })
})
</script>
@endsection