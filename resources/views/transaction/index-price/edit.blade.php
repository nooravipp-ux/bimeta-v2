@extends('layouts._base')
@section('css')

@endsection
@section('main-content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <button class="btn btn-primary mb-2 mb-md-0 me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Index Price Calculator" id="calc-index-price"><i class="mdi mdi-calculator"></i> </button>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" id="add"><i
                    class="mdi mdi-plus-circle"></i>
                Add</button>
        </div>
    </div>

    <div class="row">
        <div class="collapse-form-index">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>Edit Index Harga</h4>
                            <hr />
                            <div class="col-md-6">
                                <form method="POST" action="{{route('index-price.update')}}">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Ply</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="ply_type">
                                                <option value="">-</option>
                                                <option value="SF" <?php echo ($indexPrice->ply_type == "SF") ? "selected" : "" ?>>Single Face (SF)</option>
                                                <option value="SW" <?php echo ($indexPrice->ply_type == "SW") ? "selected" : "" ?>>Single Wall (SW)</option>
                                                <option value="DW" <?php echo ($indexPrice->ply_type == "DW") ? "selected" : "" ?>>Double Wall (DW)</option>
                                                <option value="TW" <?php echo ($indexPrice->ply_type == "TW") ? "selected" : "" ?>>Triple Wall (TW)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Flute</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="flute_type">
                                                <option value="">-</option>
                                                <option value="BC" <?php echo ($indexPrice->flute_type == "BC") ? "selected" : "" ?>>B || C Flute</option>
                                                <option value="B/C" <?php echo ($indexPrice->flute_type == "B/C") ? "selected" : "" ?>>B / C Flute</option>
                                                <option value="E" <?php echo ($indexPrice->flute_type == "E") ? "selected" : "" ?>>E Flute</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Substance</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="substance">
                                                <option value="">-</option>
                                                @foreach($substances as $substance)
                                                <option value="{{$substance->id}}"  <?php echo ($indexPrice->substance_id == $substance->id) ? "selected" : "" ?>>{{$substance->substance}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="index_price" value="{{$indexPrice->price}}">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Index Tag</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="index_tag" value="{{$indexPrice->tag}}">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
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
    $(".loader").hide();
</script>
@endsection