<div class="m-t-10 text-uppercase searchStatus">
    <input type="checkbox" id="search_all" class="filled-in" value="all" @if ($searchValue === "") checked @endif/>
    <label class="m-r-20" for="search_all">All</label>

    @foreach(arrStatus($statusOf) as $arrStatus)
        <input type="checkbox" id="search_show_{{ $arrStatus['value'] }}" class="filled-in" value="{{ $arrStatus['value'] }}" @if ($searchValue === "" || $searchValue==$arrStatus['value']) checked @endif />
        <label class="m-r-20" for="search_show_{{ $arrStatus['value'] }}">{{ $arrStatus['text'] }}</label>
    @endforeach

    <input type="text" name="status" class="hiddenInput {{ $searchRequire }} searchVal" value="@if ($searchValue !== "") {{ $searchValue }} @endif" />
</div>