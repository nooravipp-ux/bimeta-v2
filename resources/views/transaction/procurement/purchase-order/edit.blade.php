@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Detail Purchase Order
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{route('procurement.purchase-order.print', ['id' => $purchase->id])}}" target="_blank" class="btn btn-primary shadow-md mr-2"><i data-lucide="printer" class="w-4 h-4 mr-2"></i>Print PO</a>
        </div>
    </div>
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Pembelian</div>
                    <a href="" class="flex items-center ml-auto text-white btn btn-primary shadow-md mr-2"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </a>
                </div>
                <div id="horizontal-form" class="p-5">
                    <div class="preview">
                        <div class="form-inline">
                            <label for="horizontal-form-2" class="form-label sm:w-20">No. PO</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="" value="{{$purchase->po_no}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Supplier</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="supplier" value="{{$purchase->name}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Tanggal PO</label>
                            <input id="horizontal-form-1" type="date" class="form-control" name="date"  value="{{$purchase->date}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Jenis Pajak</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="jenis_pajak" value="{{$purchase->tax_type}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Status</label>
                            <input id="horizontal-form-1" type="text" class="form-control" name="jenis_pajak" value="{{$purchase->status}}" readonly>
                        </div>
                        <!-- <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="form-label sm:w-20">Catatan</label>
                            <textarea id="vertical-form-1" type="text" class="form-control" name="remarks" readonly>{{$purchase->remarks}}</textarea>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pembelian</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Barang </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr> 
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap text-center">GRAMATURE</th>
                                <th class="whitespace-nowrap text-center">UKURAN (CM)</th>
                                <th class="whitespace-nowrap text-center">JUMLAH</th>
                                <th class="whitespace-nowrap text-center">SATUAN</th>
                                <th class="whitespace-nowrap text-right">HARGA</th>
                                <th class="whitespace-nowrap text-right">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-primary mr-3" href=""><i
                                        data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit</a>
                                        <a class="flex items-center text-danger mr-3" href="{{route('procurement.purchase-order.detail.delete', ['id' => $data->id])}}" onclick="return confirm('Apakah anda yakin ?')" title="Print SPK"><i data-lucide="trash-2"
                                        class="w-4 h-4 mr-1"></i> Delete</a>
                                    </div>
                                </td>
                                <td>{{$data->name}}</td>
                                <td class="text-center">{{$data->gramature}} {{$data->unit}}</td>
                                <td class="text-center">L {{$data->width}}</td>
                                <td class="text-center quantity">{{$data->quantity}}</td>
                                <td class="text-center">{{$data->measure_unit}}</td>
                                <td class="text-right price">{{$data->price}}</td>
                                <td class="text-right total-price">0,00</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap text-center"></td>
                                <td class="whitespace-nowrap text-right font-bold">Sub Total</td>
                                <td class="whitespace-nowrap text-right sub-total">0,00</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap text-center"></td>
                                <td class="whitespace-nowrap text-right font-bold">Tax (11%)</td>
                                <td class="whitespace-nowrap text-right tax">0,00</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap text-center"></td>
                                <td class="whitespace-nowrap text-right font-bold">Jumlah Total</td>
                                <td class="whitespace-nowrap text-right total-amount">0,00</td>
                            </tr>
                        </tfoot>
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
                                        <form method="POST" action="{{route('procurement.purchase-order.detail.save')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="form-label sm:w-20">Material</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="material_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($materials as $material)
                                                        <option value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Ukuran (CM)</label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="width" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Jumlah</label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="quantity" required>
                                                    <input id="vertical-form-1" type="hidden" class="form-control" name="purchase_id" value="{{$purchase->id}}">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Satuan</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="measure_unit" required>
                                                        <option value=" ">-</option>
                                                        <option value="ROLL">ROLL</option>
                                                        <option value="KG">KG</option>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Harga</label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="price" value="0" required>
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
    $(function() {
        updateTotals()
        // Function to update totals when quantity or price changes
        function updateTotals() {
            var subtotal = 0;
            var taxRate = 0.11; // 11% tax rate

            // Iterate through each row in the tbody
            $('tbody tr').each(function(){
                var quantity = parseFloat($(this).find('.quantity').text());
                var price = parseFloat($(this).find('.price').text().replace(/,/g, '')); // Remove commas from the price

                $(this).find('.price').text(price.toLocaleString('en-US', {minimumFractionDigits: 2}));

                // Calculate total for the current row
                var total = quantity * price;
                console.log(total);

                // Update the total column for the current row
                $(this).find('.total-price').text(total.toLocaleString('en-US', {minimumFractionDigits: 2}));

                // Add the total to the subtotal
                subtotal += total;
            });

            var taxType = {{$purchase->tax_type}};

            if(taxType === 0 || taxType === 1) {
                taxRate = 0;
            }

            // Calculate tax and total amount
            var tax = subtotal * taxRate;
            var totalAmount = subtotal + tax;

            

            // Update the subtotal, tax, and total amount in the footer
            $('.sub-total').text(subtotal.toLocaleString('en-US', {minimumFractionDigits: 2}));
            $('.tax').text(tax.toLocaleString('en-US', {minimumFractionDigits: 2}));
            $('.total-amount').text(totalAmount.toLocaleString('en-US', {minimumFractionDigits: 2}));
        }
    });
</script>
@endsection