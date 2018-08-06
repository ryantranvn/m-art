@extends('adminbsb.partials.sub_layout')

@section('out_content')
    <div class="row clearfix summaryBox">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('admin/user') }}">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="content">
                        <div class="text upper">{{ trans('adminbsb.user') }}</div>
                        <div class="number count-to" data-from="0" data-to="{{ $totalUser }}" data-speed="15" data-fresh-interval="20">{{ $totalUser }}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('admin/supplier') }}">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_pin</i>
                    </div>
                    <div class="content">
                        <div class="text upper">{{ trans('adminbsb.supplier') }}</div>
                        <div class="number count-to" data-from="0" data-to="{{ $totalSupplier }}" data-speed="1000" data-fresh-interval="20">{{ $totalSupplier }}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('admin/product') }}">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">list</i>
                    </div>
                    <div class="content">
                        <div class="text upper">{{ trans('adminbsb.product') }}</div>
                        <div class="number count-to" data-from="0" data-to="{{ $totalProduct }}" data-speed="1000" data-fresh-interval="20">{{ $totalProduct }}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('admin/order') }}">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">shopping_basket</i>
                    </div>
                    <div class="content">
                        <div class="text upper">{{ trans('adminbsb.order') }}</div>
                        <div class="number count-to" data-from="0" data-to="{{ $totalOrder }}" data-speed="1000" data-fresh-interval="20">{{ $totalOrder }}</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">

    </div>
@endsection