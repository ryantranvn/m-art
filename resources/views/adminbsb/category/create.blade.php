@extends('adminbsb.partials.sub_layout')

@section('js')
    <script src="{{ asset(BULK_SYSTEM_THEME.'/plugins/tinymce/tinymce.js') }}"></script>
@endsection

@section('action')
    <div class="row">
        <div class="col-sm-12">
            <form id="frmCategory" action="{{ url('/'.BULK_SYSTEM.'/'.$controller) }}" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-label">{{ trans('adminbsb.category_name') }}</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="category_name" class="form-control limit limit255" value="{{ old('category_name') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.picture') }}</label>
                        @include('adminbsb.partials.select_picture', ['picture' => old('picture')])
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        <label class="form-label">{{ trans('adminbsb.category_status') }}</label>
                        @include('adminbsb.partials.switch_status', ['module' => 'category', 'switchStatus' => 1])
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        <label class="form-label">{{ trans('adminbsb.category_order') }}</label>
                        @include('adminbsb.partials.order', ['orderValue' => old('order')])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-label">{{ trans('adminbsb.category_desc') }}</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="category_desc" class="form-control limit limit1024 tinyEditor">{{ old('category_desc') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 align-right">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <a href="{{ url(BULK_SYSTEM.'/'.$controller) }}" class="btn bg-grey">{{ trans('adminbsb.btn_cancel') }}</a>
                                <button type="submit" class="btn btn-success m-l-10 btnSubmit">{{ trans('adminbsb.btn_submit') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection