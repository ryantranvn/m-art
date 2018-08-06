<?php $__env->startSection('content'); ?>
<div class="wrapper-content container">
    <div class="row">
        <?php echo $__env->make('website.partials.breadcrumb', [
            'breadcrumbs' => [
                ['text' => 'Shopping cart', 'link' => '']
            ]
        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="block-cart-page">
            <div class="block-title">
                <h2>Your Cart</h2>
            </div>
            <div class="cart-detail">
                <?php if(count($cart) == 0): ?>
                    <p><?php echo e(trans('adminbsb.empty_cart')); ?></p>
                <?php else: ?>
                <table class="table table-cart">
                    <tbody>
                    <?php $__currentLoopData = $cart['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($urlProductDetail = url('/'.$product['category_slug'].'/'.$product['slug'].'?supplier='.$product['supplier_id'])); ?>
                        <tr>
                            <td>
                                <div class="product-image">
                                    <?php if($product['thumbnail'] != null && $product['thumbnail'] != ""): ?>
                                        <?php ($images = url('/storage'.$product['thumbnail'])); ?>
                                    <?php else: ?>
                                        <?php ($images = asset(BULK_SYSTEM_THEME.'/images/default.jpg')); ?>
                                    <?php endif; ?>
                                    <a href="<?php echo e($urlProductDetail); ?>" class="img-thumb" style="background-image: url('<?php echo e($images); ?>');"></a>
                                </div>
                            </td>
                            <td>
                                <h2 class="product-name">
                                    <a href="<?php echo e($urlProductDetail); ?>"><?php echo e($product['name']); ?></a>
                                </h2>
                                <p class="producer"><?php echo e($product['supplier_name']); ?></p>
                                <p><?php echo e($product['small_description']); ?></p>
                            </td>
                            <td>
                                <div class="box-price">
                                    <div class="new-price">
                                        <span class="price"><span class="currencyPositive"><?php echo e($product['price']); ?></span> <small>vnđ</small></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="product-quantity inCart">
                                    <button type="button" class="btn btn-primary qtyminus" field="qty" <?php if($product['quantity']==1): ?> disabled <?php endif; ?>>
                                        <span class="icon-minus"></span>
                                    </button>
                                    <div class="qty">
                                        <input type="text" name="qty" value="<?php echo e($product['quantity']); ?>" class="form-control positiveNumber" />
                                        <span class="hide product_id"><?php echo e($product_id); ?></span>
                                    </div>
                                    <button type="button" class="btn btn-primary qtyplus" field="qty" <?php if($product['quantity']==MAX_QUANTITY): ?> disabled <?php endif; ?>>
                                        <span class="icon-plus"></span>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div class="box-price text-right">
                                    <div class="new-price">
                                        <span class="price subTotalItem"><span class="currencyPositive"><?php echo e($product['subTotalItem']); ?></span> <small>vnđ</small></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" data-id="<?php echo e($product_id); ?>" class="btnDeleteCart"><span class="icon-trash-o"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Subtotal:</th>
                            <td>
                                <div class="box-price text-right">
                                    <div class="new-price text-right"><span class="subTotal price"><span class="currencyPositive"><?php echo e($cart['subTotal']); ?></span> <small>vnđ</small></span></div>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="4">Delivery Fee:</th>
                            <td>
                                <div class="box-price text-right">
                                    <div class="new-price"><span class="price"><span class="currencyPositive"><?php echo e(DELIVERY); ?></span> <small>vnđ</small></span></div>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="4">Tax:</th>
                            <td>
                                <div class="box-price text-right">
                                    <div class="new-price"><span class="price"><span class="currencyPositive"><?php echo e(TAX); ?></span> <small>vnđ</small></span></div>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="4">Total Price:</th>
                            <td>
                                <div class="box-price text-right">
                                    <div class="new-price"><span class="total price"><span class="currencyPositive"><?php echo e($cart['total']); ?></span> <small>vnđ</small></span></div>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <?php endif; ?>
            </div>
            <div class="buttons-set">
                <a href="<?php echo e(url('/')); ?>" class="btn btn-primary pull-left">Continue Shopping</a>
                <?php if(count($cart) > 0): ?>
                <a href="<?php echo e(url('/checkout')); ?>" class="btn btn-primary pull-right btnCheckout">Checkout</a>
                <?php endif; ?>
            </div>
        </div>

        <section class="block-related-product">
            <div class="block-content">
                <h2 class="title"><span>Related Products</span></h2>
                <?php ($products = getRecommendProducts()); ?>
                <?php echo $__env->make('website.partials.product_recommend', ['dataSlideId' => 1, 'products' => $products], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>