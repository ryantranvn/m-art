<div class="col-sm-12">
    <div class="form-group">
        <select name="category_id" class="form-control selectpicker show-tick" data-title="{{ trans('adminbsb.choose_category') }}" data-live-search="true" data-size="5">
            @foreach (getCategories(1) as $category)
                <option value="{{ $category->category_id }}" @if (!empty($categoryId) && $categoryId==$category->category_id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        {{--<input type="text" name="category_id" class="select_id hiddenInput" />--}}
    </div>
</div>