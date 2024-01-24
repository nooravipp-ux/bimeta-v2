@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{$salesOrder->transaction_no}}
        </h2>
        <!-- <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2">Print</button>
        </div> -->
    </div>
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Pesanan</div>
                    <a href="" class="flex items-center ml-auto text-primary"> <i data-lucide="edit"
                            class="w-4 h-4 mr-2"></i> Change Status </a>
                </div>
                <div class="flex items-center"> <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                    NO. PO: <a href="" class="ml-1">{{$salesOrder->ref_po_customer}}</a>
                </div>
                <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Tanggal Pemesanan: <?php echo date("d M Y", strtotime($salesOrder->order_date)); ?> </div>
                <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Tanggal Pengiriman: <?php echo date("d M Y", strtotime($salesOrder->delivery_date)); ?></div>
                <div class="flex items-center mt-3"> <i data-lucide="clock" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Status Pesanan:
                    <span class="bg-success/20 text-success rounded px-2 ml-1">
                        @if($salesOrder->status == 1)
                        DRAFT
                        @elseif($salesOrder->status == 2)
                        CLAIMED BY PIC
                        @else
                        COMPLETED
                        @endif
                    </span>
                </div>
            </div>
            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Customer</div>
                    <a href="" class="flex items-center ml-auto text-primary"> <i data-lucide="edit"
                            class="w-4 h-4 mr-2"></i> View Details </a>
                </div>
                <div class="flex items-center"> <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Name: <a href="" class="ml-1">{{$salesOrder->cust_name}}</a> </div>
                <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Phone Number: {{$salesOrder->phone_number}} 
                </div>
                <div class="flex items-center mt-3"> <i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Alamat: {{$salesOrder->address}} </div>
            </div>
            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Pengiriman</div>
                    <a href="" class="flex items-center ml-auto text-primary"> <i data-lucide="map-pin"
                            class="w-4 h-4 mr-2"></i> Tracking Info </a>
                </div>
                <div class="flex items-center mt-3"> <i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Alamat Pengiriman: {{$salesOrder->shipping_address}} </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pesanan</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview"
                        class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Barang </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-success">
                            <tr>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap">SPESIFIKASI</th>
                                <th class="whitespace-nowrap text-center">UKURAN</th>
                                <th class="whitespace-nowrap text-center">QUANTITY</th>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailSalesOrders as $detail)
                            <tr>
                                <td>{{$detail->goods_name}}</td>
                                <td>{{$detail->specification}}</td>
                                <td class="text-center">{{$detail->measure}}</td>
                                <td class="text-center">{{$detail->quantity}}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3"
                                            href=""> <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger" href="javascript:;"
                                            data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i
                                                data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambah Barang
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('sales.detail.save')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="form-label sm:w-20">Barang</label>
                                                    <select data-placeholder="Pilih Barang" class="tom-select w-full form-control" name="goods_id" required>
                                                        <option value="">-</option>
                                                        @foreach($data as $data)
                                                        <option value="{{$data->id}}">{{$data->goods_name}} | {{$data->specification}} | {{$data->measure}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Quantity </label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="quantity" required>
                                                    <input id="vertical-form-1" type="hidden" class="form-control" name="sales_order_id" value="{{$salesOrder->id}}">
                                                </div>
                                                <div class="form-inline mt-5 lem">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Cetakan</label>
                                                    <div class="flex flex-col sm:flex-row">
                                                        <div class="form-check mr-2">
                                                            <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_print" value="0" checked>
                                                            <label class="form-check-label" for="radio-switch-4">Polos</label>
                                                        </div>
                                                        <div class="form-check mr-2 sm:mt-0">
                                                            <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_print" value="1">
                                                            <label class="form-check-label" for="radio-switch-5">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Remarks </label>
                                                    <textarea id="vertical-form-1" type="number" class="form-control" name="remarks"></textarea>
                                                </div>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
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