@extends('adminbsb.partials.sub_layout')

@section('js')
    <script src="{{ asset(BULK_SYSTEM_THEME.'/plugins/tinymce/tinymce.js') }}"></script>
@endsection

@section('action')
    <div class="row">
        <div class="col-sm-12">
            <form id="frmProduct" action="{{ url('/'.BULK_SYSTEM.'/'.$controller) }}" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                {{ csrf_field() }}
                {{ method_field('POST') }}

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.supplier') }}</label><span class="requireSign">(*)</span>
                        @include('adminbsb.partials.select_supplier', ['supplierId' => old('supplier_id')])
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.location') }}</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="province_name" class="form-control" value="{{ old('province_name') }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.category') }}</label><span class="requireSign">(*)</span>
                        @include('adminbsb.partials.select_category', ['categoryId' => old('category_id')])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <label class="form-label">{{ trans('adminbsb.product_name') }}</label><span class="requireSign">(*)</span>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control limit limit255" value="{{ old('name') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.product_price') }}</label><span class="requireSign">(*)</span>
                        <div class="col-sm-12">
                            <div class="form-group input-group input-group-sm">
                                <div class="form-line">
                                    <input type="text" name="price" class="form-control align-right font-bold currencyPositive" value="{{ old('price') }}" />
                                </div>
                                <span class="input-group-addon">VND</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <label class="form-label">{{ trans('adminbsb.product_small_desc') }}</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="small_description" class="form-control limit limit1024" rows="6">{{ old('small_description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            {{--<div class="col-sm-12">
                                <label class="form-label">{{ trans('adminbsb.product_order') }}</label>
                                @include('adminbsb.partials.order', ['orderValue' => old('product_order')])
                            </div>--}}
                            <div class="col-sm-12">
                                <label class="form-label">{{ trans('adminbsb.product_status') }}</label>
                                @include('adminbsb.partials.switch_status', ['module' => 'product', 'switchStatus' => 1])
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-sm-12">
                                <label class="form-label">{{ trans('adminbsb.product_recommend') }}</label>
                                @include('adminbsb.partials.switch_recommend', ['module' => 'recommend_product', 'switchStatus' => 0])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-label">{{ trans('adminbsb.picture') }}</label>
                        @include('adminbsb.partials.select_picture_multi', ['pictures' => old('pictures')])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-label">{{ trans('adminbsb.product_desc') }}</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="description" class="form-control tinyEditor" rows="6">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 align-right">
                        <div class="col-sm-12">
                            <a href="{{ url(BULK_SYSTEM.'/'.$controller) }}" class="btn bg-grey">{{ trans('adminbsb.btn_cancel') }}</a>
                            <button type="submit" class="btn btn-success m-l-10 btnSubmit">{{ trans('adminbsb.btn_submit') }}</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection