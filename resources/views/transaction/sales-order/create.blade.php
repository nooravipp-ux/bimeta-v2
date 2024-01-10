@extends('layouts._base')
@section('main-content')
<div class="content-wrapper pb-0">
    <!-- first row starts here -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <form method="POST" action="{{route('sales.save')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">PO Customer (Sales Order)</h4>
                        <hr />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ref. PO Customer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ref_po_customer" required>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="customer_id" required>
                                            <option value="">-</option>
                                            @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Order Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="order_date" required>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Delivery Date (Plan)</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="delivery_date" required>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Pajak</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="tax_type" required>
                                            <option value="">-</option>
                                            <option value="0">V0</option>
                                            <option value="1">V1</option>
                                            <option value="2">V2</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Assign To</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="assign_to" required>
                                            <option value="">-</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Attachment</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="attachment">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Remarks</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="remarks" required>
                                    </div>
                                </div>
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