@extends('adminbsb.partials.sub_layout')

@section('action')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.supplier_name') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $supplier->name }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.picture') }} : </div>
                <div class="col-sm-3 align-left font-bold">
                    <img src="{{ url('/storage'.$supplier->thumbnail) }}" class="img-responsive thumbnail" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.supplier_desc') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $supplier->description }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.supplier_introduction') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $supplier->introduction }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.location') }} : </div>
                <div class="col-sm-8 align-left font-bold">
                    @isset ($supplier->province) {{ $supplier->province_name }} @endisset
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.supplier_status') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ getStatusText('supplier', $supplier->status) }}</div>
            </div>

            <div class="row">
                <div class="col-sm-12 align-right">
                    <a href="{{ url(BULK_SYSTEM.'/'.$controller) }}" class="btn bg-grey">{{ trans('adminbsb.btn_back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection