<div class="form-select">
    <select name="district_id" address-group="@if (!empty($groupLocation)) $groupLocation @endif" class="form-control district_id show-tick" data-live-search="true" data-size="5" data-title="{{ trans('adminbsb.choose_district') }}">
        @isset($provinceId)
            @foreach(getDistrict($provinceId) as $district)
                <option value="{{ $district->district_id }}" @if (!empty($districtId) && $districtId == $district->district_id) selected @endif>
                    {{ $district->type }}&nbsp;{{ $district->name }}
                </option>
            @endforeach
        @endisset
    </select>
</div>
