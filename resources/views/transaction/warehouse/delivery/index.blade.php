@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Warehouse</li>
<li class="breadcrumb-item active" aria-current="page">Shipping</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <h2 class="intro-y text-lg font-medium mt-10">
        Pengiriman
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;" class="btn btn-primary shadow-md mr-2">Surat Jalan Besar</a>
            <a href="javascript:;" class="btn btn-primary shadow-md mr-2">Surat Jalan Kecil</a>
            <a href="javascript:;" class="btn btn-primary shadow-md mr-2">Surat Jalan Sample</a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="filter"></i>
                    </span>
                </button>
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <!-- <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div> -->
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary shadow-md mr-2"><i data-lucide="plus" class="w-4 h-4 mr-2"></i> Buat Surat Jalan</a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">NO. SURAT JALAN</th>
                        <th class="whitespace-nowrap">NO. PO</th>
                        <th class="whitespace-nowrap">CUSTOMER</th>
                        <th class="text-center whitespace-nowrap">TANGGAL PENGIRIMAN</th>
                        <th class="text-center whitespace-nowrap">NO. KENDARAAN</th>
                        <th class="text-center whitespace-nowrap">PENEGEMUDI</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr class="intro-x">
                        <td>{{$item->travel_permit_no}}</td>
                        <td>{{$item->ref_po_customer}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($item->actual_delivery_date)); ?></td>
                        <td class="text-center">{{$item->licence_plate}}</td>
                        <td class="text-center">{{$item->driver_name}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary"
                                    href="{{route('warehouse.delivery.edit', ['id' => $item->id])}}" title="Edit SPK"><i
                                        data-lucide="edit" class="w-4 h-4 mr-1"></i>Detail</a>
                                <a class="flex items-center mr-3"
                                    href="{{route('warehouse.delivery.print', ['id' => $item->id])}}" target="_blank"
                                    title="Print Surat jalan"><i data-lucide="printer" class="w-4 h-4 mr-1"></i>
                                    Print</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    @if ($data->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true"><i class="w-4 h-4"
                                data-lucide="chevrons-left"></i></span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev"><i class="w-4 h-4"
                                data-lucide="chevron-left"></i></a>
                    </li>
                    @endif

                    @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                    <li class="page-item @if($page == $data->currentPage()) active @endif">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach

                    @if ($data->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next"><i class="w-4 h-4"
                                data-lucide="chevron-right"></i></a>
                    </li>
                    @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true"><i class="w-4 h-4"
                                data-lucide="chevrons-right"></i></span>
                    </li>
                    @endif
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Buat Surat Jalan
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('warehouse.delivery.save')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">No. PO</label>
                                        <select data-placeholder="Pilih PO Customer"
                                            class="tom-select w-full form-control" name="sales_order_id" required>
                                            <option value=" "> - </option>
                                            @foreach($salesOrders as $order)
                                            <option value="{{$order->id}}">{{$order->transaction_no}} -
                                                {{$order->ref_po_customer}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Tanggal
                                            Pengiriman</label>
                                        <input id="horizontal-form-1" type="date" class="form-control"
                                            name="delivery_date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="form-label sm:w-40">No. Kendaraan</label>
                                        <input id="vertical-form-1" type="text" class="form-control"
                                            name="licence_plate" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Pengemudi</label>
                                        <input id="vertical-form-1" type="text" class="form-control" name="driver_name"
                                            required>
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
    <!-- END: Delete Confirmation Modal -->
</div>
@endsection

@section('script')
<script>
$(function() {
    $(".loader").hide();
    $("#collapse-form").hide();

    $("#add-data").click(function() {
        $("#collapse-form").slideToggle("slow");
    });
})
</script>
@endsection