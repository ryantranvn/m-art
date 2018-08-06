{{--<span class="font-italic p-l-20">{{ trans('adminbsb.can_select_multiple_files') }}</span>--}}
<div class="col-sm-12 noMarginBottom">
    <div class="row">
        <div class="col-sm-12 thumbnailContainer thumbnailMultiple">
            @isset($product)
                @foreach ($product->pictures as $picture)
                <div class="thumbnailWrap">
                    <a href="#" class="thumbnailFrame">
                        <img src="{{ url('/storage'.$picture->url) }}" class="img-responsive thumbnail" />
                        <input type="text" name="picture[]" class="inputPicture hiddenInput" value="{{ $picture->url }}" readonly />
                    </a>
                    <i class="material-icons col-red delThumbnail">clear</i>
                </div>
                @endforeach
            @endisset

            @if (empty($product) || (!empty($product) && count($product->pictures)<5))
            <div class="thumbnailWrap">
                <a href="#" class="thumbnailFrame">
                    <img src="{{ asset(BULK_SYSTEM_THEME.'/images/default.jpg') }}" class="img-responsive thumbnail" />
                    <input type="text" name="picture[]" class="inputPicture hiddenInput" value="" readonly />
                </a>
                <i class="material-icons col-red delThumbnail hide">clear</i>
            </div>
            @endif
        </div>
    </div>
</div>
