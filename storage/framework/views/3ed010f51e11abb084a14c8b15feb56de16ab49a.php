<div class="item">
    <div class="product-item">
        <?php if($product->thumbnail != null && $product->thumbnail != ""): ?>
            <a href="<?php echo e(url('/'.$product->category_slug.'/'.$product->slug.'?supplier='.$product->supplier_id)); ?>" class="img-thumbnail" style="background-image: url('<?php echo e(url("/storage".$product->thumbnail)); ?>');"></a>
        <?php else: ?>
            <a href="<?php echo e(url('/'.$product->category_slug.'/'.$product->slug.'?supplier='.$product->supplier_id)); ?>" class="img-thumbnail" style="background-image: url('<?php echo e(asset(WEBSITE_URL.'/images/img_pro_01.jpg')); ?>');"></a>
        <?php endif; ?>
        <h2 class="product-name"><a href="<?php echo e(url('/product_detail?product_id='.$product->product_id)); ?>"><?php echo e(str_limit($product->name, 20)); ?></a></h2>
        <div class="box-price">
            
            <div class="new-price">
                <span class="price"><span class="currencyPositive"><?php echo e($product->price); ?></span> <small>vnđ</small></span>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-cart btn-addCartOne" data-product-id="<?php echo e($product->product_id); ?>"><span class="icon-shopping-cart"></span></button>
    </div>
</div>