<div class="col-sm-12 noMarginBottom">
    <div class="row">
        <div class="col-sm-6 noMarginBottom thumbnailContainer">
            <div class="thumbnailWrap">
                <a href="#" class="thumbnailFrame">
                    @if ($picture != null && $picture != "")
                        <img src="{{ url('/storage'.$picture) }}" class="img-responsive thumbnail" />
                    @else
                        <img src="{{ asset(BULK_SYSTEM_THEME.'/images/default.jpg') }}" class="img-responsive thumbnail" />
                    @endif
                    <input type="text" name="picture" class="inputPicture hiddenInput" value="{{ $picture }}" readonly />
                </a>
                <i class="material-icons col-red delThumbnail @if ($picture == null || $picture == "") hide @endif">clear</i>
            </div>
        </div>
    </div>
</div>
