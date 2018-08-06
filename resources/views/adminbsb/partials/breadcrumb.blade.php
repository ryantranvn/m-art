<div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/dashboard') }}">
                    <i class="material-icons">home</i>
                </a>
            </li>

            @if ($action == 'index')
                <li class="active">{{ $controller }}</li>
            @else
                <li>
                    <a class="controller" href="{{ url('/'.BULK_SYSTEM.'/'.$controller) }}">{{ $controller }}</a>
                </li>
            @endif

            @if ($action != 'index')
                <li class="active">
                    {{ $action }}
                </li>
            @endif
        </ol>
    </div>
</div>