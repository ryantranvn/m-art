<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.product_name')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($product->name); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.product_price')); ?> : </div>
                <div class="col-sm-8 align-left font-bold">
                    <span class="currencyPositive"><?php echo e($product->price); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.supplier')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($product->supplier->name); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.category')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($product->category->name); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.picture')); ?> : </div>
                <div class="col-sm-3 align-left font-bold">
                    <?php $__currentLoopData = $product->pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(url('/storage'.$picture->url)); ?>" class="img-responsive m-r-10 thumbnailInTable" />
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.product_desc')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($product->description); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.supplier_status')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e(getStatusText('product', $product->status)); ?></div>
            </div>

            <div class="row">
                <div class="col-sm-12 align-right">
                    <a href="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>" class="btn bg-grey"><?php echo e(trans('adminbsb.btn_back')); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>