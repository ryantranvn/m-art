
<div class="col-sm-12 noMarginBottom">
    <div class="row">
        <div class="col-sm-12 thumbnailContainer thumbnailMultiple">
            <?php if(isset($product)): ?>
                <?php $__currentLoopData = $product->pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="thumbnailWrap">
                    <a href="#" class="thumbnailFrame">
                        <img src="<?php echo e(url('/storage'.$picture->url)); ?>" class="img-responsive thumbnail" />
                        <input type="text" name="picture[]" class="inputPicture hiddenInput" value="<?php echo e($picture->url); ?>" readonly />
                    </a>
                    <i class="material-icons col-red delThumbnail">clear</i>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(empty($product) || (!empty($product) && count($product->pictures)<5)): ?>
            <div class="thumbnailWrap">
                <a href="#" class="thumbnailFrame">
                    <img src="<?php echo e(asset(BULK_SYSTEM_THEME.'/images/default.jpg')); ?>" class="img-responsive thumbnail" />
                    <input type="text" name="picture[]" class="inputPicture hiddenInput" value="" readonly />
                </a>
                <i class="material-icons col-red delThumbnail hide">clear</i>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
