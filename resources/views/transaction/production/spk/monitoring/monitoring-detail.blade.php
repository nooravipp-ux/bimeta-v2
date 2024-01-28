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
                                <input type="text" class="form-control"
                                    value="{{$data->length}} X {{$data->width}} {{$data->meas_unit}}" readonly>
                                @elseif($data->type == 2)
                                <input type="text" class="form-control"
                                    value="{{$data->length}} X {{$data->width}} X {{$data->height}} {{$data->meas_unit}} ({{$data->meas_type}})"
                                    readonly>
                                @else
                                <input type="text" class="form-control"
                                    value="{{$data->bottom_length}} X {{$data->bottom_width}} X {{$data->bottom_height}} {{$data->bottom_meas_unit}} / {{$data->top_length}} X {{$data->top_width}} {{$data->top_meas_unit}}"
                                    readonly>
                                @endif
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Qty Pesanan</label>
                                <input type="text" class="form-control" id="-order-quantity"
                                    value="{{$data->order_quantity}}" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Proses Produksi
                    </h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Nama Proses</th>
                                <th class="text-center">Urutan</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
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
                                    <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">COMPLETED</div>
                                    @endif
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3"
                                            href="{{route('production.spk.monitoring.production-progress', ['id' => $process->id])}}"> <i
                                                data-lucide="edit" class="w-4 h-4 mr-1"></i> Update Progress </a>
                                    </div>
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
                                            <input type="number" class="form-control" name="spk_qty" id="tr-spk-qty" value="{{$data->quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" value="{{$data->length}}" readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" value="{{$data->width}}" readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" value="{{$data->height}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L2</label>
                                            <input type="number" class="form-control" name="l2" value="{{$data->l2}}" id="l2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P1</label>
                                            <input type="number" class="form-control" name="p1" value="{{$data->p1}}" id="p1" readonly>
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L1</label>
                                            <input type="number" class="form-control" name="l1" value="{{$data->l1}}" id="l1" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">T</label>
                                            <input type="number" class="form-control" name="t" value="{{$data->t}}" id="t" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P2</label>
                                            <input type="number" class="form-control" name="p2" value="{{$data->p2}}" id="p2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">PLAPE</label>
                                            <input type="number" class="form-control" name="plape" value="{{$data->plape}}" id="plape" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">K</label>
                                            <input type="number" class="form-control" name="k" value="{{$data->k}}" id="k" readonly>
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
                                                    id="netto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="netto_length" value="{{$data->netto_length}}"
                                                    id="netto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    name="bruto_width" value="{{$data->bruto_width}}"
                                                    id="bruto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="bruto_length" value="{{$data->bruto_length}}"
                                                    id="bruto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity"
                                                value="{{$data->sheet_quantity}}" id="sheet-quantity" readonly>
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
                                                value="{{$data->quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    id="width" value="{{$data->width}}" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    id="length" value="{{$data->length}}" readonly>
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
                                                    id="netto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="netto_length" value="{{$data->netto_length}}"
                                                    id="netto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L"
                                                    name="bruto_width" value="{{$data->bruto_width}}"
                                                    id="bruto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P"
                                                    name="bruto_length" value="{{$data->bruto_length}}"
                                                    id="bruto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity"
                                                value="{{$data->sheet_quantity}}" id="sheet-quantity" readonly>
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
                                            <input type="number" class="form-control"name="bottom_spk_quantity" id="tr-spk-qty" value="{{$data->bottom_quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="bottom_length" value="{{$data->bottom_length}}"  readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="bottom_width" value="{{$data->bottom_width}}"  readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="bottom_height" value="{{$data->bottom_height}}"  readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L2</label>
                                            <input type="number" class="form-control" name="bottom_l2" value="{{$data->bottom_l2}}" id="l2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P1</label>
                                            <input type="number" class="form-control" name="bottom_p1" value="{{$data->bottom_p1}}" id="p1" readonly>
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L1</label>
                                            <input type="number" class="form-control" name="bottom_l1" value="{{$data->bottom_l1}}" id="l1" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">T</label>
                                            <input type="number" class="form-control" name="bottom_t" value="{{$data->bottom_t}}" id="t" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P2</label>
                                            <input type="number" class="form-control" name="bottom_p2" value="{{$data->bottom_p2}}" id="p2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">PLAPE</label>
                                            <input type="number" class="form-control" name="bottom_plape" value="{{$data->bottom_plape}}" id="plape" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">K</label>
                                            <input type="number" class="form-control" name="bottom_k" value="{{$data->bottom_k}}" id="k" readonly>
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_netto_width" value="{{$data->bottom_netto_width}}" id="netto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_netto_length" value="{{$data->bottom_netto_length}}" id="netto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_bruto_width" value="{{$data->bottom_bruto_width}}" id="bruto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_bruto_length" value="{{$data->bottom_bruto_length}}" id="bruto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data->bottom_sheet_quantity}}" id="sheet-quantity" readonly>
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
                                            <input type="number" class="form-control" name="top_quantity" id="tr-spk-qty"  value="{{$data->top_quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="top_length"  value="{{$data->top_length}}" readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="top_width"  value="{{$data->top_width}}" readonly>
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_netto_width" value="{{$data->top_netto_width}}" id="netto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_netto_length" value="{{$data->top_netto_length}}" id="netto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_bruto_width" value="{{$data->top_bruto_width}}" id="bruto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_bruto_length" value="{{$data->top_bruto_length}}" id="bruto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="{{$data->top_sheet_quantity}}" id="sheet-quantity" readonly>
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
                                            <input type="number" class="form-control" name="bottom_spk_quantity" id="tr-spk-qty" value="{{$data->bottom_quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="bottom_length" value="{{$data->bottom_length}}" readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="bottom_width" value="{{$data->bottom_width}}" readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="bottom_height" value="{{$data->bottom_height}}" readonly>
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_netto_width" value="{{$data->bottom_netto_width}}" id="netto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_netto_length" value="{{$data->bottom_netto_length}}" id="netto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_bruto_width" value="{{$data->bottom_bruto_width}}" id="bruto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_bruto_length" value="{{$data->bottom_bruto_length}}" id="bruto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data->bottom_sheet_quantity}}" id="sheet-quantity" readonly>
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
                                            <input type="number" class="form-control"name="top_quantity" id="tr-spk-qty" value="{{$data->top_quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="top_length" value="{{$data->top_length}}" readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="top_width" value="{{$data->top_width}}" readonly>
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="top_height" value="{{$data->top_height}}" readonly>
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_netto_width" value="{{$data->top_netto_width}}" id="netto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_netto_length" value="{{$data->top_netto_length}}" id="netto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_bruto_width" value="{{$data->top_bruto_width}}" id="bruto-width" readonly>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_bruto_length" value="{{$data->top_bruto_length}}" id="bruto-length" readonly>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="{{$data->top_sheet_quantity}}" id="sheet-quantity" readonly>
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

@endsection