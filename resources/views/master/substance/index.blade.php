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
                            <h4 class="card-title">Master List Substances</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <button class="btn btn-primary btn-rounded btn-fw" style="padding: 10px; color: white;"
                                id="add-data">Add
                                Substance</button>
                        </div>
                    </div>
                    <hr />
                    <form method="POST" action="{{route('substance.save')}}" id="collapse-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Code<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="code" required>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Substance<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="substance" required>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Cor Code<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="cor_code" required>
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
                            <thead class="table-primary">
                                <tr>
                                    <th>Code</th>
                                    <th>Substance</th>
                                    <th>COR Code</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->substance}}</td>
                                    <td>{{$data->cor_code}}</td>
                                    <td class="text-center"><a href="{{route('substance.edit', ['id' => $data->id])}}"><i class="mdi mdi-settings menu-icon"
                                                style="font-size: 24px;"></i></a><a href="{{route('substance.delete', ['id' => $data->id])}}"><i class="mdi mdi-delete"
                                                style="font-size: 24px;"></i></a></td>
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
    $("#collapse-form").hide();

    $("#add-data").click(function() {
        $("#collapse-form").slideToggle("slow");
    });
})
</script>
@endsection