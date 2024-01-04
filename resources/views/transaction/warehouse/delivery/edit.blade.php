@extends('layouts._base')
@section('main-content')
<div class="content-wrapper pb-0">
    <!-- first row starts here -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <form method="POST" action="{{route('warehouse.delivery.save')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Delivery Order</h4>
                        <hr />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sales Order No.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="delivery_date" value="{{$deliveryOrder->transaction_no}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Customer Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="delivery_date" value="{{$deliveryOrder->customer_name}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">PO. Customer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="delivery_date" value="{{$deliveryOrder->ref_po_customer}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Actual Delivery Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="delivery_date" value="{{$deliveryOrder->actual_delivery_date}}">
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tax Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="licence_plate" value="{{$deliveryOrder->tax_type}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Licence Plate</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="licence_plate" value="{{$deliveryOrder->licence_plate}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Driver Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="driver_name" value="{{$deliveryOrder->driver_name}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Shipping Address</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="driver_name" value="">{{$deliveryOrder->address}}</textarea>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </form>
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
                            <h4 class="card-title">Order Details</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <!-- <a href="" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                                <i class="mdi mdi-plus-circle"></i> Add Detail</a> -->
                        </div>
                    </div>
                    <hr />
                    <form method="POST" action="{{route('warehouse.delivery.detail.save')}}"
                        enctype="multipart/form-data" id="collapse-form-production-process">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Goods<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="spk_id">
                                            @foreach($listSpk as $spk)
                                            <option value="{{$spk->spk_id}}">{{$spk->spk_no}} | {{$spk->goods_name}} | {{$spk->specification}} | {{$spk->measure}} | QTY : {{$spk->quantity}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Quantity<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="quantity">
                                        <input type="hidden" class="form-control" name="delivery_order_id" value="{{$deliveryOrder->id}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Remarks<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="remarks"></textarea>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="page-header flex-wrap">
                                <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                                    <button type="submit" class="btn btn-primary btn-rounded btn-fw"
                                        style="padding: 10px;">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th>Name</th>
                                    <th>Spesification</th>
                                    <th>Meas.</th>
                                    <th>Quantity</th>
                                    <th>Remarks</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailDeliveryOrder as $do)
                                <tr>
                                    <td>{{$do->goods_name}}</td>
                                    <td>{{$do->specification}}</td>
                                    <td>{{$do->measure}}</td>
                                    <td>{{$do->quantity}}</td>
                                    <td>{{$do->remarks}}</td>
                                    <td class="text-center"><a href="" title="Edit SPK"><i class="mdi mdi-settings menu-icon" style="font-size: 24px;"></i></a></td>
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
})
</script>
@endsection