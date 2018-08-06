<?php $__env->startSection('out_content'); ?>
    <div class="row clearfix summaryBox">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo e(url('admin/user')); ?>">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="content">
                        <div class="text upper"><?php echo e(trans('adminbsb.user')); ?></div>
                        <div class="number count-to" data-from="0" data-to="<?php echo e($totalUser); ?>" data-speed="15" data-fresh-interval="20"><?php echo e($totalUser); ?></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo e(url('admin/supplier')); ?>">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_pin</i>
                    </div>
                    <div class="content">
                        <div class="text upper"><?php echo e(trans('adminbsb.supplier')); ?></div>
                        <div class="number count-to" data-from="0" data-to="<?php echo e($totalSupplier); ?>" data-speed="1000" data-fresh-interval="20"><?php echo e($totalSupplier); ?></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo e(url('admin/product')); ?>">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">list</i>
                    </div>
                    <div class="content">
                        <div class="text upper"><?php echo e(trans('adminbsb.product')); ?></div>
                        <div class="number count-to" data-from="0" data-to="<?php echo e($totalProduct); ?>" data-speed="1000" data-fresh-interval="20"><?php echo e($totalProduct); ?></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo e(url('admin/order')); ?>">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">shopping_basket</i>
                    </div>
                    <div class="content">
                        <div class="text upper"><?php echo e(trans('adminbsb.order')); ?></div>
                        <div class="number count-to" data-from="0" data-to="<?php echo e($totalOrder); ?>" data-speed="1000" data-fresh-interval="20"><?php echo e($totalOrder); ?></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>