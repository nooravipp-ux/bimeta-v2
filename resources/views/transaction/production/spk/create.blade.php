@extends('layouts._base')
@section('css')
<style>
.layout-box-p {
    width: 200px;
    height: 100px;
    border: 1px solid black;
    padding: 20px;
    font-size: 12px;
}

.layout-box-p-2 {
    width: 130px;
    height: 100px;
    border: 1px solid black;
    padding: 20px;
    font-size: 12px;
}

.layout-box-l {
    width: 100px;
    height: 100px;
    border: 1px solid black;
    padding: 20px;
    font-size: 12px;
}

.layout-box-t {
    width: 70px;
    height: 100px;
    border: 1px solid black;
    border-right-style: dotted;
    padding: 20px;
    font-size: 12px;
}

.layout-box-k {
    width: 70px;
    height: 100px;
    border: 1px solid black;
    padding: 20px;
    font-size: 12px;
}

.layout-box-row-plep {
    width: 200px;
    height: 50px;
    border: 1px solid black;
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
                                <input type="text" class="form-control" value="{{$goodsInformations->name}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Jenis</label>
                                @if($goodsInformations->type == 1)
                                <input type="text" class="form-control" value="A" readonly>
                                @elseif($goodsInformations->type == 2)
                                <input type="text" class="form-control" value="B" readonly>
                                @else
                                <input type="text" class="form-control" value="AB" readonly>
                                @endif
                                <input type="hidden" class="form-control" value="BB" id="goods-type">
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Spesifikasi</label>
                                @if($goodsInformations->type > 2)
                                <input type="text" class="form-control" value="{{$goodsInformations->bottom_ply_type}} {{$goodsInformations->bottom_flute_type}} {{$goodsInformations->bottom_substance}} / {{$goodsInformations->top_ply_type}} {{$goodsInformations->top_flute_type}} {{$goodsInformations->top_substance}}" readonly>
                                @endif
                                @if($goodsInformations->type < 3)
                                <input type="text" class="form-control" value="{{$goodsInformations->ply_type}} {{$goodsInformations->flute_type}} {{$goodsInformations->substance}}" readonly>
                                @endif
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                @if($goodsInformations->type == 1)
                                <input type="text" class="form-control" value="{{$goodsInformations->length}} X {{$goodsInformations->width}} {{$goodsInformations->meas_unit}}" readonly>
                                @elseif($goodsInformations->type == 2)
                                <input type="text" class="form-control" value="{{$goodsInformations->length}} X {{$goodsInformations->width}} X {{$goodsInformations->height}} {{$goodsInformations->meas_unit}} ({{$goodsInformations->meas_type}})" readonly>
                                @else
                                <input type="text" class="form-control" value="{{$goodsInformations->bottom_length}} X {{$goodsInformations->bottom_width}} X {{$goodsInformations->bottom_height}} {{$goodsInformations->bottom_meas_unit}} / {{$goodsInformations->top_length}} X {{$goodsInformations->top_width}} {{$goodsInformations->top_meas_unit}}" readonly>
                                @endif
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Qty Pesanan</label>
                                <input type="text" class="form-control" id="-order-quantity" value="{{$goodsInformations->quantity}}" readonly>
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
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Urutan</th>
                                <th>Nama Proses</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productionProcesses as $process)
                            <tr>
                                <td>{{$process->id}}</td>
                                <td>{{$process->process_name}}</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" id="flag_use_customer_addr" name="flag_use_customer_addr" value="1">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if($goodsInformations->type == 1)
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5" id="form-a">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-a"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-4">
                                <table style="width:100%;border-collapse: collapse; margin-right: 5px;margin-right: 100px;">
                                    <tr>
                                        <td width="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                        <td width="60px" style="text-align: center;" id="jp">
                                            JP: -
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
                                        <td height="70px" style="padding: 5px;" id="jl">
                                            JL: -
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
                            <div class="col-span-4">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_pounch" value="1">
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
                                            <label for="vertical-form-1" class="form-label sm:w-20">Spesifikasi</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->ply_type}} {{$goodsInformations->flute_type}} {{$goodsInformations->substance}}" name="spec" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control"name="spk_quantity" id="tr-spk-qty" placeholder="{{$goodsInformations->quantity - $totalSPKCreated}}" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" id="width" name="width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" id="length" name="length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="netto_width" value="" id="netto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="netto_length" value="" id="netto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bruto_width" value="" id="bruto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bruto_length" value="" id="bruto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity" value="" id="sheet-quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <button type="submit"
                                            class="btn py-3 btn-primary w-full md:w-52">Generate SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($goodsInformations->type == 2)
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5" id="form-b">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-b"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-6">
                                <table style="border-collapse: collapse;">
                                    <tr>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="120px" style="text-align: center;">
                                            JP: 1009
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
                                            PLAPE
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="70px" style="padding: 5px;">
                                            JL: 1090
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            L2
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            P1
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            L1
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            T
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            P2
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;width: 5px;">
                                            K
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
                                            PLAPE
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            
                                        </td>
                                        <td style="text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-span-6">
                                <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_pounch" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row mt-5">
                            <div class="col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="horizontal-form-1" class="form-label sm:w-20">Gabung</label>
                                            <select class="form-control" id="flag-join" name="flag_join" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "disabled" : ""; ?> required>
                                                <option value="">-</option>
                                                <option value="0">Tidak</option>
                                                <option value="1">Ya</option>
                                            </select>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Spesifikasi</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->ply_type}} {{$goodsInformations->flute_type}} {{$goodsInformations->substance}}" name="spec" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control"name="spk_quantity" id="tr-spk-qty" placeholder="{{$goodsInformations->quantity - $totalSPKCreated}}"required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <div class="form-inline gap-2">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="height" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L2</label>
                                            <input type="number" class="form-control" name="l2" value="" id="l2" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P1</label>
                                            <input type="number" class="form-control" name="p1" value="" id="p1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L1</label>
                                            <input type="number" class="form-control" name="l1" value="" id="l1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">T</label>
                                            <input type="number" class="form-control" name="t" value="" id="t" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P2</label>
                                            <input type="number" class="form-control" name="p2" value="" id="p2" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">PLAPE</label>
                                            <input type="number" class="form-control" name="plape" value="" id="plape" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">K</label>
                                            <input type="number" class="form-control" name="k" value="" id="k" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-5">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Netto</label>
                                            <div class="form-inline gap-2">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="netto_width" value="" id="netto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="netto_length" value="" id="netto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="form-inline gap-2">
                                                <input type="text" class="form-control" placeholder="L" name="bruto_width" value="" id="bruto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control" placeholder="P" name="bruto_length" value="" id="bruto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity" value="" id="sheet-quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <button type="submit"
                                            class="btn py-3 btn-primary w-full md:w-52">Generate SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($goodsInformations->type == 3)
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5" id="form-ab">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (Badan)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-ab"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
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
                                            JP: 1009
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
                                        <td height="70px" style="padding: 5px;">
                                            JL: 1090
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            L2
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            P1
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            L1
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            T
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            P2
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;width: 5px;">
                                            K
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
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            PLAPE
                                        </td>
                                        <td style="text-align: center; padding:10px;">
                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_pounch" value="1">
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
                                            <label for="vertical-form-1" class="form-label sm:w-20">Spesifikasi</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->bottom_ply_type}} {{$goodsInformations->bottom_flute_type}} {{$goodsInformations->bottom_substance}}" name="bottom_spec" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->bottom_length}} X {{$goodsInformations->bottom_width}} X {{$goodsInformations->bottom_height}} {{$goodsInformations->bottom_meas_unit}}" name="" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control"name="bottom_spk_quantity" id="tr-spk-qty" placeholder="Max {{$goodsInformations->quantity - $totalSPKCreated}}" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran SPK</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="bottom_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="bottom_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="bottom_height" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L2</label>
                                            <input type="number" class="form-control" name="bottom_l2" value="" id="l2" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P1</label>
                                            <input type="number" class="form-control" name="bottom_p1" value="" id="p1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">L1</label>
                                            <input type="number" class="form-control" name="bottom_l1" value="" id="l1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">T</label>
                                            <input type="number" class="form-control" name="bottom_t" value="" id="t" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">P2</label>
                                            <input type="number" class="form-control" name="bottom_p2" value="" id="p2" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">PLAPE</label>
                                            <input type="number" class="form-control" name="bottom_plape" value="" id="plape" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">K</label>
                                            <input type="number" class="form-control" name="bottom_k" value="" id="k" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_netto_width" value="" id="netto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_netto_length" value="" id="netto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_bruto_width" value="" id="bruto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_bruto_length" value="" id="bruto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="" id="sheet-quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
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
                                <table style="width:100%;border-collapse: collapse; margin-right: 5px;margin-right: 100px;">
                                    <tr>
                                        <td width="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                        <td width="60px" style="text-align: center;" id="sheet-l-l">
                                            JP: 2345
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
                                            JL: 1243
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
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_pounch" value="1">
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
                                            <label for="vertical-form-1" class="form-label sm:w-20">Spesifikasi</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->top_ply_type}} {{$goodsInformations->top_flute_type}} {{$goodsInformations->top_substance}}" name="top_spec" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->top_length}} X {{$goodsInformations->top_width}} {{$goodsInformations->top_meas_unit}}" name="" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control"name="top_spk_quantity" id="tr-spk-qty" placeholder="Max {{$goodsInformations->quantity - $totalSPKCreated}}"required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran SPK</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="top_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="top_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <!-- <input type="text" class="form-control col-span-4" placeholder="T" id="hieght" name="top_height"> -->
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_netto_width" value="" id="netto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_netto_length" value="" id="netto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_bruto_width" value="" id="bruto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_bruto_length" value="" id="bruto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="" id="sheet-quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Generate SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($goodsInformations->type == 4)
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5" id="form-bb">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (Badan)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-bb"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
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
                                            JP: 1009
                                        </td>
                                        <td width="70px" style="text-align: center;padding: 8px">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50px" height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            T
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            P
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            T
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="70px" style="padding: 5px;">
                                            JL: 1090
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            L
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            L
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            T
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            P
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            T
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_pounch" value="1">
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
                                            <label for="vertical-form-1" class="form-label sm:w-20">Spesifikasi</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->bottom_ply_type}} {{$goodsInformations->bottom_flute_type}} {{$goodsInformations->bottom_substance}}" name="bottom_spec" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->bottom_length}} X {{$goodsInformations->bottom_width}} X {{$goodsInformations->bottom_height}} {{$goodsInformations->bottom_meas_unit}}" name="" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control" name="bottom_spk_quantity" id="tr-spk-qty" placeholder="{{$goodsInformations->quantity - $totalSPKCreated}}"required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran SPK</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="bottom_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="bottom_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="bottom_height" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_netto_width" value="" id="netto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_netto_length" value="" id="netto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="bottom_bruto_width" value="" id="bruto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="bottom_bruto_length" value="" id="bruto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="" id="sheet-quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
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
                                <table style="border-collapse: collapse;">
                                    <tr>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="70px" style="text-align: center;">
                                            
                                        </td>
                                        <td width="120px" style="text-align: center;">
                                            JP: 1009
                                        </td>
                                        <td width="70px" style="text-align: center;padding: 8px">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50px" height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            T
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            P
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            T
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="70px" style="padding: 5px;">
                                            JL: 1090
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            L
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            L
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="50px" style="text-align: center;">
                                            
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            T
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            P
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            T
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-40">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_pounch" value="1">
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
                                            <label for="vertical-form-1" class="form-label sm:w-20">Spesifikasi</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->top_ply_type}} {{$goodsInformations->top_flute_type}} {{$goodsInformations->top_substance}}" name="top_spec" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->top_length}} X {{$goodsInformations->top_width}} X {{$goodsInformations->top_height}} {{$goodsInformations->top_meas_unit}}" name="" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty SPK</label>
                                            <input type="number" class="form-control"name="top_spk_quantity" id="tr-spk-qty" placeholder="{{$goodsInformations->quantity - $totalSPKCreated}}"required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Ukuran SPK</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-4" placeholder="P" id="length" name="top_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-4" placeholder="L" id="width" name="top_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-4" placeholder="T" id="height" name="top_height" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
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
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_netto_width" value="" id="netto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_netto_length" value="" id="netto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Bruto</label>
                                            <div class="grid grid-cols-12 gap-2 mr-0">
                                                <input type="text" class="form-control col-span-6" placeholder="L" name="top_bruto_width" value="" id="bruto-width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                                <input type="text" class="form-control col-span-6" placeholder="P" name="top_bruto_length" value="" id="bruto-length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="form-label sm:w-20">Qty Sheet</label>
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="" id="sheet-quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Generate SPK</button>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(function() {

    $("#calc-form-a").click(function() {
        alert("Fitur Masih dalam tahap Pengembangan !");
    });

    $("#calc-form-b").click(function() {
        alert("Fitur Masih dalam tahap Pengembangan !");
    });

    $("#calc-form-ab").click(function() {
        alert("Fitur Masih dalam tahap Pengembangan !");
    });

    $("#calc-form-bb").click(function() {
        alert("Fitur Masih dalam tahap Pengembangan !");
    });

    $("#flag-join").change(function() {
        var flag_join_form = $(".flag-join-form");

        if ($(this).val() === 1 || $(this).val() === "1") {
            flag_join_form.hide();
        } else {
            flag_join_form.show();
        }
    });

    $('input[name=flag_stitching_trigger]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $("#flag-stitching").val(1);
        } else {
            $("#flag-stitching").val(0);
        }
    });

    $('input[name=flag_glue_trigger]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $("#flag-glue").val(1);
        } else {
            $("#flag-glue").val(0);
        }
    });

    $('input[name=flag_pounch_trigger]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $("#flag-pounch").val(1);
        } else {
            $("#flag-pounch").val(0);
        }
    });

    $("#calculate").click(function() {
        var type = "{{$goodsInformations->type}}";
        var meas_unit = "{{$goodsInformations->meas_unit}}";
        var meas_type = "{{$goodsInformations->meas_type}}";
        var ply_type = "{{$goodsInformations->ply_type}}";
        var flag_join = $("#flag-join").val();
        var spk_qty = parseInt($("#tr-spk-qty").val());

        @if($goodsInformations->type !=3 )
            var length = {{($goodsInformations -> length == NULL) ? 0: $goodsInformations -> length}};
            var width = {{($goodsInformations -> width == NULL) ? 0: $goodsInformations -> width}};
            var height = {{($goodsInformations -> height == NULL) ? 0: $goodsInformations -> height}};
        @else

        @endif

        var l2 = "";
        var p1 = "";
        var l1 = "";
        var p2 = "";
        var tinggi = "";
        var plep = "";
        var kuping = "";

        var min_val = 850;
        var max_val = 1600;

        if (type === "1" || type === 1) {
            switch (meas_unit) {
                case "INCH":
                    var p = Math.round(parseFloat(length * 25.4));
                    var l = Math.round(parseFloat(width * 25.4));
                    break;
                case "CM":
                    var p = Math.round(parseFloat(length * 10));
                    var l = Math.round(parseFloat(width * 10));
                    break;
                default:
                    var p = Math.round(parseFloat(length));
                    var l = Math.round(parseFloat(width));
                    break;
            }

            console.log("P : " + p)
            console.log("L : " + l)

            $("#sheet-l-w").text(l)
            $("#sheet-l-l").text(p)

            $("#width").val(l)
            $("#length").val(p)

            $("#netto-width").val(l);
            $("#netto-length").val(p);

            var bruto_width = 0;
            var bruto_length = (p * 3) + 20;
            var sheet_quantity = spk_qty / 4 / 3;

            $("#bruto-width").val(bruto_width);
            $("#bruto-length").val(bruto_length);

            $("#sheet-quantity").val(Math.ceil(sheet_quantity));

        } else if (type === "2" || type === 2) {
            switch (meas_unit) {
                case "INCH":
                    var p = Math.round(parseFloat(length * 25.4));
                    var l = Math.round(parseFloat(width * 25.4));
                    var t = Math.round(parseFloat(height * 25.4));
                    break;
                case "CM":
                    var p = Math.round(parseFloat(length * 10));
                    var l = Math.round(parseFloat(width * 10));
                    var t = Math.round(parseFloat(height * 10));
                    break;
                default:
                    var p = Math.round(parseFloat(length));
                    var l = Math.round(parseFloat(width));
                    var t = Math.round(parseFloat(height));
                    break;
            }

            switch (ply_type) {
                case "SW":
                    if (meas_type === "UD") {
                        if (flag_join === "0" || flag_join === 0) {
                            l2 = l;
                            p1 = p + 3;
                            l1 = l + 3;
                            p2 = p + 2;
                            tinggi = t + 5;
                            plep = Math.floor((parseFloat(l2) / 2) + 2);
                        } else {
                            l1 = l;
                            p2 = p + 3;
                            tinggi = t + 5;
                            plep = Math.floor((parseFloat(l1) / 2) + 2);
                        }

                    } else {
                        if (flag_join === "0" || flag_join === 0) {
                            l2 = l - 2;
                            p1 = p;
                            l1 = l;
                            p2 = p - 1;
                            tinggi = t;
                            plep = Math.floor((parseFloat(l2) / 2) + 2);
                        } else {
                            l1 = l - 2;
                            p2 = p;
                            tinggi = t;
                            plep = Math.floor((parseFloat(l1) / 2) + 2);
                        }
                    }

                    kuping = 30;
                    break;
                case "DW":
                    if (meas_type === "UD") {
                        if (flag_join === "0" || flag_join === 0) {
                            l2 = l + 4;
                            p1 = p + 7;
                            l1 = l + 7;
                            p2 = p + 6;
                            tinggi = t + 14;
                            plep = Math.floor((parseFloat(l2) / 2) + 4);
                        } else {
                            l1 = l + 4;
                            p2 = p + 7;
                            tinggi = t + 14;
                            plep = Math.floor((parseFloat(l1) / 2) + 4);
                        }
                    } else {
                        if (flag_join === "0" || flag_join === 0) {
                            l2 = l - 4;
                            p1 = p - 3;
                            l1 = l - 3;
                            p2 = p - 4;
                            tinggi = t - 3;
                            plep = Math.floor((parseFloat(l2) / 2) + 4);
                        } else {
                            l1 = l - 4;
                            p2 = p - 3;
                            tinggi = t - 3;
                            plep = Math.floor((parseFloat(l1) / 2) + 4);
                        }
                    }

                    kuping = 40;
                    break;
                case "TW":
                    if (meas_type === "UD") {
                        if (flag_join === "0" || flag_join === 0) {
                            l2 = l + 4;
                            p1 = p + 7;
                            l1 = l + 7;
                            p2 = p + 6;
                            tinggi = t + 14;
                            plep = Math.floor((parseFloat(l2) / 2) + 5);
                        } else {
                            l1 = l + 4;
                            p2 = p + 7;
                            tinggi = t + 14;
                            plep = Math.floor((parseFloat(l1) / 2) + 5);
                        }
                    } else {
                        if (flag_join === "0" || flag_join === 0) {
                            l2 = l - 4;
                            p1 = p - 3;
                            l1 = l - 3;
                            p2 = p - 4;
                            tinggi = t - 3;
                            plep = Math.floor((parseFloat(l2) / 2) + 5);
                        } else {
                            l1 = l - 4;
                            p2 = p - 3;
                            tinggi = t - 3;
                            plep = Math.floor((parseFloat(l1) / 2) + 5);
                        }
                    }
                    kuping = 45;
                    break;
                default:
                    break;
            }

            $("#l-l2").text(l2)
            $("#l-p1").text(p1)
            $("#l-l1").text(l1)
            $("#l-t").text(tinggi)
            $("#l-p2").text(p2)
            $("#l-plape-1").text(plep)
            $("#l-plape-2").text(plep)
            $("#l-k").text(kuping)

            $("#length").val(p);
            $("#width").val(l);
            $("#height").val(t);

            $("#l2").val(l2)
            $("#p1").val(p1)
            $("#l1").val(l1)
            $("#t").val(tinggi)
            $("#p2").val(p2)
            $("#plape").val(plep)
            $("#k").val(kuping)

            if (flag_join === 0 || flag_join === "0") {

                // Perhitungan Panjang dan lebar Netto
                var netto_width = plep + tinggi + plep;
                var netto_length = l2 + p1 + l1 + p2 + kuping;
                $("#netto-width").val(netto_width);
                $("#netto-length").val(netto_length);

                // Perhitungan Panjang dan lebar Bruto
                var bruto_width = netto_width * 2;
                var bruto_length = netto_length + 20; // 20 penambahan buangan, ini bersifat dinamis tergantung dari customer
                $("#bruto-width").val(roundToNearestMultipleOf50(bruto_width));
                $("#bruto-length").val(roundToNearestMultipleOf5(bruto_length));

                var param1 = netto_width * 2;
                var param2 = roundToNearestMultipleOf50(bruto_width);

                if ((param2 - param1) < 50) {
                    bruto_width = bruto_width + 50;
                }

                //perhitungan banyak sheet
                if (netto_width <= 850) {
                    var qty_sheet = Math.ceil(spk_qty / 2);
                } else {
                    var qty_sheet = spk_qty * 1;
                }

                $("#sheet-quantity").val(qty_sheet);
            } else {
                // Perhitungan Panjang dan lebar Netto
                var netto_width = plep + tinggi + plep;
                var netto_length = l1 + p2 + kuping;
                $("#netto-width").val(netto_width);
                $("#netto-length").val(netto_length);

                // Perhitungan Panjang dan lebar Bruto
                var bruto_width = netto_width * 2;
                var bruto_length = netto_length + 20; // 20 penambahan buangan, ini bersifat dinamis tergantung dari customer
                $("#bruto-width").val(roundToNearestMultipleOf50(bruto_width));
                $("#bruto-length").val(roundToNearestMultipleOf5(bruto_length));

                var param1 = netto_width * 2;
                var param2 = roundToNearestMultipleOf50(bruto_width);

                if ((param2 - param1) < 50) {
                    bruto_width = bruto_width + 50;
                }

                //perhitungan banyak sheet
                if (netto_width <= 850) {
                    var qty_sheet = Math.ceil(spk_qty / 2);
                } else {
                    var qty_sheet = spk_qty * 1;
                }

                $("#sheet-quantity").val(qty_sheet);
            }
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