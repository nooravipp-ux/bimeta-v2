@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <!-- <a href="" target="_blank" class="btn btn-primary shadow-md mr-2">Lihat PO Pembelian</a> -->
        </div>
    </div>
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Penerimaan</div>
                </div>
                <div id="horizontal-form">
                    <div class="preview">
                        <div class="form-inline">
                            <label for="horizontal-form-2" class="form-label sm:w-20">No PO</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="supplier" value="{{$goodsReceive->po_no}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Supplier</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="date"  value="{{$goodsReceive->name}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">No Surat Jalan</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="jenis_pajak" value="{{$goodsReceive->gr_no}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Tanggal</label>
                            <input id="horizontal-form-1" type="datetime-local" class="form-control" name="date" value="{{$goodsReceive->date}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Penerima</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name=""  value="{{$goodsReceive->receiver}}" readonly>
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="button" id="calculate-hpp" class="btn py-3 btn-primary w-full md:w-52">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Penerimaan</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus"
                            class="w-4 h-4 mr-2"></i>
                        Tambah Barang </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>   
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap">NO. ROLL</th>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap text-center">DIAMETER (CM)</th>
                                <th class="whitespace-nowrap text-center">BERAT (KG)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $item)
                            <tr>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-primary mr-3" href=""><i
                                        data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit</a>
                                        <a class="flex items-center text-danger mr-3" href="{{route('procurement.goods-receive.detail.delete', ['id' => $item->id])}}" onclick="return confirm('Apakah anda yakin ?')" title="Print SPK"><i data-lucide="trash"
                                        class="w-4 h-4 mr-1"></i> Delete</a>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap">{{$item->no_roll}}</td>
                                <td class="whitespace-nowrap">{{$item->name}} L: {{$item->width}}</td>
                                <td class="whitespace-nowrap text-center">{{$item->diameter}}</td>
                                <td class="whitespace-nowrap text-center weight">{{$item->weight}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap text-center"></td>
                                <td class="whitespace-nowrap text-center font-bold">TOTAL</td>
                                <td class="whitespace-nowrap text-center total">0,00</td>
                            </tr>
                        </tfoot> -->
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
                                                    <label for="horizontal-form-2" class="form-label sm:w-40">Nama Barang</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="detail_purchase_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($materials as $material)
                                                        <option value="{{$material->id}}">{{$material->name}} | L {{$material->width}} CM | QTY: {{$material->quantity}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-40">Nomor Roll</label>
                                                    <input id="vertical-form-1" type="text" class="form-control" name="no_roll" required>
                                                    <input id="vertical-form-1" type="hidden" class="form-control" name="goods_receive_id" value="{{$goodsReceive->id}}" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-40">Diameter (Cm)</label>
                                                    <input id="vertical-form-1" type="text" class="form-control" name="diameter" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-40">Berat (Kg)</label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="weight" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-40">Keterangan</label>
                                                    <textarea id="vertical-form-1" type="text" class="form-control" name="remarks"></textarea>
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
    // $(function() {
    //     updateTotals()
    //     // Function to update totals when quantity or price changes
    //     function updateTotals() {
    //         var total = 0;

    //         // Iterate through each row in the tbody
    //         $('tbody tr').each(function(){
    //             var weight = parseFloat($(this).find('.weight').text());
    //             // Add the total to the subtotal
    //             total += weight;
    //         });

    //         // Update the subtotal, tax, and total amount in the footer
    //         $('.total').text(total);
    //     }
    // });
</script>
@endsection