@extends('adminbsb.partials.sub_layout')

@section('js')
    <script src="{{ asset(BULK_SYSTEM_THEME.'/plugins/tinymce/tinymce.js') }}"></script>
@endsection

@section('action')
    <div class="row">
        <div class="col-sm-12">
            <form id="frmSupplier" action="{{ url('/'.BULK_SYSTEM.'/'.$controller) }}" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                {{ csrf_field() }}
                {{ method_field('POST') }}

                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label">{{ trans('adminbsb.supplier_name') }} <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control limit limit255" value="{{ old('name') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <label class="form-label">{{ trans('adminbsb.supplier_status') }}</label>
                        @include('adminbsb.partials.switch_status', ['module' => 'supplier', 'switchStatus' => 1])
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            {{-- Location --}}
                            <div class="row">
                                <label class="form-label">{{ trans('adminbsb.location') }}</label><span class="requireSign">(*)</span>
                                @include('adminbsb.partials.select_province', ['provinceId' => old('province_id')])
                            </div>
                            {{-- description --}}
                            <div class="row">
                                <label class="form-label">{{ trans('adminbsb.supplier_desc') }}</label>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="description" class="form-control limit limit1024 tinyEditor">{{ old('category_desc') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                        {{-- Thumnail --}}
                        <div class="col-sm-5">
                            <label class="form-label">{{ trans('adminbsb.picture') }}</label>
                            @include('adminbsb.partials.select_picture', ['picture' => old('picture')])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-label">{{ trans('adminbsb.supplier_introduction') }}</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="introduction" class="form-control tinyEditor"></textarea>
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
            {{-- upload form --}}
            {{--<form id="frmUploadPicture" action="{{ url(BULK_SYSTEM.'/upload-picture') }}" method="POST" enctype="multipart/form-data" />
                {{ csrf_field() }}
                <input type="file" name="file" accept="image/*" />
            </form>--}}
        </div>
    </div>
@endsection
