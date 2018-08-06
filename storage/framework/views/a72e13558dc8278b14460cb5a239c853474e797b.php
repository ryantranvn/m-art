<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
        <?php if(isset($breadcrumbs)): ?>
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->last): ?>
                    <li class="breadcrumb-item  active" aria-current="page"><?php echo e($breadcrumb['text']); ?></li>
                <?php else: ?>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?php echo e($breadcrumb['link']); ?>"><?php echo e($breadcrumb['text']); ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ol>
</nav>