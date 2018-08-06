<?php $__env->startSection('content'); ?>
    <div class="banner">
        <img src="<?php echo e(asset(WEBSITE_URL.'/images/banner.jpg')); ?>" alt="<?php echo e($imageAlt); ?>" />
        <div class="bannerDescription text-center">
            <p class="title">
                Easy online <span class="colorOrange">shopping</span> for Expats
            </p>
            <p class="subtitle">
                We made it simple to shopping in a unique online store - All in one -
            </p>
            <a href="#" class="btn">SHOPPING NOW</a>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>