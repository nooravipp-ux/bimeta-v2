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
                        <th class="whitespace-nowrap">NAME</th>
                        <th class="whitespace-nowrap">ADDRESS</th>
                        <th class="whitespace-nowrap">PHONE NUMBER</th>
                        <th class="text-center">PIC</th>
                        <th class="text-center">TAX TYPE</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
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
                                    <div id="horizontal-form" class="p-5">
                                        <div class="preview">
                                            <div class="form-inline">
                                                <label for="vertical-form-1" class="form-label sm:w-20">Code</label>
                                                <input type="text" class="form-control" name="code">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-20">Nama</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-20">Telepon</label>
                                                <input type="text" class="form-control" name="phone_number">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-20">PIC</label>
                                                <input type="text" class="form-control" name="pic">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-20">Tipe Pajak</label>
                                                <select data-placeholder="Pilih Tipe Pajak" class="tom-select w-full form-control" name="tax_type">
                                                    <option value=" ">-</option>
                                                    <option value="V0">V0</option>
                                                    <option value="V1">V1</option>
                                                    <option value="V2">V2</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-20">Alamat</label>
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
<script>
$(function() {
        var dataTable = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false, // Hide the search input
            lengthChange: false, // Hide the "Show X entries" dropdown
            info: false, // Hide the "Showing X of Y entries" info
            autoWidth: true,
            ajax: {
                url: '{{route("api.master.supplier")}}', // Replace with your actual API endpoint
                type: 'GET',
                dataSrc: 'data',
                data: function (d) {
                    d.start = d.start || 0; // Start index
                    d.length = d.length || 2; // Number of records per page
                    d.draw = d.draw || 1;
                    d.search = $('#searchInput').val(); // Get the value from the search input field
                }
            },
            columns: [
                { data: 'code' },
                { data: 'name' },
                { data: 'address' },
                { data: 'phone_number' },
                { data: 'pic' },
                { data: 'tax_type' },
                { data: 'tax_type' }
            ]
        });

        $('#searchInput').on('input', function () {
            dataTable.ajax.reload();
        });
})
</script>
@endsection