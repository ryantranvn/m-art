<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="true"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo e(url('admin')); ?>">Admin - ASCMS</a>
        </div>
        <div class="collapse navbar-collapse language-switch" id="navbar-collapse">
            <form id="frmLanguageSwitch" action="<?php echo e(url('/admin/language')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <input type="text" name="locale" class="hiddenInput" />
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="ja" href="javascript:void(0);"><img src="<?php echo e(asset('images/flg_japan.png')); ?>"></a>
                    </li>
                    <li>
                        <a class="en" href="javascript:void(0);"><img src="<?php echo e(asset('images/flg_english.png')); ?>"></a>
                    </li>
                    <li>
                        <a class="vi" href="javascript:void(0);"><img src="<?php echo e(asset('images/flg_vietnam.png')); ?>"></a>
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