<h2 class="title">
    <?php if($action == 'index'): ?>
        <?php echo e(trans('adminbsb.list')); ?>

    <?php else: ?>
        <?php echo e(trans('adminbsb.create')); ?>

    <?php endif; ?>
</h2>