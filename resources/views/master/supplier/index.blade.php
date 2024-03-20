@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Master Data</li>
<li class="breadcrumb-item active" aria-current="page">Supplier</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary text-white">
                Tambah Supplier
            </a>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" id="searchInput" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">CODE</th>
                        <th class="whitespace-nowrap">NAMA SUPPLIER</th>
                        <th class="whitespace-nowrap">EMAIL</th>
                        <th class="whitespace-nowrap">NO. TELEPON</th>
                        <th class="whitespace-nowrap">ALAMAT</th>
                        <th class="text-center">PIC</th>
                        <th class="text-center">JENIS PAJAK</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td class="whitespace-nowrap">{{$item->code}}</td>
                        <td class="whitespace-nowrap">{{$item->name}}</td>
                        <td class="whitespace-nowrap"></td>
                        <td class="whitespace-nowrap">{{$item->phone_number}}</td>
                        <td class="whitespace-nowrap">{{$item->address}}</td>
                        <td class="text-center">{{$item->pic}}</td>
                        <td class="text-center">{{$item->tax_type}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary"
                                    href="{{route('supplier.edit', ['id' => $item->id])}}"> <i data-lucide="edit"
                                        class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-danger"
                                    href="{{route('supplier.delete', ['id' => $item->id])}}" data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                        class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
        <!-- END: Data List -->
        <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- BEGIN: Horizontal Form -->
                        <div class="intro-y box">
                            <div
                                class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Tambah Supplier
                                </h2>
                            </div>
                            <div id="horizontal-form" class="p-5">
                                <form method="POST" action="{{route('supplier.save')}}">
                                    @csrf
                                    <div id="horizontal-form">
                                        <div class="preview">
                                            <div class="form-inline">
                                                <label for="vertical-form-1" class="form-label sm:w-40">Code</label>
                                                <input type="text" class="form-control" name="code">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">Nama Supplier</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="phone_number">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">Fax</label>
                                                <input type="text" class="form-control" name="fax">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">PIC</label>
                                                <input type="text" class="form-control" name="pic">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">No. Rekening</label>
                                                <input type="text" class="form-control" name="bank_account_no">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">Rekening A/N</label>
                                                <input type="text" class="form-control" name="bank_account_name">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">Bank</label>
                                                <input type="text" class="form-control" name="bank_name">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">NPWP</label>
                                                <input type="text" class="form-control" name="npwp">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">Jenis Pajak</label>
                                                <select data-placeholder="Pilih Tipe Pajak" class="tom-select w-full form-control" name="tax_type">
                                                    <option value=" ">-</option>
                                                    <option value="V0">V0</option>
                                                    <option value="V1">V1</option>
                                                    <option value="V2">V2</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-40">Alamat</label>
                                                <textarea type="text" class="form-control" name="address"></textarea>
                                            </div>
                                        </div>
                                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                        </div>
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
@endsection

@section('script')

@endsection