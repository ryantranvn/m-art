<div class="col-sm-4">
	<div class="dataTables_info" role="status" aria-live="polite">
        <?php echo e(trans('adminbsb.paging_total')); ?>

        <strong><?php echo e($paginator->total()); ?></strong>
        <?php echo e(trans('adminbsb.paging_entries')); ?>

    </div>
</div>
<div class="col-sm-8">
    <?php if($paginator->hasPages()): ?>
        <div class="dataTables_paginate paging_simple_numbers">
            <nav>
                <ul class="pagination">
                    <?php if($paginator->onFirstPage()): ?>
                    <li class="disabled">
                        <a href="javascript:void(0);">
                            <i class="material-icons">keyboard_arrow_left</i>
                        </a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="<?php echo e($paginator->previousPageUrl()); ?>">
                            <i class="material-icons">keyboard_arrow_left</i>
                        </a>
                    </li>
                    <?php endif; ?>

                    
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <li class="active"><a href="javascript:void(0);"><?php echo e($page); ?></a></li>
                                <?php else: ?>
                                    <li><a href="<?php echo e($url); ?>" class="waves-effect"><?php echo e($page); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($paginator->hasMorePages()): ?>
                    <li>
                        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="waves-effect">
                            <i class="material-icons">keyboard_arrow_right</i>
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="disabled">
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="material-icons">keyboard_arrow_right</i>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
</div>