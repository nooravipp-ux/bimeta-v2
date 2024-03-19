@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item" aria-current="page">SPK</li>
<li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection
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
                                <input type="text" class="form-control" value="{{$data->length}} X {{$data->width}} X {{$data->height}}" readonly>
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
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Proses Produksi
                    </h2>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" data-tw-toggle="modal" data-tw-target="#add-process-prod"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Proses </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <!-- <th class="text-center">Urutan</th> -->
                                <th>Nama Proses</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productionProcessesItem as $process)
                            <tr>
                                <!-- <td class="text-center">{{$process->sequence_order}}</td> -->
                                <td>{{$process->process_name}}</td>
                                <td class="text-center">
                                    @if($process->status == 1)
                                    <div class="py-1 px-2 rounded-full text-xs bg-primary text-white cursor-pointer font-medium">INIT</div>
                                    @elseif($process->status == 2)
                                    <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">WORK IN PROGRESS</div>
                                    @else
                                    <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">COMPLETED</div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                <div id="add-process-prod" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambah Proses Produksi
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('production.spk.progress-item.save')}}">
                                            @csrf
                                            <table class="table table-striped">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <th>Nama Proses</th>
                                                        <th class="text-center">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($productionProcesses as $process)
                                                    <tr>
                                                        <td>{{$process->process_name}}</td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox" id="flag_use_customer_addr" name="processes[]" value="{{$process->id}}">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <input type="hidden" name="spk_id" value="{{$data->id}}" />
                                                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
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
        @if($data->type == 2)
        <form method="POST" action="{{route('production.spk.save')}}"
            class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i
                            data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row">
                            <div class="md:col-span-6">
                                <table style="border-collapse: collapse;">
                                    <tr>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="120px" style="text-align: center;">
                                            JP: {{$data->netto_length}} 
                                        </td>
                                        <td width="70px" style="text-align: center;padding: 8px">
                                            
                                        </td>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                        <td width="80px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50px" height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->plape}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="70px" style="padding: 5px;">
                                            JL: {{$data->netto_width}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            {{$data->l2}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->p1}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->l1}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->t}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->p2}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;width: 5px;">
                                            {{$data->k}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->plape}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                </table>
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
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
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
                            data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row">
                            <div class="md:col-span-6">
                                <table style="width:100%;border-collapse: collapse; margin-right: 5px;margin-right: 100px;">
                                    <tr>
                                        <td width="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                        <td width="60px" style="text-align: center;" id="sheet-l-l">
                                            JP: {{$data->netto_width}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="80px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border-top: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border-top: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border-top: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="70px" style="padding: 5px;">
                                            JL: {{$data->netto_length}}
                                        </td>
                                        <td style="border-left: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            
                                        </td>
                                        <td style="text-align: center; padding:17px;">
                                            
                                        </td>
                                        <td style="border-right: 1px solid black;text-align: center; padding:17px;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                        <td style="border-bottom: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border-bottom: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border-bottom: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                </table>
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
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
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
            @if($data->spk_type == "B")
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row gap-5 mr-0">
                            <div class="md:col-span-6">
                                <table style="border-collapse: collapse;">
                                    <tr>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="120px" style="text-align: center;">
                                            JP: {{$data->netto_length}} 
                                        </td>
                                        <td width="70px" style="text-align: center;padding: 8px">
                                            
                                        </td>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                        <td width="80px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50px" height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->plape}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="70px" style="padding: 5px;">
                                            JL: {{$data->netto_width}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            {{$data->l2}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->p1}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->l1}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->t}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->p2}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;width: 5px;">
                                            {{$data->k}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->plape}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                </table>
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
                                            <input type="number" class="form-control"name="bottom_spk_quantity" id="tr-spk-qty" value="{{$data->quantity}}" >
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="bottom_length" value="{{$data->length}}"  >
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="bottom_width" value="{{$data->width}}"  >
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="bottom_height" value="{{$data->height}}"  >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L2</label>
                                            <input type="number" class="form-control" name="bottom_l2" value="{{$data->l2}}" id="l2" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P1</label>
                                            <input type="number" class="form-control" name="bottom_p1" value="{{$data->p1}}" id="p1" >
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L1</label>
                                            <input type="number" class="form-control" name="bottom_l1" value="{{$data->l1}}" id="l1" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">T</label>
                                            <input type="number" class="form-control" name="bottom_t" value="{{$data->t}}" id="t" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P2</label>
                                            <input type="number" class="form-control" name="bottom_p2" value="{{$data->p2}}" id="p2" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">PLAPE</label>
                                            <input type="number" class="form-control" name="bottom_plape" value="{{$data->plape}}" id="plape" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">K</label>
                                            <input type="number" class="form-control" name="bottom_k" value="{{$data->k}}" id="k" >
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width" >
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length" >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width" >
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length" >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity" >
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="box p-5 rounded-md mt-2">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row gap-5 mr-0">
                            <div class="md:col-span-6">
                                <table style="width:100%;border-collapse: collapse; margin-right: 5px;margin-right: 100px;">
                                    <tr>
                                        <td width="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                        <td width="60px" style="text-align: center;" id="sheet-l-l">
                                            JP: {{$data->netto_width}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="80px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border-top: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border-top: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border-top: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="70px" style="padding: 5px;">
                                            JL: {{$data->netto_length}}
                                        </td>
                                        <td style="border-left: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            
                                        </td>
                                        <td style="text-align: center; padding:17px;">
                                            
                                        </td>
                                        <td style="border-right: 1px solid black;text-align: center; padding:17px;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                        <td style="border-bottom: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border-bottom: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="border-bottom: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                </table>
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
                                            <input type="number" class="form-control" name="quantity" id="tr-spk-qty"  value="{{$data->quantity}}" >
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="length"  value="{{$data->length}}" >
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="width"  value="{{$data->width}}" >
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width" >
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length" >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width" >
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length" >
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity" >
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </form>
        @endif

        @if($data->type == 4)
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="flex flex-col sm:flex-row gap-5 mr-0">
                            <div class="md:col-span-6">
                                <table style="border-collapse: collapse;">
                                    <tr>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="120px" style="text-align: center;">
                                            JP: {{$data->netto_length}}
                                        </td>
                                        <td width="70px" style="text-align: center;padding: 8px">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50px" height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->height}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->length}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->height}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="70px" style="padding: 5px;">
                                            JL: {{$data->netto_width}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            {{$data->width}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->width}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->height}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->length}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->height}}
                                        </td>
                                    </tr>
                                </table>
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
                                            <input type="number" class="form-control" name="spk_quantity" id="tr-spk-qty" value="{{$data->quantity}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="length" value="{{$data->length}}">
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="width" value="{{$data->width}}">
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="height" value="{{$data->height}}">
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width">
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length">
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity">
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
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