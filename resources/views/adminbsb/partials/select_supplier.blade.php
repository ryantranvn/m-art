<div class="col-sm-12">
    <div class="form-group">
        <select name="supplier_id" class="form-control selectpicker show-tick @if (!empty($forSearch)) forSearch @endif" data-title="{{ trans('adminbsb.choose_supplier') }}" data-live-search="true" data-size="5">
            @foreach (getSuppliers(1) as $supplier)
            <option value="{{ $supplier->supplier_id }}" data-location-id="{{ $supplier->province_id }}" @if (!empty($supplierId) && $supplierId==$supplier->supplier_id) selected @endif>{{ $supplier->name }}</option>
            @endforeach
        </select>
        {{--<input type="text" name="supplier_id" class="select_id hiddenInput" />--}}
    </div>
</div>