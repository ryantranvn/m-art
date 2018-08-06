<div class="block-product-slider block-product-<?php echo e($dataSlideId); ?>" data-id="<?php echo e($dataSlideId); ?>">
    <div class="session-wrapper">
        <div class="session-inner">
            <div class="slider product-sliders-<?php echo e($dataSlideId); ?> products-style">
                <?php if(count($products)>0): ?>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('website.partials.product_item', ['product' => $product], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>