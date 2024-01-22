@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <!-- BEGIN: Horizontal Form -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Informasi Barang
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <form method="POST" action="{{route('goods.update')}}">
                        @csrf
                        <div class="preview">
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Nama Barang</label>
                                <input id="vertical-form-1" type="text" class="form-control" name="name" value="{{$goods->name}}">
                                <input id="vertical-form-1" type="hidden" class="form-control" name="id" value="{{$goods->id}}">
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Barang</label>
                                <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control" name="goods_type" id="goods-type">
                                    <option value="">-</option>
                                    <option value="1" <?php echo ($goods->type == 1) ? "selected" : "" ?>>SHEET</option>
                                    <option value="2" <?php echo ($goods->type == 2) ? "selected" : "" ?>>BOX</option>
                                    <option value="3" <?php echo ($goods->type == 3) ? "selected" : "" ?>>BADAN TUTUP (AB)</option>
                                    <option value="4" <?php echo ($goods->type == 4) ? "selected" : "" ?>>BADAN TUTUP (BB)</option>
                                </select>
                            </div>

                            @if($goods->type <= 2)
                            <div class="form-inline mt-5 standard-type">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply</label>
                                <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control" name="ply_type">
                                    <option value="">-</option>
                                    <option value="SF" <?php echo ($goods->ply_type == "SF") ? "selected" : "" ?>>SINGLE FACE</option>
                                    <option value="SW" <?php echo ($goods->ply_type == "SW") ? "selected" : "" ?>>SINGLE WALL</option>
                                    <option value="DW" <?php echo ($goods->ply_type == "DW") ? "selected" : "" ?>>DOUBLE WALL</option>
                                    <option value="TW" <?php echo ($goods->ply_type == "TW") ? "selected" : "" ?>>TRIPLE WALL</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 standard-type">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute</label>
                                <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="flute_type">
                                    <option value=" ">-</option>
                                    <option value="B" <?php echo ($goods->flute_type == "B") ? "selected" : "" ?>>B</option>
                                    <option value="C" <?php echo ($goods->flute_type == "C") ? "selected" : "" ?>>C</option>
                                    <option value="E" <?php echo ($goods->flute_type == "E") ? "selected" : "" ?>>E</option>
                                    <option value="B/C" <?php echo ($goods->flute_type == "B/C") ? "selected" : "" ?>>B/C</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 standard-type">
                                <label for="vertical-form-1" class="form-label sm:w-40">Substance</label>
                                <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="substance">
                                    <option value=" ">-</option>
                                    @foreach($substances as $substance)
                                    <option value="{{$substance->code}}" <?php echo ($goods->substance == $substance->code) ? "selected" : "" ?>>{{$substance->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline mt-5 standard-type">
                                <label for="vertical-form-1" class="form-label sm:w-40">Ukuran</label>
                                <div class="grid grid-cols-12 gap-2">
                                    <input type="text" class="form-control col-span-4" placeholder="P" name="length" id="length" value="{{$goods->length}}">
                                    <input type="text" class="form-control col-span-4" placeholder="L" name="width" id="width" value="{{$goods->width}}">
                                    <input type="text" class="form-control col-span-4" placeholder="T" name="height" id="height" value="{{$goods->height}}">
                                </div>
                            </div>
                            <div class="form-inline mt-5 standard-type">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran</label>
                                <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="meas_unit">
                                    <option value="">-</option>
                                    <option value="INCH" <?php echo ($goods->meas_unit == "INCH") ? "selected" : "" ?>>INCH</option>
                                    <option value="MM" <?php echo ($goods->meas_unit == "MM") ? "selected" : "" ?>>MM</option>
                                    <option value="CM" <?php echo ($goods->meas_unit == "CM") ? "selected" : "" ?>>CM</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 standard-type">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ukuran</label>
                                <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="meas_type">
                                    <option value=" ">-</option>
                                    <option value="UD" <?php echo ($goods->meas_type == "UD") ? "selected" : "" ?>>UD</option>
                                    <option value="UL" <?php echo ($goods->meas_type == "UL") ? "selected" : "" ?>>UL</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 standard-type">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Harga</label>
                                <input id="vertical-form-1" type="number" class="form-control" name="price" value="{{$goods->price}}">
                            </div>
                            @endif
                            
                            @if($goods->type > 2)
                            <div class="form-inline mt-5 top-bottom">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply (Top)</label>
                                <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control" name="top_ply_type">
                                    <option value=" ">-</option>
                                    <option value="SF" <?php echo ($goods->top_ply_type == "SF") ? "selected" : "" ?>>SINGLE FACE</option>
                                    <option value="SW" <?php echo ($goods->top_ply_type == "SW") ? "selected" : "" ?>>SINGLE WALL</option>
                                    <option value="DW" <?php echo ($goods->top_ply_type == "DW") ? "selected" : "" ?>>DOUBLE WALL</option>
                                    <option value="TW" <?php echo ($goods->top_ply_type == "TW") ? "selected" : "" ?>>TRIPLE WALL</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute (Top)</label>
                                <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="top_flute_type">
                                    <option value=" ">-</option>
                                    <option value="B" <?php echo ($goods->top_flute_type == "B") ? "selected" : "" ?>>B</option>
                                    <option value="C" <?php echo ($goods->top_flute_type == "C") ? "selected" : "" ?>>C</option>
                                    <option value="E" <?php echo ($goods->top_flute_type == "E") ? "selected" : "" ?>>E</option>
                                    <option value="B/C" <?php echo ($goods->top_flute_type == "B/C") ? "selected" : "" ?>>B/C</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="vertical-form-1" class="form-label sm:w-40">Substance (Top)</label>
                                <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="top_substance">
                                    <option value="">-</option>
                                    @foreach($substances as $substance)
                                    <option value="{{$substance->code}}" <?php echo ($goods->top_substance == $substance->code) ? "selected" : "" ?>>{{$substance->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="vertical-form-1" class="form-label sm:w-40">Ukuran (Top)</label>
                                <div class="grid grid-cols-12 gap-2">
                                    <input type="text" class="form-control col-span-4" placeholder="P" name="top_length" value="{{$goods->top_length}}">
                                    <input type="text" class="form-control col-span-4" placeholder="L" name="top_width" value="{{$goods->top_width}}">
                                    <input type="text" class="form-control col-span-4" placeholder="T" name="top_height" value="{{$goods->top_height}}">
                                </div>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran (Top)</label>
                                <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="top_meas_unit">
                                    <option value="">-</option>
                                    <option value="INCH" <?php echo ($goods->top_meas_unit == "INCH") ? "selected" : "" ?>>INCH</option>
                                    <option value="MM" <?php echo ($goods->top_meas_unit == "MM") ? "selected" : "" ?>>MM</option>
                                    <option value="CM" <?php echo ($goods->top_meas_unit == "CM") ? "selected" : "" ?>>CM</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Harga (Top)</label>
                                <input id="vertical-form-1" type="number" class="form-control" name="top_price" value="{{$goods->top_price}}">
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply (Bottom)</label>
                                <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control" name="bottom_ply_type">
                                    <option value="">-</option>
                                    <option value="SF" <?php echo ($goods->bottom_ply_type == "SF") ? "selected" : "" ?>>SINGLE FACE</option>
                                    <option value="SW" <?php echo ($goods->bottom_ply_type == "SW") ? "selected" : "" ?>>SINGLE WALL</option>
                                    <option value="DW" <?php echo ($goods->bottom_ply_type == "DW") ? "selected" : "" ?>>DOUBLE WALL</option>
                                    <option value="TW" <?php echo ($goods->bottom_ply_type == "TW") ? "selected" : "" ?>>TRIPLE WALL</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute (Bottom)</label>
                                <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="bottom_flute_type">
                                    <option value=" ">-</option>
                                    <option value="B" <?php echo ($goods->bottom_flute_type == "B") ? "selected" : "" ?>>B</option>
                                    <option value="C" <?php echo ($goods->bottom_flute_type == "C") ? "selected" : "" ?>>C</option>
                                    <option value="E" <?php echo ($goods->bottom_flute_type == "E") ? "selected" : "" ?>>E</option>
                                    <option value="B/C" <?php echo ($goods->bottom_flute_type == "B/C") ? "selected" : "" ?>>B/C</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="vertical-form-1" class="form-label sm:w-40">Substance (Bottom)</label>
                                <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="bottom_substance">
                                    <option value="">-</option>
                                    @foreach($substances as $substance)
                                    <option value="{{$substance->code}}" <?php echo ($goods->bottom_substance == $substance->code) ? "selected" : "" ?>>{{$substance->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="vertical-form-1" class="form-label sm:w-40">Ukuran (Bottom)</label>
                                <div class="grid grid-cols-12 gap-2">
                                    <input type="text" class="form-control col-span-4" placeholder="P" name="bottom_length" value="{{$goods->bottom_length}}">
                                    <input type="text" class="form-control col-span-4" placeholder="L" name="bottom_width" value="{{$goods->bottom_width}}">
                                    <input type="text" class="form-control col-span-4" placeholder="T" name="bottom_height" value="{{$goods->bottom_height}}">
                                </div>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran (Bottom)</label>
                                <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="bottom_meas_unit">
                                    <option value="">-</option>
                                    <option value="INCH" <?php echo ($goods->bottom_meas_unit == "INCH") ? "selected" : "" ?>>INCH</option>
                                    <option value="MM" <?php echo ($goods->bottom_meas_unit == "MM") ? "selected" : "" ?>>MM</option>
                                    <option value="CM" <?php echo ($goods->bottom_meas_unit == "CM") ? "selected" : "" ?>>CM</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5 top-bottom">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Harga (Bottom)</label>
                                <input id="vertical-form-1" type="number" class="form-control" name="bottom_price" value="{{$goods->bottom_price}}">
                            </div>
                            @endif
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="button"class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Batal</button>
                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Horizontal Form -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

</script>
@endsection