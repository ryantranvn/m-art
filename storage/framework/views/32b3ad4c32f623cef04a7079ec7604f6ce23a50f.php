<?php $__env->startSection('content'); ?>
<div class="wrapper-content checkout-page">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('website.partials.breadcrumb', [
                'breadcrumbs' => [
                    ['text' => 'Cart', 'link' => url('/cart')],
                    ['text' => 'Checkout', 'link' => '']
                ]
            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="block-cart-page">
                <div class="block-title">
                    <h2>Checkout</h2>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <div class="cart-detail panel">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
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
                                            <div class="qty"><?php echo e($product['quantity']); ?></div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="checkout-address panel">
                            <div class="panel-body">
                                <div class="block-content m-b-20">
                                    <h2 class="address-hat">Shipping &amp; Billing</h2>
                                    <p class="address-name"><?php echo e($user['name']); ?></p>
                                    <p class="address-info-item address-value"><?php echo e($user['address']); ?></p>
                                    
                                    <p class="address-info-item address-mobile"><?php echo e($user['phone']); ?></p>
                                </div>
                                <div class="block-content">
                                    <h2 class="address-hat">Order Summary</h2>
                                    <div class="checkout-summary-rows">
                                        <div class="checkout-summary-row">
                                            <div class="checkout-summary-label"
                                                 data-spm-anchor-id="a2o4n.shipping.0.i4.4b615d0aNK0iHR">Subtotal (<?php echo e($cart['totalItems']); ?> Items)
                                            </div>
                                            <div class="checkout-summary-value"><span class="currencyPositive"><?php echo e($cart['subTotal']); ?></span> vnđ</div>
                                        </div>
                                        <div class="checkout-summary-row">
                                            <div class="checkout-summary-label">Tax</div>
                                            <div class="checkout-summary-value"><span class="currencyPositive"><?php echo e(TAX); ?></span> vnđ</div>
                                        </div>
                                        <div class="checkout-summary-row">
                                            <div class="checkout-summary-label">Delivery</div>
                                            <div class="checkout-summary-value"><span class="currencyPositive"><?php echo e(DELIVERY); ?></span> vnđ</div>
                                        </div>
                                    </div>
                                    <?php /*
                                    <div class="voucher-input">
                                        <div class="voucher-input-inner">
                                            <div class="voucher-input-col">
                                                <span class="next-input next-input-single next-input-medium clear voucher-input-control">
                                                    <input type="text" id="automation-voucher-input" placeholder="Enter Voucher Code" value="" class="form-control" />
                                                </span>
                                            </div>
                                            <div class="voucher-input-col">
                                                <button id="automation-voucher-input-button" type="button" class="btn btn-primary">APPLY</button>
                                            </div>
                                        </div>
                                    </div>
                                    */ ?>
                                    <div class=" checkout-order-total">
                                        <div class="checkout-order-total-row">
                                            <div class="checkout-order-total-title">Total</div>
                                            <div class="checkout-order-total-fee">
                                                <span class="price"><span class="currencyPositive"><?php echo e($cart['total']); ?></span> vnd</span>
                                            </div>
                                        </div>
                                        <form id="frmCheckout" action="<?php echo e(url($controller.'/checkout')); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="userId" value="<?php echo e($user['userId']); ?>" />
                                            <button type="button" class="btn btn-primary btnCheckout">PROCEED TO PAYMENT</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>