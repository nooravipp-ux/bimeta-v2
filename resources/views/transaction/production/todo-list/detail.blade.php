@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Pesanan</div>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">No Sales Order</label> 
                    <input id="vertical-form-1" type="text" class="form-control" value="{{$salesOrder->transaction_no}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">No P.O Customer</label> 
                    <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$salesOrder->ref_po_customer}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Nama Customer</label> 
                    <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$salesOrder->cust_name}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Tanggal P.O</label> 
                    <input id="vertical-form-1" type="date" class="form-control" name="id" value="{{$salesOrder->order_date}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Tanggal kirim (Plan)</label> 
                    <input id="vertical-form-1" type="date" class="form-control" name="id" value="{{$salesOrder->delivery_date}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Status</label> 
                    <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$salesOrder->str_status}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Jenis Pajak</label> 
                    <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$salesOrder->str_tax_type}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Alamat Pengiriman</label> 
                    <textarea id="vertical-form-1" type="text" name="id" class="form-control" readonly>{{$salesOrder->shipping_address}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pesanan</div>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap">SPESIFIKASI</th>
                                <th class="whitespace-nowrap">UKURAN</th>
                                <th class="whitespace-nowrap text-center">QUANTITY</th>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailSalesOrders as $detail)
                            <tr>
                                <td>{{$detail->goods_name}}</td>
                                <td>{{$detail->specification}}</td>
                                <td>{{$detail->measure}}</td>
                                <td class="text-center">{{$detail->quantity}}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-primary"
                                            href="{{route('production.spk.create', ['id' => $detail->id])}}"> <i
                                            data-lucide="edit" class="w-4 h-4 mr-1 text-primary"></i> Buat SPK </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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