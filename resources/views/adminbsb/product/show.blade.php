@extends('adminbsb.partials.sub_layout')

@section('action')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.product_name') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $product->name }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.product_price') }} : </div>
                <div class="col-sm-8 align-left font-bold">
                    <span class="currencyPositive">{{ $product->price }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.supplier') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $product->supplier->name }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.category') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $product->category->name }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.picture') }} : </div>
                <div class="col-sm-3 align-left font-bold">
                    @foreach ($product->pictures as $picture)
                    <img src="{{ url('/storage'.$picture->url) }}" class="img-responsive m-r-10 thumbnailInTable" />
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.product_desc') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ $product->description }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right">{{ trans('adminbsb.supplier_status') }} : </div>
                <div class="col-sm-8 align-left font-bold">{{ getStatusText('product', $product->status) }}</div>
            </div>

            <div class="row">
                <div class="col-sm-12 align-right">
                    <a href="{{ url(BULK_SYSTEM.'/'.$controller) }}" class="btn bg-grey">{{ trans('adminbsb.btn_back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection