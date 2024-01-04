@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content-wrapper pb-0">
    <!-- first row starts here -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="page-header flex-wrap">
                        <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title">PO Customer</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title">{{$salesOrder->transaction_no}}</h4>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ref. PO Customer</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ref_po_customer"
                                        value="{{$salesOrder->ref_po_customer}}" readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{$salesOrder->customer_name}}" readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Order Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="order_date" value="{{$salesOrder->order_date}}" readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Delivery Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="delivery_date" value="{{$salesOrder->delivery_date}}" readonly>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tax Type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{$salesOrder->tax_type}}" readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Assign To</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{$salesOrder->pic_name}}" readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Attachment</label>
                                <div class="col-sm-9">
                                    
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Remarks</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="remarks"
                                        value="{{$salesOrder->remarks}}" readonly>
                                </div>
                            </div>
                            <hr />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- chart row starts here -->

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="page-header flex-wrap">
                        <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title">PO Customer (Detail Sales Order)</h4>
                        </div>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th>Name</th>
                                    <th>Spesification</th>
                                    <th>Mess</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailSalesOrders as $detail)
                                <tr>
                                    <td>{{$detail->goods_name}}</td>
                                    <td>{{$detail->specification}}</td>
                                    <td>{{$detail->measure}}</td>
                                    <td>{{$detail->quantity}}</td>
                                    <td class="text-center"><a href="{{route('production.spk.create', ['id' => $detail->id])}}" title="Create SPK"><i class="mdi mdi-settings menu-icon" style="font-size: 24px;"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    $(".loader").hide();
});
</script>
@endsection