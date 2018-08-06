<!-- Top Bar -->
<nav class="navbar bg-{{ THEME_COLOR }}">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="true"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ url('admin') }}">Admin - ASCMS</a>
        </div>
        <div class="collapse navbar-collapse language-switch" id="navbar-collapse">
            <form id="frmLanguageSwitch" action="{{ url(BULK_SYSTEM.'/language') }}" method="POST">
                {{ csrf_field() }}
                <input type="text" name="locale" class="hiddenInput" />
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="btn btn-info viewFrontend" href="{{ url('/') }}" target="_blank" style="margin-top: 24px; box-shadow: none; line-height: 24px;">
                            View home
                        </a>
                    </li>
                    <li>
                        <a class="lang" data-lang="ja" href="javascript:void(0);"><img src="{{ asset('adminbsb/images/flg_japan.png') }}"></a>
                    </li>
                    <li>
                        <a class="lang" data-lang="en" href="javascript:void(0);"><img src="{{ asset('adminbsb/images/flg_english.png') }}"></a>
                    </li>
                    <li>
                        <a class="lang" data-lang="vi" href="javascript:void(0);"><img src="{{ asset('adminbsb/images/flg_vietnam.png') }}"></a>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right hidden">
                        <a href="javascript:void(0);" class="js-right-sidebar" data-close="true">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
<!-- #Top Bar -->