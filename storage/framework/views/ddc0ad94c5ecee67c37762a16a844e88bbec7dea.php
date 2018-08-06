<?php $__env->startSection('content'); ?>
<div class="wrapper-content container">
    <div class="row">
        <?php ($breadcrumbs = []); ?>
        <?php if(isset($category)): ?>
            <?php (array_push($breadcrumbs, ['text' => $category->name, 'link' => url('/'.$category->slug)])); ?>
        <?php endif; ?>
        <?php (array_push($breadcrumbs, ['text' => $product->name, 'link' => ''])); ?>
        <?php echo $__env->make('website.partials.breadcrumb', ['breadcrumbs' => $breadcrumbs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="product-view">
            <div class="product-essential">
                <div class="row product-view-image-name">
                    <div class="col-sm-6 col-xs-12 product-view-left">
                        <div class="product-img-box">
                            <div class="product-image">
                                <div class="product-image-sliders slider">
                                    <?php if(count($pictures)>0): ?>
                                        <?php $__currentLoopData = $pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <img src="<?php echo e(url("/storage".$picture->url)); ?>" width="420" height="350" title="img" alt="img" />
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="item">
                                            <img src="<?php echo e(asset(WEBSITE_URL.'/images/img_pro_01.jpg')); ?>" width="420" height="350" title="img2" alt="img2" />
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="more-views">
                                <div class="more-view-wrap">
                                    <div class="more-view-inner">
                                        <div class="product-image-thumbs-sliders slider">
                                            <?php if(count($pictures)>0): ?>
                                                <?php $__currentLoopData = $pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="item">
                                                        <div class="img-thumbnail" style="background-image: url('<?php echo e(url("/storage".$picture->url)); ?>')"></div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="item">
                                                    <img src="<?php echo e(asset(WEBSITE_URL.'/images/img_pro_01.jpg')); ?>" title="img2" alt="img2" />
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12 product-view-right">
                        <form id="frm-product" method="post">
                            <input type="hidden" name="product_id" value="<?php echo e($product->product_id); ?>" />

                            <div class="product-shop">
                                <h2 class="product-name"><span><?php echo e($product->name); ?></span></h2>
                                <div class="block-location">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <span class="icon-user"></span> <?php echo e($product->supplier_name); ?>

                                        </div>
                                        <div class="col-sm-6 col-xs-12 text-right">
                                            <span class="icon-place"></span> <?php echo e($product->province_name); ?>, Viet Nam
                                        </div>
                                    </div>
                                </div>
                                <div class="box-price">
                                    <!--
                                    <div class="old-price">
                                        Price：<span class="price">1,250</span> 税込
                                    </div>
                                    -->
                                    <div class="new-price">
                                        <span class="price"><span class="currencyPositive"><?php echo e($product->price); ?></span> <small>vnđ</small></span>
                                    </div>
                                </div>
                                <div class="product-delivery">
                                    <?php echo nl2br($product->small_description); ?>

                                </div>
                                <div class="add-to-cart">
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="product-quantity">
                                                <button type="button" class="btn btn-primary qtyminus" field="qty" disabled>
                                                    <span class="icon-minus"></span>
                                                </button>
                                                <div class="qty">
                                                    <input type="text" name="qty" value="1" class="form-control positiveNumber" />
                                                    <span class="hide product_id"><?php echo e($product->product_id); ?></span>
                                                </div>
                                                <button type="button" class="btn btn-primary qtyplus" field="qty">
                                                    <span class="icon-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <button type="submit" class="btn btn-primary btn-addCart"><span><i class="icon-cart"></i> Add to cart</span></button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Product Description -->
<div class="wrapper-content product-description">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-xs-12">
                <div class="">
                    <ul class="nav nav-tabs sidebar-tabs" id="sidebar" role="tablist">
                        <li><a href="#tab-1" role="tab" data-toggle="tab" class="active show">Description</a></li>
                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-1">
                            <div class="description">
                                <?php echo nl2br($product->description); ?>

                            </div>
                        </div>
                        <!--/.tab-pane -->
                        
                        <!--/.tab-pane -->
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-xs-12">
                <div class="block-producer">
                    <div class="">
                        <h2>Producer information</h2>
                        <ul>
                            <li class="row">
                                <div class="col-sm-6">
                                    <?php if($product->supplier_picture != "" && $product->supplier_picture != null): ?>
                                        <img src="<?php echo e(url('/storage'.$product->supplier_picture)); ?>" >
                                    <?php else: ?>
                                        <img src="<?php echo e(asset(WEBSITE_URL.'/images/img_pro_01.jpg')); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    
                                    <p><span class="icon-user"></span> <?php echo e($product->supplier_name); ?></p>
                                    <p>&nbsp;</p>
                                    
                                    <p><span class="icon-place"></span> <?php echo e($product->province_name); ?>, Viet Nam</p>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <p>&nbsp;</p>
                        <p><strong>Introduction</strong></p>
                        <?php echo nl2br($product->supplier_introduction); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="block-related-product">
    <div class="container">
        <div class="row">
            <div class="block-content">
                <h2 class="title"><span>Related Products</span></h2>
                <?php ($products = getRecommendProducts()); ?>
                <?php echo $__env->make('website.partials.product_recommend', ['dataSlideId' => 1, 'products' => $products], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>