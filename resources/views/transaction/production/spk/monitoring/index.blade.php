@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">Monitoring</li>
@endsection
@section('css')

@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary shadow-md mr-2">Laporan Progress Harian</a>
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#cor-report" class="btn btn-primary shadow-md mr-2">Export COR</a>
            <div class="hidden md:block mx-auto text-slate-500"></div>

            <!-- <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-3">
                <div class="w-56 relative text-slate-500">
                    <input type="text" data-daterange="true" class="datepicker form-control w-56 block mx-auto" id="date-range-input">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div> -->
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" id="searchInput" placeholder="Cari ...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>  

        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible  xl:overflow-visible">
            <table class="table table-report -mt-2 table-responsive" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th style="text-align: left;">TANGGAL PROD.</th>
                        <th>NO. PO</th>
                        <th>CUSTOMER</th>
                        <th>NO. SPK</th>
                        <th style="text-align: center;">LEBAR</th>
                        <th style="text-align: center;">PANJANG</th>
                        <th>KUALITAS</th>
                        <th style="text-align: center">QTY</th>
                        <th style="text-align: center">PROSES</th>
                        <th style="text-align: center;">PERSENTASE (%)</th>
                        <th style="text-align: center;">STATUS</th>
                        <th style="text-align: center;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td><?php echo date("d/m/Y", strtotime($item->start_date)) ?></td>
                        <td>{{$item->ref_po_customer}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->spk_no}}</td>
                        <td style="text-align: center;">{{$item->bruto_width}}</td>
                        <td style="text-align: center;">{{$item->bruto_length}}</td>
                        <td>{{$item->specification}}</td>
                        <td style="text-align: center;">{{$item->sheet_quantity}}</td>
                        <td style="text-align: center;">{{$item->current_process}}</td>
                        <td style="text-align: center;">{{$item->persentage}}</td>
                        <td style="text-align: center;">{{$item->status}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-success" onclick="return confirm('Apakah anda yakin sudah menyelesaikan SPK ?')" 
                                    href="/production/spk/mark-as-done/{{$item->id}}"
                                    title="Mark As Done"><i data-lucide="check-square" class="w-4 h-4 mr-1"></i>Done
                                </a>
                                <a class="flex items-center mr-3 text-warning" href="/production/monitoring/{{$item->id}}"
                                    title="Monitor Progress"><i data-lucide="eye" class="w-4 h-4 mr-1"></i> Monitor
                                </a>
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
                                Progress Harian
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="GET" action="{{route('production.spk.monitoring.personal-progress')}}">
                                <div class="preview">
                                    <div class="form-inline">
                                    <label for="vertical-form-1" class="form-label sm:w-40">Nama Bagian</label>
                                        <select data-placeholder="Pilih Proses" class="tom-select w-full form-control" name="process_id">
                                            @foreach($productionProcesses as $process)
                                            <option value="{{$process->id}}">{{$process->process_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Tanggal</label>
                                        <input id="vertical-form-1" type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Laporan Progress</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Horizontal Form -->
                </div>
            </div>
        </div>
    </div>

    <div id="cor-report" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Filter Laporan COR
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('production.spk.monitoring.cor.report.export')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Dari Tanggal</label>
                                        <input id="vertical-form-1" type="date" class="form-control" name="start_date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Sampai Tanggal</label>
                                        <input id="vertical-form-1" type="date" class="form-control" name="end_date" required>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Generate Report</button>
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
    $('#searchInput').on('keyup', function(event) {
        if (event.key === 'Enter') {
            var params = $(this).val();
            getRequest(params);
        }
    });

    function getRequest(searchTerm="") {
        $.ajax({
            url: '{{route("api.production.monitoring")}}', // Replace with your API endpoint
            type: 'GET',
            data: { search: searchTerm },
            success: function(response) {
                renderData(response.data);
                // console.log(data.data)
            },
            error: function(error) {
                // Handle the error response here
                $('#result').html('<p>Error: ' + error.statusText + '</p>');
            }
        });
    }

    function renderData(data) {
        var tableBody = $('tbody');
        // Clear existing rows
        tableBody.empty();
        // Loop through the data and append rows to the tbody
        $.each(data, function(index, item) {
            // console.log(item)
            var row = `<tr>
                        <td>${item.start_date}</td>
                        <td>${item.ref_po_customer}</td>
                        <td>${item.customer_name}</td>
                        <td>${item.spk_no}</td>
                        <td style="text-align: center;">${item.bruto_width}</td>
                        <td style="text-align: center;">${item.bruto_length}</td>
                        <td>${item.specification}</td>
                        <td>${item.sheet_quantity}</td>
                        <td style="text-align: center;">${item.current_process}</td>
                        <td style="text-align: center;">${item.persentage}</td>
                        <td style="text-align: center;">${item.status}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-success" onclick="return confirm('Apakah anda yakin sudah menyelesaikan SPK ?')" href="/production/spk/mark-as-done/{{$item->id}}"
                                            title="Mark As Done"><i data-lucide="check-square" class="w-4 h-4 mr-1"></i>Done
                                </a>
                                <a class="flex items-center mr-3 text-warning" href="/production/monitoring/{{$item->id}}"
                                    title="Monitor Progress"><i data-lucide="eye" class="w-4 h-4 mr-1"></i> Monitor
                                </a>
                            </div>
                        </td>
                    </tr>`;

            tableBody.append(row);
        });
    }
});

// $(function() {
//         var dataTable = $('#data-tabl').DataTable({
//             processing: true,
//             serverSide: true,
//             searching: false, // Hide the search input
//             lengthChange: false, // Hide the "Show X entries" dropdown
//             info: false, // Hide the "Showing X of Y entries" info
//             autoWidth: true,
//             columnDefs: [
//                 { targets: [4], className: 'text-center' },
//                 { targets: [5], className: 'text-center' },
//                 { targets: [7], className: 'text-center' },
//                 { targets: [8], className: 'text-center' },
//                 { targets: [9], className: 'text-center' },
//                 { targets: [10], className: 'text-center' }
//             ],
//             ajax: {
//                 url: '{{route("api.production.monitoring")}}', // Replace with your actual API endpoint
//                 type: 'GET',
//                 dataSrc: 'data',
//                 data: function (d) {
//                     // Add any additional parameters you need to send to the server
//                     d.start = d.start || 0; // Start index
//                     d.length = d.length || 2; // Number of records per page
//                     d.draw = d.draw || 1;
//                     d.search = $('#searchInput').val(); // Get the value from the search input field
//                 }
//             },
//             columns: [
//                 { data: 'start_date' },
//                 { data: 'ref_po_customer' },
//                 { data: 'customer_name' },
//                 { data: 'spk_no' },
//                 { data: 'bruto_width' },
//                 { data: 'bruto_length' },
//                 { data: 'specification' },
//                 { data: 'quantity' },
//                 { data: 'current_process' },
//                 { data: 'persentage' },
//                 { 
//                     data: 'status',
//                     render: function (data, type, row) {
//                         var status = "";
//                         if(row.status === 1) {
//                             status = "INIT"
//                         }else if(row.status === 2) {
//                             status = "SCHEDULED"
//                         }else if(row.status === 3) {
//                             status = "WORK IN PROGRESS"
//                         } else {
//                             status = "COMPLETED"
//                         }
//                         return `<div class="py-1 px-2 rounded-full text-xs bg-primary text-white cursor-pointer font-medium">${status}</div>`;
//                     }
//                 },
//                 {
//                     data: null,
//                     render: function (data, type, row) {
//                         // Add edit and delete buttons here
//                         return `<td class="table-report__action w-56">
//                                     <div class="flex justify-center items-center">
//                                         ${row.status != 4 ?
//                                         `<a class="flex items-center mr-3 text-success" onclick="return confirm('Apakah anda yakin sudah menyelesaikan SPK ?')"
//                                             href="/production/spk/mark-as-done/${row.id}"
//                                             title="Mark As Done"><i data-lucide="check-square" class="w-4 h-4 mr-1"></i>Done
//                                         </a>` : ''}
                    
//                                         <a class="flex items-center mr-3 text-warning"
//                                             href="/production/monitoring/${row.id}"
//                                             title="Monitor Progress"><i data-lucide="eye" class="w-4 h-4 mr-1"></i> Monitor
//                                         </a>
//                                     </div>
//                                 </td>`;
//                     }
//                 }
//             ]
//         });

//         $('#searchInput').on('input', function () {
//             dataTable.ajax.reload();
//         });
// })
</script>
@endsection