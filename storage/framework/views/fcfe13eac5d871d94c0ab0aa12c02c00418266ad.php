<?php $__env->startSection('content'); ?>
<div class="wrapper-content container">
    <div class="row">
        <?php ($breadcrumbs = []); ?>
        <?php if(isset($category)): ?>
            <?php (array_push($breadcrumbs, ['text' => $category->name, 'link' => url('/'.$category->slug)])); ?>
        <?php endif; ?>
        <?php if($action == 'search'): ?>
            <?php (array_push($breadcrumbs, ['text' => 'Search', 'link' => ''])); ?>
        <?php endif; ?>
        <?php echo $__env->make('website.partials.breadcrumb', ['breadcrumbs' => $breadcrumbs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
        <div class="block-products">
            <?php if(count($products)==0): ?>
            <p>Not find any products</p>
            <?php else: ?>
            <div class="toolbar">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="sort-order">
                            <select name="sort" class="form-control sortProduct">
                                <option value="default" <?php if($filterPrice == 'default'): ?> selected <?php endif; ?>>Default Sourting</option>
                                <option value="desc" <?php if($filterPrice == 'desc'): ?> selected <?php endif; ?>>High</option>
                                <option value="asc" <?php if($filterPrice == 'asc'): ?> selected <?php endif; ?>>Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <nav aria-label="Page navigation example" class="text-right">
                            <?php echo e($products->appends(request()->query())->links('website.partials.pagination')); ?>

                        </nav>
                    </div>
                </div>
            </div>

            <div class="products-grid products-style">
                <?php if(count($products)>0): ?>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('website.partials.product_item', ['product' => $product], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <div class="toolbar bottom">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <nav aria-label="Page navigation example" class="text-right">
                            <?php echo e($products->appends(request()->query())->links('website.partials.pagination')); ?>

                        </nav>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>