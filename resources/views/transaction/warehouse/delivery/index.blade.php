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
                            <h4 class="card-title">Master List Delivery Order</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <a href="{{route('warehouse.delivery.create')}}" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px; color: white;"
                                id="add-data">Create Delivery Order</a>
                        </div>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>Travel Permit No.</th>
                                    <th>Sales Order No.</th>
                                    <th>Customer Name</th>
                                    <th>PO Customer No.</th>
                                    <th>Delivery Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$data->travel_permit_no}}</td>
                                    <td>{{$data->transaction_no}}</td>
                                    <td>{{$data->customer_name}}</td>
                                    <td>{{$data->ref_po_customer}}</td>
                                    <td>{{$data->actual_delivery_date}}</td>
                                    <td class="text-center">
                                        <a href="{{route('warehouse.delivery.edit', ['id' => $data->id])}}"
                                            title="Edit SPK"><i class="mdi mdi-settings menu-icon"
                                                style="font-size: 24px;"></i></a>
                                        <a href="" title="Print Surat jalan"><i class="mdi mdi-printer menu-icon"
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