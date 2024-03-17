@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">
                        Informasi Pengiriman
                    </div>
                    <div class="flex items-center ml-auto">
                        <a href="{{route('warehouse.delivery.print', ['id' => $deliveryOrder->id])}}" target="_blank" class="btn btn-primary shadow-md mr-2"><i data-lucide="printer" class="w-4 h-4 mr-2"></i>Print Surat Jalan</a>
                    </div>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">No Pengiriman</label> 
                    <input id="vertical-form-1" type="text" class="form-control" value="{{$deliveryOrder->travel_permit_no}}" readonly>
                    <input id="vertical-form-1" type="hidden" class="form-control" name="{{$deliveryOrder->id}}" value="" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">No P.O</label> 
                    <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$deliveryOrder->ref_po_customer}}">
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Customer</label> 
                    <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$deliveryOrder->customer_name}}">
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Tanggal kirim (Plan)</label> 
                    <input id="vertical-form-1" type="date" class="form-control" name="id" value="{{$deliveryOrder->plan_delivery_date}}">
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Tanggal kirim (Actual)</label> 
                    <input id="vertical-form-1" type="date" class="form-control" name="id" value="{{$deliveryOrder->actual_delivery_date}}">
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="form-label w-40">Alamat Pengiriman</label> 
                    <textarea id="vertical-form-1" type="text" name="id" class="form-control">{{$deliveryOrder->shipping_address}}</textarea>
                </div>
                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                        <button type="button" id="calculate-hpp" class="btn btn-primary w-full md:w-52">Update</button>
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
        <div class="col-span-12 lg:col-span-8 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">
                        Detail Pengiriman
                    </div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Barang </a>
                </div>
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible show flex items-center mb-10" role="alert"> 
                    <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ session('error') }} <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button> 
                </div>
                @endif
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap">SPESIFIKASI</th>
                                <th class="whitespace-nowrap">UKURAN</th>
                                <th class="whitespace-nowrap text-center">QUANTITY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailDeliveryOrder as $do)
                            <tr>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-primary" href=""> <i data-lucide="edit"
                                                class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center mr-3 text-danger" href="{{route('warehouse.delivery.detail.delete', ['id' => $do->id ])}}" onclick="return confirm('Apakah anda yakin ?')"> <i data-lucide="trash-2"
                                                class="w-4 h-4 mr-1"></i> Hapus </a>
                                    </div>
                                </td>
                                <td>{{$do->goods_name}}</td>
                                <td>{{$do->specification}}</td>
                                <td>{{$do->measure}}</td>
                                <td class="text-center">{{$do->quantity}}</td>
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