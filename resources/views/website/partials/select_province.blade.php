<div class="form-select">
    <select name="province_id" address-group="@if (!empty($groupLocation)) $groupLocation @endif" class="form-control province_id show-tick" data-live-search="true" data-size="5" data-title="{{ trans('adminbsb.choose_province') }}">
        @foreach(getProvince() as $province)
            <option value="{{ $province->province_id }}" @if (!empty($provinceId) && $provinceId == $province->province_id) selected @endif>
                {{ $province->name }}
            </option>
        @endforeach
    </select>
</div>