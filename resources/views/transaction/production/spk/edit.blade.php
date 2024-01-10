@extends('layouts._base')
@section('css')
<style>
.layout-box-p {
    width: 200px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-p-2 {
    width: 130px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-l {
    width: 100px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-t {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    border-right-style: dotted;
    padding: 20px;
    font-size: 12px;
}

.layout-box-k {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-row-plep {
    width: 200px;
    height: 50px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.box-header {
    width: 500px;
    height: 50px;
    border: 2px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.box-content {
    width: 500px;
    height: 70px;
    border: 2px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.mandatory-sign {
    color: red;
}

.check-input {
    width: 30px;
    height: 30px;
    margin-top: 30px
}
</style>
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
                            <h4 class="card-title">Goods Information</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title"></h4>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="goods_name"
                                        value="{{$data[0]->goods_name}}" readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Goods Type</label>
                                <div class="col-sm-9">
                                    @if($data[0]->goods_type == 1)
                                    <input type="text" class="form-control" value="SHEET" readonly>
                                    @elseif($data[0]->goods_type == 2)
                                    <input type="text" class="form-control" value="BOX" readonly>
                                    @else
                                    <input type="text" class="form-control" value="BOX (Badan + Tutup)" readonly>
                                    @endif
                                    <input type="hidden" class="form-control" value="{{$data[0]->goods_type}}"
                                        id="goods-type">
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Spesification</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        value="{{$data[0]->ply_type}} {{$data[0]->flute_type}} {{$data[0]->substance_name}}"
                                        readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Measure</label>
                                <div class="col-sm-9">
                                    @if($data[0]->goods_type == 1)
                                    <input type="text" class="form-control"
                                        value="{{$data[0]->length}} X {{$data[0]->width}} {{$data[0]->meas_unit}}"
                                        readonly>
                                    @elseif($data[0]->goods_type == 2)
                                    <input type="text" class="form-control"
                                        value="{{$data[0]->length}} X {{$data[0]->width}} X {{$data[0]->height}} {{$data[0]->meas_unit}} ({{$data[0]->meas_type}})"
                                        readonly>
                                    @else
                                    <input type="text" class="form-control" value="BOX (Badan + Tutup)" readonly>
                                    @endif
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Order Quantity</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="order_date"
                                        value="{{$data[0]->quantity}}" readonly>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="col-md-4">
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
                            <h4 class="card-title">Parameter SPK</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title">{{$data[0]->spk_no}}</h4>
                        </div>
                    </div>
                    <hr />
                    @if($data[0]->goods_type == 1)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 400px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            BANYAK SHEET</div>
                                        <div class="text-center"
                                            style="width: 400px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            KUANTITAS ORDER</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 400px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                        </div>
                                        <div class="text-center"
                                            style="width: 400px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="margin-left: 10px; margin-bottom: 10px;">
                                    <div class="box-header text-center">UKURAN</div>
                                    <div class="box-content text-center">
                                        @if($data[0]->goods_type == 1)
                                        {{$data[0]->length}} X {{$data[0]->width}}
                                        {{$data[0]->meas_unit}}
                                        @elseif($data[0]->goods_type == 2)
                                        {{$data[0]->length}} X {{$data[0]->width}} X
                                        {{$data[0]->height}} {{$data[0]->meas_unit}}
                                        ({{$data[0]->meas_type}})
                                        @else

                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 550px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            KUALITAS</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 550px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            {{$data[0]->ply_type}} {{$data[0]->flute_type}}
                                            {{$data[0]->substance_name}}</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="margin-left: 10px;">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 750px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            UKURAN SHEET</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div
                                            style="width: 375px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            Netto :
                                        </div>
                                        <div
                                            style="width: 375px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            Bruto :
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column" style="margin-top: 20px; margin-left: 100px;">
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-l"></div>
                                            <div class="layout-box-l" id="sheet-l-w">W</div>
                                            <div class="layout-box-l"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-p" id="sheet-l-l">L</div>
                                            <div class="layout-box-p"></div>
                                            <div class="layout-box-p"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-l"></div>
                                            <div class="layout-box-l"></div>
                                            <div class="layout-box-l"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="margin-left: 190px; margin-top: 20px;">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 620px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            CETAKAN</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 620px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            POLOS
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 206px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            STITCHING
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            LEM
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            POUNCH
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 206px;height: 130px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            <input type="checkbox" class="form-check-input check-input" readonly>
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 130px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            <input type="checkbox" class="form-check-input check-input">
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 130px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            <input type="checkbox" class="form-check-input check-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($data[0]->goods_type == 2)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 400px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            BANYAK SHEET</div>
                                        <div class="text-center"
                                            style="width: 400px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            KUANTITAS ORDER</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 400px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            {{$data[0]->sheet_quantity}}
                                        </div>
                                        <div class="text-center"
                                            style="width: 400px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            {{$data[0]->quantity}}
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="margin-left: 10px; margin-bottom: 10px;">
                                    <div class="box-header text-center">UKURAN</div>
                                    <div class="box-content text-center">
                                        @if($data[0]->goods_type == 1)
                                        {{$data[0]->length}} X {{$data[0]->width}}
                                        {{$data[0]->meas_unit}}
                                        @elseif($data[0]->goods_type == 2)
                                        {{$data[0]->length}} X {{$data[0]->width}} X
                                        {{$data[0]->height}} {{$data[0]->meas_unit}}
                                        ({{$data[0]->meas_type}})
                                        @else

                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 550px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            KUALITAS</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 550px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            {{$data[0]->ply_type}} {{$data[0]->flute_type}}
                                            {{$data[0]->substance_name}}</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="margin-left: 10px;">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 750px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            UKURAN SHEET</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div
                                            style="width: 375px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            Netto : {{$data[0]->netto}}
                                        </div>
                                        <div
                                            style="width: 375px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            Bruto : {{$data[0]->bruto}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column" style="margin-top: 20px;">
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-l"></div>
                                            <div class="layout-box-l" id="l-l2">{{$data[0]->l2}}</div>
                                            <div class="layout-box-l"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-p"></div>
                                            <div class="layout-box-p" id="l-p1">{{$data[0]->p1}}</div>
                                            <div class="layout-box-p"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-l"></div>
                                            <div class="layout-box-l" id="l-l1">{{$data[0]->l1}}</div>
                                            <div class="layout-box-l"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-t" id="l-plape-1">{{$data[0]->plape}}</div>
                                            <div class="layout-box-t" id="l-t">{{$data[0]->t}}</div>
                                            <div class="layout-box-t" id="l-plape-2">{{$data[0]->plape}}</div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-p-2"></div>
                                            <div class="layout-box-p-2" id="l-p2">{{$data[0]->p2}}</div>
                                            <div class="layout-box-p-2"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-k"></div>
                                            <div class="layout-box-k" id="l-k">{{$data[0]->k}}</div>
                                            <div class="layout-box-k"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="margin-left: 20px; margin-top: 20px;">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 620px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            CETAKAN</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 620px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            @if($data[0]->flag_print == 0)
                                                <span>POLOS</span>
                                            @else
                                                <span>PRINT</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 206px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            STITCHING
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            LEM
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            POUNCH
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 206px;height: 130px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            <input type="checkbox" class="form-check-input check-input" <?php echo ($data[0]->flag_stitching == 1) ? "checked" : ""; ?>  disabled>
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 130px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            <input type="checkbox" class="form-check-input check-input" <?php echo ($data[0]->flag_glue == 1) ? "checked" : ""; ?>  disabled>
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 130px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            <input type="checkbox" class="form-check-input check-input" <?php echo ($data[0]->flag_pounch == 1) ? "checked" : ""; ?>  disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 400px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            BANYAK SHEET</div>
                                        <div class="text-center"
                                            style="width: 400px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            KUANTITAS ORDER</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 400px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                        </div>
                                        <div class="text-center"
                                            style="width: 400px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="margin-left: 10px; margin-bottom: 10px;">
                                    <div class="box-header text-center">UKURAN</div>
                                    <div class="box-content text-center">
                                        @if($data[0]->goods_type == 1)
                                        {{$data[0]->length}} X {{$data[0]->width}}
                                        {{$data[0]->meas_unit}}
                                        @elseif($data[0]->goods_type == 2)
                                        {{$data[0]->length}} X {{$data[0]->width}} X
                                        {{$data[0]->height}} {{$data[0]->meas_unit}}
                                        ({{$data[0]->meas_type}})
                                        @else

                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 550px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            KUALITAS</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 550px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            {{$data[0]->ply_type}} {{$data[0]->flute_type}}
                                            {{$data[0]->substance_name}}</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="margin-left: 10px;">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 750px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            UKURAN SHEET</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div
                                            style="width: 375px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            Netto :
                                        </div>
                                        <div
                                            style="width: 375px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            Bruto :
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column" style="margin-top: 20px;">
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-l"></div>
                                            <div class="layout-box-l" id="l-l2">L2</div>
                                            <div class="layout-box-l"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-p"></div>
                                            <div class="layout-box-p" id="l-p1">P1</div>
                                            <div class="layout-box-p"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-l"></div>
                                            <div class="layout-box-l" id="l-l1">L1</div>
                                            <div class="layout-box-l"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-t" id="l-plape-1">P</div>
                                            <div class="layout-box-t" id="l-t">T</div>
                                            <div class="layout-box-t" id="l-plape-2">P</div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-p-2"></div>
                                            <div class="layout-box-p-2" id="l-p2">P2</div>
                                            <div class="layout-box-p-2"></div>
                                        </div>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="layout-box-k"></div>
                                            <div class="layout-box-k" id="l-k">K</div>
                                            <div class="layout-box-k"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="margin-left: 20px; margin-top: 20px;">
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 620px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            CETAKAN</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 620px;height: 70px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            POLOS
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 206px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            STITCHING
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            LEM
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 50px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            POUNCH
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="text-center"
                                            style="width: 206px;height: 130px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            <input type="checkbox" class="form-check-input check-input">
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 130px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            <input type="checkbox" class="form-check-input check-input">
                                        </div>
                                        <div class="text-center"
                                            style="width: 206px;height: 130px;border: 2px solid #ccc;padding: 20px;font-size: 12px;">
                                            <input type="checkbox" class="form-check-input check-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="page-header flex-wrap">
                        <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">
                            <h4 class="card-title">Production Process</h4>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <button class="btn btn-primary btn-rounded btn-fw" style="padding: 10px; color: white;" id="add-production-process">Add
                                Process</button>
                        </div>
                    </div>
                    <hr />
                    <form method="POST" action="{{route('production.spk.progress-item.save')}}"
                        enctype="multipart/form-data" id="collapse-form-production-process">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Process Name<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="process_id">
                                            <option value="">-</option>
                                            @foreach($productionProcesses as $process)
                                            <option value="{{$process->id}}">{{$process->process_name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" class="form-control" name="spk_id"
                                            value="{{$data[0]->spk_id}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Sequence Order<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="sequence_order">
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
                                        style="padding: 10px;">Save Shedule </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Process Name</th>
                                        <th class="text-center">Process Sequence</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productionProcessesItem as $process)
                                    <tr>
                                        <td>{{$process->process_name}}</td>
                                        <td class="text-center">{{$process->sequence_order}}</td>
                                        <td class="text-center">
                                            @if($process->status == 1)
                                            <button type="button" class="btn btn-primary btn-rounded btn-fw"> INIT </button>
                                            @elseif($process->status == 2)
                                            <button type="button" class="btn btn-warning btn-rounded btn-fw"> WORK IN PROGRESS </button>
                                            @else
                                            <button type="button" class="btn btn-success btn-rounded btn-fw"> DONE </button>
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

    var goods_type = $("#goods-type").val();
    var sheet_layout = $("#sheet-form");
    var box_layout = $("#box-form");
    var bottom_top_layout = $("#bottom-top-form");

    if (goods_type === 1 || goods_type === "1") {
        box_layout.hide();
        bottom_top_layout.hide()
    } else if (goods_type === 2 || goods_type === "2") {
        sheet_layout.hide();
        bottom_top_layout.hide();
    } else {
        box_layout.hide();
        sheet_layout.hide();
    }

    $("#flag-join").change(function() {
        var flag_join_form = $(".flag-join-form");

        if ($(this).val() === 1 || $(this).val() === "1") {
            flag_join_form.hide();
        } else {
            flag_join_form.show();
        }
    });

    // $("#btn-auto-generate").click(function() {
    //     if (goods_type === "1" || goods_type === 1) {
    //         switch ("{{$data[0]->meas_unit}}") {
    //             case "INCH":
    //                 var p = Math.round(parseFloat({{$data[0]->length}} * 25.4));
    //                 var l = Math.round(parseFloat({{$data[0]->width}} * 25.4));
    //                 break;
    //             case "CM":
    //                 var p = Math.round(parseFloat({{$data[0]->length}} * 10));
    //                 var l = Math.round(parseFloat({{$data[0]->width}} * 10));
    //                 break;
    //             default:
    //                 var p = Math.round(parseFloat({{$data[0]->length}}));
    //                 var l = Math.round(parseFloat({{$data[0]->width}}));
    //                 break;
    //         }
    //     } else  {
    //         alert("hello")
    //         switch ("{{$data[0]->meas_unit}}") {
    //             case "INCH":
    //                 var p = Math.round(parseFloat({{$data[0]->length}} * 25.4));
    //                 var l = Math.round(parseFloat({{$data[0]->width}} * 25.4));
    //                 var t = Math.round(parseFloat({{$data[0]->height}} * 25.4));
    //                 break;
    //             case "CM":
    //                 var p = Math.round(parseFloat({{$data[0]->length}} * 10));
    //                 var l = Math.round(parseFloat({{$data[0]->width}} * 10));
    //                 var t = Math.round(parseFloat({{$data[0]->height}} * 10));
    //                 break;
    //             default:
    //                 var p = Math.round(parseFloat({{$data[0]->length}}));
    //                 var l = Math.round(parseFloat({{$data[0]->width}}));
    //                 var t = Math.round(parseFloat({{$data[0]->height}}));
    //                 break;
    //         }

    //         switch ("{{$data[0]->ply_type}}") {
    //             case "SW":
    //                 if (measure_type === "0" || measure_type === 0) {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l;
    //                         var p1 = p + 3;
    //                         var l1 = l + 3;
    //                         var p2 = p + 2;
    //                         var tinggi = t + 5;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 2);
    //                     } else {
    //                         var l1 = l;
    //                         var p2 = p + 3;
    //                         var tinggi = t + 5;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 2);
    //                     }
    //                 } else {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l - 2;
    //                         var p1 = p;
    //                         var l1 = l;
    //                         var p2 = p - 1;
    //                         var tinggi = t;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 2);
    //                     } else {
    //                         var l1 = l - 2;
    //                         var p2 = p;
    //                         var tinggi = t;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 2);
    //                     }
    //                 }

    //                 var kuping = 30;
    //                 break;
    //             case "DW":
    //                 if (measure_type === "0" || measure_type === 0) {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l + 4;
    //                         var p1 = p + 7;
    //                         var l1 = l + 7;
    //                         var p2 = p + 6;
    //                         var tinggi = t + 14;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 4);
    //                     } else {
    //                         var l1 = l + 4;
    //                         var p2 = p + 7;
    //                         var tinggi = t + 14;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 4);
    //                     }
    //                 } else {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l - 4;
    //                         var p1 = p - 3;
    //                         var l1 = l - 3;
    //                         var p2 = p - 4;
    //                         var tinggi = t - 3;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 4);
    //                     } else {
    //                         var l1 = l - 4;
    //                         var p2 = p - 3;
    //                         var tinggi = t - 3;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 4);
    //                     }
    //                 }

    //                 var kuping = 40;
    //                 break;
    //             case "TW":
    //                 if (measure_type === "0" || measure_type === 0) {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l + 4;
    //                         var p1 = p + 7;
    //                         var l1 = l + 7;
    //                         var p2 = p + 6;
    //                         var tinggi = t + 14;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 5);
    //                     } else {
    //                         var l1 = l + 4;
    //                         var p2 = p + 7;
    //                         var tinggi = t + 14;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 5);
    //                     }
    //                 } else {
    //                     if (flag_gabung === "0" || flag_gabung === 0) {
    //                         var l2 = l - 4;
    //                         var p1 = p - 3;
    //                         var l1 = l - 3;
    //                         var p2 = p - 4;
    //                         var tinggi = t - 3;
    //                         var plep = Math.floor((parseFloat(l2) / 2) + 5);
    //                     } else {
    //                         var l1 = l - 4;
    //                         var p2 = p - 3;
    //                         var tinggi = t - 3;
    //                         var plep = Math.floor((parseFloat(l1) / 2) + 5);
    //                     }
    //                 }
    //                 var kuping = 45;
    //                 break;
    //             default:
    //                 break;
    //         }
    //     }
    // });

    function roundToNearestMultipleOf5(number) {
        return 5 * Math.round(number / 5);
    }

    function roundToNearestMultipleOf50(number) {
        return 50 * Math.ceil(number / 50);
    }

    // Control Box
    $("#l2").on("keyup", function() {
        $("#l-l2").text($(this).val())
    });

    $("#p1").on("keyup", function() {
        $("#l-p1").text($(this).val())
    });

    $("#l1").on("keyup", function() {
        $("#l-l1").text($(this).val())
    });

    $("#t").on("keyup", function() {
        $("#l-t").text($(this).val())
    });

    $("#p2").on("keyup", function() {
        $("#l-p2").text($(this).val())
    });

    $("#plape").on("keyup", function() {
        $("#l-plape-1").text($(this).val())
        $("#l-plape-2").text($(this).val())
    });

    $("#k").on("keyup", function() {
        $("#l-k").text($(this).val())
    });

    // control Sheet

    $("#sheet-f-w").on("keyup", function() {
        $("#sheet-l-w").text($(this).val())
    });

    $("#sheet-f-l").on("keyup", function() {
        $("#sheet-l-l").text($(this).val())
    });

    $("#tr-spk-qty").on("keyup", function() {
        $("#spk-qty").val($(this).val())
    });

    $("#flag-join").on("change", function() {
        console.log($(this).val());
        $("#fjoin").val($(this).val());
    });
});
</script>
@endsection