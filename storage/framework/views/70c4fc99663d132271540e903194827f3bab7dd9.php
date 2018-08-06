<?php $__env->startSection('content'); ?>
    <section class="block-banner-top">
        <div class="banner-content">
            <!--<img src="<?php echo e(asset(WEBSITE_URL.'/images/banner.jpg')); ?>" alt="<?php echo e($imageAlt); ?>" />-->
            <div class="bannerDescription text-center">
                <h2 class="title">
                    Easy online <span class="colorOrange">shopping</span> for Expats
                </h2>
                <p class="subtitle">
                    We made it simple to shopping in a unique online store - All in one -
                </p>
                <a href="<?php echo e(url('/category')); ?>" class="btn btn-default"><span>SHOPPING NOW</span></a>
            </div>
        </div>
    </section>
    <!-- End banner -->
    <div class="wrapper-content">
        <div class="container">
            <div class="row remove-m-mb">
                <section class="block-top-search">
                    <div class="block-title text-center">
                        <h2><span>Groceries you’ll love, perfectly delivered.</span></h2>
                    </div>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="" value="" placeholder="Search by ingredient name and producer's name,..." class="form-control" />
                            <button type="submit" class="btn btn-primary"><span>GO</span></button>
                        </div>
                    </form>
                </section>

                <section class="block-product-category">
                    <div class="block-content">
                        <h2 class="title">
                            <span>Fresh foods</span>
                            <a href="<?php echo e(url('/category')); ?>">View All  <i class="icon-angle-right"></i></a>
                        </h2>
                        <?php ($products = getRecommendProducts()); ?>
                        <?php echo $__env->make('website.partials.product_recommend', ['dataSlideId' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="block-content">
                        <h2 class="title">
                            <span>Fresh foods</span>
                            <a href="<?php echo e(url('/category')); ?>">View All  <i class="icon-angle-right"></i></a>
                        </h2>
                        <?php ($products = getRecommendProducts()); ?>
                        <?php echo $__env->make('website.partials.product_recommend', ['dataSlideId' => 2], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="block-content">
                        <h2 class="title">
                            <span>Fresh foods</span>
                            <a href="<?php echo e(url('/category')); ?>">View All <i class="icon-angle-right"></i></a>
                        </h2>
                        <?php ($products = getRecommendProducts()); ?>
                        <?php echo $__env->make('website.partials.product_recommend', ['dataSlideId' => 3], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </section>

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

                <section class="block-related-product">
                    <div class="block-content">
                        <h2 class="title"><span>Recommend Products</span></h2>
                        <?php ($products = getRecommendProducts()); ?>
                        <?php echo $__env->make('website.partials.product_recommend', ['dataSlideId' => 4], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>