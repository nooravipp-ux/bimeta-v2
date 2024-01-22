@extends('layouts._base')
@section('css')
<style>
.layout-box-p {
    width: 200px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-p-2 {
    width: 130px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-l {
    width: 100px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-t {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    border-right-style: dotted;
    padding: 20px;
    font-size: 12px;
}

.layout-box-k {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-row-plep {
    width: 200px;
    height: 50px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.mandatory-sign {
    color: red;
}

.text-danger {
    color: red;
    font-size: 12px;
}
</style>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Informasi Spesifikasi Barang
                    </h2>
                </div>
                <form method="POST" action="{{route('index-price.save')}}">
                    @csrf
                    <div id="horizontal-form" class="p-5">
                        <div class="preview">
                            <div class="form-inline">
                                <label for="vertical-form-1" class="form-label sm:w-40">Nama</label>
                                <input type="text" class="form-control" value="{{$data[0]->name}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-40">Jenis</label>
                                @if($data[0]->type == 1)
                                <input type="text" class="form-control" value="SHEET" readonly>
                                @elseif($data[0]->type == 2)
                                <input type="text" class="form-control" value="BOX" readonly>
                                @else
                                <input type="text" class="form-control" value="BOX (Badan + Tutup)" readonly>
                                @endif
                                <input type="hidden" class="form-control" value="{{$data[0]->type}}"
                                    id="goods-type">
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-40">Spesifikasi</label>
                                <input type="text" class="form-control"
                                    value="{{$data[0]->ply_type}} {{$data[0]->flute_type}} {{$data[0]->substance_name}}"
                                    readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-40">Ukuran</label>
                                @if($data[0]->type == 1)
                                <input type="text" class="form-control"
                                    value="{{$data[0]->length}} X {{$data[0]->width}} {{$data[0]->meas_unit}}" readonly>
                                @elseif($data[0]->type == 2)
                                <input type="text" class="form-control"
                                    value="{{$data[0]->length}} X {{$data[0]->width}} X {{$data[0]->height}} {{$data[0]->meas_unit}} ({{$data[0]->meas_type}})"
                                    readonly>
                                @else
                                <input type="text" class="form-control"
                                    value="{{$data[0]->bottom_length}} X {{$data[0]->bottom_width}} X {{$data[0]->bottom_height}} {{$data[0]->bottom_meas_unit}} / {{$data[0]->top_length}} X {{$data[0]->top_width}} {{$data[0]->top_meas_unit}}"
                                    readonly>
                                @endif
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-40">Qty Pesanan</label>
                                <input type="text" class="form-control" id="-order-quantity"
                                    value="{{$data[0]->order_quantity}}" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Jadwal Produksi
                    </h2>
                </div>
                <form method="POST" action="{{route('production.spk.schedule.save')}}">
                    @csrf
                    <div id="horizontal-form" class="p-5">
                        <div class="preview">
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-40">Tanggal</label>
                                <input type="date" class="form-control" name="start_date">
                                <input type="hidden" class="form-control" name="id" value="{{$data[0]->spk_id}}">
                            </div>
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        @if($data[0]->type == 2)
        <form method="POST" action="{{route('production.spk.save')}}"
            class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data[0]->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i
                            data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row">
                            <div class="md:col-span-6">
                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l2">{{$data[0]->l2}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                        <div class="layout-box-p h-4 bg-gray-300" id="l-p1">{{$data[0]->p1}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l1">{{$data[0]->l1}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-plape-1">{{$data[0]->plape}}
                                        </div>
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-t">{{$data[0]->t}}</div>
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-plape-2">{{$data[0]->plape}}
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p-2 h-4 bg-gray-300"></div>
                                        <div class="layout-box-p-2 h-4 bg-gray-300" id="l-p2">{{$data[0]->p2}}</div>
                                        <div class="layout-box-p-2 h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-k h-4 bg-gray-300"></div>
                                        <div class="layout-box-k h-4 bg-gray-300" id="l-k">{{$data[0]->k}}</div>
                                        <div class="layout-box-k h-4 bg-gray-300"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="0"
                                                        <?php echo ($data[0]->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data[0]->flag_stitching == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_glue" value="0"
                                                        <?php echo ($data[0]->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data[0]->flag_glue == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="0"
                                                        <?php echo ($data[0]->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data[0]->flag_pounch == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control" name="spk_qty" id="tr-spk-qty"
                                                value="{{$data[0]->quantity}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" value="{{$data[0]->length}}">
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" value="{{$data[0]->width}}">
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" value="{{$data[0]->height}}">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L2</label>
                                            <input type="number" class="form-control" name="l2" value="{{$data[0]->l2}}"
                                                id="l2">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P1</label>
                                            <input type="number" class="form-control" name="p1" value="{{$data[0]->p1}}"
                                                id="p1">
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L1</label>
                                            <input type="number" class="form-control" name="l1" value="{{$data[0]->l1}}"
                                                id="l1">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">T</label>
                                            <input type="number" class="form-control" name="t" value="{{$data[0]->t}}"
                                                id="t">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P2</label>
                                            <input type="number" class="form-control" name="p2" value="{{$data[0]->p2}}"
                                                id="p2">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">PLAPE</label>
                                            <input type="number" class="form-control" name="plape"
                                                value="{{$data[0]->plape}}" id="plape">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">K</label>
                                            <input type="number" class="form-control" name="k" value="{{$data[0]->k}}"
                                                id="k">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Netto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    name="netto_width" value="{{$data[0]->netto_width}}"
                                                    id="netto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="netto_length" value="{{$data[0]->netto_length}}"
                                                    id="netto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    name="bruto_width" value="{{$data[0]->bruto_width}}"
                                                    id="bruto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="bruto_length" value="{{$data[0]->bruto_length}}"
                                                    id="bruto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity"
                                                value="{{$data[0]->sheet_quantity}}" id="sheet-quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
        @if($data[0]->type == 1)
        <form method="POST" action="{{route('production.spk.save')}}"
            class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data[0]->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i
                            data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row">
                            <div class="md:col-span-6">
                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="sheet-l-w">
                                            {{$data[0]->netto_width}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300" id="sheet-l-l">
                                            {{$data[0]->netto_length}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="0"
                                                        <?php echo ($data[0]->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data[0]->flag_stitching == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_glue" value="0"
                                                        <?php echo ($data[0]->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data[0]->flag_glue == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="0"
                                                        <?php echo ($data[0]->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data[0]->flag_pounch == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control" name="spk_qty" id="tr-spk-qty"
                                                value="{{$data[0]->quantity}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    id="width" value="{{$data[0]->width}}">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    id="length" value="{{$data[0]->length}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Netto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    name="netto_width" value="{{$data[0]->netto_width}}"
                                                    id="netto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="netto_length" value="{{$data[0]->netto_length}}"
                                                    id="netto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    name="bruto_width" value="{{$data[0]->bruto_width}}"
                                                    id="bruto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="bruto_length" value="{{$data[0]->bruto_length}}"
                                                    id="bruto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity"
                                                value="{{$data[0]->sheet_quantity}}" id="sheet-quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($data[0]->type == 3)
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (Badan)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row gap-5 mr-0">
                            <div class="md:col-span-6">
                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l2">{{$data[0]->bottom_l2}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                        <div class="layout-box-p h-4 bg-gray-300" id="l-p1">{{$data[0]->bottom_p1}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l1">{{$data[0]->bottom_l1}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-plape-1"></div>
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-t">{{$data[0]->bottom_t}}</div>
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-plape-2">{{$data[0]->bottom_plape}}</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p-2 h-4 bg-gray-300"></div>
                                        <div class="layout-box-p-2 h-4 bg-gray-300" id="l-p2">{{$data[0]->bottom_p2}}</div>
                                        <div class="layout-box-p-2 h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-k h-4 bg-gray-300"></div>
                                        <div class="layout-box-k h-4 bg-gray-300" id="l-k">{{$data[0]->bottom_k}}</div>
                                        <div class="layout-box-k h-4 bg-gray-300"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control"name="bottom_spk_quantity" id="tr-spk-qty" value="{{$data[0]->bottom_quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="bottom_length" value="{{$data[0]->bottom_length}}"  readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="bottom_width" value="{{$data[0]->bottom_width}}"  readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="bottom_height" value="{{$data[0]->bottom_height}}"  readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L2</label>
                                            <input type="number" class="form-control" name="bottom_l2" value="{{$data[0]->bottom_l2}}" id="l2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P1</label>
                                            <input type="number" class="form-control" name="bottom_p1" value="{{$data[0]->bottom_p1}}" id="p1" readonly>
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L1</label>
                                            <input type="number" class="form-control" name="bottom_l1" value="{{$data[0]->bottom_l1}}" id="l1" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">T</label>
                                            <input type="number" class="form-control" name="bottom_t" value="{{$data[0]->bottom_t}}" id="t" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P2</label>
                                            <input type="number" class="form-control" name="bottom_p2" value="{{$data[0]->bottom_p2}}" id="p2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">PLAPE</label>
                                            <input type="number" class="form-control" name="bottom_plape" value="{{$data[0]->bottom_plape}}" id="plape" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">K</label>
                                            <input type="number" class="form-control" name="bottom_k" value="{{$data[0]->bottom_k}}" id="k" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Netto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_netto_width" value="{{$data[0]->bottom_netto_width}}" id="netto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_netto_length" value="{{$data[0]->bottom_netto_length}}" id="netto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_bruto_width" value="{{$data[0]->bottom_bruto_width}}" id="bruto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_bruto_length" value="{{$data[0]->bottom_bruto_length}}" id="bruto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data[0]->bottom_sheet_quantity}}" id="sheet-quantity" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box p-5 rounded-md mt-2">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (Tutup)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row gap-5 mr-0">
                            <div class="md:col-span-6">
                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l2"></div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col -mx-1">
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                        <div class="layout-box-p h-4 bg-gray-300" id="l-p1"></div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l1"></div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control" name="top_quantity" id="tr-spk-qty"  value="{{$data[0]->top_quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="top_length"  value="{{$data[0]->top_length}}" readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="top_width"  value="{{$data[0]->top_width}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Netto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_netto_width" value="{{$data[0]->top_netto_width}}" id="netto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_netto_length" value="{{$data[0]->top_netto_length}}" id="netto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_bruto_width" value="{{$data[0]->top_bruto_width}}" id="bruto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_bruto_length" value="{{$data[0]->top_bruto_length}}" id="bruto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="{{$data[0]->top_sheet_quantity}}" id="sheet-quantity" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($data[0]->type == 4)
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (Badan)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row gap-5 mr-0">
                            <div class="md:col-span-6">
                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data[0]->bottom_height}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l2"></div>
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data[0]->bottom_height}}</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300 pb-0">{{$data[0]->bottom_length}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300" id="l-p1">{{$data[0]->bottom_width}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data[0]->bottom_height}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l1"></div>
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data[0]->bottom_height}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control" name="bottom_spk_quantity" id="tr-spk-qty" value="{{$data[0]->bottom_quantity}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="bottom_length" value="{{$data[0]->bottom_length}}">
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="bottom_width" value="{{$data[0]->bottom_width}}">
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="bottom_height" value="{{$data[0]->bottom_height}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Netto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_netto_width" value="{{$data[0]->bottom_netto_width}}" id="netto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_netto_length" value="{{$data[0]->bottom_netto_length}}" id="netto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_bruto_width" value="{{$data[0]->bottom_bruto_width}}" id="bruto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_bruto_length" value="{{$data[0]->bottom_bruto_length}}" id="bruto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data[0]->bottom_sheet_quantity}}" id="sheet-quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box p-5 rounded-md mt-2">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (Tutup)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row gap-5 mr-0">
                            <div class="md:col-span-6">
                                <div class="flex flex-row">
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data[0]->top_height}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l2"></div>
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data[0]->top_height}}</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300 pb-0">{{$data[0]->top_length}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300" id="l-p1">{{$data[0]->top_width}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data[0]->top_height}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l1"></div>
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data[0]->top_height}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control"name="top_quantity" id="tr-spk-qty" value="{{$data[0]->top_quantity}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="top_length" value="{{$data[0]->top_length}}">
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="top_width" value="{{$data[0]->top_width}}">
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="top_height" value="{{$data[0]->top_height}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Netto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_netto_width" value="{{$data[0]->top_netto_width}}" id="netto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_netto_length" value="{{$data[0]->top_netto_length}}" id="netto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_bruto_width" value="{{$data[0]->top_bruto_width}}" id="bruto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_bruto_length" value="{{$data[0]->top_bruto_length}}" id="bruto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="{{$data[0]->top_sheet_quantity}}" id="sheet-quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection

@section('script')
<script>
</script>
@endsection