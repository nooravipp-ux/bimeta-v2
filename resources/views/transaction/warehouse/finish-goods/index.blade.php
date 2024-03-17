@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Warehouse</li>
<li class="breadcrumb-item" aria-current="page">Stock</li>
<li class="breadcrumb-item active" aria-current="page">Finish Goods</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#stok-opname" class="btn btn-primary shadow-md mr-2">Stok Opname</a>
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#stok-adjustment" class="btn btn-primary shadow-md mr-2">Stok Adjustment</a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to Excel </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">NAMA BARANG</th>
                        <th class="whitespace-nowrap">SPESIFIKASI</th>
                        <th class="whitespace-nowrap">UKURAN</th>
                        <th class="whitespace-nowrap text-center">JUMLAH</th>
                        <th class="whitespace-nowrap text-center">REFERENCE</th>
                        <th class="whitespace-nowrap text-center">TANGGAL MASUK</th>
                        <th class="whitespace-nowrap text-center">TERAKHIR DI PERBAHARUI</th>
                        <th class="whitespace-nowrap text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->specification}}</td>
                        <td>{{$item->measure}}</td>
                        <td class="text-center">{{$item->quantity}}</td>
                        <td class="text-center">{{$item->source_from}}</td>
                        <td class="text-center">{{$item->created_at}}</td>
                        <td class="text-center">{{$item->created_at}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-warning mr-3" href="{{route('warehouse.finish-goods.print-label', ['id' => $item->id])}}" target="_blank" title="Print Label"><i data-lucide="printer" class="w-4 h-4 mr-1"></i> Print Label</a>
                                <a class="flex items-center text-warning mr-3" href="" target="_blank" title="Print PO"><i data-lucide="repeat" class="w-4 h-4 mr-1"></i> Log</a>
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
                    <!-- Previous Page Link -->
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

                    <!-- Pagination Elements -->
                    @foreach ($data->getUrlRange(max(1, $data->currentPage() - 2), min($data->lastPage(), $data->currentPage() + 2)) as $page => $url)
                    <li class="page-item @if($page == $data->currentPage()) active @endif">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach

                    <!-- Next Page Link -->
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
            <p class="pagination-text">Halaman {{ $data->currentPage() }} Dari {{ $data->lastPage() }}</p>
        </div>
        <!-- END: Pagination -->
    </div>
     <!-- BEGIN: Stock Opname Modal -->
     <div id="stok-opname" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Form Stok Opname
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('warehouse.finish-goods.stock-opname.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Nama Barang</label>
                                        <select data-placeholder="Pilih Barang" class="tom-select w-full form-control" name="goods_id" required>
                                            <option value=" "> - </option>
                                            @foreach($goods as $goods)
                                            <option value="{{$goods->goods_id}}"> {{$goods->goods_name}} | {{$goods->specification}} | {{$goods->measure}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jumlah</label>
                                        <input id="horizontal-form-1" type="number" class="form-control" name="quantity" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Tanggal</label>
                                        <input id="horizontal-form-1" type="date" class="form-control" name="date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Reference</label>
                                        <input id="horizontal-form-1" type="text" class="form-control" name="reference" value="Stock Opname" required readonly>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Catatan</label>
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
                </div>
            </div>
        </div>
    </div>
    <!-- END: Stock Opname Modal -->

    <!-- BEGIN: Stock Opname Modal -->
    <div id="stok-adjustment" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Form Stok Adjustment
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('warehouse.finish-goods.stock-adjustment.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Nama Barang</label>
                                        <select data-placeholder="Pilih Barang" class="tom-select w-full form-control" name="stock_id" required>
                                            <option value=" "> - </option>
                                            @foreach($stocks as $goods)
                                            <option value="{{$goods->stock_id}}"> {{$goods->goods_name}} | {{$goods->specification}} | {{$goods->measure}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jumlah</label>
                                        <input id="horizontal-form-1" type="number" class="form-control" name="quantity" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Tanggal</label>
                                        <input id="horizontal-form-1" type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Stock Opname Modal -->
</div>
@endsection

@section('script')
<script>
$(function() {

})
</script>
@endsection