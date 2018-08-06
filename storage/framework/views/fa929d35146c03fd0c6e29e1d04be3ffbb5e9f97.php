<h2 class="title">
    <?php if($action == 'index'): ?>
        <?php echo e(trans('adminbsb.list_title')); ?>

    <?php elseif($action == 'show'): ?>
        <?php echo e(trans('adminbsb.show_title')); ?>

    <?php elseif($action == 'create'): ?>
        <?php echo e(trans('adminbsb.create_title')); ?>

    <?php elseif($action == 'edit'): ?>
        <?php echo e(trans('adminbsb.edit_title')); ?>

    <?php endif; ?>
</h2>