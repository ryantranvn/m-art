<?php $__env->startSection('content'); ?>
    <div class="wrapper-content container">
        <div class="row">
            <?php echo $__env->make('website.partials.breadcrumb', [
                'breadcrumbs' => [
                    ['text' => 'Categories', 'link' => '']
                ]
            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <section class="block-category-home-page">
                <div class="block-title text-center">
                    <h2><span>Categories</span></h2>
                    <p>Everything you need for good healthy life</p>
                </div>
                <div class="block-content">
                    <?php ($categories = getCategoryGroup6()); ?>
                    <?php echo $__env->make('website.partials.category_group6', ['categories' => $categories], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </section>

            <div class="block-banner-category">
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <a href="#"><img src="<?php echo e(asset(WEBSITE_URL.'/images/banner_cate_01.jpg')); ?>" /></a>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <a href="#"><img src="<?php echo e(asset(WEBSITE_URL.'/images/banner_cate_02.jpg')); ?>" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>