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

.mandatory-sign {
    color: red;
}

.text-danger {
    color: red;
    font-size: 12px;
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
                                        value="{{$goodsInformations->goods_name}}" readonly>
                                    <input type="hidden" class="form-control" name="detail_sales_order_id"
                                        value="{{$goodsInformations->id}}" readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Goods Type</label>
                                <div class="col-sm-9">
                                    @if($goodsInformations->goods_type == 1)
                                    <input type="text" class="form-control" value="SHEET" readonly>
                                    @elseif($goodsInformations->goods_type == 2)
                                    <input type="text" class="form-control" value="BOX" readonly>
                                    @else
                                    <input type="text" class="form-control" value="BOX (Badan + Tutup)" readonly>
                                    @endif
                                    <input type="hidden" class="form-control" value="{{$goodsInformations->goods_type}}"
                                        id="goods-type">
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Spesification</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        value="{{$goodsInformations->ply_type}} {{$goodsInformations->flute_type}} {{$goodsInformations->substance_name}}"
                                        readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Measure</label>
                                <div class="col-sm-9">
                                    @if($goodsInformations->goods_type == 1)
                                    <input type="text" class="form-control"
                                        value="{{$goodsInformations->length}} X {{$goodsInformations->width}} {{$goodsInformations->meas_unit}}"
                                        readonly>
                                    @elseif($goodsInformations->goods_type == 2)
                                    <input type="text" class="form-control"
                                        value="{{$goodsInformations->length}} X {{$goodsInformations->width}} X {{$goodsInformations->height}} {{$goodsInformations->meas_unit}} ({{$goodsInformations->meas_type}})"
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
                                        value="{{$goodsInformations->quantity}}" readonly>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stitching</label>
                                <div class="col-sm-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="flag_stitching_trigger" value="0" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "disabled" : ""; ?>
                                            checked>
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flag_stitching_trigger" value="1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "disabled" : ""; ?>>
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Lem</label>
                                <div class="col-sm-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="flag_glue_trigger" value="0" checked <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "disabled" : ""; ?>>
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flag_glue_trigger" value="1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "disabled" : ""; ?>>
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pounch</label>
                                <div class="col-sm-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="flag_pounch_trigger" value="0" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "disabled" : ""; ?>
                                            checked>
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flag_pounch_trigger" value="1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "disabled" : ""; ?>>
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                </div>
                            </div>
                            <hr />
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
                            @if(($goodsInformations->quantity - $totalSPKCreated) != 0)
                            <a href="" class="btn btn-primary mt-2 mr-2 mt-sm-0 btn-icon-text">
                                <i class="mdi mdi-plus-circle"></i> Auto Calculate Value</a>
                            @endif
                        </div>
                    </div>
                    <hr />
                    <!-- Form Input Type Sheet -->
                    @if($goodsInformations->goods_type == 1)
                    <form method="POST" action="{{route('production.spk.save')}}" enctype="multipart/form-data"
                        id="sheet-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Netto (W)<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="netto_width" value=""
                                            id="sheet-f-w">
                                        <input type="hidden" class="form-control" name="detail_sales_order_id"
                                            value="{{$goodsInformations->id}}">
                                        <input type="hidden" class="form-control" name="goods_type"
                                            value="{{$goodsInformations->goods_type}}">
                                        
                                        <input type="hidden" class="form-control" name="flag_stitching" value="0" id="flag-stitching">
                                        <input type="hidden" class="form-control" name="flag_glue" value="0" id="flag-glue">
                                        <input type="hidden" class="form-control" name="flag_pounch" value="0" id="flag-pounch">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Netto (L)<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="netto_length" value=""
                                            id="sheet-f-l">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bruto (W)<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="bruto_width" value="">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bruto (L)<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="bruto_length" value="">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sheet Qty<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="sheet_quantity" value="">
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-2 mt-sm-0 btn-icon-text">
                                <i class="mdi mdi-plus-circle"></i> Confirm & Save</a>
                        </div>
                    </form>
                    @elseif($goodsInformations->goods_type == 2)
                    <!-- Form Input Type Box -->
                    <form method="POST" action="{{route('production.spk.save')}}" enctype="multipart/form-data"
                        id="box-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-3">
                                <div class="form-group row flag-form-join">
                                    <label class="col-sm-4 col-form-label">join ?<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="flag-join" name="flag_join" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "disabled" : ""; ?> required>
                                            <option value="">-</option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Quantity<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="spk_qty" id="tr-spk-qty"
                                            placeholder="{{$goodsInformations->quantity - $totalSPKCreated}}" max=10
                                            required
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        <small id="max-quantity-form" class="form-text text-muted text-danger"><span
                                                class="text-danger">*Maximal Quantity
                                                {{$goodsInformations->quantity - $totalSPKCreated}}</span></small>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row flag-join-form">
                                    <label class="col-sm-4 col-form-label">L2<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="l2" value="" id="l2"
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                </div>
                                <hr class="flag-join-form" />
                                <div class="form-group row flag-join-form">
                                    <label class="col-sm-4 col-form-label">P1<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="p1" value="" id="p1"
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                </div>
                                <hr class="flag-join-form" />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">L1<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="l1" value="" id="l1"
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">P2<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="p2" value="" id="p2"
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">T<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="t" value="" id="t"
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">PLAPE<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="plape" value="" id="plape"
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">K<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="k" value="" id="k"
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Netto (L X P)<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="netto_width" value=""
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="netto_length" value=""
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Bruto (L X P)<span
                                            class="mandatory-sign">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="bruto_width" value=""
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="bruto_length" value=""
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Sheet Qty<span class="mandatory-sign">
                                            *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="sheet_quantity" value=""
                                            <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        <input type="hidden" class="form-control" name="flag_join" value="0" id="fjoin">
                                        <input type="hidden" class="form-control" name="detail_sales_order_id"
                                            value="{{$goodsInformations->id}}">
                                        <input type="hidden" class="form-control" name="goods_type"
                                            value="{{$goodsInformations->goods_type}}">
                                        <input type="hidden" class="form-control" name="spk_quantity" id="spk-qty">

                                        <input type="hidden" class="form-control" name="flag_stitching" value="0" id="flag-stitching">
                                        <input type="hidden" class="form-control" name="flag_glue" value="0" id="flag-glue">
                                        <input type="hidden" class="form-control" name="flag_pounch" value="0" id="flag-pounch">
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                        @if(($goodsInformations->quantity - $totalSPKCreated) != 0)
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-2 mt-sm-0 btn-icon-text">
                                <i class="mdi mdi-plus-circle"></i> Confirm & Save</a>
                        </div>
                        @endif
                    </form>
                    @else
                    <!-- Form Input Type Bottom - Top  -->
                    <form method="POST" action="{{route('production.spk.save')}}" enctype="multipart/form-data"
                        id="bottom-top-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row" id="bottom-form">
                                    <div class="col-md-6">
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
                                                <div class="layout-box-t" id="l-plape-1"></div>
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
                                    <div class="col-md-3">
                                        <div class="form-group row flag-join-form">
                                            <label class="col-sm-4 col-form-label">L2<span class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="l2" value="" id="l2">
                                            </div>
                                        </div>
                                        <hr class="flag-join-form" />
                                        <div class="form-group row flag-join-form">
                                            <label class="col-sm-4 col-form-label">P1<span class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="p1" value="" id="p1">
                                            </div>
                                        </div>
                                        <hr class="flag-join-form" />
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">L1<span class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="l1" value="" id="l1">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">P2<span class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="p2" value="" id="p2">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">T<span class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="t" value="" id="t">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">PLAPE<span class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="plape" value=""
                                                    id="plape">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">K<span class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="k" value="" id="k">
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Netto (W)<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="netto_width" value="">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Netto (L)<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="netto_height" value="">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Bruto (W)<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="bruto_width" value="">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Bruto (L)<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="brutto_height" value="">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Sheet Qty<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="sheet_qty" value="">
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                </div>
                                <hr />
                                <div class="row" id="top-form">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Netto (W)<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="netto_width" value=""
                                                    id="sheet-f-w">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Netto (L)<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="netto_length" value=""
                                                    id="sheet-f-l">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Bruto (W)<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="bruto_width" value="">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Bruto (L)<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="brutto_length" value="">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sheet Qty<span
                                                    class="mandatory-sign">
                                                    *</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="sheet_qty" value="">
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
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

    $("#flag-join").change(function() {
        var flag_join_form = $(".flag-join-form");

        if ($(this).val() === 1 || $(this).val() === "1") {
            flag_join_form.hide();
        } else {
            flag_join_form.show();
        }
    });

    $('input[name=flag_stitching_trigger]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $("#flag-stitching").val(1);
        } else {
            $("#flag-stitching").val(0);
        }
    });

    $('input[name=flag_glue_trigger]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $("#flag-glue").val(1);
        } else {
            $("#flag-glue").val(0);
        }
    });

    $('input[name=flag_pounch_trigger]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $("#flag-pounch").val(1);
        } else {
            $("#flag-pounch").val(0);
        }
    });

    // $("#btn-auto-generate").click(function() {
    //     if (goods_type === "1" || goods_type === 1) {
    //         switch ("{{$goodsInformations->meas_unit}}") {
    //             case "INCH":
    //                 var p = Math.round(parseFloat({{$goodsInformations->length}} * 25.4));
    //                 var l = Math.round(parseFloat({{$goodsInformations->width}} * 25.4));
    //                 break;
    //             case "CM":
    //                 var p = Math.round(parseFloat({{$goodsInformations->length}} * 10));
    //                 var l = Math.round(parseFloat({{$goodsInformations->width}} * 10));
    //                 break;
    //             default:
    //                 var p = Math.round(parseFloat({{$goodsInformations->length}}));
    //                 var l = Math.round(parseFloat({{$goodsInformations->width}}));
    //                 break;
    //         }
    //     } else  {
    //         alert("hello")
    //         switch ("{{$goodsInformations->meas_unit}}") {
    //             case "INCH":
    //                 var p = Math.round(parseFloat({{$goodsInformations->length}} * 25.4));
    //                 var l = Math.round(parseFloat({{$goodsInformations->width}} * 25.4));
    //                 var t = Math.round(parseFloat({{$goodsInformations->height}} * 25.4));
    //                 break;
    //             case "CM":
    //                 var p = Math.round(parseFloat({{$goodsInformations->length}} * 10));
    //                 var l = Math.round(parseFloat({{$goodsInformations->width}} * 10));
    //                 var t = Math.round(parseFloat({{$goodsInformations->height}} * 10));
    //                 break;
    //             default:
    //                 var p = Math.round(parseFloat({{$goodsInformations->length}}));
    //                 var l = Math.round(parseFloat({{$goodsInformations->width}}));
    //                 var t = Math.round(parseFloat({{$goodsInformations->height}}));
    //                 break;
    //         }

    //         switch ("{{$goodsInformations->ply_type}}") {
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