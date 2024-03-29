@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Master Data</li>
<li class="breadcrumb-item active" aria-current="page">Barang</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{route('goods.create')}}" class="btn btn-primary shadow-md mr-2">Tambah Barang</a>
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
                        <th class="whitespace-nowrap">KODE</th>
                        <th class="whitespace-nowrap">NAMA BARANG</th>
                        <th class="whitespace-nowrap text-center">JENIS BARANG</th>
                        <th class="whitespace-nowrap">SPESIFIKASI</th>
                        <th class="whitespace-nowrap">UKURAN</th>
                        <th class="whitespace-nowrap">HARGA DASAR (HPP)</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->code}}</td>
                        <td>{{$item->goods_name}}</td>
                        <td class="text-center">{{$item->goods_type}}</td>
                        <td>{{$item->specification}}</td>
                        <td>{{$item->measure}}</td>
                        <td></td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary"
                                    href="{{route('goods.edit', ['id' => $item->id])}}"> <i data-lucide="edit"
                                        class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                        class="w-4 h-4 mr-1"></i> Delete </a>
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
                        <span class="page-link" aria-hidden="true"><i class="w-4 h-4" data-lucide="chevrons-left"></i></span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev"><i class="w-4 h-4" data-lucide="chevron-left"></i></a>
                    </li>
                    @endif

                    <!-- Pagination Elements -->
                    @php
                    $currentPage = $data->currentPage();
                    $lastPage = $data->lastPage();
                    $maxVisibleLinks = 5;
                    $halfMaxVisibleLinks = floor($maxVisibleLinks / 2);
                    $startPage = max(1, $currentPage - $halfMaxVisibleLinks);
                    $endPage = min($lastPage, $currentPage + $halfMaxVisibleLinks);
                    @endphp

                    @if ($startPage > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->url(1) }}">1</a>
                        </li>
                        @if ($startPage > 2)
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @for ($page = $startPage; $page <= $endPage; $page++)
                        <li class="page-item @if($page == $currentPage) active @endif">
                            <a class="page-link" href="{{ $data->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor

                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->url($lastPage) }}">{{ $lastPage }}</a>
                        </li>
                    @endif

                    <!-- Next Page Link -->
                    @if ($data->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next"><i class="w-4 h-4" data-lucide="chevron-right"></i></a>
                    </li>
                    @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true"><i class="w-4 h-4" data-lucide="chevrons-right"></i></span>
                    </li>
                    @endif
                </ul>
            </nav>
            <p class="pagination-text">Page {{ $currentPage }} of {{ $lastPage }}</p>
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
                                Tambah Barang
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('goods.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inlin mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Nama Barang</label>
                                        <input id="vertical-form-1" type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-inlin mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Barang</label>
                                        <select data-placeholder="Pilih Jenis Ply"
                                            class="tom-select w-full form-control" name="goods_type" id="goods-type">
                                            <option value="">-</option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="3">AB</option>
                                            <option value="4">BB</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 standard-type">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply</label>
                                        <select data-placeholder="Pilih Jenis Ply"
                                            class="tom-select w-full form-control" name="ply_type">
                                            <option value="">-</option>
                                            <option value="SF">SF</option>
                                            <option value="SW">SW</option>
                                            <option value="DW">DW</option>
                                            <option value="TW">TW</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 standard-type">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute</label>
                                        <select data-placeholder="Pilih Jenis Flute"
                                            class="tom-select w-full form-control" name="flute_type">
                                            <option value=" ">-</option>
                                            <option value="B">B/F</option>
                                            <option value="C">C/F</option>
                                            <option value="E">E/F</option>
                                            <option value="B/C">B/C</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 standard-type">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Substance</label>
                                        <select data-placeholder="Pilih Substance"
                                            class="tom-select w-full form-control" name="substance">
                                            <option value=" ">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->code}}">{{$substance->code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 standard-type">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Ukuran</label>
                                        <div class="grid grid-cols-12 gap-2">
                                            <input type="text" class="form-control col-span-4" placeholder="P"
                                                name="length" id="length">
                                            <input type="text" class="form-control col-span-4" placeholder="L"
                                                name="width" id="width">
                                            <input type="text" class="form-control col-span-4" placeholder="T"
                                                name="height" id="height">
                                        </div>
                                    </div>
                                    <div class="form-inlin mt-5 standard-type">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran</label>
                                        <select data-placeholder="Pilih Jenis Flute"
                                            class="tom-select w-full form-control" name="meas_unit">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 standard-type">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ukuran</label>
                                        <select data-placeholder="Pilih Jenis Flute"
                                            class="tom-select w-full form-control" name="meas_type">
                                            <option value=" ">-</option>
                                            <option value="UD">UD</option>
                                            <option value="UL">UL</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 standard-type">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Harga</label>
                                        <input id="vertical-form-1" type="number" class="form-control" name="price"
                                            value="0">
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply
                                            (Top)</label>
                                        <select data-placeholder="Pilih Jenis Ply"
                                            class="tom-select w-full form-control" name="top_ply_type">
                                            <option value=" ">-</option>
                                            <option value="SF">SINGLE FACE</option>
                                            <option value="SW">SINGLE WALL</option>
                                            <option value="DW">DOUBLE WALL</option>
                                            <option value="TW">TRIPLE WALL</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute
                                            (Top)</label>
                                        <select data-placeholder="Pilih Jenis Flute"
                                            class="tom-select w-full form-control" name="top_flute_type">
                                            <option value=" ">-</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="E">E</option>
                                            <option value="B/C">B/C</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Substance (Top)</label>
                                        <select data-placeholder="Pilih Substance"
                                            class="tom-select w-full form-control" name="top_substance">
                                            <option value="">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->code}}">{{$substance->code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Ukuran (Top)</label>
                                        <div class="grid grid-cols-12 gap-2">
                                            <input type="text" class="form-control col-span-4" placeholder="P"
                                                name="top_length" id="top_length">
                                            <input type="text" class="form-control col-span-4" placeholder="L"
                                                name="top_width" id="top_width">
                                            <input type="text" class="form-control col-span-4" placeholder="T"
                                                name="top_height" id="top_height">
                                        </div>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran
                                            (Top)</label>
                                        <select data-placeholder="Pilih Jenis Flute"
                                            class="tom-select w-full form-control" name="top_meas_unit">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Harga (Top)</label>
                                        <input id="vertical-form-1" type="number" class="form-control" name="top_price"
                                            value="0">
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Ply
                                            (Bottom)</label>
                                        <select data-placeholder="Pilih Jenis Ply"
                                            class="tom-select w-full form-control" name="bottom_ply_type">
                                            <option value="">-</option>
                                            <option value="SF">SINGLE FACE</option>
                                            <option value="SW">SINGLE WALL</option>
                                            <option value="DW">DOUBLE WALL</option>
                                            <option value="TW">TRIPLE WALL</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Flute
                                            (Bottom)</label>
                                        <select data-placeholder="Pilih Jenis Flute"
                                            class="tom-select w-full form-control" name="bottom_flute_type">
                                            <option value=" ">-</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="E">E</option>
                                            <option value="B/C">B/C</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Substance
                                            (Bottom)</label>
                                        <select data-placeholder="Pilih Substance"
                                            class="tom-select w-full form-control" name="bottom_substance">
                                            <option value="">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->code}}">{{$substance->code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Ukuran (Bottom)</label>
                                        <div class="grid grid-cols-12 gap-2">
                                            <input type="text" class="form-control col-span-4" placeholder="P"
                                                name="bottom_length" id="top_length">
                                            <input type="text" class="form-control col-span-4" placeholder="L"
                                                name="bottom_width" id="top_width">
                                            <input type="text" class="form-control col-span-4" placeholder="T"
                                                name="bottom_height" id="top_height">
                                        </div>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Satuan Ukuran
                                            (Bottom)</label>
                                        <select data-placeholder="Pilih Jenis Flute"
                                            class="tom-select w-full form-control" name="bottom_meas_unit">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                    <div class="form-inlin mt-5 top-bottom">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">Harga (Bottom)</label>
                                        <input id="vertical-form-1" type="number" class="form-control"
                                            name="bottom_price" value="0">
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $("#superlarge-modal-size-preview .top-bottom").hide();
    var goods_type = $("#superlarge-modal-size-preview #goods-type").val();

    $("#superlarge-modal-size-preview #goods-type").change(function() {
        if ($(this).val() === "3" || $(this).val() === "4") {
            $("#superlarge-modal-size-preview .top-bottom").show();
            $("#superlarge-modal-size-preview .standard-type").hide();
        } else {
            $("#superlarge-modal-size-preview .top-bottom").hide();
            $("#superlarge-modal-size-preview .standard-type").show();
        }
    })
});
@endsection