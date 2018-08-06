<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <select name="province" address-group="location" class="form-control selectpicker province show-tick" data-live-search="true" data-size="5" data-title="{{ trans('adminbsb.choose_province') }}">
                    @foreach(getProvince() as $province)
                        <option value="{{ $province->province_id }}" @if ($provinceId == $province->province_id) selected @endif>
                            {{ $province->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <select name="district" address-group="location" class="form-control selectpicker district show-tick" data-live-search="true" data-size="5" data-title="{{ trans('adminbsb.choose_district') }}">
                    @isset($provinceId)
                        @foreach(getDistrict($provinceId) as $district)
                            <option value="{{ $district->district_id }}" @if ($districtId == $district->district_id) selected @endif>
                                {{ $district->type }}&nbsp;{{ $district->name }}
                            </option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="address" class="form-control limit limit255" placeholder="{{ trans('adminbsb.address') }}" @isset($provinceId) value="{{ $address }}" @endisset/>
                </div>
            </div>
        </div>
    </div>
</div>