<div class="block-header">
    <?php if($controller != 'order'): ?>
    <a href="<?php echo e(url('/'.BULK_SYSTEM.'/'.$controller.'/create')); ?>" class="btn btn-primary waves-effect btnCreate" role="button">
        <i class="material-icons">add</i> <?php echo e(trans('adminbsb.btn_create')); ?>

    </a>
    <?php endif; ?>
</div>