@extends('adminbsb.partials.sub_layout')

@section('action')
    <div class="row">
        <div class="col-sm-12">
            <form id="frmUser" action="{{ url('/'.BULK_SYSTEM.'/'.$controller) }}" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                {{ csrf_field() }}
                {{ method_field('POST') }}

                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label">{{ trans('adminbsb.restaurant_name') }} <span class="requireSign">(*)</span></label>
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
                        <label class="form-label">{{ trans('adminbsb.user_status') }}</label>
                        @include('adminbsb.partials.switch_status', ['module' => 'user', 'switchStatus' => 1])
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label">{{ trans('adminbsb.email') }} <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.password') }} <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.password_confirmation') }} <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password_confirmation" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" style="opacity: 0;">s</label>
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon bg-blue btnGeneratePassword">{{ trans('adminbsb.generate_password') }}</span>
                                <div class="form-line">
                                    <input type="text" name="password_auto" class="form-control align-center text-uppercase" readonly autocomplete="off" />
                                </div>
                                <span class="input-group-addon hide btnClearAutoPassword"><i class="material-icons">close</i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.province') }}</label>
                        @include('adminbsb.partials.select_province', ['groupLocation' => 'createUser', 'provinceId' => old('province_id')])
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.district') }}</label>
                        @include('adminbsb.partials.select_district', ['groupLocation' => 'createUser', 'provinceId' => old('province_id'), 'districtId' => old('dictrict_id')])
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.address') }}</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="address" class="form-control limit limit255" value="{{ old('address') }}" />
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