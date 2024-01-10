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
                            <h4 class="card-title">Production Process</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title"></h4>
                        </div>
                    </div>
                    <hr />
                    <form method="POST" action="{{route('production.spk.monitoring.production-progress.update')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Process Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="process_name"
                                            value="{{$processItem->process_name}}" readonly>
                                        <input type="hidden" class="form-control" name="production_process_id"
                                            value="{{$processItem->id}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="status">
                                            <option value="1"
                                                <?php echo ($processItem->status == 1) ? "selected" : ""; ?>>
                                                Init</option>
                                            <option value="2"
                                                <?php echo ($processItem->status == 2) ? "selected" : ""; ?>>
                                                Work in Progress</option>
                                            <option value="3"
                                                <?php echo ($processItem->status == 3) ? "selected" : ""; ?>>
                                                Done</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="page-header flex-wrap">
                            <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                                <button type="submit" class="btn btn-md btn-primary" style="padding: 10px; color: white;">Update
                                    Status Progress</button>
                            </div>
                        </div>
                    </form>
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
                            <h4 class="card-title">Production Process Details</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <button class="btn btn-md btn-primary" style="padding: 10px; color: white;"
                                id="add-production-process">Add
                                Progress</button>
                        </div>
                    </div>
                    <hr />
                    <form method="POST" action="{{route('production.spk.monitoring.production-progress.detail.save')}}"
                        enctype="multipart/form-data" id="collapse-form-production-process">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Operator Name<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="operator">
                                        <!-- <select class="form-control" name="operator_id">
                                            <option value="">-</option>
                                        </select> -->
                                        <input type="hidden" class="form-control" name="production_process_id"
                                            value="{{$processItem->id}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Result<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="result">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Remarks<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="remarks">
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
                                        style="padding: 10px;">Save Progress </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Operator Name</th>
                                        <th>Date</th>
                                        <th>Result</th>
                                        <th>Remarks</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($processItemDetails as $details)
                                    <tr>
                                        <td>{{$details->operator_id}}</td>
                                        <td>{{$details->date}}</td>
                                        <td>{{$details->result}}</td>
                                        <td>{{$details->remarks}}</td>
                                        <td class="text-center">
                                            <a href="" title="Edit SPK"><i class="mdi mdi-settings menu-icon"
                                                    style="font-size: 24px;"></i></a>
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
    </div>
</div>
@endsection

@section('script')
<script>
$(function() {
    $(".loader").hide();
    $("#collapse-form-production-process").hide();

    $("#add-production-process").click(function() {
        $("#collapse-form-production-process").slideToggle("slow");
    });
});
</script>
@endsection