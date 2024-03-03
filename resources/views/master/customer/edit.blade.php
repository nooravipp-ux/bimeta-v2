@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <!-- BEGIN: Horizontal Form -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Informasi Customer
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <form method="POST" action="{{route('customer.update')}}">
                        @csrf
                        <div id="horizontal-form" class="p-5">
                            <div class="preview">
                                <div class="form-inline">
                                    <label for="vertical-form-1" class="form-label sm:w-20">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{$data->code}}">
                                    <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="form-label sm:w-20">Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{$data->name}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="form-label sm:w-20">Telepon</label>
                                    <input type="text" class="form-control" name="phone_number" value="{{$data->phone_number}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="form-label sm:w-20">PIC</label>
                                    <select data-placeholder="Pilih PIC" class="tom-select w-full form-control" name="pic">
                                        <option value=" ">-</option>
                                        @foreach($pic as $pic)
                                        <option value="{{$pic->name}}" <?php echo ($pic->name == $data->pic) ? "selected" : "" ?>>{{$pic->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="form-label sm:w-20">Tipe Pajak</label>
                                    <select data-placeholder="Pilih Tipe Pajak" class="tom-select w-full form-control" name="tax_type">
                                        <option value=" ">-</option>
                                        <option value="V0" <?php echo ($data->tax_type == 'V0') ? "selected" : "" ?>>V0</option>
                                        <option value="V1" <?php echo ($data->tax_type == 'V1') ? "selected" : "" ?>>V1</option>
                                        <option value="V2" <?php echo ($data->tax_type == 'V2') ? "selected" : "" ?>>V2</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="form-label sm:w-20">Tipe Customer</label>
                                    <select data-placeholder="Pilih Tipe Customer" class="tom-select w-full form-control" name="customer_type">
                                        <option value=" ">-</option>
                                        <option value="PERSONAL" <?php echo ($data->customer_type == 'PERSONAL') ? "selected" : "" ?>>PERSONAL</option>
                                        <option value="COMPANY" <?php echo ($data->customer_type == 'COMPANY') ? "selected" : "" ?>>COMPANY</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="form-label sm:w-20">Alamat</label>
                                    <textarea type="text" class="form-control" name="address">{{$data->address}}</textarea>
                                </div>
                            </div>
                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Horizontal Form -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

</script>
@endsection