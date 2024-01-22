@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{$deliveryOrder->travel_permit_no}}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2">Print Surat Jalan</button>
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
                    NO. PO: <a href="" class="underline decoration-dotted ml-1">{{$deliveryOrder->ref_po_customer}}</a>
                </div>
                <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Tanggal Pengiriman: <?php echo date("d M Y", strtotime($deliveryOrder->actual_delivery_date)); ?>
                </div>
                <div class="flex items-center mt-3"> <i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Alamat Pengiriman: {{$deliveryOrder->address}}
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
                        <thead class="table-primary">
                            <tr>
                                <th>No. SPK</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SPK-24-0001</td>
                                <td class="text-center">DONE</td>
                            </tr>
                            <tr>
                                <td>SPK-24-0001</td>
                                <td class="text-center">WORK IN PROGRESS</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Barang</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview"
                        class="flex items-center ml-auto text-primary"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Barang </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Nama Barang</th>
                                <th class="whitespace-nowrap">Spesifikasi</th>
                                <th class="whitespace-nowrap text-center">Ukuran</th>
                                <th class="whitespace-nowrap text-center">Quantity</th>
                                <th class="whitespace-nowrap text-center">Action</th>
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
                                        <a class="flex items-center mr-3" href=""> <i data-lucide="edit"
                                                class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center mr-3 text-danger" href="{{route('warehouse.delivery.detail.delete', ['id' => $do->id ])}}"> <i data-lucide="trash-2"
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
                                            Form Tambah Barang
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('warehouse.delivery.detail.save')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="form-label sm:w-40">Barang</label>
                                                    <select data-placeholder="Pilih Barang" class="tom-select w-full form-control" name="goods_id" required>
                                                        <option value="">-</option>
                                                        @foreach($goodsList as $spk)
                                                        <option value="{{$spk->id}}" <?php echo ($spk->quantity == 0) ? "disabled" : "" ?>>{{$spk->spk_no}} | {{$spk->goods_name}} | {{$spk->specification}} | {{$spk->measure}} | QTY : {{$spk->quantity}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-40">Quantity </label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="quantity" required>
                                                    <input type="hidden" class="form-control" name="delivery_order_id" value="{{$deliveryOrder->id}}">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="form-label sm:w-40">Catatan</label>
                                                    <textarea id="vertical-form-1" type="text" class="form-control" name="remarks" required></textarea>
                                                </div>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button"
                                                    class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Batal</button>
                                                <button type="submit"
                                                    class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
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