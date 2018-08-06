<div class="m-t-10 text-uppercase searchStatus">
    <input type="checkbox" id="search_all" class="filled-in" value="all" <?php if($searchValue === ""): ?> checked <?php endif; ?>/>
    <label class="m-r-20" for="search_all">All</label>

    <?php $__currentLoopData = arrStatus($statusOf); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="checkbox" id="search_show_<?php echo e($arrStatus['value']); ?>" class="filled-in" value="<?php echo e($arrStatus['value']); ?>" <?php if($searchValue === "" || $searchValue==$arrStatus['value']): ?> checked <?php endif; ?> />
        <label class="m-r-20" for="search_show_<?php echo e($arrStatus['value']); ?>"><?php echo e($arrStatus['text']); ?></label>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <input type="text" name="status" class="hiddenInput <?php echo e($searchRequire); ?> searchVal" value="<?php if($searchValue !== ""): ?> <?php echo e($searchValue); ?> <?php endif; ?>" />
</div>