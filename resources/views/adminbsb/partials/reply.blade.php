@foreach (['danger', 'warning', 'success', 'info'] as $key)
    @if(Session::has($key))
        <div class="alert alert-{{ $key }}">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="col-white" aria-hidden="true">×</span></button>
            <ul>
                <li>{{ Session::get($key) }}</li>
            </ul>
        </div>
    @endif
@endforeach

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="col-white" aria-hidden="true">×</span></button>
        <ul>
            @foreach ($errors->all() as $errorMsg)
                <li>{{ $errorMsg }}</li>
            @endforeach
        </ul>
    </div>
@endif