@extends('layouts._base')
@section('main-content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <button class="btn btn-primary mb-2 mb-md-0 me-2"><i class="mdi mdi-filter"></i> </button>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <a href="" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Add</a>
        </div>
    </div>
    <!-- first row starts here -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Progress Monitoring</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>PO No.</th>
                                    <th>SPK No.</th>
                                    <th>Customer</th>
                                    <th>Bruto (L X P)</th>
                                    <th>Quality Code</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Current Process</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$data->ref_po_customer}}</td>
                                    <td>{{$data->spk_no}}</td>
                                    <td>{{$data->customer_name}}</td>
                                    <td>{{$data->bruto}}</td>
                                    <td>{{$data->cor_code}}</td>
                                    <td class="text-center">{{$data->quantity}}</td>
                                    <td class="text-center">{{$data->current_process}}</td>
                                    <td class="text-center">
                                        @if($data->status == 1)
                                            <button type="button" class="btn btn-primary btn-rounded btn-fw"> SPK Init </button>
                                        @elseif($data->status == 2)
                                            <button type="button" class="btn btn-success btn-rounded btn-fw"> Scheduled </button>
                                        @else

                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('production.spk.edit', ['id' => $data->id])}}" title="Edit SPK"><i class="mdi mdi-settings menu-icon" style="font-size: 24px;"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- chart row starts here -->
</div>
@endsection

@section('script')
<script>
$(function() {
    $(".loader").hide();
})
</script>
@endsection