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
                                        <select class="form-control" name="sales_order_id">
                                            <option value="">-</option>
                                            @foreach($salesOrders as $order)
                                            <option value="">{{$order->transaction_no}} - {{$order->ref_po_customer}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Delivery Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="delivery_date">
                                        <input type="hidden" class="form-control" name="sales_order_id" value="{{$order->id}}">
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Licence Plate</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="licence_plate">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Driver Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="driver_name">
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <div class="page-header flex-wrap">
                            <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">

                            </div>
                            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                                <button type="submit" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text"><i
                                        class="mdi mdi-plus-circle"></i> Confirm & Save</button>
                            </div>
                        </div>
                    </div>
                </form>
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