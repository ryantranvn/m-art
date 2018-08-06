@extends('adminbsb.partials.sub_layout')

@section('action')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.restaurant_name') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $user->name }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.email') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $user->email }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.address') }} : </div>
                <div class="col-sm-8 align-left font-bold">
                    {{ $user->address }}
                    @if ($user->district_id !== null) - {{ $user->district_type }} {{ $user->district_name }} @endisset
                    @if ($user->province_id !== null)- {{ $user->province_name }} @endisset
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.category_status') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ getStatusText('category', $user->status) }}</div>
            </div>

            <div class="row">
                <div class="col-sm-12 align-right">
                    <a href="{{ url(BULK_SYSTEM.'/'.$controller) }}" class="btn bg-grey">{{ trans('adminbsb.btn_back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection