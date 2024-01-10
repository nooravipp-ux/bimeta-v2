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
                            <h4 class="card-title">Master List Materials</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">

                        </div>
                    </div>
                    <hr />
                    <form method="POST" action="{{route('material.update')}}" id="collapse-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" value="{{$data->name}}" >
                                        <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="type">
                                            <option value="">-</option>
                                            <option value="KRAFT" <?php echo ($data->type == "KRAFT") ? "selected" : ""; ?>>KRAFT</option>
                                            <option value="MEDIUM" <?php echo ($data->type == "MEDIUM") ? "selected" : ""; ?>>MEDIUM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Paper Type<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="paper_type" >
                                            <option value="">-</option>
                                            <option value="BROWN KRAFT" <?php echo ($data->paper_type == "BROWN KRAFT") ? "selected" : ""; ?>>BROWN KRAFT</option>
                                            <option value="TEST LINER" <?php echo ($data->paper_type == "TEST LINER") ? "selected" : ""; ?>>TEST LINER</option>
                                            <option value="WHITE KRAFT" <?php echo ($data->paper_type == "WHITE KRAFT") ? "selected" : ""; ?>>WHITE KRAFT</option>
                                            <option value="MEDIUM" <?php echo ($data->paper_type == "MEDIUM") ? "selected" : ""; ?>>MEDIUM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gramature<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="gramature" value="{{$data->gramature}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Unit<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="unit" >
                                            <option value="">-</option>
                                            <option value="GSM" <?php echo ($data->unit == "GSM") ? "selected" : ""; ?>>GSM</option>
                                            <option value="ROLL" <?php echo ($data->unit == "ROLL") ? "selected" : ""; ?>>ROLL</option>
                                        </select>
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