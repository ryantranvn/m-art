<div class="block-header">
    @if ($controller != 'order'
    && $controller != 'dashboard'
    && $controller != 'contact'
    && $controller != 'setting'
    && $controller != 'subscribe')
    <a href="{{ url('/'.BULK_SYSTEM.'/'.$controller.'/create') }}" class="btn btn-primary waves-effect btnCreate" role="button">
        <i class="material-icons">add</i> {{ trans('adminbsb.btn_create') }}
    </a>
    @endif
</div>