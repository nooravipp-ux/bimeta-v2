@extends('layouts._base')
@section('main-content')
<div class="content-wrapper pb-0">
    <!-- first row starts here -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="page-header flex-wrap">
                        <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title">Master List PO Customer (Sales Order)</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <a href="{{route('sales.create')}}" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px; color: white;"
                                id="add-data">Add Order</a>
                        </div>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>Transaction No.</th>
                                    <th>Ref. PO Customer</th>
                                    <th>Customer</th>
                                    <th>Order Date</th>
                                    <th>Delivery Date (Plan)</th>
                                    <th>Assigned To</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$data->transaction_no}}</td>
                                    <td>{{$data->ref_po_customer}}</td>
                                    <td>{{$data->customer_name}}</td>
                                    <td>{{$data->order_date}}</td>
                                    <td>{{$data->delivery_date}}</td>
                                    <td>{{$data->assigned_to}}</td>
                                    <td class="text-center">
                                        @if($data->status == 1)
                                            <button type="button" class="btn btn-primary btn-rounded btn-fw"> Draft </button>
                                        @endif
                                        @if($data->status == 2)
                                            <button type="button" class="btn btn-success btn-rounded btn-fw"> Claimed By PIC </button>
                                        @endif
                                    </td>
                                    <td class="text-center"><a href="{{route('sales.edit', ['id' => $data->id])}}"><i class="mdi mdi-settings menu-icon" style="font-size: 24px;"></i></a></td>
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