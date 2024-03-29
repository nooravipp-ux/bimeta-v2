@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
    <form method="POST" action="{{route('goods.update')}}" class="grid grid-cols-12 gap-6 mt-5">
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
                            <input id="vertical-form-1" type="text" class="form-control" name="name" value="{{$goods->name}}">
                            <input id="vertical-form-1" type="hidden" class="form-control" name="id" value="{{$goods->id}}">
                        </div>
                        <div class="form-inlin mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Barang</label>
                            <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control" name="goods_type" id="goods-type">
                                <option value="">-</option>
                                <option value="1" <?php echo ($goods->type == 1) ? "selected" : "" ?>>A</option>
                                <option value="2" <?php echo ($goods->type == 2) ? "selected" : "" ?>>B</option>
                                <option value="3" <?php echo ($goods->type == 3) ? "selected" : "" ?>>AB</option>
                                <option value="4" <?php echo ($goods->type == 4) ? "selected" : "" ?>>BB</option>
                            </select>
                        </div>
                        @if($goods->type <= 2)
                        <div class="form-inlin mt-5 standard-type">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply</label>
                            <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control" name="ply_type">
                                <option value="">-</option>
                                <option value="SF" <?php echo ($goods->ply_type == "SF") ? "selected" : "" ?>>SINGLE FACE</option>
                                <option value="SW" <?php echo ($goods->ply_type == "SW") ? "selected" : "" ?>>SINGLE WALL</option>
                                <option value="DW" <?php echo ($goods->ply_type == "DW") ? "selected" : "" ?>>DOUBLE WALL</option>
                                <option value="TW" <?php echo ($goods->ply_type == "TW") ? "selected" : "" ?>>TRIPLE WALL</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="flute_type">
                                <option value=" ">-</option>
                                <option value="B" <?php echo ($goods->flute_type == "B") ? "selected" : "" ?>>B/F</option>
                                <option value="C" <?php echo ($goods->flute_type == "C") ? "selected" : "" ?>>C/F</option>
                                <option value="E" <?php echo ($goods->flute_type == "E") ? "selected" : "" ?>>E/F</option>
                                <option value="B/C" <?php echo ($goods->flute_type == "B/C") ? "selected" : "" ?>>B/C</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="vertical-form-1" class="form-label sm:w-40">Substance</label>
                            <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="substance">
                                <option value=" ">-</option>
                                @foreach($substances as $substance)
                                <option value="{{$substance->code}}" <?php echo ($goods->substance == $substance->code) ? "selected" : "" ?>>{{$substance->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="vertical-form-1" class="form-label sm:w-40">Ukuran</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="text" class="form-control col-span-4" placeholder="P" name="length" id="length" value="{{$goods->length}}">
                                <input type="text" class="form-control col-span-4" placeholder="L" name="width" id="width" value="{{$goods->width}}">
                                <input type="text" class="form-control col-span-4" placeholder="T" name="height" id="height" value="{{$goods->height}}">
                            </div>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="meas_unit">
                                <option value="">-</option>
                                <option value="INCH" <?php echo ($goods->meas_unit == "INCH") ? "selected" : "" ?>>INCH</option>
                                <option value="MM" <?php echo ($goods->meas_unit == "MM") ? "selected" : "" ?>>MM</option>
                                <option value="CM" <?php echo ($goods->meas_unit == "CM") ? "selected" : "" ?>>CM</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 standard-type">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ukuran</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="meas_type">
                                <option value=" ">-</option>
                                <option value="UD" <?php echo ($goods->meas_type == "UD") ? "selected" : "" ?>>UD</option>
                                <option value="UL" <?php echo ($goods->meas_type == "UL") ? "selected" : "" ?>>UL</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Harga Dasar (HPP)</label>
                            <input id="vertical-form-1" type="number" class="form-control" name="price" value="{{$goods->price}}">
                        </div>
                        @endif
                    </div>
                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                        <button type="button"
                            class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Batal</button>
                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update</button>
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
                        @if($goods->type > 2)
                        <div class="form-inlin top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply</label>
                            <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control" name="top_ply_type">
                                <option value=" ">-</option>
                                <option value="SF" <?php echo ($goods->top_ply_type == "SF") ? "selected" : "" ?>>SINGLE FACE</option>
                                <option value="SW" <?php echo ($goods->top_ply_type == "SW") ? "selected" : "" ?>>SINGLE WALL</option>
                                <option value="DW" <?php echo ($goods->top_ply_type == "DW") ? "selected" : "" ?>>DOUBLE WALL</option>
                                <option value="TW" <?php echo ($goods->top_ply_type == "TW") ? "selected" : "" ?>>TRIPLE WALL</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="top_flute_type">
                                <option value=" ">-</option>
                                <option value="B" <?php echo ($goods->top_flute_type == "B") ? "selected" : "" ?>>B</option>
                                <option value="C" <?php echo ($goods->top_flute_type == "C") ? "selected" : "" ?>>C</option>
                                <option value="E" <?php echo ($goods->top_flute_type == "E") ? "selected" : "" ?>>E</option>
                                <option value="B/C" <?php echo ($goods->top_flute_type == "B/C") ? "selected" : "" ?>>B/C</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="vertical-form-1" class="form-label sm:w-40">Substance</label>
                            <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="top_substance">
                                <option value="">-</option>
                                @foreach($substances as $substance)
                                <option value="{{$substance->code}}" <?php echo ($goods->top_substance == $substance->code) ? "selected" : "" ?>>{{$substance->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="vertical-form-1" class="form-label sm:w-40">Ukuran</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="text" class="form-control col-span-4" placeholder="P" name="top_length" value="{{$goods->top_length}}">
                                <input type="text" class="form-control col-span-4" placeholder="L" name="top_width" value="{{$goods->top_width}}">
                                <input type="text" class="form-control col-span-4" placeholder="T" name="top_height" value="{{$goods->top_height}}">
                            </div>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="top_meas_unit">
                                <option value="">-</option>
                                <option value="INCH" <?php echo ($goods->top_meas_unit == "INCH") ? "selected" : "" ?>>INCH</option>
                                <option value="MM" <?php echo ($goods->top_meas_unit == "MM") ? "selected" : "" ?>>MM</option>
                                <option value="CM" <?php echo ($goods->top_meas_unit == "CM") ? "selected" : "" ?>>CM</option>
                            </select>
                        </div>
                        @endif
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
                        @if($goods->type > 2)
                        <div class="form-inlin top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply</label>
                            <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control" name="bottom_ply_type">
                                <option value="">-</option>
                                <option value="SF" <?php echo ($goods->bottom_ply_type == "SF") ? "selected" : "" ?>>SINGLE FACE</option>
                                <option value="SW" <?php echo ($goods->bottom_ply_type == "SW") ? "selected" : "" ?>>SINGLE WALL</option>
                                <option value="DW" <?php echo ($goods->bottom_ply_type == "DW") ? "selected" : "" ?>>DOUBLE WALL</option>
                                <option value="TW" <?php echo ($goods->bottom_ply_type == "TW") ? "selected" : "" ?>>TRIPLE WALL</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="bottom_flute_type">
                                <option value=" ">-</option>
                                <option value="B" <?php echo ($goods->bottom_flute_type == "B") ? "selected" : "" ?>>B</option>
                                <option value="C" <?php echo ($goods->bottom_flute_type == "C") ? "selected" : "" ?>>C</option>
                                <option value="E" <?php echo ($goods->bottom_flute_type == "E") ? "selected" : "" ?>>E</option>
                                <option value="B/C" <?php echo ($goods->bottom_flute_type == "B/C") ? "selected" : "" ?>>B/C</option>
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="vertical-form-1" class="form-label sm:w-40">Substance</label>
                            <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="bottom_substance">
                                <option value="">-</option>
                                @foreach($substances as $substance)
                                <option value="{{$substance->code}}" <?php echo ($goods->bottom_substance == $substance->code) ? "selected" : "" ?>>{{$substance->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="vertical-form-1" class="form-label sm:w-40">Ukuran</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="text" class="form-control col-span-4" placeholder="P" name="bottom_length" value="{{$goods->bottom_length}}">
                                <input type="text" class="form-control col-span-4" placeholder="L" name="bottom_width" value="{{$goods->bottom_width}}">
                                <input type="text" class="form-control col-span-4" placeholder="T" name="bottom_height" value="{{$goods->bottom_height}}">
                            </div>
                        </div>
                        <div class="form-inlin mt-5 top-bottom">
                            <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran</label>
                            <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="bottom_meas_unit">
                                <option value="">-</option>
                                <option value="INCH" <?php echo ($goods->bottom_meas_unit == "INCH") ? "selected" : "" ?>>INCH</option>
                                <option value="MM" <?php echo ($goods->bottom_meas_unit == "MM") ? "selected" : "" ?>>MM</option>
                                <option value="CM" <?php echo ($goods->bottom_meas_unit == "CM") ? "selected" : "" ?>>CM</option>
                            </select>
                        </div>
                        @endif
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
    var goods_type = $("#goods-type").val();
    
    if(goods_type === "1") {
        $("#height").hide();
    } else {
        $("#height").show();
    }

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
});
</script>
@endsection