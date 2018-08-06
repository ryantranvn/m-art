@extends('adminbsb.partials.sub_layout')

@section('search')

@endsection

@section('action')
    <div class="row">
        <div class="col-sm-12">
            <form id="frmUser" action="{{ url('/'.BULK_SYSTEM.'/'.$controller.'/'.$user->user_id) }}" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label">{{ trans('adminbsb.restaurant_name') }} <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control limit limit255" value="{{ $user->name }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <label class="form-label">{{ trans('adminbsb.user_status') }}</label>
                        @include('adminbsb.partials.switch_status', ['module' => 'user', 'switchStatus' => $user->status])
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label">{{ trans('adminbsb.email') }} <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.province') }}</label>
                        @include('adminbsb.partials.select_province', ['groupLocation' => 'editUser', 'provinceId' => $user->province_id])
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.district') }}</label>
                        @include('adminbsb.partials.select_district', ['groupLocation' => 'editUser', 'provinceId' => $user->province_id, 'districtId' => $user->district_id])
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">{{ trans('adminbsb.address') }}</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="address" class="form-control limit limit255" value="{{ $user->address }}" />
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