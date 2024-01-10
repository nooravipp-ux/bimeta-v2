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
                            <h4 class="card-title">Master List SPK</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <a href="" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px; color: white;"
                                id="add-data">Filter</a>
                        </div>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>SPK No.</th>
                                    <th>Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Sheet Quantity</th>
                                    <th>Quality</th>
                                    <th>Netto (L X P)</th>
                                    <th>Bruto (L X P)</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$data->spk_no}}</td>
                                    <td>{{$data->goods_name}}</td>
                                    <td class="text-center">{{$data->quantity}}</td>
                                    <td class="text-center">{{$data->sheet_quantity}}</td>
                                    <td>{{$data->specification}}</td>
                                    <td>{{$data->netto}}</td>
                                    <td>{{$data->bruto}}</td>
                                    <td class="text-center">
                                        @if($data->status == 1)
                                        <button type="button" class="btn btn-primary btn-rounded btn-fw"> SPK INIT
                                        </button>
                                        @elseif($data->status == 2)
                                        <button type="button" class="btn btn-warning btn-rounded btn-fw"> SCHEDULED
                                        </button>
                                        @elseif($data->status == 3)
                                        <button type="button" class="btn btn-warning btn-rounded btn-fw"> WORK IN
                                            PROGRESS </button>
                                        @else
                                        <button type="button" class="btn btn-success btn-rounded btn-fw"> DONE </button>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('production.spk.edit', ['id' => $data->id])}}"
                                            title="Edit SPK"><i class="mdi mdi-settings menu-icon"
                                                style="font-size: 24px;"></i></a> <a href="" title="Print SPK"><i
                                                class="mdi mdi-printer menu-icon" style="font-size: 24px;"></i></a>
                                        @if($data->status == 1)
                                        <a href="{{route('production.spk.schedule', ['id' => $data->id])}}"
                                            title="Production Schedule"><i class="mdi mdi-calendar menu-icon"
                                                style="font-size: 24px;"></i></a>
                                        @endif
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