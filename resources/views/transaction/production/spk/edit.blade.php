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
                        Spesifikasi Barang
                    </h2>
                </div>
                <form method="POST" action="{{route('index-price.save')}}">
                    @csrf
                    <div id="horizontal-form" class="p-5">
                        <div class="preview">
                            <div class="form-inline">
                                <label for="vertical-form-1" class="form-label sm:w-20">Nama</label>
                                <input type="text" class="form-control" value="{{$data->name}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Jenis</label>
                                <input type="text" class="form-control" value="{{$data->goods_type_name}}" readonly>
                                <input type="hidden" class="form-control" value="{{$data->type}}" id="goods-type">
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Spesifikasi</label>
                                <input type="text" class="form-control" value="{{$data->specification}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                @if($data->type == 1)
                                <input type="text" class="form-control" value="{{$data->length}} X {{$data->width}} {{$data->meas_unit}}" >
                                @elseif($data->type == 2)
                                <input type="text" class="form-control" value="{{$data->length}} X {{$data->width}} X {{$data->height}} {{$data->meas_unit}} ({{$data->meas_type}})">
                                @else
                                <input type="text" class="form-control" value="{{$data->bottom_length}} X {{$data->bottom_width}} X {{$data->bottom_height}} {{$data->bottom_meas_unit}} / {{$data->top_length}} X {{$data->top_width}} {{$data->top_meas_unit}}">
                                @endif
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Qty Pesanan</label>
                                <input type="text" class="form-control" id="-order-quantity" value="{{$data->order_quantity}}" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Proses Produksi
                    </h2>
                </div>
                <form method="POST" action="{{route('production.spk.progress-item.save')}}">
                    @csrf
                    <div id="horizontal-form" class="p-5">
                        <div class="preview">
                            <div class="form-inline">
                                <label for="vertical-form-1" class="form-label sm:w-20">Nama</label>
                                <select data-placeholder="Pilih Proses" class="tom-select w-full form-control" name="process_id">
                                    @foreach($productionProcesses as $process)
                                    <option value="{{$process->id}}">{{$process->process_name}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" class="form-control" name="spk_id" value="{{$data->spk_id}}">
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Ururtan</label>
                                <input type="text" class="form-control" value="" name="sequence_order">
                            </div>
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="submit" id="calculate-hpp"
                                class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Urutan Proses Produksi
                    </h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Nama Proses</th>
                                <th class="text-center">Urutan</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productionProcessesItem as $process)
                            <tr>
                                <td>{{$process->process_name}}</td>
                                <td class="text-center">{{$process->sequence_order}}</td>
                                <td class="text-center">
                                    @if($process->status == 1)
                                    <div class="py-1 px-2 rounded-full text-xs bg-primary text-white cursor-pointer font-medium">INIT</div>
                                    @elseif($process->status == 2)
                                    <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">WORK IN PROGRESS</div>
                                    @else
                                    <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">WORK IN PROGRESS</div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if($data->type == 2)
        <form method="POST" action="{{route('production.spk.save')}}"
            class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
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
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l2">{{$data->l2}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                        <div class="layout-box-p h-4 bg-gray-300" id="l-p1">{{$data->p1}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l1">{{$data->l1}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-plape-1">{{$data->plape}}
                                        </div>
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-t">{{$data->t}}</div>
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-plape-2">{{$data->plape}}
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p-2 h-4 bg-gray-300"></div>
                                        <div class="layout-box-p-2 h-4 bg-gray-300" id="l-p2">{{$data->p2}}</div>
                                        <div class="layout-box-p-2 h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-k h-4 bg-gray-300"></div>
                                        <div class="layout-box-k h-4 bg-gray-300" id="l-k">{{$data->k}}</div>
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
                                                        <?php echo ($data->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data->flag_stitching == 1) ? "checked" : ""; ?>>
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
                                                        <?php echo ($data->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data->flag_glue == 1) ? "checked" : ""; ?>>
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
                                                        <?php echo ($data->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data->flag_pounch == 1) ? "checked" : ""; ?>>
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
                                                value="{{$data->quantity}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" value="{{$data->length}}">
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" value="{{$data->width}}">
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" value="{{$data->height}}">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L2</label>
                                            <input type="number" class="form-control" name="l2" value="{{$data->l2}}"
                                                id="l2">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P1</label>
                                            <input type="number" class="form-control" name="p1" value="{{$data->p1}}"
                                                id="p1">
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L1</label>
                                            <input type="number" class="form-control" name="l1" value="{{$data->l1}}"
                                                id="l1">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">T</label>
                                            <input type="number" class="form-control" name="t" value="{{$data->t}}"
                                                id="t">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P2</label>
                                            <input type="number" class="form-control" name="p2" value="{{$data->p2}}"
                                                id="p2">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">PLAPE</label>
                                            <input type="number" class="form-control" name="plape"
                                                value="{{$data->plape}}" id="plape">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">K</label>
                                            <input type="number" class="form-control" name="k" value="{{$data->k}}"
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
                                                    name="netto_width" value="{{$data->netto_width}}"
                                                    id="netto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="netto_length" value="{{$data->netto_length}}"
                                                    id="netto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    name="bruto_width" value="{{$data->bruto_width}}"
                                                    id="bruto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="bruto_length" value="{{$data->bruto_length}}"
                                                    id="bruto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity"
                                                value="{{$data->sheet_quantity}}" id="sheet-quantity">
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
        @if($data->type == 1)
        <form method="POST" action="{{route('production.spk.save')}}"
            class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
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
                                            {{$data->netto_width}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300" id="sheet-l-l">
                                            {{$data->netto_length}}</div>
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
                                                        <?php echo ($data->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data->flag_stitching == 1) ? "checked" : ""; ?>>
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
                                                        <?php echo ($data->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data->flag_glue == 1) ? "checked" : ""; ?>>
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
                                                        <?php echo ($data->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data->flag_pounch == 1) ? "checked" : ""; ?>>
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
                                                value="{{$data->quantity}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    id="width" value="{{$data->width}}">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    id="length" value="{{$data->length}}">
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
                                                    name="netto_width" value="{{$data->netto_width}}"
                                                    id="netto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="netto_length" value="{{$data->netto_length}}"
                                                    id="netto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    name="bruto_width" value="{{$data->bruto_width}}"
                                                    id="bruto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="bruto_length" value="{{$data->bruto_length}}"
                                                    id="bruto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity"
                                                value="{{$data->sheet_quantity}}" id="sheet-quantity">
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

        @if($data->type == 3)
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
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l2">{{$data->bottom_l2}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                        <div class="layout-box-p h-4 bg-gray-300" id="l-p1">{{$data->bottom_p1}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l1">{{$data->bottom_l1}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-plape-1"></div>
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-t">{{$data->bottom_t}}</div>
                                        <div class="layout-box-t h-4 bg-gray-300" id="l-plape-2">{{$data->bottom_plape}}</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p-2 h-4 bg-gray-300"></div>
                                        <div class="layout-box-p-2 h-4 bg-gray-300" id="l-p2">{{$data->bottom_p2}}</div>
                                        <div class="layout-box-p-2 h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-k h-4 bg-gray-300"></div>
                                        <div class="layout-box-k h-4 bg-gray-300" id="l-k">{{$data->bottom_k}}</div>
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
                                            <input type="number" class="form-control"name="bottom_spk_quantity" id="tr-spk-qty" value="{{$data->bottom_quantity}}" >
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="bottom_length" value="{{$data->bottom_length}}"  >
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="bottom_width" value="{{$data->bottom_width}}"  >
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="bottom_height" value="{{$data->bottom_height}}"  >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L2</label>
                                            <input type="number" class="form-control" name="bottom_l2" value="{{$data->bottom_l2}}" id="l2" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P1</label>
                                            <input type="number" class="form-control" name="bottom_p1" value="{{$data->bottom_p1}}" id="p1" >
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L1</label>
                                            <input type="number" class="form-control" name="bottom_l1" value="{{$data->bottom_l1}}" id="l1" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">T</label>
                                            <input type="number" class="form-control" name="bottom_t" value="{{$data->bottom_t}}" id="t" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P2</label>
                                            <input type="number" class="form-control" name="bottom_p2" value="{{$data->bottom_p2}}" id="p2" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">PLAPE</label>
                                            <input type="number" class="form-control" name="bottom_plape" value="{{$data->bottom_plape}}" id="plape" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">K</label>
                                            <input type="number" class="form-control" name="bottom_k" value="{{$data->bottom_k}}" id="k" >
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_netto_width" value="{{$data->bottom_netto_width}}" id="netto-width" >
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_netto_length" value="{{$data->bottom_netto_length}}" id="netto-length" >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_bruto_width" value="{{$data->bottom_bruto_width}}" id="bruto-width" >
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_bruto_length" value="{{$data->bottom_bruto_length}}" id="bruto-length" >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data->bottom_sheet_quantity}}" id="sheet-quantity" >
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
                                            <input type="number" class="form-control" name="top_quantity" id="tr-spk-qty"  value="{{$data->top_quantity}}" >
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="top_length"  value="{{$data->top_length}}" >
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="top_width"  value="{{$data->top_width}}" >
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_netto_width" value="{{$data->top_netto_width}}" id="netto-width" >
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_netto_length" value="{{$data->top_netto_length}}" id="netto-length" >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_bruto_width" value="{{$data->top_bruto_width}}" id="bruto-width" >
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_bruto_length" value="{{$data->top_bruto_length}}" id="bruto-length" >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="{{$data->top_sheet_quantity}}" id="sheet-quantity" >
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

        @if($data->type == 4)
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
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data->bottom_height}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l2"></div>
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data->bottom_height}}</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300 pb-0">{{$data->bottom_length}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300" id="l-p1">{{$data->bottom_width}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data->bottom_height}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l1"></div>
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data->bottom_height}}</div>
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
                                            <input type="number" class="form-control" name="bottom_spk_quantity" id="tr-spk-qty" value="{{$data->bottom_quantity}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="bottom_length" value="{{$data->bottom_length}}">
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="bottom_width" value="{{$data->bottom_width}}">
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="bottom_height" value="{{$data->bottom_height}}">
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_netto_width" value="{{$data->bottom_netto_width}}" id="netto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_netto_length" value="{{$data->bottom_netto_length}}" id="netto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_bruto_width" value="{{$data->bottom_bruto_width}}" id="bruto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_bruto_length" value="{{$data->bottom_bruto_length}}" id="bruto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data->bottom_sheet_quantity}}" id="sheet-quantity">
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
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data->top_height}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l2"></div>
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data->top_height}}</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-p h-4 bg-gray-300 pb-0">{{$data->top_length}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300" id="l-p1">{{$data->top_width}}</div>
                                        <div class="layout-box-p h-4 bg-gray-300"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data->top_height}}</div>
                                        <div class="layout-box-l h-4 bg-gray-300" id="l-l1"></div>
                                        <div class="layout-box-l h-4 bg-gray-300">{{$data->top_height}}</div>
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
                                            <input type="number" class="form-control"name="top_quantity" id="tr-spk-qty" value="{{$data->top_quantity}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="top_length" value="{{$data->top_length}}">
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="top_width" value="{{$data->top_width}}">
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="top_height" value="{{$data->top_height}}">
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_netto_width" value="{{$data->top_netto_width}}" id="netto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_netto_length" value="{{$data->top_netto_length}}" id="netto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_bruto_width" value="{{$data->top_bruto_width}}" id="bruto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_bruto_length" value="{{$data->top_bruto_length}}" id="bruto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="{{$data->top_sheet_quantity}}" id="sheet-quantity">
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
$(function() {
    $(".loader").hide();
    $("#collapse-form-production-process").hide();

    $("#add-production-process").click(function() {
        $("#collapse-form-production-process").slideToggle("slow");
    });

    var goods_type = $("#goods-type").val();
    var sheet_layout = $("#sheet-form");
    var box_layout = $("#box-form");
    var bottom_top_layout = $("#bottom-top-form");

    if (goods_type === 1 || goods_type === "1") {
        box_layout.hide();
        bottom_top_layout.hide()
    } else if (goods_type === 2 || goods_type === "2") {
        sheet_layout.hide();
        bottom_top_layout.hide();
    } else {
        box_layout.hide();
        sheet_layout.hide();
    }

    $("#flag-join").change(function() {
        var flag_join_form = $(".flag-join-form");

        if ($(this).val() === 1 || $(this).val() === "1") {
            flag_join_form.hide();
        } else {
            flag_join_form.show();
        }
    });

    // $("#btn-auto-generate").click(function() {
    //     if (goods_type === "1" || goods_type === 1) {
    //         switch ("{{$data->meas_unit}}") {
    //             case "INCH":
    //                 var p = Math.round(parseFloat({{$data->length}} * 25.4));
    //                 var l = Math.round(parseFloat({{$data->width}} * 25.4));
    //                 break;
    //             case "CM":
    //                 var p = Math.round(parseFloat({{$data->length}} * 10));
    //                 var l = Math.round(parseFloat({{$data->width}} * 10));
    //                 break;
    //             default:
    //                 var p = Math.round(parseFloat({{$data->length}}));
    //                 var l = Math.round(parseFloat({{$data->width}}));
    //                 break;
    //         }
    //     } else  {
    //         alert("hello")
    //         switch ("{{$data->meas_unit}}") {
    //             case "INCH":
    //                 var p = Math.round(parseFloat({{$data->length}} * 25.4));
    //                 var l = Math.round(parseFloat({{$data->width}} * 25.4));
    //                 var t = Math.round(parseFloat({{$data->height}} * 25.4));
    //                 break;
    //             case "CM":
    //                 var p = Math.round(parseFloat({{$data->length}} * 10));
    //                 var l = Math.round(parseFloat({{$data->width}} * 10));
    //                 var t = Math.round(parseFloat({{$data->height}} * 10));
    //                 break;
    //             default:
    //                 var p = Math.round(parseFloat({{$data->length}}));
    //                 var l = Math.round(parseFloat({{$data->width}}));
    //                 var t = Math.round(parseFloat({{$data->height}}));
    //                 break;
    //         }

    //         switch ("{{$data->ply_type}}") {
    //             case "SW":
    //                 if (measure_type === "0" || measure_type === 0) {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l;
    //                         var p1 = p + 3;
    //                         var l1 = l + 3;
    //                         var p2 = p + 2;
    //                         var tinggi = t + 5;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 2);
    //                     } else {
    //                         var l1 = l;
    //                         var p2 = p + 3;
    //                         var tinggi = t + 5;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 2);
    //                     }
    //                 } else {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l - 2;
    //                         var p1 = p;
    //                         var l1 = l;
    //                         var p2 = p - 1;
    //                         var tinggi = t;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 2);
    //                     } else {
    //                         var l1 = l - 2;
    //                         var p2 = p;
    //                         var tinggi = t;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 2);
    //                     }
    //                 }

    //                 var kuping = 30;
    //                 break;
    //             case "DW":
    //                 if (measure_type === "0" || measure_type === 0) {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l + 4;
    //                         var p1 = p + 7;
    //                         var l1 = l + 7;
    //                         var p2 = p + 6;
    //                         var tinggi = t + 14;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 4);
    //                     } else {
    //                         var l1 = l + 4;
    //                         var p2 = p + 7;
    //                         var tinggi = t + 14;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 4);
    //                     }
    //                 } else {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l - 4;
    //                         var p1 = p - 3;
    //                         var l1 = l - 3;
    //                         var p2 = p - 4;
    //                         var tinggi = t - 3;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 4);
    //                     } else {
    //                         var l1 = l - 4;
    //                         var p2 = p - 3;
    //                         var tinggi = t - 3;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 4);
    //                     }
    //                 }

    //                 var kuping = 40;
    //                 break;
    //             case "TW":
    //                 if (measure_type === "0" || measure_type === 0) {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l + 4;
    //                         var p1 = p + 7;
    //                         var l1 = l + 7;
    //                         var p2 = p + 6;
    //                         var tinggi = t + 14;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 5);
    //                     } else {
    //                         var l1 = l + 4;
    //                         var p2 = p + 7;
    //                         var tinggi = t + 14;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 5);
    //                     }
    //                 } else {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l - 4;
    //                         var p1 = p - 3;
    //                         var l1 = l - 3;
    //                         var p2 = p - 4;
    //                         var tinggi = t - 3;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 5);
    //                     } else {
    //                         var l1 = l - 4;
    //                         var p2 = p - 3;
    //                         var tinggi = t - 3;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 5);
    //                     }
    //                 }
    //                 var kuping = 45;
    //                 break;
    //             default:
    //                 break;
    //         }
    //     }
    // });

    function roundToNearestMultipleOf5(number) {
        return 5 * Math.round(number / 5);
    }

    function roundToNearestMultipleOf50(number) {
        return 50 * Math.ceil(number / 50);
    }

    // Control Box
    $("#l2").on("keyup", function() {
        $("#l-l2").text($(this).val())
    });

    $("#p1").on("keyup", function() {
        $("#l-p1").text($(this).val())
    });

    $("#l1").on("keyup", function() {
        $("#l-l1").text($(this).val())
    });

    $("#t").on("keyup", function() {
        $("#l-t").text($(this).val())
    });

    $("#p2").on("keyup", function() {
        $("#l-p2").text($(this).val())
    });

    $("#plape").on("keyup", function() {
        $("#l-plape-1").text($(this).val())
        $("#l-plape-2").text($(this).val())
    });

    $("#k").on("keyup", function() {
        $("#l-k").text($(this).val())
    });

    // control Sheet

    $("#sheet-f-w").on("keyup", function() {
        $("#sheet-l-w").text($(this).val())
    });

    $("#sheet-f-l").on("keyup", function() {
        $("#sheet-l-l").text($(this).val())
    });

    $("#tr-spk-qty").on("keyup", function() {
        $("#spk-qty").val($(this).val())
    });

    $("#flag-join").on("change", function() {
        console.log($(this).val());
        $("#fjoin").val($(this).val());
    });
});
</script>
@endsection