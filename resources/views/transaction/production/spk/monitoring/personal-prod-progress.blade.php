@extends('layouts._base')
@section('css')
<style>
.layout-box-p {
    width: 200px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-p-2 {
    width: 130px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-l {
    width: 100px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-t {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    border-right-style: dotted;
    padding: 20px;
    font-size: 12px;
}

.layout-box-k {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-row-plep {
    width: 200px;
    height: 50px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.mandatory-sign {
    color: red;
}

.text-danger {
    color: red;
    font-size: 12px;
}

.loading-icon-container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 999;
    /* Set a high z-index to make sure it's on top of other elements */
}

/* Optional: Add a semi-transparent overlay to dim the background while loading */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    /* Adjust the alpha value for transparency */
    z-index: 998;
    /* Set a value lower than the loading icon to ensure it's below it */
}

/* Add the following styles to adjust the position of the loading icon based on your layout */
@media (min-width: 768px) {
    .loading-icon-container {
        top: 50%;
        left: 90%;
        transform: translate(-90%, -50%);
    }
}
</style>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12mt-5">
        <h2 class="intro-y text-lg font-medium mt-10">Progress Monitoring {{$productionProcess->process_name}}</h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview"
                    class="btn btn-primary shadow-md mr-2">Buat Progress Harian</a>
                <div class="dropdown">
                    <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                data-lucide="plus"></i>
                        </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
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
                    <thead class="bg-success">
                        <tr>
                            <th class="whitespace-nowrap">TANGGAL</th>
                            <th class="whitespace-nowrap">KONSUMEN</th>
                            <th class="whitespace-nowrap">NO PO</th>
                            <th class="whitespace-nowrap text-center">NO SPK</th>
                            <th class="whitespace-nowrap text-center">UKURAN</th>
                            <th class="whitespace-nowrap text-center">HASIL</th>
                            <th class="whitespace-nowrap">OPERATOR</th>
                            <th class="whitespace-nowrap">KETERANGAN</th>
                            <th class="whitespace-nowrap text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td><?php echo date("d/m/Y", strtotime($item->date)); ?></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->ref_po_customer}}</td>
                            <td class="text-center">{{$item->spk_no}}</td>
                            <td class="text-center"></td>
                            <td class="text-center">{{$item->result}}</td>
                            <td>{{$item->operator}}</td>
                            <td>{{$item->remarks}}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 text-success" href="" title="Masrk As Done"><i
                                            data-lucide="check-square" class="w-4 h-4 mr-1"></i>Edit</a>
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
            <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- BEGIN: Horizontal Form -->
                            <div class="intro-y box">
                                <div
                                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <h2 class="font-medium text-base mr-auto">
                                        Tambah Proses Produksi
                                    </h2>
                                </div>
                                <div id="horizontal-form" class="p-5">
                                    <form action="{{route('production.spk.monitoring.personal-progress.save')}}"
                                        method="post">
                                        @csrf
                                        <div class="preview">
                                            <div class="form-inline">
                                                <label for="vertical-form-1" class="form-label sm:w-20">Tanggal</label>
                                                <input type="date" class="form-control" name="date">
                                                <input type="hidden" class="form-control" name="process_id"
                                                    value="{{$productionProcess->id}}">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-20">No
                                                    SPK</label>
                                                <select data-placeholder="Pilih SPK"
                                                    class="tom-select w-full form-control" name="spk_id">
                                                    <option value=" ">-</option>
                                                    @foreach($spk as $spk)
                                                    <option value="{{$spk->id}}">{{$spk->spk_no}} - {{$spk->ref_po_customer}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-20">Hasil</label>
                                                <input type="number" class="form-control" name="result">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="form-label sm:w-20">Operator</label>
                                                <input type="text" class="form-control" name="operator">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1"
                                                    class="form-label sm:w-20">Keterangan</label>
                                                <textarea type="text" class="form-control" name="remarks"> </textarea>
                                            </div>
                                        </div>
                                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                            <button type="button" data-tw-dismiss="modal"
                                                class="btn py-3 btn-danger w-full md:w-52">Batal</button>
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
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    // Capture the form submission event
    $('#myForm').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = {
            date: $('input[name="date"]').val(),
            spk: $('select[name="spk"]').val(),
            result: $('input[name="result"]').val(),
            remarks: $('textarea[name="remarks"]').val()
        };

        // Append form data to the table
        $('#dataTable tbody').append('<tr><td>' + formData.date + '</td><td>' + formData.spk +
            '</td><td>' + formData.result + '</td><td>' + formData.remarks +
            '</td><td class="table-report__action w-56"><div class="flex justify-center items-center"><button class="flex items-center mr-3 text-success text-center btn-delete"><i data-lucide="trash" class="w-4 h-4 mr-1"></i>Delete</button></div></td></tr>'
        );

        // Clear form fields after appending
        $('#myForm')[0].reset();
        $('[data-tw-dismiss="modal"]').click();
    });

    // Delete row when the delete button is clicked
    $('#dataTable tbody').on('click', '.btn-delete', function() {
        $(this).closest('tr').remove();
    });

    $('#submitTable').click(function() {
        var tableData = [];

        // Iterate through each row in the table
        $('#dataTable tbody tr').each(function() {
            var rowData = {
                date: $(this).find('td:eq(0)').text(),
                spk: $(this).find('td:eq(1)').text(),
                result: $(this).find('td:eq(2)').text(),
                remarks: $(this).find('td:eq(3)').text()
            };

            tableData.push(rowData);
        });

        console.log(tableData);

        // Send the data to the server using AJAX
        // $.ajax({
        //     url: 'your_server_endpoint', // Replace with your server endpoint
        //     type: 'POST',
        //     contentType: 'application/json',
        //     data: JSON.stringify(tableData),
        //     success: function (response) {
        //         // Handle the server response here
        //         console.log(response);
        //     },
        //     error: function (error) {
        //         // Handle errors here
        //         console.error(error);
        //     }
        // });
    });
});
</script>
@endsection