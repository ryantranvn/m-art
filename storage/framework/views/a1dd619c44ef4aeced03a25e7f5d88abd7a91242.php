
<?php $__currentLoopData = arrStatus($statusOf); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($status == $arrStatus['value']): ?>
    <button class="btn btn-xs <?php echo e($arrStatus['color']); ?> btnStatus" data-id="<?php echo e($id); ?>"><?php echo e($arrStatus['text']); ?></button>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

