@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{route('warehouse.delivery.print', ['id' => $deliveryOrder->id])}}" target="_blank" class="btn btn-primary shadow-md mr-2"><i data-lucide="printer" class="w-4 h-4 mr-2"></i>Print Surat Jalan</a>
        </div>
    </div>
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Pengiriman</div>
                    <a href="" class="flex items-center ml-auto text-primary"> <i data-lucide="edit"
                            class="w-4 h-4 mr-2"></i> Change </a>
                </div>
                <div class="flex items-center"> <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                    NO. PO: <a href="{{route('sales.edit', ['id' => $deliveryOrder->sales_order_id])}}" target="_blank" class="underline decoration-dotted ml-1" title="Klik untuk melihat detail pesanan">{{$deliveryOrder->ref_po_customer}}</a>
                </div>
                <div class="flex items-center mt-3"> <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                    NO. DO: <strong> {{$deliveryOrder->travel_permit_no}}</strong>
                </div>
                <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Tanggal Pengiriman: <?php echo date("d M Y", strtotime($deliveryOrder->actual_delivery_date)); ?>
                </div>
                <div class="flex items-center mt-3"> <i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Alamat Pengiriman: {{$deliveryOrder->shipping_address}}
                </div>
            </div>
            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Customer</div>
                    <a href="" class="flex items-center ml-auto text-primary"> <i data-lucide="edit"
                            class="w-4 h-4 mr-2"></i> View Details </a>
                </div>
                <div class="flex items-center"> <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Name: <a href="" class="underline decoration-dotted ml-1">{{$deliveryOrder->customer_name}}</a>
                </div>
                <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Phone Number: {{$deliveryOrder->phone_number}}
                </div>
            </div>
            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <div class="font-medium text-base truncate">Daftar SPK</div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>NO. SPK</th>
                                <th class="text-center">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listSPK as $list)
                            <tr>
                                <td>{{$list->spk_no}}</td>
                                <td class="text-center">
                                    @if($list->status == 1)
                                    <div class="py-1 px-2 rounded-full text-xs bg-primary text-white cursor-pointer font-medium">INIT</div>
                                    @elseif($list->status == 2)
                                    <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">SCHEDULED</div>
                                    @elseif($list->status == 3)
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
        </div>
        <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pengiriman
                        
                    </div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview"
                        class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Barang </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap">SPESIFIKASI</th>
                                <th class="whitespace-nowrap text-center">UKURAN</th>
                                <th class="whitespace-nowrap text-center">QUANTITY</th>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailDeliveryOrder as $do)
                            <tr>
                                <td>{{$do->goods_name}}</td>
                                <td>{{$do->specification}}</td>
                                <td class="text-center">{{$do->measure}}</td>
                                <td class="text-center">{{$do->quantity}}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-primary" href=""> <i data-lucide="edit"
                                                class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center mr-3 text-danger" href="{{route('warehouse.delivery.detail.delete', ['id' => $do->id ])}}" onclick="return confirm('Apakah anda yakin ?')"> <i data-lucide="trash-2"
                                                class="w-4 h-4 mr-1"></i> Hapus </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="intro-y col-span-12 lg:col-span-12">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambah Barang
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('warehouse.delivery.detail.save')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="form-label sm:w-20">Barang</label>
                                                    <select data-placeholder="Pilih Barang" class="tom-select w-full form-control" name="detail_sales_order_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($goodsList as $goods)
                                                        <option value="{{$goods->id}}" <?php echo ($goods->quantity == 0) ? "disabled" : "" ?>>{{$goods->goods_name}} | {{$goods->specification}} | {{$goods->measure}} | QTY : {{$goods->quantity}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Quantity </label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="quantity" required>
                                                    <input type="hidden" class="form-control" name="delivery_order_id" value="{{$deliveryOrder->id}}">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-20">Catatan</label>
                                                    <textarea id="vertical-form-1" type="text" class="form-control" name="remarks" required></textarea>
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