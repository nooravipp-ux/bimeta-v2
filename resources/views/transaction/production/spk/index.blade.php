@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">SPK</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
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
                    <form id="searchForm" action="{{route('production.spk.search')}}" method="GET">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." name="spk_no" id="search-input">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    <form>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">NO. SPK</th>
                        <th class="whitespace-nowrap">NAMA BARANG</th>
                        <th class="text-center whitespace-nowrap">TIPE SPK</th>
                        <th class="text-center whitespace-nowrap">QUANTITY</th>
                        <th class="text-center whitespace-nowrap">QUALITY</th>
                        <th class="text-center whitespace-nowrap">NETTO (L X P)</th>
                        <th class="text-center whitespace-nowrap">BRUTO (L X P)</th>
                        <th class="text-center whitespace-nowrap">SHEET QUANTITY</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr class="intro-x">
                        <td>{{$item->spk_no}}</td>
                        <td>{{$item->goods_name}}</td>
                        <td class="text-center whitespace-nowrap">{{$item->goods_type}}</td>
                        <td class="text-center whitespace-nowrap">{{$item->quantity}}</td>
                        <td class="text-center whitespace-nowrap"><?php echo htmlspecialchars_decode($item->specification);?></td>
                        <td class="text-center whitespace-nowrap">{{$item->netto}}</td>
                        <td class="text-center whitespace-nowrap">{{$item->bruto}}</td>
                        <td class="text-center whitespace-nowrap">{{$item->sheet_quantity}}</td>
                        <td class="text-center">
                            @if($item->status == 1)
                            <div class="py-1 px-2 rounded-full text-xs bg-primary text-white cursor-pointer font-medium">INIT</div>
                            @elseif($item->status == 2)
                            <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">SCHEDULED</div>
                            @elseif($item->status == 3)
                            <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">WORK IN PROGRESS</div>
                            @else
                            <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">COMPLETED</div>
                            @endif
                        </td>
                        <td class="table-report__action">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary" href="{{route('production.spk.edit', ['id' => $item->id])}}" title="Edit SPK"><i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit</a>
                                <a class="flex items-center mr-3 text-warning" href="{{route('production.spk.print', ['id' => $item->id])}}" target="_blank" title="Print SPK"><i data-lucide="printer" class="w-4 h-4 mr-1"></i> Print SPK</a>
                                <!-- <a class="flex items-center mr-3 text-warning" href="{{route('production.spk.print', ['id' => $item->id])}}" target="_blank" title="Print SPK"><i data-lucide="printer" class="w-4 h-4 mr-1"></i> Print Label SPK</a> -->
                                @if($item->status == 1)
                                <a class="flex items-center mr-3"
                                    href="{{route('production.spk.schedule', ['id' => $item->id])}}"
                                    title="Production Schedule"> <i data-lucide="calendar"
                                        class="w-4 h-4 mr-1"></i>Schedule</a>
                                @endif
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
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search-input').keypress(function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            $('#searchForm').submit();
        }
    });
});
</script>
@endsection
