<form id="frmDelete" action="" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>