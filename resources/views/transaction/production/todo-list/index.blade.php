@extends('layouts._base')
@section('main-content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <button class="btn btn-primary mb-2 mb-md-0 me-2"><i class="mdi mdi-filter"></i> </button>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <a href="{{route('sales.create')}}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Add</a>
        </div>
    </div>
    <!-- first row starts here -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Todo List Order</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th>Transaction No.</th>
                                    <th>Ref. PO Customer</th>
                                    <th>Customer</th>
                                    <th>Order Date</th>
                                    <th>Delivery Date (Plan)</th>
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
                                    <td class="text-center">
                                        @if($data->status == 1)
                                            <button type="button" class="btn btn-primary btn-rounded btn-fw"> New Order </button>
                                        @endif
                                        @if($data->status == 2)
                                            <button type="button" class="btn btn-success btn-rounded btn-fw"> Claimed</button>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($data->status == 1)
                                            <a href="{{route('production.todo-list.claim-order', ['id' => $data->id])}}" title="Claim Order"><i class="mdi mdi-checkbox-marked-circle" style="font-size: 24px;"></i></a></td>
                                        @endif
                                        @if($data->status == 2)
                                            <a href="{{route('production.todo-list.detail', ['id' => $data->id])}}"><i class="mdi mdi-settings menu-icon" style="font-size: 24px;"></i></a>
                                        @endif                            
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