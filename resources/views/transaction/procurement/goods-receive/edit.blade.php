@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="" target="_blank" class="btn btn-primary shadow-md mr-2">Lihat PO Pembelian</a>
        </div>
    </div>
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Penerimaan</div>
                    <a href="" class="flex items-center ml-auto text-success"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </a>
                </div>
                <div id="horizontal-form" class="p-5">
                    <div class="preview">
                        <div class="form-inline">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Supplier</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="date"  value="{{$goodsReceive->name}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">No PO</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="supplier" value="{{$goodsReceive->po_no}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">No Surat Jalan</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="jenis_pajak" value="{{$goodsReceive->gr_no}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Tanggal</label>
                            <input id="horizontal-form-1" type="datetime-local" class="form-control" name="jenis_pajak" value="{{$goodsReceive->date}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Penerima</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name=""  value="{{$goodsReceive->receiver}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Penerimaan</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus"
                            class="w-4 h-4 mr-2"></i>
                        Tambah Barang </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-success">
                            <tr>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap text-center">GRAMATURE</th>
                                <th class="whitespace-nowrap text-center">UKURAN (CM)</th>
                                <th class="whitespace-nowrap text-center">JUMLAH</th>
                                <th class="whitespace-nowrap text-center">SATUAN</th>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            
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
                                            Tambah Barang
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('procurement.goods-receive.detail.save')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="form-label sm:w-20">Material</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="material_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($materials as $material)
                                                        <option value="{{$material->id}}">{{$material->name}} L {{$material->width}} CM QTY: {{$material->quantity}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <!-- <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Nomor Roll</label>
                                                    <input id="vertical-form-1" type="text" class="form-control" name="width" required>
                                                </div> -->
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Quantity</label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="quantity" required>
                                                    
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Satuan</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="measure_unit" required>
                                                        <option value=" ">-</option>
                                                        <option value="ROLL">ROLL</option>
                                                        <option value="KG">KG</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
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
        </div>
    </div>
    <!-- END: Transaction Details -->
</div>
@endsection

@section('script')
<script>

</script>
@endsection