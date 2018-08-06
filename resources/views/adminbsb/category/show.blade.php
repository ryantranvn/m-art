@extends('adminbsb.partials.sub_layout')

@section('action')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.category_name') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $category->name }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.category_desc') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $category->description }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.category_order') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $category->order }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.category_status') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ getStatusText('category', $category->status) }}</div>
            </div>

            <div class="row">
                <div class="col-sm-12 align-right">
                    <a href="{{ url(BULK_SYSTEM.'/'.$controller) }}" class="btn bg-grey">{{ trans('adminbsb.btn_back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection