@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Finance</li>
<li class="breadcrumb-item active" aria-current="page">Invoice</li>
@endsection
@section('css')

@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary shadow-md mr-2">BUAT INVOICE</a>
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
                        <th style="text-align: left;">NO. INVOICE</th>
                        <th>REFERENCE</th>
                        <th>TANGGAL</th>
                        <th>CUSTOMER</th>
                        <th>NO. PO</th>
                        <th>PAJAK (11%)</th>
                        <th>TOTAL</th>
                        <th style="text-align: center;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->invoice_no}}</td>
                        <td>{{$item->travel_permit_no}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->ref_po_customer}}</td>
                        <td></td>
                        <td></td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary"
                                    href="{{route('sales.edit', ['id' => $item->id])}}">
                                    <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Detail Invoice </a>
                                <a class="flex items-center mr-3 text-primary"
                                    href="{{route('sales.edit', ['id' => $item->id])}}">
                                    <i data-lucide="printer" class="w-4 h-4 mr-1"></i> Print </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        
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
                                Buat Invoice
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('finance.invoice.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline">
                                    <label for="vertical-form-1" class="form-label sm:w-40">Reference</label>
                                        <select data-placeholder="Pilih Proses" class="tom-select w-full form-control" name="delivery_order_id">
                                            <option value=" ">-</option>
                                            @foreach($references as $ref)
                                            <option value="{{$ref->id}}">{{$ref->ref_po_customer}} - {{$ref->ref}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="form-label sm:w-40">Tanggal</label>
                                        <input id="vertical-form-1" type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Submit</button>
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
                                <a class="flex items-center mr-3 text-success" onclick="return confirm('Apakah anda yakin sudah menyelesaikan SPK ?')" href="/production/spk/mark-as-done/${$item->id}"
                                            title="Mark As Done"><i data-lucide="check-square" class="w-4 h-4 mr-1"></i>Done
                                </a>
                                <a class="flex items-center mr-3 text-warning" href="/production/monitoring/${$item->id}"
                                    title="Monitor Progress"><i data-lucide="eye" class="w-4 h-4 mr-1"></i> Monitor
                                </a>
                            </div>
                        </td>
                    </tr>`;

            tableBody.append(row);
        });
    }
});
</script>
@endsection