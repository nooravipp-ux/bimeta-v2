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
                            <h4 class="card-title">Master List Suppliers</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                        </div>
                    </div>
                    <hr />
                    <form method="POST" action="{{route('supplier.update')}}" id="collapse-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Code<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="code" value="{{$data->code}}" >
                                        <input type="hidden" class="form-control" name="id" value="{{$data->id}}" >
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" value="{{$data->name}}" >
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone_number" value="{{$data->phone_number}}" >
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">PIC<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="PIC" value="{{$data->pic}}" >
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tax Type<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="tax_type">
                                            <option value="">-</option>
                                            <option value="0" <?php echo ($data->tax_type == "0") ? "selected" : ""; ?>>V0</option>
                                            <option value="1" <?php echo ($data->tax_type == "1") ? "selected" : ""; ?>>V1</option>
                                            <option value="2" <?php echo ($data->tax_type == "2") ? "selected" : ""; ?>>V2</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="address" >{{$data->address}}</textarea>
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
                                        style="padding: 10px;">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
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