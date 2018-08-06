<div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(url('admin/dashboard')); ?>">
                    <i class="material-icons">home</i>
                </a>
            </li>

            <?php if($action == 'index'): ?>
                <li class="active"><?php echo e($controller); ?></li>
            <?php else: ?>
                <li>
                    <a class="controller" href="<?php echo e(url('/'.BULK_SYSTEM.'/'.$controller)); ?>"><?php echo e($controller); ?></a>
                </li>
            <?php endif; ?>

            <?php if($action != 'index'): ?>
                <li class="active">
                    <?php echo e($action); ?>

                </li>
            <?php endif; ?>
        </ol>
    </div>
</div>